<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "transaction".
 *
 * @property integer $id
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $user_id
 * @property string $comment
 * @property integer $money
 * @property integer $status_id
 */
class Transaction extends \yii\db\ActiveRecord {

	public $username, $name, $status2;
	public $_id = false;

	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'transaction';
	}

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
				[['user_id', 'comment', 'money', 'status_id'], 'required'],
				[['user_id', 'created_at', 'updated_at', 'money', 'status_id'], 'integer'],
				[['comment'], 'string', 'max' => 255],
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
			'user_id' => 'User ID',
			'username' => 'User',
			'comment' => 'Comment',
			'money' => 'Money',
			'status_id' => 'Status',
			'status' => 'Status',
		];
	}

	public function afterSave($insert, $changedAttributes) {
		\Yii::$app->send->send('http://yii.localhost/index.php?r=transaction/inbox', $this->attributes);
		return parent::afterSave($insert, $changedAttributes);
	}

	public function getListTransaction() {// id - может быть пользовательским номером
		if (is_int($this->_id)) {
			return parent::find()->select('transaction.*,s.name as status2')
							->leftjoin('status s', 's.id=transaction.status_id')
							->where(['transaction.user_id' => $this->_id])
							->all();
		} else {
			return parent::find()->select('transaction.*,u.username as username,s.name as status2')
							->leftjoin('user u', 'u.id=transaction.user_id')
							->leftjoin('status s', 's.id=transaction.status_id')
							->all();
		}
	}

	public function getStatus() {
		return ArrayHelper::map(Status::find()->all(), 'id', 'name');
	}

	public function getUser() {
		return ArrayHelper::map(User::find()->all(), 'id', 'username');
	}

}
