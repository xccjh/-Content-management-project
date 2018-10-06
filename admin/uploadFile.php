<?php
	require('../functions.php');
	// 1.先判断是否有文件传过来
	if(isset($_FILES['avatar'])){
		// 接收文件存储起来指定的目标文件夹  uploads
		// 2.判断目标文件夹是否存在
		if(!file_exists('../uploads')){
			mkdir('../uploads'); // 如果当前这个文件夹不存的话,则使用mkdir函数创建一个文件夹
		}
		// 因为上传的文件名称有可能重复,因为要生成一个随机的图片名称
		// 3.获取上传的图片的后缀
		$ext = explode('.',$_FILES['avatar']['name'])[1];
		$name = uniqid().".".$ext;
		// 4. 移动到指定的目录
		move_uploaded_file($_FILES['avatar']['tmp_name'],'../uploads/'.$name);
		// 6. 将图片路径存在数据库里
		$path = '../uploads/'.$name;
		$arr = array(
			'avatar'=>$path
		);
		session_start();
		$id = $_SESSION['userInfo']['id']; //获取当前要更新的数据的id
		$res = update('users',$arr,$id);
		// 7. 判断更新是否成功
		if($res){
			// 向前台返回一个路径
			echo $path;
		}else {
			echo '修改失败...';
		}
	}else if(isset($_FILES['feature'])){
		// 接收文件存储起来指定的目标文件夹  uploads
		// 2.判断目标文件夹是否存在
		if(!file_exists('../uploads')){
			mkdir('../uploads'); // 如果当前这个文件夹不存的话,则使用mkdir函数创建一个文件夹
		}
		// 因为上传的文件名称有可能重复,因为要生成一个随机的图片名称
		// 3.获取上传的图片的后缀
		$ext = explode('.',$_FILES['feature']['name'])[1];
		$name = uniqid().".".$ext;
		// 4. 移动到指定的目录
		move_uploaded_file($_FILES['feature']['tmp_name'],'../uploads/'.$name);
		// 6. 将图片路径存在数据库里
		$path = '../uploads/'.$name;
		echo $path;
		// $arr = array(
		// 	'avatar'=>$path
		// );
		// $res = query("SELECT `VALUE` from options where `key` = 'home_slides'");
	}
	/**
	 * 上传图片的步骤 在后台里面的操作步骤
	 * 1. 判断是否有文件提交过来
	 * 2. 接收上传过来的文件,将此文件移动到指定的目标
	 * 3. 判断指定的目录文件夹是否存在,如果存在则直接移动,如果不存在,则先创建
	 * 4. 为了避免上传的文件名称重复,需要生成随机的文件名称
	 * 5. 获取文件名的后缀,拼接成一个随机的文件名称
	 * 6. 调用 move_uploaded_file()移动到指定的目标位置
	 * 7. 将当前的文件存储路径更新回数据库
	 * 8. 如果更新成功,则将当前的文件路径返回给前端
	 */
 ?>