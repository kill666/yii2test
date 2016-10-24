<?php

namespace app\models;

interface SendInterface {

	public function send($url, $data, $format);
}
