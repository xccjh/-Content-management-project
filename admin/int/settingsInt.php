<?php 
	// 1. 先引入外部文件
	require('../../functions.php');

	 // 只有get请求的最普通查询才走这一步
	 if(empty($_POST) && !isset($_FILES['site_logo'])){
	 	// 2. 调用方法查询数据
			$res = query('select * from options where id < 9');

			// 3. 判断数组中是否有数据
			if(!empty($res)){
				$arr = array(
					'code'=>200,
					'msg'=>'查询成功',
					'data'=>$res
				);
			}else {
				$arr = array(
					'code'=>201,
					'msg'=>'查询失败...'
				);
			}

			// 4. 返回查询的结果
			echo json_encode($arr);
	 }

	 // 处理图片上传  是否真正的有数据过来
	 if(isset($_FILES['site_logo'])){
	 	 // 1. 判断是否有指定的目标文件
	 	 if(!file_exists('../../uploads')){
	 	 	mkdir('../../uploads');
	 	 }

	 	 // 2. 获取图片的后缀   jpg  png  jpeg 
	 	 $ext = explode('.',$_FILES['site_logo']['name'])[1];

	 	 // 3. 拼接图片的路径
	 	 $path ='../../uploads/'.uniqid().'.'.$ext;

	 	 // 4. 移动图片到指定位置
	 	 move_uploaded_file($_FILES['site_logo']['tmp_name'],$path);

	 	 // 5. 将路径返回给客户端
	 	 // $arr1 = array(
	 	 // 	'code'=>200,
	 	 // 	'msg'=>'图片上传成功',
	 	 // 	'data'=>$path
	 	 // );

	 	 // echo json_encode($arr1);
	 	 echo $path;
	 }

	 // ************post提交过来的数据******************
	 if(!empty($_POST)){
	 	// print_r($_POST);
	 	// 1. 先进行一个值的判断 
		 $_POST['comment_status'] =	isset($_POST['comment_status'])?1:0;
	 	 $_POST['comment_reviewed'] =	isset($_POST['comment_reviewed'])?1:0;

	 	 // 2. 连接数据库
	 	 $conn = connect();

	 	 // 3. 拼接sql语句
	 	 $flag = true;
	 	 foreach($_POST as $key=>$val){
	 	 	$sql = "update options set `value`= '".$val."' where `key` = '".$key."'";
	 	 	$res = mysqli_query($conn,$sql);

	 	 	// 4. 判断是否都成功
	 	 	if(!$res){
	 	 		$flag = false;
	 	 		break;
	 	 	}
	 	 }

	 	 // 5. 判断是否成功
	 	 if($flag){
	 	 	$arr1 = array(
	 	 		'code'=>200,
	 	 		'msg'=>'更新成功'
	 	 	);
	 	 }else {
	 	 	$arr1 = array(
	 	 		'code'=>201,
	 	 		'msg'=>'更新失败'
	 	 	);
	 	 }

	 	 // 6. 将结果返回给前台页面
	 	 echo json_encode($arr1);
	 }
 ?>