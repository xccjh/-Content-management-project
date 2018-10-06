<?php 
  require('../functions.php');
  checkLogin();
  // 2. 查询数据库渲染页面
   $arr = query('select * from users');
 ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Slides &laquo; Admin</title>
  <?php include './inc/css.php' ?>
  <?php include './inc/script.php' ?>
</head>
<body>
  <script>NProgress.start()</script>
  <div class="main">
    <?php include './inc/navBar.php' ?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>图片轮播</h1>
      </div>
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
      <div class="row">
        <div class="col-md-4">
          <form>
            <h2>添加新轮播内容</h2>
            <div class="form-group">
              <label for="image">图片</label>
              <!-- show when image chose -->
              <img class="help-block thumbnail" style="display:none" >
              <input id="feature" class="form-control" name="image" type="file">
              <input  name="image" type="hidden" id="thumb">
            </div>
            <div class="form-group">
              <label for="text">文本</label>
              <input id="text" class="form-control" name="text" type="text" placeholder="文本">
            </div>
            <div class="form-group">
              <label for="link">链接</label>
              <input id="link" class="form-control" name="link" type="text" placeholder="链接">
            </div>
            <div class="form-group">
              <button class="btn btn-primary" type="submit" id="btnAdd">添加</button>
            </div>
          </form>
        </div>
        <div class="col-md-8">
          <div class="page-action">
            <!-- show when multiple checked -->
            <a class="btn btn-danger btn-sm delAll" href="javascript:;" style="display: none">批量删除</a>
          </div>
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th class="text-center" width="40"><input type="checkbox" id="toggleChk" ></th>
                <th class="text-center">图片</th>
                <th>文本</th>
                <th>链接</th>
                <th class="text-center" width="100">操作</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <?php include './inc/aside.php' ?>
  <script>NProgress.done()</script>
  <script type="text/template" id="slidesListTmp">
 {{each data as val key}}
    <tr>
      <td class="text-center"><input type="checkbox" class='chk' data-id="{{key}}"></td>
      <td class="text-center"><a href="{{val.link}}"><img class="slide" src="{{val.image}}"></a></td>
      <td>{{val.text}}</td>
      <td>#</td>
      <td class="text-center">
        <a href="javascript:;" class="btn btn-danger btn-xs btnDel" data-id="{{key}}">删除</a>
      </td>
    </tr>
{{/each}}
  </script>
  <script type="text/javascript">
  // 发送请求,来渲染页面
  renderData();
  function renderData(){
  $.ajax({
    type:'get',
    url:'/admin/int/slidesInt.php',
    dataType:'json',
    success:function(res){
      if(res&&res.code == 200){
       var htmlStr = template('slidesListTmp',res);
       $('tbody').html(htmlStr);
       $('.delAll').hide();
       $('#toggleChk').prop('checked',false);
      }
    }
  })}
  //**************给删除按钮注册事件********************
  // 1. 给按钮注册事件
  $('tbody').on('click','.btnDel',function(){
    // 2. 获取索引
    var id = $(this).attr('data-id');
    // 3. 发请求给后台服务器
    $.ajax({
      type:'get',
      url:'/admin/int/slidesInt.php',
      data:{
        index:id
      },
      dataType:'json',
      success:function(res){
        if(res&&res.code == 200){
          // 重新渲染页面
          var htmlStr = template('slidesListTmp',res);
          $('tbody').html(htmlStr);
          $('.delAll').hide();
          $('#toggleChk').prop('checked',false);
        }
      }
    })
  })
 // ***************给添加按钮注册事件*******************
  $('#btnAdd').on('click',function(){
    $.ajax({
      type:'post',
      url:'/admin/int/slidesInt.php',
      data:$('form').serialize(),
      dataType:'json',
      success:function(res){
        if(res&&res.code == 200){
          // 数据回来后,要重新渲染页面
          var htmlStr = template('slidesListTmp',res);
          $('tbody').html(htmlStr);
          $('.delAll').hide();
          $('#toggleChk').prop('checked',false);
        }
      }
    })
    return false;// 阻止浏览器的默认刷新行为
  })
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
     xhr.open('post','/admin/uploadFile.php');
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
          $('.delAll').hide();
          $('#toggleChk').prop('checked',false);
       }
     }
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
  // 3. 当被选中的小按钮的个数大于1个的时候,批量删除的按钮也应该被选中
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
  // 4. 给批量删除按钮注册事件
  $('.delAll').on('click',function(){
    var ids = []; // 这个数组是用来存储所有的被选中的小按钮的id值
    $('.chk').each(function(index,ele){ // ele是DOM对象
      if($(ele).prop('checked')){
        ids.push($(this).attr('data-id'));
      }
    })
      console.log(ids);
    // 2. 发送ajax请求
    $.ajax({
      type:'get',
      url:'/admin/int/slidesInt.php',
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
</body>
</html>
