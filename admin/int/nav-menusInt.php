<?php
	//引入外部文件
	require('../../functions.php');
	//调用方法查询数据
		$res = query("SELECT `VALUE` from options where `key` = 'nav_menus'");
	 if(empty($_POST)){
	// 1.这是用来判断是不是get请求的
	 		if(!isset($_GET['index'])&&!isset($_GET['action'])){
			// 3. 判断数组是否为空
					if(!empty($res)){
						$json = json_decode($res[0]['VALUE'],true);
						$arr = array(
							'code'=>200,
							'msg'=>'查询成功',
							'data'=>$json
						);
					}else {
						$arr = array(
							'code'=>201,
							'msg'=>'查询失败...'
						);
					}
			// 4.将查询结果返回给前端页面
				 echo json_encode($arr); // 前后端数据的交互要么是二进制数据要么是字符串
			 		}else if(isset($_GET['index']) && !isset($_GET['action'])) {
			// 带index的get请求
	  		// 1. 获取传递过来的索引
			  	$index = $_GET['index'];
			// 3. 判断查询的是否有结果
					if(!empty($res)){
						//print_r($res)
						// var_dump($res[0]['VALUE']);
			// 4. 将查询到的数据,转换成数组
						$arr1 = json_decode($res[0]['VALUE'],true);
						// print_r($arr1);
			// 5. 根据传过来的索引删除数据
						unset($arr1[$index]);
						// print_r($arr1);
			// 6. 更新数据库
					 	$str =	json_encode($arr1,JSON_UNESCAPED_UNICODE);
					 	// var_dump($str);
					 	$arr3 = array(
					 		'value'=>$str
					 	);
					  $result =	update('options',$arr3,9);
					  if($result){
			// 7. 将现在的数据返回给前台页面
							$arr2 = array(
								'code'=>200,
								'msg'=>'更新成功',
								'data'=>$arr1
							);
					  }else {
					  	$arr2 = array(
								'code'=>201,
								'msg'=>'更新失败'
							);
					  }
						echo json_encode($arr2);
					}
			  }else if($_GET['action']=='delAll'){
			// 1. 获取传递过来的所有的id值
			$ids = $_GET['ids'];
			// 2. 调用方法进行批量删除
			//4. 将查询到的数据,转换成数组
			$arr1 = json_decode($res[0]['VALUE'],true);
			// print_r($arr1);
			// exit;
			// 5. 根据传过来的索引删除数据
			for ($i=0; $i <count($ids) ; $i++) {
				unset($arr1[($ids[$i])]);
			}

			// 6. 更新数据库
					 	$str =	json_encode($arr1,JSON_UNESCAPED_UNICODE);
					 	 // var_dump($str);
					 	 // exit;
					 	$arr3 = array(
					 		'value'=>$str
					 	);
					  $result =	update('options',$arr3,9);
					  if($result){
			// 7. 将现在的数据返回给前台页面
							$arr2 = array(
								'code'=>200,
								'msg'=>'批量删除成功',
							);
					  }else {
					  	$arr2 = array(
								'code'=>201,
								'msg'=>'批量删除失败'
							);
					  }
						echo json_encode($arr2);
			}
	  }
	// 首先判断是不是post请求过来的数据
	 if(!empty($_POST)) { // 此时是post请求
	 	// 判断是否读取到数据
	 	if(!empty($res)){
	 		// print_r($res); // $res是一个数组,里面有一
	 		// 1. 将查询到的数据库的数据转换成对应的数组
	 		$arr3 = json_decode($res[0]['VALUE'],true);
	 		// print_r($arr);
	 		// 2. 将提交过来的数据追加到这个数组当中
	 		$arr3[] = $_POST;
	 		// print_r($arr);
	 		// 3. 添加回数据库
	 		$arr4 = array(
	 			'value'=> json_encode($arr3,JSON_UNESCAPED_UNICODE)
	 		);
	 		$result = update('options',$arr4,9);
	 		// 4. 判断是否成功
	 		if($result){
	 			$arr5 = array(
	 				'code'=>200,
	 				'msg'=>'添加成功',
	 				'data'=>$arr3
	 			);
	 		}else {
	 			$arr5 = array(
	 				'code'=>201,
	 				'msg'=>'添加失败'
	 			);
	 		}
	 		// 5. 返回添加的结果
	 		echo json_encode($arr5);
	 	}
	 }
	//{"code":200,"msg":"\u67e5\u8be2\u6210\u529f","data":[{"icon":"fa fa-glass","text":"\u5947\u8da3\u4e8b","title":"\u5947\u8da3\u4e8b","link":"\/category\/funny"},{"icon":"fa fa-phone","text":"\u6f6e\u79d1\u6280","title":"\u6f6e\u79d1\u6280","link":"\/category\/tech"},{"icon":"fa fa-fire","text":"\u4f1a\u751f\u6d3b","title":"\u4f1a\u751f\u6d3b","link":"\/category\/living"},{"icon":"fa fa-gift","text":"\u7f8e\u5947\u8ff9","title":"\u7f8e\u5947\u8ff9","link":"\/category\/travel"}]}
 ?>