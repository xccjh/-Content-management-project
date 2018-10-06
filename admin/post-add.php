<?php
  require('../functions.php');
  checkLogin();
 ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>添加文章</title>
  <?php include './inc/css.php' ?>
  <?php include './inc/script.php' ?>
  <style type="text/css">
      #content {
        padding: 0;
      }
      #edui1 {
      padding: 0;
      width: auto!important;
      }
  </style>
</head>
<body style="overflow: scroll;height:800px; " >
  <div class="main">
    <?php include './inc/navBar.php' ?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>写文章</h1>
      </div>
      <form class="row">
        <div class="col-md-9">
          <div class="form-group">
            <label for="title">标题</label>
            <input id="title" class="form-control input-lg" name="title" type="text" placeholder="文章标题">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['userInfo']['id'] ?>">
          </div>
          <div class="form-group">
            <label for="content">标题</label>
            <textarea id="content" class="form-control input-lg" name="content" cols="30" rows="10" placeholder="内容"></textarea>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="slug">别名</label>
            <input id="slug" class="form-control" name="slug" type="text" placeholder="别名">
          </div>
          <div class="form-group">
            <label for="feature">特色图像</label>
            <!-- show when image chose -->
            <img class="help-block thumbnail" style="display: none">
            <input id="feature" class="form-control"  type="file">
            <input  name="feature" type="hidden" id="thumb">
          </div>
          <div class="form-group" id="cateList">
          </div>
          <div class="form-group">
            <label for="created">发布时间</label>
            <input id="created" class="form-control" name="created" type="datetime-local">
          </div>
          <div class="form-group">
            <label for="status">状态</label>
            <select id="status" class="form-control" name="status">
              <option value="0">草稿</option>
              <option value="1">已发布</option>
            </select>
          </div>
          <div class="form-group">
            <button class="btn btn-primary" type="submit" id="btnSave">保存</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <?php include './inc/aside.php' ?>
</body>
</html>
<script type="text/template" id="cateListTmp">
    <label for="category">所属分类</label>
      <select id="category" class="form-control" name="category_id">
        {{each data as val key}}
          <option value="{{val.id}}">{{val.name}}</option>
        {{/each}}
      </select>
</script>
<script type="text/template" id="cateListTmp1">
  <div class="col-md-9">
          <div class="form-group">
            <label for="title">标题</label>
            <input id="title" value="{{dataPosts[0].title}}" class="form-control input-lg" name="title" type="text" placeholder="文章标题">
            <input type="hidden" name="id" value="{{dataPosts[0].id}}">
          </div>
          <div class="form-group" id="art">
            <label for="content">标题</label>
            <textarea id="content" class="form-control input-lg" name="content" cols="30" rows="10" >{{dataPosts[0].content}}</textarea>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="slug">别名</label>
            <input id="slug" value="{{dataPosts[0].slug}}" class="form-control" name="slug" type="text" placeholder="别名">
          </div>
          <div class="form-group">
            <label for="feature">特色图像</label>
            <!-- show when image chose -->
            {{if dataPosts[0].feature}}
              <img class="help-block thumbnail" src="{{dataPosts[0].feature}}" >
            {{else}}
              <img class="help-block thumbnail" style="display:none" >
            {{/if}}
            <input id="feature" class="form-control"  type="file">
            <input  name="feature" type="hidden" id="thumb">
          </div>
          <div class="form-group" id="cateList">
            <label for="category">所属分类</label>
            <select id="category" class="form-control" name="category_id">
              {{each dataCates as val key}}
                <option value="{{val.id}}" {{if val.id==dataPosts[0].category_id}} selected {{/if}}>{{val.name}}</option>
              {{/each}}
            </select>
          </div>
          <div class="form-group">
            <label for="created">发布时间</label>
            <input id="created" value="{{dataPosts[0].created.replace(" ","T")}}" class="form-control" name="created" type="datetime-local">
          </div>
          <div class="form-group">
            <label for="status">状态</label>
            <select id="status" class="form-control" name="status">
              <option value="0">草稿</option>
              <option value="1">已发布</option>
            </select>
          </div>
          <div class="form-group">
            {{if dataPosts[0].id}}
            <button class="btn btn-primary" type="submit" id="btnUpdate">修改</button>
            {{else }}
              <button class="btn btn-primary" type="submit" id="btnSave">保存</button>
             {{/if}}
          </div>
        </div>
</script>
<script type="text/javascript" src="../assets/vendors/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../assets/vendors/ueditor/ueditor.all.js"></script>
<script type="text/javascript">
var ue = UE.getEditor('content',{
  initialFrameHeight:415,
  autoHeight: false
});
</script>
<script type="text/javascript">
// ***********获取URL中的指定参数并发送请求******************
  var str = location.search; // 存在两种情况,一个是有参数，一个是没有参数
  if(!str){  // 如果str="",那么此时就是添加功能,仅仅是有一个页面的分类渲染
    // 发送请求,获取分类数据,渲染页面
      $.ajax({
        type:'get',
        url:'/admin/int/post-addInt.php',
        dataType:'json',
        success:function(res){
          // 根据返回来的数据进行拼接模板
          var htmlStr = template('cateListTmp',res); // 准备模板字符串
          $('#cateList').html(htmlStr); // 渲染数据
        }
      })
  }else {  // 说明此时是一个编辑的操作
    // 应该先获取地址栏中的action和postsId信息,向服务器发请求
    // 1. 去掉?,只要后面的内容
    str = str.substr(1);  // action=editPosts&postsId=6
    // console.log(str);
    // 2. 提供数据
    var arr = str.split('&');
    // console.log(arr); //["action=editPosts", "postsId=6"]
    // 3. 进一步提取数据
    var obj = {};
    for(var i=0;i<arr.length;i++){
      var temp = arr[i].split('=');
      // console.log(temp); // ["action", "editPosts"]  ["postsId", "6"]
      obj[temp[0]] = temp[1];
      // console.log(obj);  // {action: "editPosts", postsId: "6"}
    }
    // 4. 向后台服务器发送请求
    $.ajax({
      type:'get',
      url:'/admin/int/post-addInt.php',
      data:{
        action:obj.action,
        id:obj.postsId
      },
      dataType:'json',
      success:function(res){
        if(res&&res.code == 200){
          // 根据返回来的数据渲染模板
          var htmlStr = template('cateListTmp1',res);
          $('form').html(htmlStr);
          // *************通过委托的方式给修改按钮注册事件*********************
          $('form').on('click','#btnUpdate',function(){
            $.ajax({
              type:'post',
              url:'/admin/int/post-addInt.php',
              data:$('form').serialize(),
              dataType:'json',
              success:function(res){
                // 接收回来的数据，跳转到所有文章页面
                if(res&&res.code == 200){
                  location.href='/admin/posts.php';
                }
              }
            });
            return false;// 阻止页面的刷新
          })
        }
      }
    })
  }
  // *****************下面是图片或是文件上传*********************
  // 1. 给按钮注册事件
  // $('#feature').on('change',function(){
  $('form').on('change','#feature',function(){ // 使用委托的方式来注册事件
    // 2. 创建对象
     var data = new FormData();
     // console.log(this.files[0]); // this.files里面是所有的文件列表
     // 3. 将要上传的文件添加到里面
     data.append('feature',this.files[0]);
     // 4. 创建异步对象
     var xhr = new XMLHttpRequest();
     // 5. 设置请求行
     xhr.open('post','/admin/int/post-addUploadFile.php');
     // 6. 设置请求头  这一步是可以省略的,是不用设置的
     // 7. 设置请求体  就是往后台发送数据
     xhr.send(data);
     // 8. 监视异步对象的变化,注册监听事件
     xhr.onreadystatechange = function () {
       if(xhr.status == 200 && xhr.readyState == 4){
         // 要将上传的图片展示在当前的这个位置
         $('.thumbnail').attr('src',xhr.responseText).show();
         // 将图片在服务器文件中的路径存在当前的表单当中
         $('#thumb').val(xhr.responseText);
       }
     }
  })
  // ********************给保存按钮注册事件******************************
  // 1. 给保存按钮注册事件
  $('#btnSave').on('click',function(){
    // 2.发送ajax请求
    $.ajax({
      type:'post',
      url:'/admin/int/post-addInt.php',
      data:$('form').serialize(),
      dataType:'json',
      success:function(res){
        if(res&&res.code == 200){
          // 3. 请求成功 跳转到所有文章的页面
          location.href='./posts.php';
        }
      }
    })
    return false;// 阻止页面的默认刷新 行为
  })
</script>
<!-- <script type="text/javascript">
      var str1=`<label for="content">内容</label><script id="container" name="content" type="text/plain">
        这里写你的初始化内容
    </script>`;
    $('#art').html(str1);
</script> -->
<!--     <script id="container" name="content" type="text/plain">
        这里写你的初始化内容
    </script> -->

