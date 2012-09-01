<?php
Yii::import('application.modules.user.models.*');
Yii::import('application.modules.user.components.*');
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class FrontendController extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	public function beforeAction()
	{
		if(isset($_SESSION['user_id']))
        {
            $user = Users::model()->findByPk($_SESSION['user_id']);
            if($user){
                $user->authenticate();
            }
        }
        if(isset($_SESSION['customer_id']))
        {
            $user = Customers::model()->findByPk($_SESSION['customer_id']);
            if($user){
                $user->authenticate();
            }
        }
        return true;
	}
}