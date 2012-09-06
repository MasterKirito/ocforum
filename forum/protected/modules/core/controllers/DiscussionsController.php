<?php

class DiscussionsController extends FrontendController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('create'),
				'roles'=>array('user'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('delete', 'update'),
				'roles'=>array('user', 'moderator', 'admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$post=new CorePosts;
		$model = $this->loadModel($id);
		$model->views_count = $model->views_count + 1;
		$model->save();
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CorePosts']))
		{
			$post->attributes=$_POST['CorePosts'];

			$post->user_id = 1;

			$post->date = date('Y-m-d H:i:s');
			$post->discussion_id = $model->id;

			if($post->save())
				$this->redirect(array('view','id'=>$model->id));
		}


		$dataProvider=new CActiveDataProvider('CorePosts', array(
			'criteria'=>array(
				'condition'=>'discussion_id=:duscussionId',
				'params' => array(':duscussionId' => $model->id),
				'order'=>'date ASC',
			),
			'pagination' => array(
				'pageSize' => Yii::app()->params['postPageSize'],
			)
		));

		$this->render('view',array(
			'model'=>$model,
			'post'=>$post,
			'dataProvider' => $dataProvider
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new CoreDiscussions;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CoreDiscussions']))
		{
			$model->attributes=$_POST['CoreDiscussions'];

			if(Yii::app()->user->role == 'admin'){
				$model->user_id = Yii::app()->user->id;
			}
			if(Yii::app()->user->role == 'user'){
				$model->customer_id = Yii::app()->user->id;
			}

			$model->date = date('Y-m-d H:i:s');
			if($model->addNew())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		if(!Yii::app()->user->isOwner($model) && !Yii::app()->user->checkAccess('moderator'))
		{
			throw new CHttpException(403,'Доступ запрещен.');
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CoreDiscussions']))
		{
			$model->attributes=$_POST['CoreDiscussions'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('CoreDiscussions', array(
			'pagination' => array(
				'pageSize' => Yii::app()->params['discussionsPageSize'],
			)
		));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=CoreDiscussions::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='core-discussions-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
