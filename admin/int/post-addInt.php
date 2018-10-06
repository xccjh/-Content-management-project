<?php
	// 接收请求,进行处理,之后响应回去
	// 1. 引入外部文件
	require('../../functions.php');
	// 如果是get提交过来的数据的话,要执行下面的代码
	if(empty($_POST)){
		 // 判断是否是编辑
		if(!isset($_GET['id'])){
			// 2. 调用方法,查询数据库
				$res = query('select * from categories');// 虽然当前是添加文章的页面,但是这个分类信息还是来源于分类表中的name
				// 3. 判断查询是否成功
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
				// 4. 返回结果
				echo json_encode($arr);
		}else { // 这是编辑功能的查询
			// 1. 先要获取传过来的id
			$id = $_GET['id'];
			// 2. 调用方法查询数据库
			$resPosts =	query('select * from posts where id = '.$id);
			$resCates = query('select * from categories');
			// 3. 判断查询结果
			if(!empty($resPosts)&&!empty($resCates)){
				$arr2 = array(
					'code'=>200,
					'msg'=>'查询成功',
					'dataPosts'=>$resPosts,
					'dataCates'=>$resCates
				);
			}else {
				$arr2 = array(
					'code'=>201,
					'msg'=>'查询失败'
				);
			}
			// 4. 返回查询结果
			echo json_encode($arr2);
		}
	 }
		// 如果是post提交过来的数据,则要执行下面的代码
		if(!empty($_POST)){
			// 判断是真正的添加数据还是更新数据
			if(!isset($_POST['id'])){ // 此时是添加数据
				// 1. 调用方法添加数据

				$res = insert('posts',$_POST);
				// 2. 判断是否添加成功
				if($res){
					$arr1 = array(
						'code'=>200,
						'msg'=>'数据添加成功...'
					);
				}else {
					$arr1 = array(
						'code'=>201,
						'msg'=>'数据添加失败'
					);
				}
				// 3. 返回添加后的结果给前端页面
				echo json_encode($arr1);
			}else { // 此时是更新数据
				// 1. 获取id
				$id = $_POST['id'];
				// 2. 调用方法进行更新
				$res = update('posts',$_POST,$id);
				// 3. 判断是否更新成功
				if($res){
					$arr3 = array(
						'code'=>200,
						'msg'=>'更新成功...'
					);
				}else {
					$arr3 = array(
						'code'=>201,
						'msg'=>'更新失败...'
					);
				}
				// 4. 返回更新结果给前端
				echo json_encode($arr3);
			}
		}
 ?>