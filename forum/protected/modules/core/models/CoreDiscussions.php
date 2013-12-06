<?php

/**
 * This is the model class for table "core_discussions".
 *
 * The followings are the available columns in table 'core_discussions':
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property integer $category_id
 * @property string $date
 * @property integer $status
 * @property integer $user_id
 *
 * The followings are the available model relations:
 * @property CoreCategories $category
 */
class CoreDiscussions extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CoreDiscussions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{core_discussions}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category_id, status, user_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('title, text, category_id, status', 'required'),
			array('text, date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, text, category_id, date, status, user_id, customer_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'category' => array(self::BELONGS_TO, 'CoreCategories', 'category_id'),
			'postsCount' => array(self::STAT, 'CorePosts', 'discussion_id'),
			'posts' => array(self::HAS_MANY, 'CorePosts', 'discussion_id'),
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
			'customer' => array(self::BELONGS_TO, 'Customers', 'customer_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => Yii::t('core', 'Title'),
			'text' => Yii::t('core', 'Text'),
			'category_id' => Yii::t('core', 'Category'),
			'date' => Yii::t('core', 'Date'),
			'status' => Yii::t('core', 'Status'),
			'user_id' => Yii::t('core', 'User'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function defaultScope()
    {
        return array( 
            'alias' => 'discussion',
        );
    }

	public function scopes()
    {
        return array(
            'enabled' => array(
                'condition' => 'discussion.status = 1',
            ),
        );
    }

    public function resently($limit = 20)
    {

        $this->getDbCriteria()->mergeWith(array(
			'order'=>'date DESC',
			'limit'=>$limit,
		));
		return $this;
    }

    public function addNew ()
    {
    	parent::save();

    	// Создаём экземпляр потомка CEvent
        $event = new CModelEvent($this);
        // Вызываем событие
        $this->onAddNew($event);
        return $event->isValid;
    }

    public function onAddNew ($event)
    {
    	$this->raiseEvent('onAddNew', $event);
    }

    public function getUser()
    {
    	if($this->user_id)
    		return $this->user;
    	if($this->customer_id)
    		return $this->customer;
    }
}