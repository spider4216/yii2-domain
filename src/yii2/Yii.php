<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

require VENDOR_DIR . DS . 'yiisoft' . DS . 'yii2' . '/BaseYii.php';
require VENDOR_DIR . DS . 'yii2lab/yii2-domain/src/yii2' . DS . 'DomainContainer.php';

/**
 * Yii is a helper class serving common framework functionalities.
 *
 * It extends from [[\yii\BaseYii]] which provides the actual implementation.
 * By writing your own Yii class, you can customize some functionalities of [[\yii\BaseYii]].
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class Yii extends \yii\BaseYii
{
	
	/**
	 * @var DomainContainer the domain container
	 */
	public static $domain;
	
}

spl_autoload_register(['Yii', 'autoload'], true, true);
Yii::$classMap = require VENDOR_DIR . DS . 'yiisoft' . DS . 'yii2' . '/classes.php';
Yii::$container = new yii\di\Container();
Yii::$domain = new DomainContainer();
