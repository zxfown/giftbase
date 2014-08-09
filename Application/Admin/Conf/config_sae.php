<?php
//项目配置文件
return array(
    'DEFAULT_MODULE'     => 'Index', //默认模块    
    'URL_MODEL'          => '2', //URL模式   
    //更多配置参数    //...);
    'db_type'    =>   'mysql',    
    'db_host'    =>   SAE_MYSQL_HOST_M,    
    'db_user'    =>   SAE_MYSQL_USER,    
    'db_pwd'     =>   SAE_MYSQL_PASS,    
    'db_port'    =>    SAE_MYSQL_PORT,    
    'db_name'    =>    SAE_MYSQL_DB, 
    
    'TMPL_L_DELIM'    =>  '<{',
    'TMPL_R_DELIM'    =>  '}>',
    'FFRPC_HOST'      =>  '112.124.57.159',
    'FFRPC_PORT'      =>  1281,
    
    //'COOKIE_DOMAIN'=> 'ffown.sinaapp.com',
    //'COOKIE_PATH'=>'/',
    // 'COOKIE_EXPIRE'         =>  3600,    // Cookie有效期
    'URL_CASE_INSENSITIVE' =>true,
);

?>
