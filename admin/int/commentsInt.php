<?php
	// 1. 引入外部文件
	require('../../functions.php');
	if(!isset($_GET['action'])){
	 //  调用方法查询数据
		$res = query('select * from comments');
			// 3. 判断读取的数据
			if(!empty($res)){
				$arr = array(
					'code'=>200,
					'msg'=>'读取成功',
					'data'=>$res
				);
			}else {
				$arr = array(
					'code'=>201,
					'msg'=>'读取失败'
				);
			}
		// 4. 将结果返回给前端页面
		echo json_encode($arr);
	}else if($_GET['action']=='delAll'){
			// 1. 获取传递过来的所有的id值
			$ids = $_GET['ids'];
			// 2. 调用方法进行批量删除
			$sql ='delete from comments where id in ('.implode(',',$ids).')';
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
		}else if($_GET['action']=='delCtg'){ // 此时是删除的操作
			// 1. 获取传过来id
			$id = $_GET['id'];
			// 2. 调用方法删除数据
			$res = del('delete from comments where id =' .$id);
			// 3. 判断删除的结果
			if($res){
				$arr2 = array(
					'code'=>200,
					'msg'=>'删除成功'
				);
			}else {
				$arr2 = array(
					'code'=>201,
					'msg'=>'删除失败'
				);
			}
			// 4. 将删除后的结果返回给前端
			echo json_encode($arr2);
			exit;
		}else if($_GET['action']=='pz'){ // 此时是批准的操作
			// 1. 获取传过来id
			$id = $_GET['id'];
				$res = query('select * from comments where id = '.$id)[0];
				$res["status"]=0;
				// print_r($res);
				// $res1=$res;
				$res2 = update('comments',$res,$id);
				// print_r($res2);
				// 3. 判断更新结果
				if($res2){
					$arr4 = array(
						'code'=>200,
						'msg'=>'更新数据成功'
					);
				}else {
					$arr4 = array(
						'code'=>'201',
						'msg'=>'更新失败...'
					);
				}
			// 4. 将删除后的结果返回给前端
			echo json_encode($arr4);
			}
 ?>