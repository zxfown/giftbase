<?php
	
namespace Admin\Controller;
use Think\Controller;
class UnitController extends Controller {
    private function GetModel(){
        $obj = D('Unit');
        $obj->relation(true);
        return $obj;
    }
	public function index(){
    	$Mobj   = $this->GetModel();
    	$result = $Mobj->order('updated_at desc')->page(I('p', '0').',20')->select();

    	//dump($result[0]);
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
    public function showUnitItem(){
        $id = I('id', '0');
        $Mobj   = $this->GetModel();
        $result = $Mobj->where(array('id' => $id))->find();
        
        // dump($result);
        $stage_id = $result['stage_id'];
        $question_id = $result['question_id'];
        // dump($stage_id);
        // echo M()->getLastSql();
        $unit_id = $result['unit_id'];
        $retQuestionItem = D('QuestionGroups')->relation(true)->where(array('unit_id' => $id))->limit(1)->find();
        // dump($retQuestionItem);
        // echo M()->getLastSql();
        $question_data = array();
        foreach ($retQuestionItem['question_line_items'] as $key => $value) {
            $retQuestion = D('Questions')->relation(true)->where(array('id' => $value['question_id']))->find();
              
            // echo M()->getLastSql();
            $question_data[$key + 1] = $retQuestion;
        }
        // dump($question_data[1]);
        $ret_data = array(
                'unit'          => $result ,
                'question_data' => $question_data,
            );
        $this->assign('data', $ret_data);

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
    public function update(){//!修改题目
        //dump($_FILES);
        $question_id = I('get.id', 0);
        $image_array = $this->processUpload($question_id);
        
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
        $this->success('操作成功');
    }
    //!新增选择题 界面
    public function showAddSingleChoice(){
        $select_data = array();
        for ($i = 1; $i <= 4; $i += 1) {
            $select_data[$i] = array(
                'position' => $i,
                'content'  => '',
                'id'       => $i,
                'image'    => '',
            );
        }
        $this->assign('selectData', $select_data);
        //dump($select_data);
        //!查询所有的套装
        $taozhuang_obj = M('Stages');
        $taozhuang_data= $taozhuang_obj->field('id,name')->order('created_at desc')->select();
        $this->assign('taozhuangData', $taozhuang_data);
        $this->display();
    }
    private function processUpload($question_id){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728000 ;// 设置附件上传大小    
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
        $upload->savePath  =      './Question/'.$question_id.'/'; // 设置附件上传目录
        $upload->saveName  = 'tmp';
        $upload->subName   = '';
        $upload->replace   = true;
        $upload->rootPath  = './Public/Uploads/';

        $image_array = array();
        //dump($_FILES);
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
        return $image_array;

    }
    //!增加单选题
    public function addSingleChoice(){
        $param = I('post.question');
        dump($param);
        $question_id = I('get.id', 0);
        
        $data = array(
            'type'      => 'Question::SingleChoice',
            'subject'   =>$param['subject'],
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s"),
            'hint'      => $param['hint'],
            'image'     => '',
            'question_level_id' => $param['question_level_id'],
            'stage_id' => $param['stage_id'],
            );
        
        //dump($data);
        $Mobj   = $this->GetModel();
        $Mobj->relation(false);
        $question_id = ''.$Mobj->add($data);
        if (!$question_id)
            $this->error('操作失败');
        dump($question_id);
        $image_array = $this->processUpload($question_id);
        dump($image_arrays);
        if (isset($image_array['question_image'])){
            $data['image'] = $image_array['question_image'];
            $Mobj->where(array('id' => $question_id))->save($data);
        }
        
        //dump($question_id);
        //dump($ret);
        //return ;
        $select_obj = D('single_choice_options');//保存单选题选项
        //dump($image_array);
        foreach ($param['single_choice_options_attributes'] as $key => $value) { 
            $positionNum = $key;
            $select_data= array(
                'question_id' => $question_id,
                'content' => $value['content'],
                'position' => $key,
                'correct' => $value['correct'],
                'created_at'=>date("Y-m-d H:i:s"),
                'updated_at'=>date("Y-m-d H:i:s"),
                );
            if (isset($image_array[$positionNum])){
                $select_data['image'] = $image_array[$positionNum];
            }
            dump($select_data);
            $ret = $select_obj->add($select_data);
            dump($ret);
            //echo M()->getLastSql();
        }
    }
    public function delItem(){//!删除题目
        $question_id = I('id');
        $Mobj   = $this->GetModel();
        $Mobj->relation(false);
        $ret = $Mobj->where(array('id' => $question_id))->delete();
        //dump($ret);
        $select_obj = D('single_choice_options');//保存单选题选项
        $ret = $select_obj->where(array('question_id' => $question_id))->delete();
        //dump($ret);
        $this->success('操作成功','index');
    }
}


?>
