<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "status".
 *
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $name
 */
class Status extends \yii\db\ActiveRecord {

	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'status';
	}

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
				[['created_at', 'updated_at'], 'safe'],
				[['name', 'znak'], 'required'],
				[['name', 'class'], 'string', 'max' => 255],
				// class - полный путь до кастомных контроллеров обработки сохранения
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
			'znak' => 'znak',
			'class' => 'Сlass',
		];
	}

//	public function getName() {
//		return $this->name;
//	}
}
