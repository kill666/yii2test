<?php

namespace app\controllers\report;

use Yii;
use yii\web\Controller;
use app\models\Transaction;
use app\models\LoginForm;
use app\models\User;
use app\models\Kassa;

class CashbackController extends \yii\web\Controller {

	public $user_id, $money;

	public function actionIndex() {
		return $this->render('index');
	}

// Деньги возвращенные пользователем в кассу
	public function save() {
		$kassa = Kassa::findOne(1);
		$user = User::findOne($this->user_id);
		$kassa->money += $this->money;
		$user->money = $user->money - $this->money;
		$transaction = Yii::$app->db->beginTransaction();
		if ($kassa->save() && $user->save()) {
			$transaction->commit();
			return true;
		} else {
			$transaction->rollBack();
		}
		return FALSE;
	}

}
