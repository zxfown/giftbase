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
                <div class="span9"> <h1> <?php echo ($data["unit"]["name"]); ?>  <small>  <?php echo ($data["unit"]["taozhuang"]["name"]); ?> </small></h1> </div>
                <div class="span3">
                  <div class="toolbar">
                    <div class="btn-group">
                      <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">新增 <span class="caret"></span></button>
                      <ul class="dropdown-menu pull-right">
                          <!-- <li><a href="/giftbase/trunk/Admin/Question/addSingleChoice">填空题</a></li>
                          <li><a href="/admin/questions/new?type=Question%3A%3AMatching">配对题</a></li>
                          <li><a href="/admin/questions/new?type=Question%3A%3ABrief">问答题</a></li>
                          <li><a href="/admin/questions/new?type=Question%3A%3AMultipleChoice">多选题</a></li>
                          -->
                          <li><a href="/giftbase/trunk/Admin/Question/showAddSingleChoice">单选题</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="page-content">
            <div class="row-fluid">
              <div class="span12">
                <div class="content-main">
                  <form accept-charset="UTF-8" action="/admin/questions" class="well" id="question_search" method="get">
                    <div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /></div>
                    <div class="controls-row">
                      <div class="type pull-left"> 一. 单选题 </div>
                      <div class="actions pull-right">
                        <a href="/admin/questions/39952/edit" class="btn btn-small btn-primary" target="_blank">编辑</a>

                        <div class="btn-group">

                              <a href="#" class="btn btn-small disabled">上移</a>

                              <a href="/admin/units/1042/question_groups/1369/question_line_items/49760/move_lower" class="btn btn-small" data-method="post" rel="nofollow">下移</a>

                            <a href="/admin/units/1042/question_groups/1369/remove_question?question_id=39952" class="btn btn-small" data-method="post" rel="nofollow">移除</a>
                        </div>
                      </div>

                    </div>
                  </form>

<?php if(is_array($data["question_data"])): foreach($data["question_data"] as $k=>$vo): ?><ul class="selectable-question-list">
    <li>
      <div class="item">
        <div class="header clearfix">
          <div class="type pull-left">
              <?php echo ($k); ?>
            <?php echo (converttypestr($vo["type"])); ?>
          </div>

          <div class="actions pull-right">
            <a href="/admin/questions/39952/edit" class="btn btn-small btn-primary" target="_blank">编辑</a> 
            <div class="btn-group"> 
              <a href="#" class="btn btn-small disabled">上移</a>
              <a href="/admin/units/1042/question_groups/1369/question_line_items/49760/move_lower" class="btn btn-small" data-method="post" rel="nofollow">下移</a>
              <a href="/admin/units/1042/question_groups/1369/remove_question?question_id=39952" class="btn btn-small" data-method="post" rel="nofollow">移除</a>
            </div>
          </div>
        </div> 
        <div class="content">
          <div class="clearfix">
            <div class="pull-left">
              <p><?php echo ($vo["subject"]); ?></p>
             </div>
      <div>
      </div>
    </div>

    <ol type="A">
      <?php if(is_array($vo["single_choice_options"])): foreach($vo["single_choice_options"] as $key=>$vo2): ?><li>
        <p><?php echo ($vo2["content"]); ?></p>
        <div>
        </div>      
      </li><?php endforeach; endif; ?>
    </ol>

  </div>

  <div class="clearfix footer">
    <div class="pull-left">解题提示:</div>
    <div class="pull-right">难度:简单</div>
  </div>
  </div>

    </li>

    </ul><?php endforeach; endif; ?>
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