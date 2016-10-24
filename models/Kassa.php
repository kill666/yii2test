<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kassa".
 *
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $money
 * @property integer $status
 */
class Kassa extends \yii\db\ActiveRecord {

	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'kassa';
	}

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
				[['created_at', 'updated_at'], 'safe'],
				[['money'], 'required'],
				[['money', 'status'], 'integer'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'id' => 'ID',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'money' => 'Money',
			'status' => 'Status',
		];
	}

	public function setMoney($that, $model) {
		$status = Status::findOne($model->status_id);
		$class = $status['class'];
		if (class_exists($class)) {
//			new \app\controllers\report\CashbackController($id, $module);
			$obj = new $class($that->id, $that->module);
			$obj->user_id = $model->user_id;
			$obj->money = $model->money;
			return $obj->save();
		}
		return false;
	}

}
