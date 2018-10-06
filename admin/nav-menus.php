<?php
  require('../functions.php');
  checkLogin();
 ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Navigation menus &laquo; Admin</title>
  <?php include './inc/css.php' ?>
  <?php include './inc/script.php' ?>
</head>
<body>
  <div class="main">
   <?php include './inc/navBar.php' ?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>导航菜单</h1>
      </div>
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
      <div class="row">
        <div class="col-md-4">
          <form>
            <h2>添加新导航链接</h2>
            <div class="form-group">
              <label for="text">文本</label>
              <input id="text" class="form-control" name="text" type="text" placeholder="文本">
            </div>
            <div class="form-group">
              <label for="title">标题</label>
              <input id="title" class="form-control" name="title" type="text" placeholder="标题">
            </div>
            <div class="form-group">
              <label for="link">链接</label>
              <input id="link" class="form-control" name="link" type="text" placeholder="链接">
            </div>
            <div class="form-group">
              <label for="icon">图标</label>
              <input id="icon" class="form-control" name="icon" type="text" placeholder="链接">
            </div>
            <div class="form-group">
              <button class="btn btn-primary" id="btnAdd" type="submit">添加</button>
            </div>
          </form>
        </div>
        <div class="col-md-8">
          <div class="page-action">
            <!-- show when multiple checked -->
            <button class="btn btn-danger btn-sm delAll" href="javascript:;" style="display: none">批量删除</button>
          </div>
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th class="text-center" width="40"><input type="checkbox" id="toggleChk"></th>
                <th>文本</th>
                <th>标题</th>
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
</body>
</html>
<script type="text/template" id="menusListTmp">
  {{each data as val key}}
      <tr>
        <td class="text-center"><input type="checkbox" class='chk' data-id="{{key}}"></td>
        <td><i class="{{val.icon}}"></i>{{val.text}}</td>
        <td>{{val.title}}</td>
        <td>{{val.link}}</td>
        <td class="text-center">
          <button class="btn btn-danger btn-xs btnDel" data-id="{{key}}">删除</button>
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
    url:'/admin/int/nav-menusInt.php',
    dataType:'json',
    success:function(res){
      if(res&&res.code == 200){
       var htmlStr = template('menusListTmp',res);
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
      url:'/admin/int/nav-menusInt.php',
      data:{
        index:id
      },
      dataType:'json',
      success:function(res){
        if(res&&res.code == 200){
          // 重新渲染页面
          var htmlStr = template('menusListTmp',res);
          $('tbody').html(htmlStr);
        }
      }
    })
  })
  /**
   * 思路：
   * 1. 给按钮注册事件
   * 2. 发送请求, 将当前这条信息所属的索引值传到后台
   * 3. 后台要根据传输过来的索引,到数组中删除此项
   * 4. 将删除后的数据传给前台
   * 5. 重新渲染页面
   */
  // ***************给添加按钮注册事件*******************
  $('#btnAdd').on('click',function(){
    $.ajax({
      type:'post',
      url:'/admin/int/nav-menusInt.php',
      data:$('form').serialize(),
      dataType:'json',
      success:function(res){
        if(res&&res.code == 200){
          // 数据回来后,要重新渲染页面
          var htmlStr = template('menusListTmp',res);
          $('tbody').html(htmlStr);
        }
      }
    })
    return false;// 阻止浏览器的默认刷新行为
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
      url:'/admin/int/nav-menusInt.php',
      data:{
        ids:ids,
        action:'delAll'
      },
      dataType:'json',
      success:function(res){
        if(res&&res.code == 200){
          console.log('111');
          renderData() ;// 局部刷新页面
        }
      }
    })
  })
</script>
