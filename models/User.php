<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $username
 * @property string $password
 * @property integer $money
 * @property integer $status
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface {

//	public $id;
//	public $username;
//	public $password;
	public $authKey;
//	public $money;
	public $accessToken;

//	private static $users = [
//		'100' => [
//			'id' => '100',
//			'username' => 'admin',
//			'password' => 'admin',
//			'authKey' => 'test100key',
//			'accessToken' => '100-token',
//			'money' => '100',
//		],
//		'101' => [
//			'id' => '101',
//			'username' => 'demo',
//			'password' => 'demo',
//			'authKey' => 'test101key',
//			'accessToken' => '101-token',
//			'money' => '100',
//		],
//	];

	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'user';
	}

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
				[['created_at', 'updated_at'], 'safe'],
				[['username', 'password', 'money'], 'required'],
				[['money', 'status'], 'integer'],
				[['username', 'password', 'api'], 'string', 'max' => 255],
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
			'username' => 'Username',
			'password' => 'Password',
			'money' => 'Money',
			'status' => 'Status',
			'api' => 'Name Class router',
		];
	}

	public static function findIdentity($id): \yii\web\IdentityInterface {
		$user = self::findOne($id);
		return isset($user) ? new static($user) : null;
//		return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
	}

	public static function findIdentityByAccessToken($token, $type = null): \yii\web\IdentityInterface {

		$users = self::find()->asArray()->all();
		foreach ($users as $user) {
			if ($user['accessToken'] === $token) {
				return new static($user);
			}
		}

		return null;
	}

	public static function findByUsername($username) {
//		$users = self::findAll();

		$users = self::find()->asArray()->all();
		foreach ($users as $user) {
			if (strcasecmp($user['username'], $username) === 0) {
				return new static($user);
			}
		}

		return null;
	}

	public static function findByUserId($id) {
		$user = self::findOne($id);
//		foreach (self::$users as $user) {
		if (strcasecmp($user['id'], $id) === 0) {
			return new static($user);
		}
//		}

		return null;
	}

	/**
	 * @inheritdoc
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @inheritdoc
	 */
	public function getAuthKey() {
		return $this->authKey;
	}

	/**
	 * @inheritdoc
	 */
	public function validateAuthKey($authKey) {
		return $this->authKey === $authKey;
	}

	/**
	 * Validates password
	 *
	 * @param string $password password to validate
	 * @return bool if password provided is valid for current user
	 */
	public function validatePassword($password) {
		return $this->password === md5($password);
	}

}
