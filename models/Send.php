<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Send extends Model implements SendInterface {

	public $user_id, $money, $comment;

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
				[['user_id', 'money', 'comment'], 'required'],
				[['user_id', 'money'], 'integer'],
				[['comment'], 'string', 'max' => 255],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'user_id' => 'Пользователя ID',
			'comment' => 'Комментарий',
			'money' => 'Сумма'
		];
	}

	public function send() {
//		$user = User::findOne($this->user_id);
//		$api = $user->api;
	}

}
