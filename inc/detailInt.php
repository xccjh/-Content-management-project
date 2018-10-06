<?php
	require('../functions.php');
	function getParams()
		{
		   $url = $_SERVER['HTTP_REFERER'];
		   $refer_url = parse_url($url);
		   $params = $refer_url['query'];
		   $arr = array();
		   if(!empty($params))
		   {
		       $paramsArr = explode('&',$params);
		       foreach($paramsArr as $k=>$v)
		       {
		          $a = explode('=',$v);
		          $arr[$a[0]] = $a[1];
		       }
		   }
		   return $arr;
		}
		$arr = getParams();
		$id=$arr["id"];
	// print_r($_SERVER['HTTP_REFERER']);
	// $test = parse_url($_SERVER['HTTP_REFERER']);
	// print_r($arr);
	// exit;
	// print_r($_GET['id']);
	$str='SELECT m.id,m.title,m.content,m.created,m.views,m.feature,m.likes,p.nickname,a.name FROM users as p RIGHT JOIN (select * from posts as n where n.id ='.$id.') as m on m.user_id = p.id LEFT JOIN categories as a on m.category_id = a.id';
	$res = query($str);

	// $result=html_entity_decode($res[0]["content"], ENT_QUOTES, 'UTF-8');
	// class C1{
 //    var $article = $result// 定义一个属性
	// };
	// $obj = new C1();
	// $obj=array("articles" => $result);
	// $arr1=array($obj);
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

?>