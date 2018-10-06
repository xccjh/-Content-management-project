<?php
  require('../functions.php');
  checkLogin();
 ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>random</title>
  <style type="text/css">
    .table>tbody>tr>td {
      text-overflow:ellipsis;
      white-space:nowrap;
      overflow:hidden;
    }
  </style>
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
          <form id="formData">
            <h2>添加推荐</h2>
            <div class="form-group">
              <label for="title">标题</label>
              <input id="title" class="form-control" name="title" type="text" placeholder="标题">
            </div>
            <div class="form-group">
              <label for="reading">阅读</label>
              <input id="reading" class="form-control" name="reading" type="text" placeholder="阅读">
            </div>
            <div class="form-group">
              <label for="src">图片链接</label>
              <input id="src" class="form-control" name="src" type="text" placeholder="图片链接">
            </div>
            <div class="form-group">
              <label for="content">内容</label>
              <input id="content" class="form-control" name="content" type="text" placeholder="内容">
            </div>
            <div class="form-group">
              <label for="href">文字链接</label>
              <input id="href" class="form-control" name="href" type="text" placeholder="文字链接">
            </div>
            <div class="form-group">
              <label for="alt">补充说明</label>
              <input id="alt" class="form-control" name="alt" type="text" placeholder="补充说明">
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
          <table class="table table-striped table-bordered table-hover" style="table-layout:fixed ;">
            <thead>
              <tr>
                <th class="text-center" width="40"><input type="checkbox" id="toggleChk"></th>
                <th>标题</th>
                <th>阅读</th>
                <th>图片链接</th>
                <th>内容</th>
                <th>文字连接</th>
                <th>补充说明</th>
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
<script type="text/template" id="randomTmp">
  {{each data as val key}}
      <tr>
        <td class="text-center"><input type="checkbox" class='chk' data-id="{{val.id}}"></td>
        <td>{{val.title}}</td>
        <td>{{val.reading}}</td>
        <td>{{val.src}}</td>
        <td>{{val.content}}</td>
        <td>{{val.href}}</td>
        <td>{{val.alt}}</td>
        <td class="text-center">
          <button class="btn btn-info btn-xs btnEdit" data-id="{{val.id}}" >编辑</button>
          <button class="btn btn-danger btn-xs btnDel" data-id="{{val.id}}">删除</button>
        </td>
      </tr>
   {{/each}}
</script>
<script type="text/javascript">
  //****************这是页面渲染的ajajx请求***********************************
  renderData();
  function renderData(){
    $.ajax({
      type:'get',
      dataType:'json',
      url:'/int/random.php',
      success:function(res){
        if(res&&res.code == 200){
          var htmlStr = template('randomTmp',res);// 第一个参数是模板的id,第二个参数必须是对象
          $('tbody').html(htmlStr);
          $('.delAll').hide();
          $('#toggleChk').prop('checked',false);
        }
      }
    })
  }
  //**************添加的操作*********************
  // 1. 给添加按钮注册事件
  $('#btnAdd').on('click',function(){
    // 2. 发送ajax请求
    $.ajax({
      type:'post',
      url:'/int/random.php',
      data: $('#formData').serialize(), // 一次性获取表单中所有的具有name属性的input的值
      dataType:'json',
      success:function(res){
        if(res&&res.code == 200){
          renderData();// 刷新局部页面
          return false;
        }
      }
    })
    // {
    // "code":200,"msg":"\u67e5\u8be2\u6210\u529f...","data":
    // [
    // {"id":"1","slug":"uncategorized","name":"\u672a\u5206\u7c7b"},
    // {"id":"2","slug":"funny","name":"\u5947\u8da3\u4e8b"},
    // {"id":"3","slug":"living","name":"\u4f1a\u751f\u6d3b"},
    // {"id":"4","slug":"travel","name":"\u7231\u65c5\u884c"}
    // ]
    // }
    // Array
    // (
    //     [name] =>
    //     [slug] =>
    // )
    return false; // 阻止浏览器的默认刷新行为
  })
  //**************进行删除操作的执行*******************
  $('tbody').on('click','.btnDel',function(){
    // 对于模板中的元素直接添加事件无效,得使用委托的方式来注册事件
    // 也就是把事件注册给父级元素,让子元素来触发
    var id = $(this).attr('data-id');// 获取当前按钮的id
    $.ajax({
      type:'get',
      url:'/int/random.php',
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
  // *************下面是编辑的操作********************
  // 1. 给按钮注册事件 得用委托的方式注册 先渲染当前这条数据在页面上
  $('tbody').on('click','.btnEdit',function(){
    // 2. 获取id
    var id = $(this).attr('data-id');
    // 3. 发送ajax请求
    $.ajax({
      type:'get',
      url:'/int/random.php',
      data:{
        action:'edit',
        id: id
      },
      dataType:'json',
      success:function(res){
        if(res&&res.code == 200){
          // 4. 将返回来的数据渲染在页面上
          $('#title').val(res.data[0].title);
          $('#reading').val(res.data[0].reading);
          $('#src').val(res.data[0].src);
          $('#content').val(res.data[0].content);
          $('#href').val(res.data[0].href);
          $('#alt').val(res.data[0].alt);
          $('#btnAdd').html('修改').attr('id','btnUpdate');
          // 每次在添加隐藏域之前先删除掉这个隐藏域,再添加隐藏域
          $('input[name=id]').remove();
          var str = '<input type="hidden" value="'+res.data[0].id+'" name="id">';
          $('#formData').prepend(str);
        }
      }
    })
  })
  // *************单击按钮进行更新******************
  // 1. 给按钮注册事件
  $('#btnUpdate').on('click',function(){
    // 2. 发送ajax请求
    $.ajax({
      type:'post',
      url:'/int/random.php',
      data:$('#formData').serialize(),
      dataType:'json',
      success:function(res){
        // 3. 更新成功之后要渲染页面
        if(res&&res.code == 200){
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
      url:'/int/random.php',
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
