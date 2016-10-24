<?php

namespace app\controllers\report;

use Yii;
use yii\web\Controller;
use app\models\Transaction;
use app\models\LoginForm;
use app\models\User;
use app\models\Kassa;

class UserController extends \yii\web\Controller {

	public $user_id, $money;

	public function actionIndex() {
		return $this->render('index');
	}

// Отчет пользователя
	public function save() {
//		$kassa = Kassa::findOne(1);
//		$kassa->money = $kassa->money - $model->money;
		$user = User::findOne($this->user_id);
		$user->money = $user->money - $this->money;
		$transaction = Yii::$app->db->beginTransaction();
		if ($user->save()) {
			$transaction->commit();
			return true;
		} else {
			$transaction->rollBack();
		}
		return FALSE;
	}

}
