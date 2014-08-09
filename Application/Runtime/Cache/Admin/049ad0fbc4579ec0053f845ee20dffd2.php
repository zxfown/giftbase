<?php if (!defined('THINK_PATH')) exit();?>
    
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>管理</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="/ff/Public/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/ff/Public/lib/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="/ff/Public/lib/bootstrap/css/docs.css" rel="stylesheet">

    <link href="/ff/Public/lib/old/css/application.css?body=1" media="all" rel="stylesheet" type="text/css" />
    <!-- Loading Flat UI -->
    <!--<link href="/ff/Public/lib/flatui/css/flat-ui.css" rel="stylesheet"> -->

    <link rel="shortcut icon" href="/ff/Public/images/favicon.ico">

    
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="/ff/Public/lib/bootstrap/js/html5shiv.min.js"></script>
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
          <a class="brand" href="/ff/Admin">Giftbase天才训练营</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="">
                <a href="/ff">信息中心</a>
              </li>
              <li class=""><!-- active -->
                <a href="/ff/Admin/Question">题目</a>
              </li>
              <li class="">
                <a href="/ff/Admin/Register">注册</a>
              </li>
              <li class="">
                <a href="/ff/Admin/">配置</a>
              </li>
              <li class="">
                <a href="/ff/Admin/News">News</a>
              </li>
              <li class="">
                <a href="/ff/Admin/Info">信息</a>
              </li>
              <li class="">
                <a href="/ff/Admin/About">about</a>
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
                <div class="span9"> <h1>题目列表</h1> </div>
                <div class="span3">
                  <div class="toolbar">
                    <div class="btn-group">
                      <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">新增 <span class="caret"></span></button>
                      <ul class="dropdown-menu pull-right">
                          <li><a href="/admin/questions/new?type=Question%3A%3AFillInBlank">填空题</a></li>
                          <li><a href="/admin/questions/new?type=Question%3A%3AMatching">配对题</a></li>
                          <li><a href="/admin/questions/new?type=Question%3A%3ABrief">问答题</a></li>
                          <li><a href="/admin/questions/new?type=Question%3A%3AMultipleChoice">多选题</a></li>
                          <li><a href="/admin/questions/new?type=Question%3A%3ASingleChoice">单选题</a></li>
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
                      <select class="span3" id="q_type_eq" name="q[type_eq]"><option value="">所有题型</option>
                        <option value="Question::FillInBlank">填空题</option>
                        <option value="Question::Matching">配对题</option>
                        <option value="Question::Brief">问答题</option>
                        <option value="Question::MultipleChoice">多选题</option>
                        <option value="Question::SingleChoice">单选题</option>
                      </select>
                      <input class="span9" id="q_subject_cont" name="q[subject_cont]" placeholder="搜索题干" size="30" type="text" />
                    </div>

                    <div class="controls-row">
                      <label class="span3" for="q_level">难度</label>
                      <select class="span4" id="q_question_level_id_gteq" name="q[question_level_id_gteq]">
                        <option value="1" selected="selected">简单</option>
                      </select>
                      <div class="text span1 text-center"></div>
                      <select class="span4" id="q_question_level_id_lteq" name="q[question_level_id_lteq]">
                        <option value="1" selected="selected">简单</option>
                      </select>
                    </div>
                    <div class="controls-row">
                      <label class="span3" for="q_序号">序号</label>
                      <input class="span4" id="question_id" name="question_id" type="text" />
                    </div>
                    <div class="text-right">
                      <input class="btn btn-primary" name="commit" type="submit" value="搜索" />
                    </div>
                  </form>

                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>
                          序号
                        </th>
                        <th>类型</th>
                        <th>题干</th>
                        <th>操作</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
 function EditHref($a){ if ($a == 'Question::SingleChoice' || $a == 'Question::MultipleChoice') return 'editXuanZeTi'; return $a; } function showHref($a){ if ($a == 'Question::SingleChoice' || $a == 'Question::MultipleChoice') return 'showXuanZeTi'; return $a; } ?>
                        <?php if(is_array($data)): foreach($data as $key=>$vo): ?><tr>
                          <td><?php echo ($vo["id"]); ?></td>
                          <td><?php echo (converttypestr($vo["type"])); ?></td>
                          <td><?php echo ($vo["subject"]); ?></td>
                          <td class="control span2">
                            <a href="/ff/Admin/Question/<?php echo (showhref($vo["type"])); ?>?id=<?php echo ($vo["id"]); ?>">查看</a>
                            <a href="/ff/Admin/Question/<?php echo (edithref($vo["type"])); ?>?id=<?php echo ($vo["id"]); ?>">编辑</a>
                          </td>
                        </tr><?php endforeach; endif; ?>
                      </tbody>
                    </table>
                    <?php echo ($page); ?>
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
          <p class="muted credit">Copy Right <a href="/ff">Giftbase天才训练营</a> .</p>
        </div>
    </div>
  
    <script src="/ff/Public/lib/jquery/js/jquery-1.8.3.min.js"></script>
    <script src="/ff/Public/lib/bootstrap/js/bootstrap.min.js"></script>
  </body> 
</html>