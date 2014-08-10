<?php
namespace Admin\Model;
use Think\Model\RelationModel;

class QuestionGroupsModel extends RelationModel 
{    
	protected $tableName  = 'question_groups';
    protected $tablePrefix = '';
    protected $_link = array(
                            'question_line_items'=>array(
                                'mapping_type'      => self::HAS_MANY ,            
                                'class_name'        => 'question_line_items',     
                                'foreign_key'       => 'question_group_id',  
                                'mapping_order' => 'position asc',     
                                // 定义更多的关联属性            ……            
                            ),  
                        );
}

?>

