<?php
	require('../functions.php');
    $res = query("SELECT `VALUE` from options where `key` = 'home_slides'");
    // 判断是否读取到数据
    if(!empty($res)){
      // print_r($res); // $res是一个数组,里面有一
      // 1. 将查询到的数据库的数据转换成对应的数组
      $arr3 = json_decode($res[0]['VALUE'],true);
      // print_r($arr);
        $arr5 = array(
          'code'=>200,
          'msg'=>'添加成功',
          'data'=>$arr3
        );
      // 5. 返回添加的结果
      echo json_encode($arr5);
       }
    ?>