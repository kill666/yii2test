<?php

namespace app\controllers\report;

use Yii;
use yii\web\Controller;
use app\models\Transaction;
use app\models\LoginForm;
use app\models\User;
use app\models\Kassa;

class ReportController extends Controller {

	public $user_id, $money;

	public function actionIndex() {
		return $this->render('index');
	}

// Под отчетные деньги выдающиеся из кассы пользователю
	public function save() {
		$kassa = Kassa::findOne(1);
		$kassa->money = $kassa->money - $this->money;
		$user = User::findOne($this->user_id);
		$user->money = $user->money + $this->money;
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
