<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $name
 * @property integer $money
 * @property integer $status
 * @property string $api
 */
class Company extends \yii\db\ActiveRecord {

	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'company';
	}

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
				[['created_at', 'updated_at'], 'safe'],
				[['name', 'money', 'api'], 'required'],
				[['money', 'status'], 'integer'],
				[['name', 'api'], 'string', 'max' => 255],
				// api - полный путь до кастомного кнтроллера например "app\controllers\api\DefaultController"
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
			'name' => 'Name',
			'money' => 'Money',
			'status' => 'Status',
			'api' => 'Api',
		];
	}

}
