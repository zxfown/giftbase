<?php if (!defined('THINK_PATH')) exit();?>
    
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>管理</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="/giftbase/trunk/Public/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/giftbase/trunk/Public/lib/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="/giftbase/trunk/Public/lib/bootstrap/css/docs.css" rel="stylesheet">

    <link href="/giftbase/trunk/Public/lib/old/css/application.css?body=1" media="all" rel="stylesheet" type="text/css" />
    <!-- Loading Flat UI -->
    <!--<link href="/giftbase/trunk/Public/lib/flatui/css/flat-ui.css" rel="stylesheet"> -->

    <link rel="shortcut icon" href="/giftbase/trunk/Public/images/favicon.ico">

    
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="/giftbase/trunk/Public/lib/bootstrap/js/html5shiv.min.js"></script>
    <![endif]-->
    <style>
		body {
		  position: relative;
		  padding-top: 40px;
		}
    .num{
      padding: 2px;
    }
	</style>
  </head>
  <body data-spy="scroll" data-target=".bs-docs-sidebar">
  	<!-- Navbar
    ================================================== -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="/giftbase/trunk/Admin">Giftbase天才训练营</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="">
                <a href="/giftbase/trunk">信息中心</a>
              </li>
              <li class=""><!-- active -->
                <a href="/giftbase/trunk/Admin/Question">题目</a>
              </li>
              <li class="">
                <a href="/giftbase/trunk/Admin/Unit">试卷</a>
              </li>
              <li class="">
                <a href="/giftbase/trunk/Admin/">配置</a>
              </li>
              <li class="">
                <a href="/giftbase/trunk/Admin/News">News</a>
              </li>
              <li class="">
                <a href="/giftbase/trunk/Admin/Info">信息</a>
              </li>
              <li class="">
                <a href="/giftbase/trunk/Admin/About">about</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- Navbar end
    ================================================== -->

<?php
 function convertTypeStr($type){ if ($type == 'Question::SingleChoice'){ return '单选题'; } else if ($type == 'Question::FillInBlank'){ return '填空题'; } else if ($type == 'Question::Brief'){ return '问答题'; } else if ($type == 'Question::MultipleChoice'){ return '多选题'; } return ''; } function getDiffcultyStr($level){ $lv = intval($level); if ($lv == 1){ return '简单'; } return ''; } ?>

    <div id="wrap">
      <div class="container">

        <div class="content">

          <div class="page-header ">
            <div class="titlebar">
              <div class="row-fluid">
                <div class="span7"> <h1>查看题目详细</h1> </div>
                <div class="span5">
                  <div class="toolbar">
                    <a href="/giftbase/trunk/Admin/Question/editXuanZeTi?id=<?php echo ($data["id"]); ?>" class="btn btn-primary">编辑</a>
                    <div class="btn-group">
                      <button class="btn dropdown-toggle" data-toggle="dropdown">更多操作 <span class="caret"></span></button>
                      <ul class="dropdown-menu pull-right">
                        <li><a href="/admin/questions/39983" data-confirm="确定要删除吗？删除后不能恢复！" data-method="delete" rel="nofollow">删除</a></li>
                      </ul>
                    </div>
                    <a href="/giftbase/trunk/Admin/Question" class="btn">返回</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="page-content">
            <div class="row-fluid">
              <div class="span12">
                <div class="content-main">
                  <div class="hero-unit">
                    <p><?php echo ($data["subject"]); ?></p>
                    <p>
                      <ol type="A">
                          <?php if(is_array($selectData)): foreach($selectData as $key=>$vo): ?><li><?php echo ($vo["content"]); ?></li><?php endforeach; endif; ?>
                      </ol>
                    </p>
                  </div>
                  <div class="page-header">
                    <h2><small><p class="text-info">其他信息</p></small></h2>
                  </div>
                  <dl class="dl-horizontal">
                    <dt>解题提示</dt>
                    <dd><?php echo ($data["hint"]); ?></dd>
                    <dt>难度</dt>
                    <dd><?php echo (getdiffcultystr($data["question_level_id"])); ?></dd>
                    <dt>套装</dt>
                    <dd><?php echo ($data["taozhuang"]["name"]); ?></dd>
                  </dl>

                </div><!--<div class="content-main">-->
              </dic><!-- <div class="span12"> -->
            </div><!-- <div class="row-fluid"> -->
          </div><!-- <div class="page-content"> -->
  		  </div><!-- /content -->
      </div> <!-- /container -->
    </div><!-- wrap -->
    
    <!-- Footer
    ================================================== -->
    <div id="footer">
        <div class="container">
          <p class="muted credit">Copy Right <a href="/giftbase/trunk">Giftbase天才训练营</a> .</p>
        </div>
    </div>
  
    <script src="/giftbase/trunk/Public/lib/jquery/js/jquery-1.8.3.min.js"></script>
    <script src="/giftbase/trunk/Public/lib/bootstrap/js/bootstrap.min.js"></script>
  </body> 
</html>