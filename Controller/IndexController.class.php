<?php
namespace Home\Controller;
use Think\Controller;
//支付宝支付控制器
class IndexController extends Controller {
	//确认下单后跳转到扫码页面
    public function index(){
    	$rst = M('payment')->where(array('payment_code' => 'alipay'))->find();
    	$config = unserialize($rst['payment_config']);
    	$rst['payment_config'] = $config;
    	$order_info = M('pd_recharge')->where(array('pdr_id' => 183))->find();
    	$order_info['subject'] = '预存款充值_'.$order_info['pdr_sn'];
        $order_info['order_type'] = 'pd_order';
        $order_info['pay_sn'] = $order_info['pdr_sn'];
        $order_info['api_pay_amount'] = $order_info['pdr_amount'];
        $a = makeSn();
        $order_info['pay_sn'] = $a;
        $payment_api = new \Think\alipay\alipay($rst,$order_info);
        @header("Location: ".$payment_api->get_payurl()); 
    }
    //异步通知回调
    public function notify_url(){
         $success = 'success'; 
         $fail = 'fail';
         $order_type = 'real_order';
         $out_trade_no = $_POST['out_trade_no'];
         $trade_no = $_POST['trade_no'];
         // if(!preg_match('/^\d{18}$/',$out_trade_no)) exit($fail);
         $model = M('order');
         if($order_type == 'real_order'){
         $rst = $model->where(array('pay_sn' => '680528462837725005'))->find();
         if($rst){
         	$model->where(array('order_id' => $rst['order_id']))->save(array('order_state' => 80));
         }
         }
    }
     //支付后返回的页面
    public function return_url(){
    	
    }
}