<?php 
  require('../functions.php');
  checkLogin();
 ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Settings &laquo; Admin</title>
  <?php include './inc/css.php' ?>
  <?php include './inc/script.php' ?>
</head>
<body>
  <script>NProgress.start()</script>

  <div class="main">
    <?php include './inc/navBar.php' ?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>网站设置</h1>
      </div>
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
      <form class="form-horizontal">
        
      </form>
    </div>
  </div>

  <?php include './inc/aside.php' ?>
  <script>NProgress.done()</script>
</body>
</html>
<script type="text/template" id="settingsTmp">
  <div class="form-group">
          <label for="site_logo" class="col-sm-2 control-label">网站图标</label>
          <div class="col-sm-6">
            <input id="site_logo" name="site_logo" type="hidden">
            <label class="form-image">
              <input id="logo" type="file">
              {{if data[1].value}}
                <img src="{{data[1].value}}">
                {{else}}
                <img src="../uploads/aa.jpg">
               {{/if}}
              <i class="mask fa fa-upload"></i>
            </label>
          </div>
        </div>
        <div class="form-group">
          <label for="site_name" class="col-sm-2 control-label">站点名称</label>
          <div class="col-sm-6">
            <input id="site_name" value="{{data[2].value}}" name="site_name" class="form-control" type="type" placeholder="站点名称">
          </div>
        </div>
        <div class="form-group">
          <label for="site_description" class="col-sm-2 control-label">站点描述</label>
          <div class="col-sm-6">
            <textarea id="site_description" name="site_description" class="form-control" placeholder="站点描述" cols="30" rows="6">{{data[3].value}}</textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="site_keywords" class="col-sm-2 control-label">站点关键词</label>
          <div class="col-sm-6">
            <input id="site_keywords" value="{{data[4].value}}" name="site_keywords" class="form-control" type="type" placeholder="站点关键词">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">评论</label>
          <div class="col-sm-6">
            <div class="checkbox">
              <label><input id="comment_status" name="comment_status" type="checkbox" {{if data[6].value==1}}checked {{/if}}>开启评论功能</label>
            </div>
            <div class="checkbox">
              <label><input id="comment_reviewed" name="comment_reviewed" type="checkbox" {{if data[7].value==1}}checked {{/if}}>评论必须经人工批准</label>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-6">
            <button type="submit" class="btn btn-primary">保存设置</button>
          </div>
        </div>
</script>
<script type="text/javascript">
  $.ajax({
    type:'get',
    url:'/admin/int/settingsInt.php',
    dataType:'json',
    success:function(res){
      if(res&&res.code == 200){
        var htmlStr = template('settingsTmp',res);
        $('form').html(htmlStr);

      }
    }
  });


  // ***************上传图片的功能 ***************
  $('form').on('change','input[type=file]',function(){
    // alert(112233)
    // 1. 先创建一个对象
    var data = new FormData();

    // 2. 将上传的图片存在data里面
    data.append('site_logo',this.files[0]);

    // 3. 创建异步对象
    var xhr = new XMLHttpRequest();

    // 4. 设置请求行
    xhr.open('post','/admin/int/settingsInt.php');

    // 5. 设置请求头，这一步可以省略

    // 6. 设置请求体 就是发送给服务器的数据
    xhr.send(data);

    // 7. 监视异步对象的变化 
    xhr.onreadystatechange = function () {
      if(xhr.status==200 && xhr.readyState == 4){
        $('form img').attr('src',xhr.responseText); // 渲染页面中的图片

        // 将图片路径还得存到隐藏域 
        $('input[type=hidden]').val(xhr.responseText);
      }
    }
  })

  // **********给保存按钮注册事件,上传数据****************
  $('form').on('click','button[type=submit]',function(){
    // alert(1233);
    $.ajax({
      type:'post',
      url:'/admin/int/settingsInt.php',
      data:$('form').serialize(),
      dataType:'json',
      success:function(res){
        if(res&&res.code == 200){
          alert('更新成功...');
          location.reload(true);
        }
      }
    })
    return false;// 阻止页面的刷新行为
  })
</script>
