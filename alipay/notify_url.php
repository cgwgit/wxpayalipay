<?php
/**
 * 支付宝通知地址
 *
 * 
 * by 中孝科技 开发
 */
$_GET['act']	= 'payment';
$_GET['op']		= 'notify';
$_GET['payment_code'] = 'alipay';
require_once(dirname(__FILE__).'/../../../index.php');
?>