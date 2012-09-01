<?php
class UserIdentity extends CUserIdentity {
    // Будем хранить id.
    protected $_id;
    public $email;

    public $modelName;
    public $loginField;
 
    // Данный метод вызывается один раз при аутентификации пользователя.
    public function authenticate ()
    {
        // Производим стандартную аутентификацию, описанную в руководстве.
        $modelName = $this->modelName;
        if($modelName == 'Users')
            $user = Users::model()->find('LOWER('.$this->loginField.')=?', array(strtolower($this->username)));
        elseif($modelName == 'Customers')
            $user = Customers::model()->find('LOWER('.$this->loginField.')=?', array(strtolower($this->username)));

        if(($user===null) or ($this->password!==$user->password))
        {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } 
        else 
        {
            // В качестве идентификатора будем использовать id, а не username,
            // как это определено по умолчанию. Обязательно нужно переопределить
            // метод getId(см. ниже).
            $this->_id = $user->id;
            $this->username = $user->username;
            $this->email = $user->email;

            $this->errorCode = self::ERROR_NONE;
        }


       return !$this->errorCode;
    }
 
    public function getId()
    {
        return $this->_id;
    }
}