<?php
   
    function execSql($sql){
     // 连主库
        $link=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
        
        // 连从库
        // $link=mysql_connect(SAE_MYSQL_HOST_S.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
        
        if($link)
        {
            mysql_select_db(SAE_MYSQL_DB,$link);
            return mysql_query($sql,$link);
        }
    }


	function post($name){
        return $_POST[$name];
    }
    function get($name){
        return $_GET[$name];
    }

	$do= get("do");
    
	if($do=="addUser"){
        
        $qq=post("qq");
        $sql="INSERT INTO yy_users (qq, date) VALUES ('".$qq."', '".date('y-m-d h:i:s')."')";
	    $result=execSql($sql);
        exit (json_encode($result));

    }
    else if($do=="getUsers"){
        $keyWord=post("keyWord");
        $sql="select * from yy_usesrs where qq like '%".$keyWord."'";
        $result=execSql($sql);
        exit (json_encode($result));
    }
    
?>