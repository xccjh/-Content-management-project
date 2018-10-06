<?php
  require('../functions.php');
  checkLogin();
  // 查询数据库渲染页面
   $posts = query('select * from posts');
   $drafted = query('select * from posts where status = 0');
   $categories = query('select * from categories');
   $comments = query('select * from comments');
   $held = query('select * from comments where status = 2');

 ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>首页</title>
  <?php include './inc/css.php' ?>
  <?php include './inc/script.php' ?>
</head>
<body>
  <div class="main">
    <?php include './inc/navBar.php' ?>
    <div class="container-fluid">
      <div class="jumbotron text-center">
        <h1>欢迎登陆管理系统</h1>
        <p>仪表盘</p>
        <p><a class="btn btn-primary btn-lg" href="post-add.php" role="button">写文章</a></p>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">站点内容统计：</h3>
            </div>
            <ul class="list-group">
              <li class="list-group-item"><strong><?php echo count($posts) ?></strong>篇文章（<strong><?php echo count($drafted) ?></strong>篇草稿）</li>
              <li class="list-group-item"><strong><?php echo count($categories) ?></strong>个分类</li>
              <li class="list-group-item"><strong><?php echo count($comments) ?></strong>条评论（<strong><?php echo count($held) ?></strong>条待审核）</li>
            </ul>
          </div>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
      </div>
    </div>
  </div>
  <?php include './inc/aside.php' ?>
</body>
</html>
