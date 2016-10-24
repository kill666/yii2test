<?php

namespace app\components;

use Yii;
use app\models\SendInterface;
use yii\base\Component;
use yii\httpclient\Client;

class SendComponent extends Component implements SendInterface {

	public function init() {
		parent::init();
	}

	/**
	 *
	 * @param string $url Полный адрес получателя
	 * @param array $data Данные для отправки
	 * @param type $format Формат отправки данных (json по-умолчанию)
	 */
	public function send($url, $data, $format = 'json') {
//		Yii::$app->send->send();
		switch ($format) {
			case 'json':
				$format = Client::FORMAT_JSON;
				$data = json_encode($data);
				break;
			default:
				$format = Client::FORMAT_JSON;
				$data = json_encode($data);
				break;
		}
		$send = new Client();
		$response = $send->createRequest()->setUrl($url)
				->setMethod('post')
				->setData($data)
				->send();
		return $response->getStatusCode();
	}

}
