<?php
Yii::import('application.modules.user.models.*');
/**
 * This is the model class for table "core_posts".
 *
 * The followings are the available columns in table 'core_posts':
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property integer $discussion_id
 * @property string $date
 * @property integer $user_id
 *
 * The followings are the available model relations:
 * @property CorePosts $discussion
 * @property CorePosts[] $corePosts
 */
class CorePosts extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CorePosts the static model class
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
		return '{{core_posts}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('discussion_id, user_id', 'numerical', 'integerOnly'=>true),
			array('text, date', 'safe'),
			array('text, date, user_id, discussion_id', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, text, discussion_id, date, user_id', 'safe', 'on'=>'search'),

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
			'discussion' => array(self::BELONGS_TO, 'CoreDiscussions', 'discussion_id'),
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
			'text' => Yii::t('core', 'Text'),
			'discussion_id' => Yii::t('core', 'Discussion'),
			'date' => Yii::t('core', 'Date'),
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
		$criteria->compare('text',$this->text,true);
		$criteria->compare('discussion_id',$this->discussion_id);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function defaultScope()
    {
        return array( 
            'alias' => 'post',
        );
    }

    public function scopes()
    {
        return array(
            'enabled' => array(
                'condition' => 'post.status = 1',
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

    public function getUser()
    {
    	if($this->user_id)
    		return $this->user;
    	if($this->customer_id)
    		return $this->customer;
    }
}