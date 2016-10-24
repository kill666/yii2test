<?php

namespace app\controllers;

use Yii;
use app\models\Inbox;
use yii\helpers\Html;

class TransactionController extends \yii\web\Controller {

	public function beforeAction($action) {
		$this->enableCsrfValidation = false;

		return parent :: beforeAction($action);
	}

	public function actionIndex() {
		return $this->render('index');
	}

	public function actionInbox() {
		$inbox = new Inbox();
		$post = Yii::$app->request->post();
		$post = json_decode($post[0], true);
		$inbox->user_id = $post['user_id'];
		$inbox->money = $post['money'];
		$inbox->comment = $post['comment'];
		if ($inbox->validate() && $inbox->save()) {
			return $this->render('/save');
		}
		return $this->render('//site/inbox', ['model' => $inbox]);
	}

}
