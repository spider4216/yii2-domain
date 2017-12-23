<?php

namespace yii2lab\domain\base;

use yii\base\Model as YiiModel;
use yii\helpers\ArrayHelper;

class Model extends YiiModel
{
	public function addErrorsFromException($e) {
		$errors = $e->getErrors();
		if($errors instanceof YiiModel) {
			$errors = $errors->getErrors();
		}
		foreach($errors as $field => $error) {
			$this->addErrorItem($field, $error);
		}
	}

	private function addErrorItem($field, $error) {
		if(ArrayHelper::isIndexed($error)) {
			foreach ($error as $message) {
				$this->addError($field, $message);
			}
		} else {
			$this->addError($error['field'], $error['message']);
		}
	}
}
