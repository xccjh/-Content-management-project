<?php
		require(__DIR__.'/config.php');
    // 1. 定义函数,验证用户是否登陆
	 function checkLogin(){
			 session_start();
		  if(!isset($_SESSION['userInfo'])){
		    header('Location:/admin/login.php');
		  }
	 }
	// 封装与数据库操作相关的函数  增删改查  函数封装越细越好,越简单越好,越单一越好 鲁棒
	// 2. 封装一个连接数据库的函数
		function connect(){
			$conn = mysqli_connect(DB_HOST,DB_NAME,DB_PASSWORD,DB_DATABASE);
			if(!$conn){
				die('数据库连接失败...');
			}
			mysqli_set_charset($conn,DB_SET_CHARSET);
			return $conn;
		}
	// 3. 封装一个查询数据库的函数
		function query($sql){
			$conn = connect();
			$res = mysqli_query($conn,$sql);
		    $arr =	fetch($res);
		  	mysqli_close($conn);
		  	return $arr;
		}
	// 4.封装一个查询结果集的函数
		function fetch($res){
			while($row = mysqli_fetch_assoc($res)){
				$arr[] = $row; // 将每一次读取到的结果集中的数据追加到数组当中
			}
			return $arr;
		}
	// 5.封装一个插入数据的函数
		function insert($table,$arr){
			// 5.1调用函数,获取连接状态
			$conn = connect();
			if(isset($arr['id'])){
				unset($arr['id']);
			}
			$keys = array_keys($arr); // 获取关联数组中所有的属性
			$values = array_values($arr); // 获取关联数组中所有的属性值
			// $str = implode(',',$keys);  // 将索引数组中的属性以,连接成字符串
			// echo implode(',',$values);  // 将索引数组中的属性值以,连接成字符串
			// $sql = 'INSERT INTO users (email,slug,nickname,password,status) values ("'.$email.'","'.$slug.'","'.$nickname.'","'.$userPwd.'","activated")';
			$sql = 'INSERT INTO '.$table.' ('.implode(',',$keys).') values ("'.implode('","',$values).'")';
			// 5.2 调用方法插入数据
			// print_r($sql);
	 	// 	 	exit;
			$res =mysqli_query($conn,$sql);
			// 5.3 判断是否插入数据成功
			if(!$res){
				die('插入数据失败...'); // 还有return的功能,只要执行了die,代码不会往下执行
			}
			return $res;
		}
	// 6. 封装一个删除数据的操作
		function del($sql){
			// 6.1 获取连接状态
			// $conn = connect();
			// 6.2 调用方法删除数据
			// $res = mysqli_query($conn,$sql);
			$res = mysqli_query(connect(),$sql); // 两行合成一行的简写形式
			// 6.2 返回删除结果
			return $res;
		}
	// 7.封装一个修改数据的函数
		function update($table,$arr,$id){
			// 7.1 连接数据库
			$conn = connect();
			// 7.2 先删除id
			// 因为在更新数据的时候,id是不需要更新的,所以先把id从$arr中删除掉
			unset($arr['id']);
			// 7.3 拼接sql语句
			$sql = "UPDATE ".$table." set ";  //  定义一个变量
			// 7.4 遍历数组,拼接成key=value, key=value的格式
			foreach($arr as $key => $val){
				$sql .= $key."='".$val."', ";
			}
			// $sql = 'UPDATE users set email="qq@qq.com",slug="qq",nickname="aaadfa",';
			// 7.5 将最后的,和空格给截取掉
			$sql = substr($sql,0,-2);
			// 7.6 再拼接上对应的id
			$sql .= ' where id = '.$id;
			// $sql='update users set email= "'.$email.'",slug = "'.$slug.'",nickname = "'.$nickname.'" where id = '.$id;
	  		// $sql =	"UPDATE users set email ='".$email."',slug='".$slug."',nickname = '".$nickname."' where id = ".$id;
			// 7.7 调用方法进行更新
		    $res =	mysqli_query($conn,$sql);
		    // 7.8 返回更新后的结果
		    return $res;
		}
 ?>