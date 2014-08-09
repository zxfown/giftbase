<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	public function index(){

		//$kv = D('kv');

		//$result = $kv->select();
		//if(false === $result){    echo $kv->getDbError();}
		//dump($result);
		//E('错误码:3->请先登录');
		//return;
        redirect('Admin/', 1, '跳转到Admin页面！');
    }
}


?>
