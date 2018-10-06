<?php
  require('../functions.php');
  checkLogin();
  // 下面需要做的就是要渲染当前登陆用户的信息
  //1. 获取当前登陆用户的id
  $id = $_SESSION['userInfo']['id'];
  // 2.. 根据id查询此用户的数据
  $row = query('select * from users where id ='.$id)[0];

   // 更新用户数据
  // 判断用户是否是post提交
  if(!empty($_POST)){
    // 5.1 删除掉email,因为当前的更新不包括email的更新
    unset($_POST['email']);
    // 5.2 调用方法更新数据
     $res = update('users',$_POST,$id);
     // 5.3 判断是否更新成功
     if(!$res){
      // 刷新当前页面
      $msg = '页面更新不成功...';
     }else {
       // 刷新 当前页面
      header('Location:/admin/profile.php');
     }
  }
 ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>个人中心</title>
  <?php include './inc/css.php' ?>
  <?php include './inc/script.php' ?>
</head>
<body>
  <div class="main">
    <?php include './inc/navBar.php' ?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>我的个人资料</h1>
      </div>
      <!-- 有错误信息时展示 -->
      <?php if(isset($msg)){ ?>
      <div class="alert alert-danger">
        <strong>错误！</strong><?php echo $msg ?>
      </div>
    <?php } ?>
      <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
        <div class="form-group">
          <label class="col-sm-3 control-label">头像</label>
          <div class="col-sm-6">
            <label class="form-image">
              <input id="avatar" type="file">
              <img src="<?php echo $row['avatar']?$row['avatar']:'../assets/img/default.png' ?>">
              <i class="mask fa fa-upload"></i>
            </label>
          </div>
        </div>
        <div class="form-group">
          <label for="email" class="col-sm-3 control-label">邮箱</label>
          <div class="col-sm-6">
            <input id="email" class="form-control" name="email" type="type" value="<?php echo $row['email'] ?>" placeholder="邮箱" readonly>
            <p class="help-block">登录邮箱不允许修改</p>
          </div>
        </div>
        <div class="form-group">
          <label for="slug" class="col-sm-3 control-label">别名</label>
          <div class="col-sm-6">
            <input id="slug" class="form-control" name="slug" type="type" value="<?php echo $row['slug'] ?>" placeholder="别名">
          </div>
        </div>
        <div class="form-group">
          <label for="nickname" class="col-sm-3 control-label">昵称</label>
          <div class="col-sm-6">
            <input id="nickname" class="form-control" name="nickname" type="type" value="<?php echo $row['nickname'] ?>" placeholder="昵称">
            <p class="help-block">限制在 2-16 个字符</p>
          </div>
        </div>
        <div class="form-group">
          <label for="bio" class="col-sm-3 control-label">简介</label>
          <div class="col-sm-6">
            <textarea id="bio" name="bio" class="form-control" placeholder="Bio"  cols="30" rows="6"><?php echo $row['bio'] ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-6">
            <button type="submit" class="btn btn-primary">更新</button>
            <a class="btn btn-link" href="password-reset.html">修改密码</a>
          </div>
        </div>
      </form>
    </div>
  </div>
  <?php include './inc/aside.php' ?>
</body>
</html>

<script type="text/javascript">
  // 1.给上传文件的表单注册一个change事件
  $('#avatar').on('change',function(){
    // 2.创建一个FormData对象
    var data = new FormData(); // FormData()
    data.append('avatar',this['files'][0]);
    // 3.创建异步对象
    var xhr = new XMLHttpRequest();
    // 4.设置请求行
    xhr.open('post','/admin/uploadFile.php');
    // 5.设置请求行 省略这一步  因为现在传输的是new FormData()的实例
    // 6.设置请求体  发送数据
    xhr.send(data);
    // 7.监视异步对象的状态
    xhr.onreadystatechange = function () {
      if(xhr.status == 200 && xhr.readyState == 4){
        // var txt = xhr.responseText;
        // ../uploads/5b225a5172761.gif
        $('#avatar').next().attr('src',xhr.responseText);
      }
    }
    /**
     * 上传文件的时候,前端做的工作
     * 1.获取上传文件的标签对象,注册changer事件
     * 2.创建序列化对象
     * 3.将要上传的文件添加到data当中
     * 4.使用原生异步的方式向后台传输数据
     * 5.后台处理完毕之后,前端接收后台返回来的图片路径
     * 6.将上传的图片渲染在当前的页面上
     */
  })
</script>

