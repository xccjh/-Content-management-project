<?php
	require('../../functions.php');
	// 判断是否是get请求
	if(empty($_POST)){
//此时是查询操作
		if(!isset($_GET['action'])){
			// 2. 调用对应的方法查询数据库
			 // $res = query('select * from posts');
			 $res = query('SELECT posts.id,posts.title,posts.content,posts.category_id,posts.created,posts.views,posts.feature,posts.likes,posts.status,users.nickname,
    categories.name FROM posts LEFT JOIN users on posts.user_id = users.id LEFT JOIN categories on  posts.category_id = categories.id');
			 // 3. 判断数组是否为空
			 if(!empty($res)){
			 	$arr = array(
			 		'code'=>200,
			 		'msg'=>'查询成功',
			 		'data'=>$res
			 	);
			 }else {
			 	$arr = array(
			 		'code'=>201,
			 		'msg'=>'查询失败'
			 	);
			 }
			 // 4. 将数据返回给浏览器客户端
			 echo json_encode($arr);
		}else if($_GET['action']=='delPosts'){
// 此时是一个删除的操作
			// 1. 先获取传递过来的id
			$id = $_GET['id'];
			// 2. 调用方法进行删除
			$res = del('delete from posts where id = '.$id);
			// 3. 判断删除是否成功
			if($res){
				$arr1 = array(
					'code'=>200,
					'msg'=>'删除成功...'
				);
			}else {
				$arr1 = array(
					'code'=>201,
					'msg'=>'删除失败...'
				);
			}
			// 4. 返回删除后的结果
			echo json_encode($arr1);
		}else if($_GET['action']=='delAll'){
//此时是一个批量删除的操作
			// 1. 获取传递过来的所有的id值
			$ids = $_GET['ids'];
			// 2. 调用方法进行批量删除
			$sql ='delete from posts where id in ('.implode(',',$ids).')';
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
	}
 ?>