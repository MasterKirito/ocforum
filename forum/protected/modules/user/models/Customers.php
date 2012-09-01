<?php

/**
 * This is the model class for table "customer".
 *
 * The followings are the available columns in table 'customer':
 * @property integer $customer_id
 * @property integer $store_id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $telephone
 * @property string $fax
 * @property string $password
 * @property string $cart
 * @property string $wishlist
 * @property integer $newsletter
 * @property integer $address_id
 * @property integer $customer_group_id
 * @property string $ip
 * @property integer $status
 * @property integer $approved
 * @property string $token
 * @property string $date_added
 */
class Customers extends CActiveRecord
{
	private $_identity;

	public $role = 'user';
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Customers the static model class
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
		return 'customer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('customer_group_id, status, approved, token', 'required'),
			array('store_id, newsletter, address_id, customer_group_id, status, approved', 'numerical', 'integerOnly'=>true),
			array('firstname, lastname, telephone, fax', 'length', 'max'=>32),
			array('email', 'length', 'max'=>96),
			array('password', 'length', 'max'=>40),
			array('ip', 'length', 'max'=>15),
			array('token', 'length', 'max'=>255),
			array('cart, wishlist, date_added', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('customer_id, store_id, firstname, lastname, email, telephone, fax, password, cart, wishlist, newsletter, address_id, customer_group_id, ip, status, approved, token, date_added', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'customer_id' => 'Customer',
			'store_id' => 'Store',
			'firstname' => 'Firstname',
			'lastname' => 'Lastname',
			'email' => 'Email',
			'telephone' => 'Telephone',
			'fax' => 'Fax',
			'password' => 'Password',
			'cart' => 'Cart',
			'wishlist' => 'Wishlist',
			'newsletter' => 'Newsletter',
			'address_id' => 'Address',
			'customer_group_id' => 'Customer Group',
			'ip' => 'Ip',
			'status' => 'Status',
			'approved' => 'Approved',
			'token' => 'Token',
			'date_added' => 'Date Added',
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

		$criteria->compare('customer_id',$this->customer_id);
		$criteria->compare('store_id',$this->store_id);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('telephone',$this->telephone,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('cart',$this->cart,true);
		$criteria->compare('wishlist',$this->wishlist,true);
		$criteria->compare('newsletter',$this->newsletter);
		$criteria->compare('address_id',$this->address_id);
		$criteria->compare('customer_group_id',$this->customer_group_id);
		$criteria->compare('ip',$this->ip,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('approved',$this->approved);
		$criteria->compare('token',$this->token,true);
		$criteria->compare('date_added',$this->date_added,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function authenticate()
	{
		$this->_identity=new UserIdentity($this->email,$this->password);
		$this->_identity->modelName = get_class($this);
		$this->_identity->loginField = 'email';
		$this->_identity->authenticate();

		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			//$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			$duration= 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		return false;
	}

	public function getUsername()
	{
		return $this->firstname . ' ' . $this->lastname;
	}

	public function getId()
	{
		return $this->customer_id;
	}
}