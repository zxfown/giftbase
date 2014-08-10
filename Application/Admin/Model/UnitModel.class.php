<?php
namespace Admin\Model;
use Think\Model\RelationModel;

class UnitModel extends RelationModel 
{    
	protected $tableName  = 'units';
    protected $tablePrefix = '';
    protected $_link = array(
                            'taozhuang'=>array(
                                'mapping_type'      => self::BELONGS_TO,            
                                'class_name'        => 'Stages',     
                                'foreign_key'       => 'stage_id',       
                                // 定义更多的关联属性            ……            
                            ), 
                            'question_groups'  =>array(
                                'mapping_type'      => self::HAS_ONE,            
                                'class_name'        => 'QuestionGroups' ,     
                                'foreign_key'       => 'unit_id',       
                                // 定义更多的关联属性            ……            
                            ), 
                        );
}

?>

