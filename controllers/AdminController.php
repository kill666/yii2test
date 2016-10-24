<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Transaction;
use app\models\User;
use app\models\Status;
use app\models\Company;
use app\models\AdminForm;
use app\models\Kassa;

/**
 *
 *
 */
class AdminController extends Controller {

	public function actions() {
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			]
		];
	}

	public function beforeAction($action) {
		$id = Yii::$app->user->getId();
		if ($id != 100) {
			$this->layout = 'error/permission';
		} else {
			return parent::beforeAction($action);
		}
	}

	public function actionIndex() {
		return $this->actionTransaction();
	}

	public function actionSpent() { // Операции по кассе
		$model = new Transaction();
		$post = Yii::$app->request->post();
		if ($post) {
			$model->load($post);
			$kassa = new Kassa();
			$result = $kassa->setMoney($this, $model);
			if ($result && $model->validate() && $model->save()) {
				return $this->render('/save');
			}
		}
		return $this->render('//admin/spent', [
					'model' => $model
		]);
	}

	public function actionIncoming() {// Входящие сообщения от внешних систем
		$model = new Transaction();
		$post = Yii::$app->request->post();
		if ($model->load($post) && $model->validate() && $model->save()) {
			return json_encode(['response' => TRUE]);
		}
	}

	public function actionTransaction() {
		$model = new Transaction();
		$result = $this->render('//admin/transactions', [
			'model' => $model
		]);
		return $result;
	}

	public function actionOptions() {
		return $this->render('//admin/options');
	}

	public function actionUsers() {
		$users = User::find()->all();
		return $this->render('//admin/users', ['users' => $users]);
	}

}
