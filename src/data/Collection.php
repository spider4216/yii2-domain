<?php

namespace yii2lab\domain\data;

use Yii;
use yii2lab\helpers\yii\ArrayHelper;

class Collection extends BaseCollection {
	
	public static function forge($items = null, array $params = null) {
		$collection = Yii::createObject(static::class, $params);
		$collection->load($items);
		return $collection;
	}
	
	public function first() {
		if($this->count() == 0) {
			return null;
		}
		foreach($this as $value) {
			return $value;
		}
		return null;
	}
	
	public function last() {
		if($this->count() == 0) {
			return null;
		}
		return $this->items[ $this->count() - 1 ];
	}
	
	public function fetch() {
		if(!$this->valid()) {
			return false;
		}
		$item = $this->current();
		$this->next();
		return $item;
	}
	
	public function toArray() {
		return ArrayHelper::toArray($this->items);
	}
	
	public function load($items) {
		$this->loadItems($items);
	}
	
}