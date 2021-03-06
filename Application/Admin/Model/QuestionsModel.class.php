<?php
namespace Admin\Model;
use Think\Model\RelationModel;

class QuestionsModel extends RelationModel 
{    
	protected $tableName  = 'questions';
    protected $tablePrefix = '';
    protected $_link = array(
                            'taozhuang'=>array(
                                'mapping_type'      => self::BELONGS_TO,            
                                'class_name'        => 'Stages',     
                                'foreign_key'       => 'stage_id',       
                                // 定义更多的关联属性            ……            
                            ), 
                            'single_choice_options'=>array(
                                'mapping_type'      => self::HAS_MANY,            
                                'class_name'        => 'single_choice_options',     
                                'foreign_key'       => 'question_id',
                                'mapping_order'     => 'position asc',        
                                // 定义更多的关联属性            ……            
                            ),        
                        );
}

?>

