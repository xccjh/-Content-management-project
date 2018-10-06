<?php
  require('../functions.php');
  checkLogin();
 ?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>评论列表</title>
  <?php include './inc/css.php' ?>
  <?php include './inc/script.php' ?>
</head>
<body>
  <div class="main">
    <?php include './inc/navBar.php'; ?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>所有评论</h1>
      </div>
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
      <div class="page-action">
          <button class="btn btn-danger btn-sm delAll" style="display: none">批量删除</button>
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
            <th class="text-center" width="40"><input type="checkbox" id="toggleChk" ></th>
            <th>作者</th>
            <th>评论</th>
            <th>评论在</th>
            <th>提交于</th>
            <th>状态</th>
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
<script type="text/template" id="commListTmp">
  {{each data as val key}}
      <tr class="danger">
        <td class="text-center"><input type="checkbox" class="chk" value="{{val.id}}"></td>
        <td>{{val.author}}</td>
        <td>{{val.content}}</td>
        <td>《Hello world》</td>
        <td>{{val.created}}</td>
        {{if val.status =='0'}}
          <td>批准</td>
        {{else if val.status =='1'}}
          <td>拒绝</td>
        {{else if val.status =='2'}}
          <td>正在审核</td>
        {{/if}}
        <td class="text-center">
          <button class="btn btn-info btn-xs pz" data-id="{{val.id}}">批准</button>
          <button href="javascript:;" class="btn btn-danger btn-xs btnDel" data-id="{{val.id}}">删除</button>
        </td>
      </tr>
   {{/each}}
</script>
<script type="text/javascript">
  renderData();
  function renderData(){
  // 发送ajax请求
  $.ajax({
    type:'get',
    url:'/admin/int/commentsInt.php',
    dataType:'json',
    success:function(res){
      if(res&&res.code == 200){
        // 根据数据渲染页面
        var htmlStr = template('commListTmp',res);
        // 渲染页面
        $('tbody').html(htmlStr);
        $('.delAll').hide();
        $('#toggleChk').prop('checked',false);
      }
    }
  })}
  //**************进行删除操作的执行*******************
  $('tbody').on('click','.btnDel',function(){
    // 对于模板中的元素直接添加事件无效,得使用委托的方式来注册事件
    // 也就是把事件注册给父级元素,让子元素来触发
    var id = $(this).attr('data-id');// 获取当前按钮的id
    $.ajax({
      type:'get',
      url:'/admin/int/commentsInt.php',
      data:{
        action:'delCtg',
        id: id
      },
      dataType:'json',
      success:function(res){
        if(res&&res.code == 200){
           renderData(); // 渲染局部页面
        }
      }
    })
  })
  //**************进行批准操作的执行*******************
  $('tbody').on('click','.pz',function(){
    // 对于模板中的元素直接添加事件无效,得使用委托的方式来注册事件
    // 也就是把事件注册给父级元素,让子元素来触发
    var id = $(this).attr('data-id');// 获取当前按钮的id
    $.ajax({
      type:'get',
      url:'/admin/int/commentsInt.php',
      data:{
        action:'pz',
        id: id,
      },
      dataType:'json',
      success:function(res){
          console.log('11111');
           renderData(); // 渲染局部页面
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
        ids.push($(ele).val());
      }
    })
    // 2. 发送ajax请求
    $.ajax({
      type:'get',
      url:'/admin/int/commentsInt.php',
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
