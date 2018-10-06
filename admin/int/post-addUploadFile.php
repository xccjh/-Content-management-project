<?php
	// 1. 判断是否有文件上传过来
	if(isset($_FILES['feature'])){
		// 2. 判断目标文件是否存
		if(!file_exists('../../uploads')){
			mkdir('../../uploads');
		}
		// 3. 获取文件的后缀
		$ext = explode('.',$_FILES['feature']['name'])[1];
		// print_r($ext);
			// Array
			// (
			//     [0] => 002
			//     [1] => gif
			// )
		// 4. 拼接路径
		$path = '../../uploads/'.uniqid().'.'.$ext;
		// 5. 将图片移动到指定的目标位置
		move_uploaded_file($_FILES['feature']['tmp_name'],$path);
		// 6. 将路径返回给前台浏览器
		echo $path;
	}
		// print_r($_FILES);
		// exit;
		// Array
		// (
		//     [feature] => Array
		//         (
		//             [name] => 002.gif
		//             [type] => image/gif
		//             [tmp_name] => C:\Windows\php670C.tmp
		//             [error] => 0
		//             [size] => 20567
		//         )

		// )
	/**
	 * 上传文件的思路
	 * 1.判断文件是否上传过来
	 * 2.判断目标目录是否存在
	 * 3.获取上传文件的后缀名
	 * 4.生一个路径和唯一的名称
	 * 5.移动到指定的目标位置
	 * 6.将图片存储的路径返回给前端
	 */
 ?>