<?php
	require('../functions.php');
	// 1.先判断是否是get过来的,而且是否有user_id
	if(isset($_GET['user_id']) && $_GET['action']!='delAll'){
		// 获取用户id
		$userId = $_GET['user_id'];
		//删除
	    $res =del('delete from users where id = '.$userId);
		if($res){
			header('Location:/admin/users.php');
		}else {
			die('删除此条用户数据失败...');
		}
	}else if($_GET['action']=='delAll'){
			// 1. 获取传递过来的所有的id值
			$ids = $_GET['ids'];
			// 2. 调用方法进行批量删除
			$sql ='delete from users where id in ('.implode(',',$ids).')';
			$res = del($sql);
			// 3. 判断是否删除成功
			if($res){
				$arr5 = array(
					'code'=>200,
					'msg'=>'批量删除成功'
				);
			}else {
				$arr5 = array(
					'code'=>201,
					'msg'=>'批量删除失败'
				);
			}
			// 4. 返回一个删除的结果
			echo json_encode($arr5);
			exit;
		}
 ?>