<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Transaction;
use app\models\User;
use app\models\Status;
use app\models\Kassa;

class UserController extends Controller {

	public $status_id = 4;

	public function actionIndex() {
		return $this->actionTransaction();
	}

	public function actionTransaction() {
		$id = Yii::$app->user->getId();
		$model = new Transaction();
		$model->_id = $id;
		return $this->render('//user/transactions', [
					'model' => $model
		]);
	}

	public function actionReport() {
		$model = new Transaction();
		$post = Yii::$app->request->post();
		if ($post) {
			$model->load($post);
			$model->user_id = \Yii::$app->user->getId();
			$model->status_id = $this->status_id;
			$kassa = new Kassa();
			$result = $kassa->setMoney($this, $model);
			if ($result && $model->validate() && $model->save()) {
				return $this->render('/save');
			}
		}
		return $this->render('//user/report', ['model' => $model]);
	}

}
