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
                <div class="span7"> <h1>编辑题目</h1> </div>
                <div class="span5">
                  <div class="toolbar">
                    <a href="/ff/Admin/Question/edit?id=" class="btn btn-primary">编辑</a>
                    <div class="btn-group">
                      <button class="btn dropdown-toggle" data-toggle="dropdown">更多操作 <span class="caret"></span></button>
                      <ul class="dropdown-menu pull-right">
                        <li><a href="/admin/questions/39983" data-confirm="确定要删除吗？删除后不能恢复！" data-method="delete" rel="nofollow">删除</a></li>
                      </ul>
                    </div>
                    <a href="/ff/Admin/Question" class="btn">返回</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
<?php
function IsRight($a){ if (intval($a) == 1) return 'checked="checked'; return ''; } function showImg($a){ if ($a != null && $a != 'null') return ' <img alt="'.$a.'" src="/ff/Public/Uploads/'.$a.'" /> '; return ''; } ?>
          <div class="page-content">
            <div class="row-fluid">
              <div class="span12">
                <div class="content-main">

                  <form accept-charset="UTF-8" action="/ff/Admin/Question/update?id=<?php echo ($data["id"]); ?>" class="simple_form form-horizontal question" 
                        enctype="multipart/form-data" id="edit_question" method="post" novalidate="novalidate">
                    <div style="margin:0;padding:0;display:inline">
                      <input name="utf8" type="hidden" value="&#x2713;" />
                      <input name="_method" type="hidden" value="put" />
                      <input name="authenticity_token" type="hidden" value="9i761Nw4dMIiQXEaiOeiN3UYD0TkXybYjeHrjBDNpxE=" />
                    </div>

                    <div class="form-inputs">
                      <input id="question_type" name="question[type]" type="hidden" value="<?php echo ($data["type"]); ?>" />
                      <div class="row-fluid">
                        <div class="span8">
                          <div class="control-group text required question_subject">
                            <label class="text required control-label" for="question_subject">
                              <abbr title="必填">*</abbr> 题干
                            </label>
                            <div class="controls">
                              <textarea class="text required span12 can_preview" cols="40" data-preview="57623020" 
                                        id="question_subject" name="question[subject]" rows="5"><?php echo ($data["subject"]); ?></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="span4" id="57623020">
                          Preview
                        </div>
                      </div>
                      <div class="control-group question_image">
                        <label class="control-label" for="question_image">附图</label>
                        <div class="controls">
                          <div class="image">
                            <?php echo (showimg($data["image"])); ?>
                            <span class="upload-image">
                               <input id="question_image" name="question_image" type="file" /> 
                            </span>
                            <input id="question_image_cache" name="question_image_cache" type="hidden" />
                            
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr/>
                    <fieldset>

                      <?php if(is_array($selectData)): foreach($selectData as $key=>$vo): ?><div class="control-group">
                        <div class="row-fluid">
                          <div class="span8">
                            <label class="text required control-label">
                              <input name="question[single_choice_options_attributes][<?php echo ($vo["position"]); ?>][correct]" type="hidden" value="0" />
                              <input <?php echo (isright($vo["correct"])); ?> id="question_single_choice_options_attributes_<?php echo ($vo["position"]); ?>_correct" name="question[single_choice_options_attributes][<?php echo ($vo["position"]); ?>][correct]" type="checkbox" value="1" />
                            </label>
                            <div class="controls">
                              <textarea class="span12 can_preview" cols="40" data-preview="<?php echo ($vo["id"]); ?>" id="question_single_choice_options_attributes_<?php echo ($vo["position"]); ?>_content" name="question[single_choice_options_attributes][<?php echo ($vo["position"]); ?>][content]" rows="1"><?php echo ($vo["content"]); ?></textarea>
                            </div>
                          </div>
                          <div class="span3" id="<?php echo ($vo["id"]); ?>">
                            输入公式：amath a^2 endamath
                          </div>
                          <div class="span1">
                            <input id="question_single_choice_options_attributes_<?php echo ($vo["position"]); ?>__destroy" name="question[single_choice_options_attributes][<?php echo ($vo["position"]); ?>][_destroy]" type="hidden" value="false" />
                            <a href="#" class="close remove_fields">&times;</a>
                          </div>
                        </div>
                      </div>
                      <div class="control-group question_image">
                        <label class="control-label" for="question_image">附图</label>
                        <div class="controls">
                          <div class="image">
                            <?php echo (showimg($vo["image"])); ?>
                            <span class="upload-image">
                              <input id="question_single_choice_options_attributes_<?php echo ($vo["position"]); ?>_image" name="question_image_<?php echo ($vo["position"]); ?>" type="file" />
                            </span>
                            <input id="question_single_choice_options_attributes_<?php echo ($vo["position"]); ?>_image_cache" name="question_single_choice_options_image_cache_<?php echo ($vo["position"]); ?>" type="hidden" />
                          </div>
                        </div>
                      </div>
                      <input id="question_single_choice_options_attributes_<?php echo ($vo["position"]); ?>_id" name="question[single_choice_options_attributes][<?php echo ($vo["position"]); ?>][id]" type="hidden" value="<?php echo ($vo["id"]); ?>" /><?php endforeach; endif; ?>
                    
                    <div class="control-group">
                      <div class="controls">
                        <a href="#" class="btn add_fields" data-fields="  &lt;fieldset&gt;  &lt;div class=&quot;control-group&quot;&gt;    &lt;div class=&quot;row-fluid&quot;&gt;      &lt;div class=&quot;span8&quot;&gt;        &lt;label class=&quot;text required control-label&quot;&gt;&lt;input name=&quot;question[single_choice_options_attributes][53791660][correct]&quot; type=&quot;hidden&quot; value=&quot;0&quot; /&gt;&lt;input id=&quot;question_single_choice_options_attributes_53791660_correct&quot; name=&quot;question[single_choice_options_attributes][53791660][correct]&quot; type=&quot;checkbox&quot; value=&quot;1&quot; /&gt;&lt;/label&gt;        &lt;div class=&quot;controls&quot;&gt;          &lt;textarea class=&quot;span12 can_preview&quot; cols=&quot;40&quot; data-preview=&quot;53791660&quot; id=&quot;question_single_choice_options_attributes_53791660_content&quot; name=&quot;question[single_choice_options_attributes][53791660][content]&quot; rows=&quot;1&quot;&gt;&lt;/textarea&gt;        &lt;/div&gt;      &lt;/div&gt;      &lt;div class=&quot;span3&quot; id=&quot;53791660&quot;&gt;        输入公式：amath a^2 endamath      &lt;/div&gt;      &lt;div class=&quot;span1&quot;&gt;        &lt;input id=&quot;question_single_choice_options_attributes_53791660__destroy&quot; name=&quot;question[single_choice_options_attributes][53791660][_destroy]&quot; type=&quot;hidden&quot; value=&quot;false&quot; /&gt;        &lt;a href=&quot;#&quot; class=&quot;close remove_fields&quot;&gt;&amp;times;&lt;/a&gt;      &lt;/div&gt;    &lt;/div&gt;  &lt;/div&gt;  &lt;div class=&quot;control-group question_image&quot;&gt;    &lt;label class=&quot;control-label&quot; for=&quot;question_image&quot;&gt;附图&lt;/label&gt;    &lt;div class=&quot;controls&quot;&gt;      &lt;div class=&quot;image&quot;&gt;        &lt;span class=&quot;upload-image&quot;&gt;          &lt;input id=&quot;question_single_choice_options_attributes_53791660_image&quot; name=&quot;question[single_choice_options_attributes][53791660][image]&quot; type=&quot;file&quot; /&gt;        &lt;/span&gt;        &lt;input id=&quot;question_single_choice_options_attributes_53791660_image_cache&quot; name=&quot;question[single_choice_options_attributes][53791660][image_cache]&quot; type=&quot;hidden&quot; /&gt;      &lt;/div&gt;    &lt;/div&gt;  &lt;/div&gt;&lt;/fieldset&gt;" data-id="53791660">添加更多</a>
                      </div>
                    </div>


                    <hr />
                    <div class="control-group text optional question_hint">
                      <label class="text optional control-label" for="question_hint">解题提示</label>
                      <div class="controls">
                        <textarea class="text optional span12" cols="40" id="question_hint" name="question[hint]" rows="5"></textarea>
                      </div>
                    </div>
                    <div class="control-group select required question_question_level_id">
                      <label class="select required control-label" for="question_question_level_id">
                        <abbr title="必填">*</abbr> Question level
                      </label>
                      <div class="controls">
                        <select class="select required" id="question_question_level_id" name="question[question_level_id]">
                          <option value="1" selected="selected">简单</option>
                        </select>
                      </div>
                    </div>

                    <div class="control-group select optional question_stage_id">
                      <label class="select optional control-label" for="question_stage_id">Stage</label>
                      <div class="controls">
                        <select class="select optional" id="question_stage_id" name="question[stage_id]">
                          <?php if(is_array($taozhuangData)): foreach($taozhuangData as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>" ><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
                        </select>
                      </div>
                    </div>

                    <div class="control-group">
                      <div class="row-fluid">
                        <div class="span8">
                          <label class="text required control-label">

                          </label>
                          <div class="controls">
                            <input class="btn btn btn-primary" name="commit" type="submit" value="更新单选题" />
                          </div>
                        </div>
                      </div>
                    </div>
                    </fieldset>

                  </form>
                  
                 

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

<script src="/ff/Public/lib/old/js/questions.js?body=1" type="text/javascript"></script>
    <script src="/ff/Public/lib/old/js/application.js?body=1" type="text/javascript"></script>

<script src="/ff/Public/lib/old/js/asciimathml.js?body=1" type="text/javascript"></script>
<script type="text/javascript">
//<![CDATA[

translateOnLoad=false;

function simpleFormat(str) {
  str = str.replace(/\r\n?/, "\n");
  str = $.trim(str);
  if (str.length > 0) {
    str = str.replace(/\n\n+/g, '</p><p>');
    str = str.replace(/\n/g, '<br />');
    str = '<p>' + str + '</p>';
  }
  return str;
}

function updateQuestionPreview(input) {
  var targetNode = $('#' + input.data("preview"));
  if (input.val().length > 0) {
    targetNode.html(simpleFormat(input.val()));
    AMprocessNode(targetNode[0]);
  } else {
    targetNode.html(simpleFormat("输入公式：amath a^2 endamath"));
  }
}

$('textarea.can_preview').each(function(index) {
  updateQuestionPreview($(this));
});

$('body').on('change', 'textarea.can_preview', function() {
  updateQuestionPreview($(this));
});

//]]>
</script>