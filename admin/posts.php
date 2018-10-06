<?php
  // 1.引入外部文件
  require('../functions.php');
  // 2. 检测用户是否登陆
  checkLogin();
 ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>所有文章</title>
  <?php include './inc/css.php' ?>
  <?php include './inc/script.php' ?>
</head>
<body>
  <script>NProgress.start()</script>
  <div class="main">
    <?php include './inc/navBar.php' ?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>所有文章</h1>
        <a href="post-add.php" class="btn btn-primary btn-xs">写文章</a>
      </div>
      <div class="page-action">
        <!-- show when multiple checked -->
        <button class="btn btn-danger btn-sm delAll" href="javascript:;" style="display: none">批量删除</button>
        <form class="form-inline">
          <select name="" class="form-control input-sm">
            <option value="">所有分类</option>
            <option value="">未分类</option>
          </select>
          <select name="" class="form-control input-sm">
            <option value="">所有状态</option>
            <option value="">草稿</option>
            <option value="">已发布</option>
          </select>
          <button class="btn btn-default btn-sm">筛选</button>
        </form>
        <ul class="pagination pagination-sm pull-right">
          <li><a href="#">上一页</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">下一页</a></li>
        </ul>
      </div>
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th class="text-center" width="40"><input type="checkbox" id="toggleChk"></th>
            <th>标题</th>
            <th>作者</th>
            <th>分类</th>
            <th class="text-center">发表时间</th>
            <th class="text-center">状态</th>
            <th class="text-center" width="100">操作</th>
          </tr>
        </thead>
        <tbody>
       
       
        </tbody>
      </table>
    </div>
  </div>
  <?php include './inc/aside.php' ?>
</body>
</html>
<script type="text/template" id="postsListTmp">
  {{each data as val key}}
      <tr>
        <td class="text-center"><input type="checkbox" class='chk' value="{{val.id}}"></td>
        <td>{{val.title}}</td>
        <td>{{val.nickname}}</td>
        <td>{{val.name}}</td>
        <td class="text-center">{{val.created}}</td>
        {{if val.status == '1'}}
          <td class="text-center">已发布</td>
        {{else if val.status == '0'}}
          <td class="text-center">草稿</td>
        {{/if}}
        <td class="text-center">
          <a href="/admin/post-add.php?action=editPosts&postsId={{val.id}}" class="btn btn-default btn-xs">编辑</a>
          <button class="btn btn-danger btn-xs btnDel" data-id="{{val.id}}">删除</button>
        </td>
      </tr>
  {{/each}}
</script>
<script type="text/javascript">
  // 发送请求,获取整个页面的数据
  renderData();
  function renderData(){
     $.ajax({
      type:'get',
      url:'/admin/int/postsInt.php',
      dataType:'json',
      success:function(res){
        if(res&&res.code == 200){
          // 将数据渲染在页面上
          var htmlStr = template('postsListTmp',res);// 准备模板字符串
          $('tbody').html(htmlStr); // 渲染页面
          $('.delAll').hide();
          $('#toggleChk').prop('checked',false);
        }
      }
    })
  }
  // *********************删除功能的实现*****************************
  // 1. 给删除按钮注册事件
  $('tbody').on('click','.btnDel',function(){
    // 2. 获取当前按钮的id
    var id = $(this).attr('data-id');
    // 3. 发送ajax请求
    $.ajax({
      type:'get',
      url:'/admin/int/postsInt.php',
      data:{
        id:id,
        action:'delPosts'
      },
      dataType:'json',
      success:function(res){
        if(res&&res.code == 200){
          // 重新渲染当前页面，也就是重新刷新 当前页面
          renderData();
        }
      }
    })
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
      url:'/admin/int/postsInt.php',
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
