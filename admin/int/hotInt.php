<?php
	require('../../functions.php');
	// 判断是get请求
	 if(empty($_POST)){  // 如果是get 请求的话,$_POST这个超全局变量里面一定为空
		if(!isset($_GET['action'])){ // 这个判断里面表示跳转过来的页面渲染
			// 2.调用方法查询数据库
			 $res = query('select * from hot');
			 // 3.判断是否读取到了数据,返回给前台页面
			 if(!empty($res)){
			 	// 将数据返回给前台页面即可,但是这个数据是有一定格式
			 	$arr = array(
			 		'code'=>200,
			 		'msg'=>'查询成功...',
			 		'data'=>$res
			 	);
			 }else {
			 	$arr = array(
			 		'code'=>201,
			 		'msg'=>'查询失败...'
			 	);
			 }
			 // 4. 将数据返回给前台
			 echo json_encode($arr);
		}else if($_GET['action']=='delCtg'){ // 此时是删除的操作
			// 1. 获取传过来id
			$id = $_GET['id'];
			// 2. 调用方法删除数据
			$res = del('delete from hot where id =' .$id);
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
		}else if($_GET['action']=='edit'){
			// 1. 获取传递过来的id
			$id = $_GET['id'];
			// 2. 查询数据
			$res = query('select * from hot where id = ' . $id);
			// 3. 判断查询结果
			if(!empty($res)){
				$arr3 = array(
					'code' => 200,
					'msg'=>'当前数据查询成功',
					'data'=>$res
				);
			}else {
				$arr3 = array(
					'code' => 201,
					'msg'=>'当前数据查询失败'
				);
			}
			// 4. 将结果返回给前端
			echo json_encode($arr3);
			exit;
		}else if($_GET['action']=='delAll' ){
			// 1. 获取传递过来的所有的id值
			$ids = $_GET['ids'];
			// 2. 调用方法进行批量删除
			$sql ='delete from hot where id in ('.implode(',',$ids).')';
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
	// =============== 以下是post请求过来的数据====================
	 // 1. 判断是否是post过来的请求
	 // print_r($_POST);
	 if(!empty($_POST)){
	 	 if(!isset($_POST['id'])){  // 表示添加操作

	 	 		// 2. 根据传过来的数据调用方法到数据里面添加数据
			 	 $res = insert('hot',$_POST);
			 	 // 3. 判断数据是否插入成功
			 	 if($res){
			 	 	$arr1 = array(
			 	 		'code'=>200,
			 	 		'msg'=>'添加数据成功'
			 	 	);
			 	 }else {
			 	 	$arr1 = array(
			 	 		'code'=>201,
			 	 		'msg'=>'添加数据失败'
			 	 	);
			 	 }
			 	 // 4. 将数据结果返回给前台页面
			 	 echo json_encode($arr1);
			 	 exit;
			}else { // 表示编辑操作
				// 1.获取id
				$id = $_POST['id'];

				// 2. 调用update方法进行数据更新
				$res = update('hot',$_POST,$id);
				// 3. 判断更新结果
				if($res){
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
				// 4. 将最终的结果返回给前台页面
				echo json_encode($arr4);
			}
	 }
 ?>