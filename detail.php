<?php include './inc/head.php' ?>
<?php include './inc/aside.php' ?>
<style type="text/css">
     .aside .random>li {
      height: 80px;
     }
     .aside .discuz li {
        height: 60px;
     }
     .aside .discuz .txt {
      line-height: 15px;
     }
</style>
    <div class="content">
      <div id="article">
        
      </div>
      <div class="panel hots">
        <h3>热门推荐</h3>
        <ul id="ull">
        </ul>
      </div>
    </div>
<?php include './inc/footer.php' ?>
<?php include './inc/script.php' ?>
  </div>
<script type="text/template" id="hotTmp">
      {{each data as val key}}
          <li>
            <a href="{{val.href}}">
              <img src="{{val.img}}" alt="{{val.alt}}">
              <span>{{val.title}}</span>
            </a>
          </li>
        {{/each}}
</script>
<script type="text/template" id="wzTmp">
      {{each data as val key}}
        <div class="article" style="margin-bottom: -10px;">
        <div class="breadcrumb">
          <dl>
            <dt>当前位置：</dt>
            <dd><a href="javascript:;">{{val.name}}</a></dd>
            <dd>{{val.title}}</dd>
          </dl>
        </div>
        <h2 class="title">
          <a href="javascript:;">{{val.title}}</a>
        </h2>
        <div class="meta">
          <span>{{val.nickname}} 发布于 {{val.created}}</span>
          <span>分类: <a href="javascript:;">{{val.name}}</a></span>
          <span>阅读: ({{val.views}})</span>
          <span>评论: ({{val.likes}})</span>
        </div>
      </div>
      <div style="font-size: 16px;text-indent: 32px;" id="articlecontent">
        {{val.content}}
      </div>
      {{/each}}
</script>
<script type="text/javascript">
// 发送ajax请求,获取热门推荐数据
  $.ajax({
    type:'get',
    dataType:'json',
    url:'/admin/int/hotInt.php',
    success:function(res){
      if(res&&res.code == 200){
        var htmlStr = template('hotTmp',res);// 第一个参数是模板的id,第二个参数必须是对象
        $('#ull').html(htmlStr);
      }
  }
    })
// 发送ajax请求,获取最新发布数据
   $.ajax({
    type:'get',
    url:'/inc/detailInt.php',
    dataType:'json',
    success:function(res){
      if(res&&res.code == 200){
        // 将数据渲染在页面上
        template.config("escape", false);
        var htmlStr = template('wzTmp',res);
        console.log(htmlStr);
        $('#article').html(htmlStr); // 渲染页面
      }
    }
    })
</script>
</body>
</html>
