<?php
   require('../functions.php');
//1.检查登录
   checkLogin();
// 2. 查询数据库渲染页面
   $arr = query('select * from users');
// 3.是否是post提交  现在要插入数据   这是增加的操作  add按钮的提交
  if(!empty($_POST) && $_POST['id']=='') {    // 因为这里不需要id
    $_POST['status'] = 'activated';
  //往数据库中添加数据
    $res = insert('users',$_POST); // 调用函数添加数据
    if($res){
      header('Location:/admin/users.php');
    }else {
      die('添加失败...');
    }
  }
// 4.编辑的操作
  if(isset($_GET['action'])){ // 是否是编辑
    $userId = $_GET['user_id']; // 获取当前的id
     $row = query("select * from users where id = ".$userId)[0];
  }
 ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>用户设置</title>
  <?php include './inc/css.php' ?>
  <?php include './inc/script.php' ?>
</head>
<body>
  <div class="main">
    <?php include './inc/navBar.php' ?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>用户</h1>
      </div>
      <div class="row">
        <div class="col-md-4">
          <form action="<?php echo $_SERVER['PHP_SELF']?>" method='post' id="formData">
            <input type="hidden" name="id" value="<?php echo isset($row)?$row['id']:''?>">
            <h2>添加新用户</h2>
            <div class="form-group">
              <label for="email">邮箱</label>
              <input id="email" class="form-control" value="<?php echo isset($row)?$row['email']:'' ?>" name="email" type="email" placeholder="邮箱">
            </div>
            <div class="form-group">
              <label for="slug">别名</label>
              <input id="slug" class="form-control" value="<?php echo isset($row)?$row['slug']:'' ?>" name="slug" type="text" placeholder="别名">
            </div>
            <div class="form-group">
              <label for="nickname">昵称</label>
              <input id="nickname" value="<?php echo isset($row)?$row['nickname']:'' ?>" class="form-control" name="nickname" type="text" placeholder="昵称">
            </div>
            <!-- 如果是添加的话,是能够显示这个密码框的,如果是编辑的话,就不要显示了 -->
            <!-- <?php if(!isset($row)){ ?>
              <div class="form-group">
                <label for="password">密码</label>
                <input id="password" class="form-control" name="password" type="text" placeholder="密码">
              </div>
            <?php }?> -->
            <div class="form-group">
                <label for="password">密码</label>
                <input id="password" class="form-control" <?php echo isset($row)?"disabled":'' ?> name="password" type="text" placeholder="密码">
              </div>
            <div class="form-group">
              <?php if(!isset($row)){ ?>
              <button class="btn btn-primary" type="submit" id="addUser">添加</button>
                <?php }else{ ?>
                <button class="btn btn-primary"  id="editUser">修改</button>
              <?php } ?>
            </div>
          </form>
        </div>
        <div class="col-md-8">
          <div class="page-action">
            <button class="btn btn-danger btn-sm delAll" href="javascript:;" style="display: none">批量删除</button>
          </div>
          <table class="table table-striped table-bordered table-hover">
            <thead>
               <tr>
                <th class="text-center" width="40"><input type="checkbox" id="toggleChk" ></th>
                <th class="text-center" width="80">头像</th>
                <th>邮箱</th>
                <th>别名</th>
                <th>昵称</th>
                <th>状态</th>
                <th class="text-center" width="100">操作</th>
              </tr>
            </thead>
            <tbody>
    
              <?php foreach($arr as $key =>$val){ ?>
                <tr>
                  <td class="text-center"><input type="checkbox" class='chk' value="<?php echo $val['id'] ?>"></td>
                  <td class="text-center"><img class="avatar" src="<?php echo $val['avatar'] ?>"></td>
                  <td><?php echo $val['email'] ?></td>
                  <td><?php echo $val['slug'] ?></td>
                  <td><?php echo $val['nickname'] ?></td>
                  <?php if($val['status']=='activated'){ ?>
                    <td>激活</td>
                    <?php }else{ ?>
                      <td>未激活</td>
                    <?php } ?>
                  <td class="text-center">
                    <a href="/admin/users.php?action=edit&user_id=<?php echo $val['id']?>" class="btn btn-default btn-xs">编辑</a>
                    <a href="/admin/delUser.php?user_id=<?php echo $val['id']?>" class="btn btn-danger btn-xs">删除</a>
                  </td>
              </tr>
              <?php } ?>
    
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <?php include './inc/aside.php' ?>
</body>
</html>
<script>
  $('#editUser').on('click',function(){
    var data = $('#formData').serialize();
    $.ajax({
      type:'post',
      url:'/admin/editUser.php',
      data:data,
      dataType:'json',
      success:function(res){
        console.log(res);
        if(res && res.code == 200){
          alert('修改成功...');
          window.location.href = "/admin/users.php"
        }
      },
      error:function(res){
        console.log("res");
      }
    });
    return false;
  })
  // ******************批量删除的操作*********************
  // 1. 给总的小按钮注册事件
  $('#toggleChk').on('click',function(){
    // 2. 所有的小按钮的选中状态和这个按钮是一致的
    if(this.checked){ // 总按钮被选的时候
      $('.chk').prop('checked',true); // 所有的小按钮也要被选中
      $('.delAll').show(); // 批量删除的按钮要显示出来
    }else {
       $('.chk').prop('checked',false);  //总按钮不选中的时候,所有的小按钮都不选中
       $('.delAll').hide(); // 批量删除按钮要隐藏起来
    }
    // $('.chk').prop('checked',this.checked)
  })
  // 2. 当被选中的小按钮的个数大于1个的时候,批量删除的按钮也应该被选中
  $('tbody').on('click','.chk',function(){
    // 判断一下其它的小按钮有没有被选中,还要顺便获取到这些被选中的个数
    var size = $('.chk:checked').size();
    if(size>1&&size<$('.chk').size()){
      // 批量删除的按钮应该显示出来
      $('.delAll').show();
      $('#toggleChk').prop('checked',false);
    }else if(size==$('.chk').size()) {
      $('#toggleChk').prop('checked',true);
      $('.delAll').show();
    }else{
    $('.delAll').hide();
    $('#toggleChk').prop('checked',false);
    }
  })
  // 3. 给批量删除按钮注册事件
  $('.delAll').on('click',function(){
    var ids = []; // 这个数组是用来存储所有的被选中的小按钮的id值
    $('.chk').each(function(index,ele){ // ele是DOM对象
      if($(ele).prop('checked')){
        ids.push($(ele).val());
      }
    })
     //发送ajax请求
    $.ajax({
      type:'get',
      url:'/admin/int/delUser.php',
      data:{
        ids:ids,
        action:'delAll'
      },
      dataType:'json',
      success:function(res){
        if(res&&res.code == 200){
          renderData() ;// 局部刷新页面
        }
      }
    })
  })
</script>
