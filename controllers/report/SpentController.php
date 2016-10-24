<?php

namespace app\controllers\report;

use Yii;
use yii\web\Controller;
use app\models\Transaction;
use app\models\LoginForm;
use app\models\User;
use app\models\Kassa;

class SpentController extends \yii\web\Controller {

	public $user_id, $money;

	public function actionIndex() {
		return $this->render('index');
	}

// Просто раход денег из кассы
	public function save() {
		$kassa = Kassa::findOne(1);
		$kassa->money = $kassa->money - $this->money;
		if ($kassa->save()) {
			return true;
		}
		return FALSE;
	}

}
