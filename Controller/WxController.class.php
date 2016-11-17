<?php 
namespace Home\Controller;
use Think\Controller;
use Think\wxpay\wxpay;
use Think\wxpay\QRcode;
class WxController extends Controller{
	public function index(){
		$rst = M('payment')->where(array('payment_code' => 'wxpay'))->find();
    	$config = unserialize($rst['payment_config']);
    	$rst['payment_config'] = $config;
    	$order_info = M('pd_recharge')->where(array('pdr_id' => 183))->find();
    	$order_info['subject'] = '预存款充值_'.$order_info['pdr_sn'];
        $order_info['order_type'] = 'pd_order';
        $order_info['pay_sn'] = $order_info['pdr_sn'];
        $order_info['api_pay_amount'] = $order_info['pdr_amount'];
        $a = makeSn();
        $order_info['pay_sn'] = $a;
        Vendor('wxpay.wxpay');
        $payment_api = new \wxpay($rst,$order_info);
        $this->assign('pay_url',base64_encode(encrypt($payment_api->get_payurl(),MD5_KEY)));
        $this->display();

	}
	public function notify_url(){

	}

	public function return_url(){

	}

	  /**
     * 二维码显示(微信扫码支付) v3-b12
     */
    public function qrcode(){
        $data = base64_decode($_GET['data']);
        $data = decrypt($data,MD5_KEY,30);
        Vendor('wxpay.phpqrcode.phpqrcode');
        \QRcode::png($data);
    }
}