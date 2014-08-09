<?php
//项目配置文件
return array(
    'URL_MODEL'          => '2', //URL模式    
    //更多配置参数    //...);
    'db_type'    =>   'mysql',    
    'db_host'    =>   'localhost',    
    'db_user'    =>   'root',    
    'db_pwd'     =>   'root',    
    'db_port'    =>    '3306',    
    'db_name'    =>    'giftbase_development', 
    
    'TMPL_L_DELIM'    =>  '<{',
    'TMPL_R_DELIM'    =>  '}>',

    'TMPL_EXCEPTION_FILE' => APP_PATH.'/Common/exception.tpl'
);
?>
