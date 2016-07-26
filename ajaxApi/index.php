<?php
   

	function post($name){
        return $_POST[$name];
    }
    function get($name){
        return $_GET[$name];
    }
	 header("Access-Control-Allow-Origin: *");

	$type= get("type");
    
	if($type=="addUser"){
        
        $qq=post("qq");
        $sql="INSERT INTO yy_users (qq, date) VALUES ('".$qq."', '".date('y-m-d h:i:s')."')";
	    $result=execSql($sql);
        exit (json_encode($result));

    }
    else if($type=="getUsers"){
        $keyWord=post("keyWord");
        $sql="select * from yy_usesrs where qq like '%".$keyWord."'";
        $result=execSql($sql);
        exit (json_encode($result));
    }
 	else if($type=="sum"){
       
        $num1=post("num1");
        $num2=post("num2");
        
        $sum=$num1+$num2;
        $tmp=json_encode(array(
			'result'=>$sum,
                'state'=>"success",
		));
         exit (json_encode($tmp));
    }
    
?>