<?php
namespace Admin\Model;
use Think\Model\RelationModel;

class UnitItemModel  extends RelationModel 
{    
	protected $tableName  = 'question_line_items';
    protected $tablePrefix = '';
    protected $_link = array(
                            'questions'=>array(
                                'mapping_type'      => self::HAS_ONE 
                                'foreign_key'       => 'id',       
                                // 定义更多的关联属性            ……            
                            ),        
                        );
}

?>

