<?php
	
namespace Admin\Controller;
use Think\Controller;
class QuestionController extends Controller {
    private function GetModel(){
        $obj = D('Questions');
        $obj->relation(true);
        return $obj;
    }
	public function index(){
    	$Mobj   = $this->GetModel();
    	$result = $Mobj->order('updated_at desc')->page(I('p', '0').',20')->select();

    	//dump($result);
    	$count      = $Mobj->count();
    	$Page       = new \Think\Page($count,20);
    	$Page->lastSuffix = false;
    	$Page->setConfig('prev','上一页');
    	$Page->setConfig('last', '末页');
    	$Page->setConfig('next', '下一页');
    	
    	//dump($Page);
    	$show       = $Page->show();

    	//dump($show);
    	// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
    	
    	$this->assign('data', $result);
    	$this->assign('page', $show);// 赋值分页输出
    	$this->display();
    }
    public function showXuanZeTi(){
        $Mobj   = $this->GetModel();
        $result = $Mobj->where(array('id' => I('id', 0)))->limit(1)->find();
        $this->assign('data', $result);

        if ($result['type'] == 'Question::SingleChoice'){
            $select_obj = D('single_choice_options');
            $select_data= $select_obj->where(array('question_id'=>$result['id']))->order('position')->select();
            //dump($select_data);
            $this->assign('selectData', $select_data);
        }
        //dump($result);
        $this->display();
    }
    public function editXuanZeTi(){
        $Mobj   = $this->GetModel();
        $result = $Mobj->where(array('id' => I('id', 0)))->limit(1)->find();
        $this->assign('data', $result);

        if ($result['type'] == 'Question::SingleChoice'){
            $select_obj = D('single_choice_options');
            $select_data= $select_obj->where(array('question_id'=>$result['id']))->order('position')->select();
            //dump($select_data);
            $this->assign('selectData', $select_data);
        }
        //!查询所有的套装
        $taozhuang_obj = M('Stages');
        $taozhuang_data= $taozhuang_obj->field('id,name')->order('created_at desc')->select();
        $this->assign('taozhuangData', $taozhuang_data);
        //dump($taozhuang_data);
        ///dump($result);
        $this->display();
    }
    public function update(){
        //dump($_FILES);
        $question_id = I('get.id', 0);
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728000 ;// 设置附件上传大小    
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
        $upload->savePath  =      './Question/'.$question_id.'/'; // 设置附件上传目录
        $upload->saveName  = 'tmp';
        $upload->subName   = '';
        $upload->replace   = true;
        $upload->rootPath  = './Public/Uploads/';

        $image_array = array();
        foreach ($_FILES as $key => $value) { 
            if ($value['name'] == '')
                continue;
            $extStr = explode(".", $value['name']);
            $extStr = $extStr[count($extStr)-1];
            if ($key == 'question_image'){
                $upload->saveName  = $question_id;
                $image_array['question_image'] = 'Question/'.$question_id.'/'.$upload->saveName.'.'.$extStr;
            }
            else{
                $tmpArr = explode("question_image_", $key);
                $upload->saveName  = $tmpArr[1];
                $image_array[$tmpArr[1]] = 'Question/'.$question_id.'/'.$upload->saveName.'.'.$extStr;
            }
            $info   =   $upload->uploadOne($value);
            if(!$info) {// 上传错误提示错误信息        
                $this->error($upload->getError()); 
            }  
        }
        
        $param = I('post.question');
        //dump($param);
        $data = array(
            'subject'=>$param['subject'],
            'updated_at'=>date("Y-m-d H:i:s"),
            );
        if (isset($image_array['question_image'])){
            $data['image'] = $image_array['question_image'];
        }
        //dump($data);
        $Mobj   = $this->GetModel();
        $Mobj->where(array('id' => I('get.id', 0)))->save($data);

        $select_obj = D('single_choice_options');//保存单选题选项
        //dump($image_array);
        foreach ($param['single_choice_options_attributes'] as $key => $value) { 
            $positionNum = $key;
            $select_data= array(
                'content' => $value['content'],
                'correct' => $value['correct'],
                'updated_at'=>date("Y-m-d H:i:s"),
                );
            if (isset($image_array[$positionNum])){
                $select_data['image'] = $image_array[$positionNum];
            }
            //dump($select_data);
            $ret = $select_obj->where(array('id'=>$value['id']))->save($select_data);
            //dump($ret);
            //echo M()->getLastSql();
        }
    }
}


?>
