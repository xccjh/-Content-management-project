<style type="text/css">
   .discuz .txt p {
      text-overflow:ellipsis;
      white-space:nowrap;
      overflow:hidden;
   }
   </style>
 <div class="aside">
      <div class="widgets">
        <h4>搜索</h4>
        <div class="body search">
          <form>
            <input type="text" class="keys" placeholder="输入关键字">
            <input type="submit" class="btn" value="搜索">
          </form>
        </div>
      </div>
      <div class="widgets">
        <h4>随机推荐</h4>
        <ul class="body random">
        </ul>
      </div>
      <div class="widgets">
        <h4>最新评论</h4>
        <ul class="body discuz">
        </ul>
      </div>
</div>
<?php include './inc/script.php' ?>
<script type="text/template"  id="commListTmp">
  {{each data as val key}}
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="{{val.images}}" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>{{val.author}}</span>{{val.created}}说:
                </p>
                <p>{{val.content}}</p>
              </div>
            </a>
          </li>
  {{/each}}
</script>
<script type="text/template" id="listTmp">
  {{each data as val key}}
  <li><a href="javascript:;"><span class="{{val.icon}}"></span>{{val.text}}</a></li>
  {{/each}}
</script>
<script type="text/template"  id="randomTmp">
    {{each data as val key}}
            <li>
            <a href="{{val.href}}">
              <p class="title">{{val.title}}</p>
              <p class="reading">{{val.reading}}</p>
              <div class="pic">
                <img src="{{val.src?val.src:"uploads/xccjh.png"}}" alt="{{val.alt}}">
              </div>
            </a>
          </li>
    {{/each}}
</script>
<script type="text/javascript">
//评论内容发送ajax请求
  $.ajax({
    type:'get',
    url:'/admin/int/commentsInt.php',
    dataType:'json',
    success:function(res){
      if(res&&res.code == 200){
        // 根据数据渲染页面
        var htmlStr = template('commListTmp',res);
        // 渲染页面
        $('.discuz').html(htmlStr);
      }
    }
  })
//随机推荐发送ajax请求
  $.ajax({
    type:'get',
    url:'/int/random.php',
    dataType:'json',
    success:function(res){
      if(res&&res.code == 200){
        // 根据数据渲染页面
        var htmlStr = template('randomTmp',res);
        // 渲染页面
        $('.random').html(htmlStr);
      }
    }
  })
// 发送ajax请求,获取导航数据
  $.ajax({
    type:'get',
    url:'/admin/int/nav-menusInt.php',
    dataType:'json',
    success:function(res){
      var htmlStr = template('listTmp',res);
      $('#topNavList').html(htmlStr);
      $('#navList').html(htmlStr);
    }
  });
</script>