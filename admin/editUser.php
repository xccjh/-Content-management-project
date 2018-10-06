<?php
	require('../functions.php');
	// 1.获取提交过来的数据
		$id = $_POST['id'];
	// 2.修改数据
		$res = update('users',$_POST,$id);
	 if($res){
	 	 $arr = array(
	 	 	"code"=>200,
	 	 	"msg"=>"修改成功"
	 	 );
	 }else {
	 	$arr = array(
	 	 	"code"=>201,
	 	 	"msg"=>"修改失败"
	 	 );
	 }
	 echo json_encode($arr);
 ?>