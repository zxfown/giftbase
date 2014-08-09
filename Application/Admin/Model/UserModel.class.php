<?php
namespace Home\Model;
use Think\Model;

require_once APP_PATH."/Home/Common/ThriftInc.class.php";
require_once APP_PATH."/Home/Common/gen-php/ff/Types.php";

class UserModel extends Model 
{    
	protected $tableName  = 'user';
    protected $tablePrefix = '';
    public function GetAppId()
    {
        return I('areaId');
    }
    public function GetGameSummaryInfo(){
        $instObj = new \ff\game_summary_info_t(Array(
            "game_info"=>Array(),
        ));

        if ($this->GAME_INFO != '')
        {
            ff_decode_msg($instObj, $this->GAME_INFO);
        }
        return $instObj;
    }
}

?>

