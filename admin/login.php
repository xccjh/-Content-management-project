<?php
    $msg = '';
    if(!empty($_POST)){
      $userName = $_POST['userName'];
      $userPwd = $_POST['userPwd'];
      $conn = mysqli_connect('127.0.0.1','root','root','baixiu');
      mysqli_set_charset($conn,'utf-8');
      $sql = "SELECT * FROM users WHERE email = '".$userName."'";
      $res = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($res);
      if(!empty($row)){
        if($row['password']== $userPwd){
          session_start();
          $_SESSION['userInfo'] = $row;
          header('Location:/admin/index.php');
        }else {
          $msg = '用户密码错误,请重新输入...';
        }
      }else {
        $msg = '用户名不存在,请重新输入...';
      }
    }
 ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>登陆</title>
  <link rel="stylesheet" href="../assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>
  <div class="login">
    <form class="login-wrap" action="<?php echo $_SERVER['PHP_SELF'] ?>" method='post'>
      <img class="avatar" src="../assets/img/default.png">
      <!-- 有错误信息时展示 -->
      <?php if(!empty($msg)){ ?>
        <div class="alert alert-danger">
          <strong>错误！</strong> <?php echo $msg ?>
        </div>
      <?php }?>
      <div class="form-group">
        <label for="email" class="sr-only">邮箱</label>
        <input id="email" type="email" name="userName" class="form-control" placeholder="邮箱" autofocus value="admin@admin.com">
      </div>
      <div class="form-group">
        <label for="password" class="sr-only">密码</label>
        <input id="password" value="123456" type="password" name="userPwd" class="form-control" placeholder="密码">
      </div>
      <input type="submit" value="登陆" class="btn btn-primary btn-block" >
    </form>
  </div>
</body>
</html>
