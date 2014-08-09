<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>ffEngine实时服务器云平台</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="../inc/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="../inc/css/flat-ui.css" rel="stylesheet">

    <link rel="shortcut icon" href="./images/favicon.ico">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">

		<div class="row">
			<div class="span6"><div class="row"><h1 class="demo-panel-title">ffEngine 实时服务器云平台</h1></div></div>
			<div class="span6"><div class="row" height="20px"></br></br></br></div>
				<div class="row"><h4>面向于端游、页游、手游服务器程序的云托管平台</h4></div>
			</div>
		</div>

		<div class="row ">
			<div >
			  <div class="navbar navbar-inverse">
				<div class="navbar-inner">
				  <div class="container">
					<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target="#nav-collapse-01"></button>
					<div class="nav-collapse collapse" id="nav-collapse-01">
					  <ul class="nav">
						<li>
						  <a href="./index.php">
							首页
							<!-- <span class="navbar-unread">1</span>-->
						  </a>
						</li>
						<li>
						  <a href="./index.php?c=Ctrl&a=loginMenu">
							登陆
							<!-- <span class="navbar-unread">1</span>-->
						  </a>
						</li>
						<li>
						  <a href="./index.php?c=Ctrl&a=registerMenu">
							注册
							<!-- <span class="navbar-unread">1</span>-->
						  </a>
						</li>
						<!-- <li class="active">-->
						<li>
						  <a href="#fakelink">
							配置服务器
							<!-- <span class="navbar-unread">1</span>-->
						  </a>
						  <ul>
							<li><a href="./index.php?c=Ctrl&a=showServerListMenu">区组管理</a></li>
							
							<li><a href="#fakelink">服务器管理</a></li>
						  </ul> <!-- /Sub menu -->
						</li>
						<li>
						  <a href="#fakelink">
							文档
						  </a>
						</li>
                        <li>
						  <a href="http://ffbbs.sinaapp.com">
							论坛
						  </a>
						</li>
						<li>
						  <a href="#fakelink">
							关于
						  </a>
						</li>
					  </ul>
					</div><!--/.nav -->
				  </div>
				</div>
			  </div>
			</div>
        
		</div> <!-- /row -->
		
		<div class="row demo-row">
			<div class="span3">
				<div class="row">
					<div class="tile tile-hot">
						<img src="./Public/images/colors.png" alt="Compas@2x" class="tile-image big-illustration">
						<h3 class="tile-title">BrokerPattern 框架</h3>
						<h6>Client/Server实时通信，负载均衡，端游、页游、手游完美支持.</h6>
						<a class="btn btn-primary btn-large btn-block" href="index.php?c=Ctrl&a=show_broker_pattern"><b>架构介绍</b></a>
					</div>
				</div>
			</div>
			<div class="span3">
				<div class="tile">
					<img src="./Public/images/python-logo.png" alt="Infinity-Loop@2x" class="tile-image">
					<h3 class="tile-title">Python实现逻辑功能</h3>
					<h6>开发效率高，完美热更新，可在线调试，服务器再也不会崩溃.</h6>
					<a class="btn btn-primary btn-large btn-block" href="index.php?c=Ctrl&a=py_doc"><b>接口文档</b></a>
				</div>
			</div>

			<div class="span3">
				<div class="tile tile-hot">
					<img src="../inc/images/icons/Pensils@2x.png" alt="Pensils@2x" class="tile-image">
                    <h3 class="tile-title">多协议支持</h3><p></p>
					<h6>支持Json、protobuf、thrift.</h6>
                    <a class="btn btn-primary btn-large btn-block" href="index.php?c=Ctrl&a=protocol_intro"><b>相关示例</b></a>
				</div>
			</div>

			<div class="span3">
				<div class="tile">
					<img src="../inc/images/icons/Toilet-Paper@2x.png" alt="Chat@2x" class="tile-image">
					<h3 class="tile-title">异步数据库操作</h3>
					<h6>IO异步化是保证实时性的关键，数据库采用异步回调方式.</h6>
					<a class="btn btn-primary btn-large btn-block" href="index.php?c=Ctrl&a=py_doc#db"><b>了解详情</b></a>
				</div>
			</div>
		</div> <!-- /tiles -->

		<div class="row demo-row">
			<div class="span3">
				<div class="row">
					<div class="tile tile-hot">
						<img src="../inc/images/icons/Compas@2x.png" alt="Compas@2x" class="tile-image big-illustration">
						<h3 class="tile-title">实时性能数据监控</h3>
						<h6>自动收集性能数据，线形图、饼图可视化查看，性能数据按时间归档，服务器性能几何，完全以数据说话.</h6>
						<a class="btn btn-primary btn-large btn-block" href="index.php?c=Ctrl&a=show_perf_demo"><b>示例结果</b></a>
					</div>
				</div>
			</div>
			<div class="span3">
				<div class="tile">
					<img src="../inc/images/icons/Pocket@2x.png" alt="Infinity-Loop@2x" class="tile-image">
					<h3 class="tile-title">组件复用</h3>
					<h6>游戏开发中常用组价如任务、统计、地图等组件可直接使用，提高开发者效率.</h6>
					<a class="btn btn-primary btn-large btn-block" href="index.php?c=Ctrl&a=id_generator"><b>组件示例</b></a>
				</div>
			</div>

			<div class="span3">
				<div class="tile">
					<img src="../inc/images/icons/Clipboard@2x.png" alt="Pensils@2x" class="tile-image">
					<h3 class="tile-title">在线日志</h3>
					<h6>可以在线查看服务器日志，即使python的print输出也可以在线查看，方便调试和排错.</h6>
                    <a class="btn btn-primary btn-large btn-block" href="index.php?c=Ctrl&a=show_log"><b>示例输出</b></a>
				</div>
			</div>

			<div class="span3">
				<div class="tile tile-hot">
					<img src="./Public/images/debug.png" alt="Chat@2x" class="tile-image">
					<h3 class="tile-title">游戏示例</h3>
					<h6>现已提供各个语言版本的sdk，开发者使用sdk可以快速构建各类游戏应用.</h6>
                    <a class="btn btn-primary btn-large btn-block" href="index.php?c=Ctrl&a=game_tutorial"><b>了解示例</b></a>
				</div>
			</div>
		</div> <!-- /tiles -->
		

    </div> <!-- /container -->

    <footer>
      <div class="container">
        <div class="row">
          <div class="span7">
            <h3 class="footer-title">参与其中</h3>
            <p>ffEngine为开源项目，如果你也感兴趣，一起来贡献力量！</p>
			<p>Code Repository ：<a href="https://github.com/fanchy/ffengine" target="_blank">https://github.com/fanchy/ffengine</a></p>
			<p>Email：zxfown@gmail.com<p/>
			<p>Weibo： <a href="http://weibo.com/zxfown" target="_blank"> http://weibo.com/zxfown </a> </p>
			<p>QQ: 693654841 </p>
			<p>Blog:  <a href="http://www.cnblogs.com/zhiranok" target="_blank"> http://www.cnblogs.com/zhiranok </a></p>
          </div> <!-- /span8 -->

          <div class="span5">
            <div class="footer-banner">
              <h3 class="footer-title">SLOGAN</h3>
              <ul>
                <li>无聊梦见忧郁，找到理想不太易</li>
                <li>理想有日达成，找到心底梦想的世界</li>
                <li>BEYOND！</li>
              </ul>
			  <h3 >COPYRIGHT</h3>
			  <p> <a href="http://www.bootcss.com/" target="_blank">致谢Boostrap</a></p>
			  <p> <a href="http://www.bootcss.com/p/flat-ui/" target="_blank">致谢FLAT UI</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    
    <!-- Load JS here for greater good =============================-->
    <script src="../inc/js/jquery-1.8.3.min.js"></script>
    <script src="../inc/js/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="../inc/js/jquery.ui.touch-punch.min.js"></script>
    <script src="../inc/js/bootstrap.min.js"></script>
    <script src="../inc/js/bootstrap-select.js"></script>
    <script src="../inc/js/bootstrap-switch.js"></script>
    <script src="../inc/js/flatui-checkbox.js"></script>
    <script src="../inc/js/flatui-radio.js"></script>
    <script src="../inc/js/jquery.tagsinput.js"></script>
    <script src="../inc/js/jquery.placeholder.js"></script>
    <script src="../inc/js/jquery.stacktable.js"></script>
    <!-- <script src="http://vjs.zencdn.net/c/video.js"></script>-->
    <script src="../inc/js/application.js"></script>
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fc5875c0a7f78e3b8f758f907513834db' type='text/javascript'%3E%3C/script%3E"));
</script>
  </body>
</html>
</script>