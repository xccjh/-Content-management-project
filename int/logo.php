<?php
//引入外部文件
  require('../functions.php');
  //调用方法查询数据
    $res = query("SELECT `VALUE` from options where `key` = 'site_logo'")[0];
    $site_url = query("SELECT `VALUE` from options where `key` = 'site_url'")[0];
    $site_name = query("SELECT `VALUE` from options where `key` = 'site_name'")[0];
    $site_description = query("SELECT `VALUE` from options where `key` = 'site_description'")[0];
    $site_keywords = query("SELECT `VALUE` from options where `key` = 'site_keywords'")[0];
    $site_footer = query("SELECT `VALUE` from options where `key` = 'site_footer'")[0];
    $friendlylink = query("SELECT `VALUE` from options where `key` = 'friendlylink'")[0];
    $res["site_url"]=$site_url["VALUE"];
    $res["site_name"]=$site_name["VALUE"];
    $res["site_description"]=$site_description["VALUE"];
    $res["site_keywords"]=$site_keywords["VALUE"];
    $res["site_footer"]=$site_footer["VALUE"];
    $res["friendlylink"]=$friendlylink;
    // $arr=[];
    $arr1[] = $res;
          if(!empty($res)){
            $arr = array(
              'code'=>200,
              'msg'=>'查询成功',
              'data'=>$arr1
            );
          }else {
            $arr = array(
              'code'=>201,
              'msg'=>'查询失败...'
            );
          }
      // 4.将查询结果返回给前端页面
         echo json_encode($arr); // 前后端数据的交互要么是二进制数据要么是字符串
 ?>