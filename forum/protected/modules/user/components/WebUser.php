<?php

Yii::import('application.modules.user.models.*');
Yii::import('application.modules.user.components.*');

class WebUser extends CWebUser {

    private $_model = null;

    public function getRole() {
        if (is_object($this->getModel())) {
            return $this->getModel()->role;
        }
    }

    public function isOwner($model) {

        if ($this->role == 'admin') {
            if (isset($model->user_id) && ($model->user_id == $this->id)) {
                return true;
            }
        } else if ($this->role == 'user') {
            if (isset($model->customer_id) && ($model->customer_id == $this->id)) {
                return true;
            }
        }

        return false;
    }

    private function getModel() {
        if (!$this->isGuest && $this->_model === null && isset($_SESSION['user_id'])) {
            $this->_model = Users::model()->find('user_id = :user_id', array('user_id' => $this->id));
        }

        if (!$this->isGuest && $this->_model === null && isset($_SESSION['customer_id'])) {
            $this->_model = Customers::model()->find('customer_id = :customer_id', array('customer_id' => $this->id));
        }
        return $this->_model;
    }

}