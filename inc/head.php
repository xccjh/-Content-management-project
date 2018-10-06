<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <meta name="Keywords" Content="关键词1,关键词2,关键词3,关键词4">
  <meta name=”Description” Content=”你网页的简述”>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>发现生活，发现美!</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
  <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="wrapper">
    <div class="topnav">
      <ul id="topNavList">
      </ul>
    </div>
    <div class="header">
      <h1 class="logo">
      </h1>
      <ul class="nav" id="navList">
      </ul>
      <div class="search">
        <form>
          <input type="text" class="keys" placeholder="输入关键字">
          <input type="submit" class="btn" value="搜索">
        </form>
      </div>
      <p style="text-align: center">友情链接</p>
      <div class="slink">
      </div>
    </div>
<?php include './inc/script.php' ?>
<script type="text/template"  id="logoTmp">
  {{each data as val key}}
    <a href="{{val.site_url}}">
      <img src="{{val.VALUE}}" alt="">
    </a>
  {{/each}}
</script>
<script type="text/template"  id="yqTmp">
  {{each friendlylink as val key}}
      <div><a href="{{val[key][1]}}">{{val[key][0]}}</a></div>

  {{/each}}
</script>
<script type="text/javascript">
    $.ajax({
      type:'get',
      dataType:'json',
      url:'/int/logo.php',
      success:function(res){
        if(res&&res.code == 200){
          var res1=res.data[0];
          document.title=res1.site_name;
          $('.footer > p').html(res1.site_footer);
          document.getElementsByTagName("meta")[2].content=res1.site_description;
          document.getElementsByTagName("meta")[1].content=res1.site_keywords;
          var htmlStr = template('logoTmp',res);// 第一个参数是模板的id,第二个参数必须是对象
          $('.logo').html(htmlStr);
          var obj = {
            friendlylink:JSON.parse(res1.friendlylink.VALUE)
          };
          console.log(obj.friendlylink[1][1]);
          var htmlStr1 = template('yqTmp',obj);
          $('.slink').html(htmlStr1);
        }
      }
    })
</script>