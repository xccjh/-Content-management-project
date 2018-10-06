<div class="aside">
    <div class="profile">
      <a href="/admin/profile.php"><img class="avatar" src="<?php echo $_SESSION['userInfo']['avatar']?$_SESSION['userInfo']['avatar']:'/assets/img/default.png'?>"></a>
      <a href="/admin/profile.php"><h3 class="name" ><?php echo $_SESSION['userInfo']['nickname'] ?></h3></a>
    </div>
    <ul class="nav">
      <li class="active">
        <a href="index.php"><i class="fa fa-dashboard"></i>仪表盘</a>
      </li>
      <li>
        <a href="random.php"><i class="fa fa-fire"></i>随机推荐</a>
      </li>
      <li>
        <a href="week.php"><i class="fa fa-gift"></i>一周排行</a>
      </li>
      <li>
        <a href="focus.php"><i class="fa fa-phone"></i>焦点关注</a>
      </li>
      <li>
        <a href="hot.php"><i class="glyphicon glyphicon-plus"></i>热门推荐</a>
      </li>
      <li>
        <a href="#menu-posts" class="collapsed" data-toggle="collapse">
          <i class="fa fa-thumb-tack"></i>文章管理<i class="fa fa-angle-right"></i>
        </a>
        <ul id="menu-posts" class="collapse">
          <li><a href="/admin/posts.php">所有文章</a></li>
          <li><a href="/admin/post-add.php">写文章</a></li>
          <li><a href="/admin/categories.php">分类目录</a></li>
        </ul>
      </li>
      <li>
        <a href="/admin/comments.php"><i class="fa fa-comments"></i>评论管理</a>
      </li>
      <li>
        <a href="/admin/users.php"><i class="fa fa-users"></i>用户设置</a>
      </li>
      <li>
        <a href="#menu-settings" class="collapsed" data-toggle="collapse">
          <i class="fa fa-cogs"></i>系统设置<i class="fa fa-angle-right"></i>
        </a>
        <ul id="menu-settings" class="collapse">
          <li><a href="/admin/nav-menus.php">导航菜单</a></li>
          <li><a href="/admin/slides.php">图片轮播</a></li>
          <li><a href="/admin/settings.php">网站设置</a></li>
        </ul>
      </li>
    </ul>
  </div>