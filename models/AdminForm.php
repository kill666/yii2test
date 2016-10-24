<?php

namespace app\models;

use Yii;
use yii\base\Model;

class AdminForm extends Model {

	public $user_id;
	public $money;
	public $status_id;
	public $dop;

	public function rules() {
		return [
				[['user_id', 'money', 'status_id'], 'required'],
				['dop', 'string'],
				['user_id', 'validateUserId'],
				['money', 'validateMoney'],
				['status_id', 'validateStatusId'],
		];
	}

	public function validateUserId($attribute, $params) {
		if (!$this->hasErrors()) {
			$id = $this->user_id;
		}
	}

	public function validateMoney($attribute, $params) {
		if (!$this->hasErrors()) {
			$money = $this->money;
		}
	}

	public function validateStatusId($attribute, $params) {
		if (!$this->hasErrors()) {
			$status_id = $this->status_id;
		}
	}

	public function getUser() {
		if ($this->_user === false) {
			$this->_user = User::findByUserId($this->user_id);
		}
		return $this->_user;
	}

}
