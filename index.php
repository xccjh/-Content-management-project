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
    .main p {
     text-overflow:ellipsis;
      white-space:nowrap;
      overflow:hidden;
   }
   .content .extra a span {
    text-decoration: none;
   }
   .content .extra a span:hover {
    text-decoration: none;
   }
   .content .panel .entry {
    overflow: hidden;
    height: 260px;
   }
</style>
<div class="content">
<div class="swipe">
  <ul class="swipe-wrapper">
  </ul>
  <p class="cursor">
  </p>
  <a href="javascript:;" class="arrow prev"><i class="fa fa-chevron-left"></i></a>
  <a href="javascript:;" class="arrow next"><i class="fa fa-chevron-right"></i></a>
</div>
<div class="panel focus">
  <h3>焦点关注</h3>
  <ul id="ulll">
  </ul>
</div>
<div class="panel top">
  <h3>一周热门排行</h3>
  <ol id="oll">
  </ol>
</div>
<div class="panel hots">
  <h3>热门推荐</h3>
  <ul id="ull">
  </ul>
</div>
<div class="panel new">
  <h3>最新发布</h3>
  <div id="new">
  </div>
</div>
</div>
<?php include './inc/footer.php' ?>
<?php include './inc/script.php' ?>
</div>
<script type="text/javascript">
    window.onload=function(){
    // 上/下一张
    $('.swipe .arrow').on('click', function () {
      var _this = $(this);
      if(_this.is('.prev')) {
        swiper.prev();
      } else if(_this.is('.next')) {
        swiper.next();
      }
    })
     $('.cursor span').eq(0).addClass("active");
      var swiper = Swipe(document.querySelector('.swipe'), {
      auto: 1000,
      transitionEnd: function (index) {
        //index++;
        $('.cursor span').eq(index).addClass('active').siblings('.active').removeClass('active');
      }
    });
    };
</script>

<script type="text/template" id="weekTmp">
    {{each data as val key}}
          <li>
            <i>{{key}}</i>
            <a href="{{val.src}}">{{val.title}}</a>
            <a href="{{val.href}}" class="like">{{val.likes}}</a>
            <span>{{val.reading}}</span>
          </li>
    {{/each}}
</script>
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
<script type="text/template"  id="lbtTmp">
  {{each data as val key}}
          <li>
            <a href="{{val.link}}">
              <img src="{{val.image}}">
              <span>{{val.text}}</span>
            </a>
          </li>
  {{/each}}
</script>
<script type="text/template"  id="newTmp">
    {{each data as val key}}
          <div class="entry">
          <div class="head">
            <span class="sort">{{val.name}}</span>
            <a href="detail.php?id={{val.id}}">{{val.title}}</a>
          </div>
          <div class="main">
            <p class="info">{{val.nickname}} 发表于 {{val.created}}</p>
            <a href="detail.php?id={{val.id}}"><p class="brief">{{val.content}}</p></a>
            <p class="extra">
              <a href="detail.php?id={{val.id}}" style=""><span class="reading">阅读({{val.views}})</span></a>
              <span class="comment">评论(0)</span>
              <a href="javascript:;" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞({{val.likes}})</span>
              </a>
              <a href="javascript:;" class="tags">
                分类：<span>{{val.name}}</span>
              </a>
            </p>
            <a href="{{val.feature}}" class="thumb">
              <img src="{{val.feature}}" alt="">
            </a>
          </div>
        </div>
     {{/each}}
</script>
<script type="text/template"  id="qqTmp">
  {{each data as val key}}
      <span></span>
    {{/each}}
</script>
<script type="text/template"  id="focusTmp">
    {{each data as val key}}
          <li>
            <a href="{{val.href}}">
              <img src="{{val.src?val.src:"uploads/hots_1.jpg"}}" alt="{{val.alt}}">
              <span>{{val.title}}</span>
            </a>
          </li>
    {{/each}}
</script>
<script type="text/javascript">

// 发送ajax请求,获取轮播图数据
  $.ajax({
    type:'post',
    url:'/int/lbt.php',
    dataType:'json',
    success:function(res){
      var htmlStr1 = template('qqTmp',res);
      var htmlStr = template('lbtTmp',res);
      $('.cursor').html(htmlStr1);
      $('.swipe-wrapper').html(htmlStr);
    }
  })
// 发送ajax请求,获取一周热门排行数据
  $.ajax({
    type:'get',
    url:'/admin/int/weekInt.php',
    dataType:'json',
    success:function(res){
          var htmlStr = template('weekTmp',res);// 第一个参数是模板的id,第二个参数必须是对象
          $('#oll').html(htmlStr);
    }
  })
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
    url:'/admin/int/postsInt.php',
    dataType:'json',
    success:function(res){
      if(res&&res.code == 200){
        // 将数据渲染在页面上
        template.config("escape", false);
        var htmlStr = template('newTmp',res);// 准备模板字符串
         console.log(htmlStr + '====================');
        $('#new').html(htmlStr); // 渲染页面
      }
    }
    })
// 发送ajax请求,获取焦点关注数据
  $.ajax({
    type:'get',
    dataType:'json',
    url:'/admin/int/focusInt.php',
    success:function(res){
      if(res&&res.code == 200){
        var htmlStr = template('focusTmp',res);// 第一个参数是模板的id,第二个参数必须是对象
        $('#ulll').html(htmlStr);
        $($('#ulll').children("li").get(0)).addClass("large");
      }
    }
  })
</script>
</body>
</html>

