#  基于WAMP的CMS自媒体信息发布平台

> A bootstrap+apache+php+mysql project.
>
> 基本打通了前后台
>
> ------
>
> ## 项目预览演示
>
> ### 管理员（编辑）通过网站后台管理界面管理（发布、维护）自媒体内容
>
> ![后台](https://github.com/xccjh/A-Bootstrap-Apache-PHP-Mysql-Project/blob/master/md-imgs/%E5%90%8E%E5%8F%B0.png)
>
> - 用户登录以根据
>   - 登录界面可是否填写表单内容拒绝登录操作
>   - 管理员可以通过用户名和密码登录到后台
> - 内容统计
>   - 统计文章总数，草稿总数
>   - 统计分类个数
>   - 统计评论条数和一批准的条数
> - 内容管理
>   - 管理员可以通过管理后台查看全部内容
>   - 管理员可以通过管理后台增加内容
>   - 管理员可以通过管理后台删除内容
>   - 管理员可以通过管理后台修改内容
>      - 随机推荐
>         - 管理员可以通过管理后台查看随机推荐全部内容
>         - 管理员可以通过管理后台增加随机推荐内容
>         - 管理员可以通过管理后台删除随机推荐内容
>         - 管理员可以通过管理后台修改随机推荐内容
>      - 一周排行
>         - 管理员可以通过管理后台查看一周排行全部内容
>         - 管理员可以通过管理后台增加一周排行内容
>         - 管理员可以通过管理后台删除一周排行内容
>         - 管理员可以通过管理后台修改一周排行内容
>      - 焦点关注
>         - 管理员可以通过管理后台查看焦点关注全部内容
>         - 管理员可以通过管理后台增加焦点关注内容
>         - 管理员可以通过管理后台删除焦点关注内容
>         - 管理员可以通过管理后台修改焦点关注内容
>      - 热门推荐
>         - 管理员可以通过管理后台增加热门推荐内容
>         - 管理员可以通过管理后台删除热门推荐内容
>         - 管理员可以通过管理后台修改
>         - 管理员可以通过管理后台查看热门推荐全部内容热门推荐内容
>      - 一周排行
>         - 管理员可以通过管理后台查看焦点关注全部内容
>         - 管理员可以通过管理后台增加焦点关注内容
>         - 管理员可以通过管理后台删除焦点关注内容
>         - 管理员可以通过管理后台修改焦点关注内容
>      - 文章管理
>         - 所有文章
>            - 统计文章总数
>            - 编辑文章
>            - 删除文章
>         - 写文章
>            - 管理员可以通过在h5编辑器上写文章发布到前台
>         - 分类管理
>            - 管理员可以通过管理后台查看全部分类
>            - 管理员可以通过管理后台增加分类
>            - 管理员可以通过管理后台删除分类
>            - 管理员可以通过管理后台修改分类名称
>      - 评论管理
>         - 管理员可以通过管理后台查看全部评论
>         - 管理员可以通过管理后台审核评论
>         - 管理员可以通过管理后台删除评论
> - 用户管理
>   - 管理员可以通过管理后台查看全部用户
>   - 管理员可以通过管理后台增加用户
>   - 管理员可以通过管理后台删除用户（不能删除当前登录用户）
> - 系统设置
>   -导航菜单
>     - 管理员可以通过管理后台增加侧边导航的菜单
>     - 管理员可以通过管理后台删除侧边导航的菜单
>   -图片轮播
>      - 管理员可以通过管理后台增加首页轮播
>      - 管理员可以通过管理后台删除首页轮播
>   -网站设置
>     - 管理员可以通过管理网站图标
>     - 管理员可以通过管理站点名称
>     - 管理员可以通过管理站点描述
>     - 管理员可以通过管理站点关键词
>     - 管理员可以开启评论功能
>     - 管理员可以开启评论必须经人工批准
>
> ### 用户可以通过网站前台查看内容
>
> ![前台](https://github.com/xccjh/A-Bootstrap-Apache-PHP-Mysql-Project/blob/master/md-imgs/%E5%89%8D%E5%8F%B0.png)
>
> - 公共模块
>   - 通过左侧边栏导航菜单访问不同分类内容
>   - 通过右侧边栏搜索框搜索指定关键词的内容
>   - 通过右侧栏查看随机推荐的内容
>   - 通过中间栏查看焦点关注广告位
>   - 通过右侧边栏查看最新的评论内容
>   - 通过页脚区域的展示了解网站相关信息
> - 首页
>   - 通过首页查看一周热门内容
>   - 通过首页查看热门推荐位内容
>   - 通过首页查看最新发布内容
> - 详细页
>   - 通过详细页查看不同文章相关信息（所属分类、发表时间、作者、阅读次数、评论次数）
>   - 通过详细页查看不同文章具体的详细内容
>   - 通过详细页查看当前文章的相关推荐文章
>
> ------
>
> ## 数据库设计
>
> ### 选项表（options）
>
> 用于记录网站的一些配置属性信息，如：站点标题，站点描述等
>
> ### 用户表（users）
>
> 用于记录用户信息
>
> | 字段       | 描述     | 备注                                       |
> | -------- | ------ | ---------------------------------------- |
> | id       | 🔑 主键  | &nbsp;                                   |
> | slug     | URL 别名 | &nbsp;                                   |
> | email    | 邮箱     | 亦做登录名                                    |
> | password | 密码     | &nbsp;                                   |
> | nickname | 昵称     | &nbsp;                                   |
> | avatar   | 头像     | 图片 URL 路径                                |
> | bio      | 简介     | &nbsp；                                   |
> | status   | 状态     | 未激活（unactivated）/ 激活（activated）/ 禁止（forbidden）/ 回收站（trashed） |
>
> ### 文章表（posts）
>
> 用于记录文章信息
>
> | 字段          | 描述       | 备注                                       |
> | ----------- | -------- | ---------------------------------------- |
> | id          | 🔑 主键    | &nbsp;                                   |
> | slug        | URL 别名   | &nbsp;                                   |
> | title       | 标题       | &nbsp;                                   |
> | feature     | 特色图像     | 图片 URL 路径                                |
> | created     | 创建时间     | &nbsp;                                   |
> | content     | 内容       | &nbsp;                                   |
> | views       | 浏览次数     | &nbsp;                                   |
> | likes       | 点赞数      | &nbsp;                                   |
> | status      | 状态       | 草稿（drafted）/ 已发布（published）/ 回收站（trashed） |
> | user_id     | 🔗 用户 ID | 当前文章的作者 ID                               |
> | category_id | 🔗 分类 ID | 当前文章的分类 ID                               |
>
> 
>
>
> ### 分类表（categories）
>
> 用于记录文章分类信息
>
> | 字段   | 描述     | 备注     |
> | ---- | ------ | ------ |
> | id   | 🔑 主键  | &nbsp; |
> | slug | URL 别名 | &nbsp; |
> | name | 分类名称   | &nbsp; |
>
> ### 评论表（comments）
>
> 用于记录文章评论信息
>
> | 字段        | 描述       | 备注                                       |
> | --------- | -------- | ---------------------------------------- |
> | id        | 🔑 主键    | &nbsp;                                   |
> | author    | 作者       | &nbsp;                                   |
> | email     | 邮箱       | &nbsp;                                   |
> | created   | 创建时间     | &nbsp;                                   |
> | content   | 内容       | &nbsp;                                   |
> | status    | 状态       | 待审核（held）/ 准许（approved）/ 拒绝（rejected）/ 回收站（trashed） |
> | post_id   | 🔗 文章 ID | &nbsp;                                   |
> | parent_id | 🔗 父级 ID | &nbsp;                                   |
>
> 在数据库文件中，在此不详细赘述
>
>
> # 部署项目文件
>
> - 1.开启phpStudy
> - 2.将pages里面的文件，拷贝到项目文件夹
>   1. 将文件扩展名由 `.html` 改为 `.php`，页面中的 `a` 链接也需要调整。
>   2. 调整页面文件中的静态资源路径，将原本的相对路径调整为绝对路径
> - 3.在浏览器中输出127.0.0.1和127.0.0.1/admin，验证是否可以访问到页面
>
> ------
>
> ## 搭建项目架构
>
> 项目最基本的分为两个大块，前台（对大众开放）和后台（仅对管理员开放）。
>
> - **前台访问地址**：`http://127.0.0.1/`
> - **后台访问地址**：`https://127.0.0.1/admin`
>
> ### 基本的目录结构
>
> ```
> └──  A bootstrap+apache+php+mysql project········ 项目文件夹（网站根目录）
>     ├── admin ··································· 后台文件夹
>     │   └── index.php ··························· 后台脚本文件
>     ├── assets ·································· 资源文件夹
> +   │     ├── css ····························· 样式文件夹
> +   │     ├── img ····························· 图片文件夹
> +   │     ├── js ······························ 脚本文件夹
> +   │     └── venders ························· 第三方资源
>     ├── uploads ·································· 上传文件夹
>     │   
>     └── index.php ······························· 前台脚本文件
> ```
>
> #### 基本原则：
>
> - 先明确一共有多少个页面
> - 一个页面就对应一个 php 文件去处理
>
> ### 整合静态资源文件
>
> 由于 Apache / Nginx 这一类 Web Server 本身可以处理静态文件请求，所以不需要 PHP 处理静态文件请求。只需要将静态资源放到网站目录中，即可访问
>
>
> ##### 注意：
>
> - `assets` 目录中放置网页中所需的资源文件。
> - `uploads` 目录中放置网站运营过程中上传的文件，如果担心文件过多，可以按年归档（一年一个文件夹）。
>
> ### 项目配置文件
>
> 由于在接下来的开发过程中，肯定又一部分公共的成员，例如数据库名称，数据库主机，数据库用户名密码等，这些数据应该放到公共的地方，抽象成一个配置文件 `config.php` 放到项目根目录下。
>
> 这个配置文件采用定义常量的方式定义配置成员：
>
> ```php
> /**
>  * 数据库主机
>  */
> define('DB_HOST', '127.0.0.1');
>
> /**
>  * 数据库用户名
>  */
> define('DB_USER', 'root');
>
> /**
>  * 数据库密码
>  */
> define('DB_PASS', 'root');
>
> /**
>  * 数据库名称
>  */
> define('DB_NAME', 'cmsdatebase');
> ```
>
> > 注意：这种只有服务端代码的 PHP 文件应该去除结尾处的 `?>`，防止输出内容
>
> 在需要的时候可以通过 `require` 载入：
>
> ```php
> // 载入配置文件
> require 'config.php';
>
> ...
>
> // 用到的时候
> echo DB_NAME;
> ```
>
> #### 载入脚本的几种方式对比
>
> > - `require`
> > - `require_once`
> > - `include`
> > - `include_once`
>
> - 共同点：
>   - 都可以在当前 PHP 脚本文件执行时载入另外一个 PHP 脚本文件。
> - `require` 和 `include` 不同点：
>   - 当载入的脚本文件不存在时，`require` 会报一个致命错误（结束程序执行），而 `include` 不会
> - 有 `once` 后缀的特点：
>   - 判断当前载入的脚本文件是否已经载入过，如果载入了就不在执行
>
> > 提问：由以上几种方式的对比可以得出：在载入 `config.php` 时使用哪种方式更合适？
>
> <!-- 答：require_once，原因有二：1. 载入失败无法继续执行；2. 不能重复载入 -->
>
> #### 显示 PHP 错误信息
>
> 当执行 PHP 文件发生错误时，如果在页面上不显示错误信息，只是提示 500 Internal Server Error 错误，应该是 PHP 配置的问题，解决方案就是：找到 `php.ini` 配置文件中 `display_errors` 选项，将值设置为 `On`
>
> ```ini
> ; http://php.net/display-errors
> ; display_errors = Off
> display_errors = On
>
> ; The display of errors which occur during PHP's startup sequence are handled
> ```
>
> ------
>
> ## 项目架构总结
>
> 架构的目的利于后期维护
>
> <!-- TODO: 为什么要这么设计 -->
> <!-- 1. 一个请求对应一个文件处理方式 -->
> <!-- 2. 单一入口应用程序方式 -->
>
> ------
>
> # 提取公共样式
>
> - 1.因为页面当中,侧边栏，顶部，还有css和js文件都是一样的，为了后期维护的方便性,因此需要提取公共样式
>
> - 2.在admin当中新建inc文件夹,把那些公共的文件内容放在各自的文件当中
>
>   ```php
>   css.php
>   script.php
>   aside.php
>   nav.php
>   ```
>
> - 3.在index.php中引入之前抽掉的公共文件
>
>   ```php
>    <?php include './inc/css.php'?>
>    <?php include './inc/script.php'?>
>    <?php include './inc/nav.php'?>
>    <?php include './inc/aside.php' ?>
>   ```
>
> - 4.在浏览器中输入127.0.0.1和127.0.0.1/admin可以看到整个页面,说明改造成功
>
> ### 抽离公共部分
>
> 由于每一个页面中都有一部分代码（侧边栏）是相同的，分散到各个文件中，不便于维护，所以应该抽取到一个公共的文件中。
>
> 于是我们在 `admin` 目录中创建一个 `inc`（includes 的简称）子目录，在这个目录里创建一个 `sidebar.php` 文件，用于抽象公共的侧边栏 `<div class="aside"> ... </div>`，然后在每一个需要这个模块的页面中通过 `include` 载入：
>
> ```php
> ...
> <?php include 'inc/sidebar.php' ;?>
> ...
> ```
>
> > 提问：为什么使用 `include` 而不是 `require`？
>
> <!-- 答：侧边栏不会影响其他模块，没有侧边栏其余代码应该也可以继续执行 -->
>
> #### 侧边栏的焦点状态（未实现）
>
> 由于侧边栏在不同页面时，active class name 出现的位置不尽相同，所以我们需要区分当前 `sidebar.php` 文件是在哪个页面中载入的，从而明确焦点状态。
>
> 所以目前的关键问题就出现在了如何在 `sidebar.php` 中知道当前被哪个文件载入了。
>
> 通过查看 `include` 函数的文档发现：如果 `a.php` 通过 `include` 载入了 `b.php` 文件，那么在 `b.php` 文件中可以访问到 `a.php` 中定义的变量。
>
> > http://php.net/manual/zh/function.include.php
>
> 借助这个特性，我们可以在各个页面中定义一个标识变量，然后在 `sidebar.php` 中通过这个标识变量区别不同页面的载入：
>
> 每一个菜单项 `<li>` 元素：
>
> ```php
> ...
> <li<?php echo $current_page == 'dashboard' ? ' class="active"' : ''; ?>>
>   <a href="index.php"><i class="fa fa-dashboard"></i>仪表盘</a>
> </li>
> ...
> ```
>
> 对于有子菜单的菜单项，有一点例外：
>
> ```php
> ···
> <li<?php echo in_array($current_page, array('posts', 'post-add', 'categories')) ? ' class="active"' : ''; ?>>
>   <a href="#menu-posts"<?php echo in_array($current_page, array('posts', 'post-add', 'categories')) ? '' : ' class="collapsed"'; ?> data-toggle="collapse">
>     <i class="fa fa-thumb-tack"></i>文章<i class="fa fa-angle-right"></i>
>   </a>
>   <ul id="menu-posts" class="collapse<?php echo in_array($current_page, array('posts', 'post-add', 'categories')) ? ' in' : ''; ?>">
>     <li<?php echo $current_page == 'posts' ? ' class="active"' : ''; ?>><a href="posts.php">所有文章</a></li>
>     <li<?php echo $current_page == 'post-add' ? ' class="active"' : ''; ?>><a href="post-add.php">写文章</a></li>
>     <li<?php echo $current_page == 'categories' ? ' class="active"' : ''; ?>><a href="categories.php">分类目录</a></li>
>   </ul>
> </li>
> ···
> ```
>
> > # 登陆的做法
> >
> > 把login.html改成login.php,因为php文件里面，可以运行html和php等代码
> >
> > 1.login.php文件中，给两个输入框添加name属性，，添加了action,method,将a标签修改为submit按钮，代码修改如下
> >
> > ```javascript
> >  <form action="./login.php" method="post" class="login-wrap">
> >       <img class="avatar" src="../assets/img/default.png">
> >       <!-- 有错误信息时展示 -->
> >       <!-- <div class="alert alert-danger">
> >         <strong>错误！</strong> 用户名或密码错误！
> >       </div> -->
> >       <div class="form-group">
> >         <label for="email" class="sr-only">邮箱</label>
> >         <input id="email" type="email" name="email" class="form-control" placeholder="邮箱" autofocus>
> >       </div>
> >       <div class="form-group">
> >         <label for="password" class="sr-only">密码</label>
> >         <input id="password" type="password" name="password" class="form-control" placeholder="密码">
> >       </div>
> >       <input type="submit" value="登陆" class="btn btn-primary btn-block">
> >     </form>
> > ```
> >
> > 2.接收提交过来的信息，做登陆的判断
> >
> > ```php
> > <?php
> >     
> >     //接收用户提交过来的数据
> >     // $_POST
> >     if(!empty($_POST)){  //说明$_POST这个数组有内容，不为空，是post过来的数据
> >       $email = $_POST['email'];
> >       $password = $_POST['password'];
> >
> >       //接收到用户提交过来的数据之后，要到数据库中先查询一下有无此用户名
> >       //1. 先连接数据库服务器  返回一个连接信息
> >        $connect = mysqli_connect('localhost','root','root');
> >
> >        //2.连接具体的数据库
> >        mysqli_select_db($connect,'cmsdatabase');//
> >
> >        //3. 设置编码集
> >        mysqli_set_charset($connect,'utf8');//
> >
> >        //4.查询数据信息
> >        // select * from users where email ='';
> >        // $sql = "SELECT * FROM users where email = 'admin@admin.com'";
> >        $sql = "SELECT * FROM users where email = '" . $email . "'";
> >        $result = mysqli_query($connect,$sql);  //根据sql语句查询信息，返回结果集
> >
> >       // print_r($result);
> >       // exit;  //
> >        $row = mysqli_fetch_assoc($result);//从查询的结果集中，先获取第一条数据
> >
> >        // print_r($row);
> >        // exit;
> >        if(!empty($row)){
> >           //此处说明用户名是已经真实存在的了
> >          // 要去判断密码了
> >        }else {
> >           //说明 用户名是不存在的
> >        }
> >     }
> >  ?>
> > ```
> >
> > 3.完整的判断信息
> >
> > ```php
> > <?php
> >     
> >     header('Content-type:text/html;charset=utf-8');
> >     //接收用户提交过来的数据
> >     // $_POST
> >     $msg = '' ;//定义了一个提示信息的变量
> >     if(!empty($_POST)){  //说明$_POST这个数组有内容，不为空，是post过来的数据
> >       $email = $_POST['email'];
> >       $password = $_POST['password'];
> >
> >       //接收到用户提交过来的数据之后，要到数据库中先查询一下有无此用户名
> >       //1. 先连接数据库服务器  返回一个连接信息
> >        $connect = mysqli_connect('localhost','root','root');
> >
> >        //2.连接具体的数据库
> >        mysqli_select_db($connect,'cmsdatabase');//
> >
> >        //3. 设置编码集
> >        mysqli_set_charset($connect,'utf8');//
> >
> >        //4.查询数据信息
> >        // select * from users where email ='';
> >        // $sql = "SELECT * FROM users where email = 'admin@admin.com'";
> >        $sql = "SELECT * FROM users where email = '" . $email . "'";
> >        $result = mysqli_query($connect,$sql);  //根据sql语句查询信息，返回结果集
> >
> >       // print_r($result);
> >       // exit;  //
> >        $row = mysqli_fetch_assoc($result);//从查询的结果集中，先获取第一条数据
> >
> >        // print_r($row);
> >        // exit;
> >        if(!empty($row)){
> >           //此处说明用户名是已经真实存在的了
> >          // 要去判断密码了
> >         if($row['password'] == $password ){
> >           // echo '用户名和密码正确，登陆成功。。。';
> >           // exit;
> >           header('location:/admin');  //php中页面跳转
> >           exit;
> >           // window.location.href= 'admin/index.html';  这是js下面的页面跳转
> >         }else {
> >           //到了这一步的时候，说明用户名是对的，但是密码错了
> >           $msg = '用户名或是密码错误...';
> >         }
> >          
> >        }else {
> >           //说明 用户名是不存在的
> >         $msg = '用户名不存在...';
> >        }
> >     }
> >  ?>
> > ```
> >
> > 4.当前登陆的账号或是密码不正确提示
> >
> > - 1.把login.php页面当中的错误提示代码展示出来,进行一个判断，是否输出
> >
> > ```php
> >  <!-- 有错误信息时展示 -->
> >       <?php if(!empty($msg)){?>
> >       	<div class="alert alert-danger">
> >         	<strong>错误！</strong> <?php echo $msg?>
> >       	</div>
> >       <?php }?>
> > ```
> >
> > 5.登陆的验证
> >
> > - 1.如果登陆成功的话，在服务器端要设置一个用户的session
> >
> >   ```php 
> >   if(!empty($row)){
> >             //此处说明用户名是已经真实存在的了
> >            // 要去判断密码了
> >           if($row['password'] == $password ){
> >             // echo '用户名和密码正确，登陆成功。。。';
> >             // exit;
> >             session_start();//使用session之前一定要先启用session
> >             $_SESSION['user_info'] = $row; //把用户的登陆信息存到session当中,随响应头发送给浏览器，存到浏览器的cookie当中
> >             header('location:/admin');  //php中页面跳转
> >             exit;
> >             // window.location.href= 'admin/index.html';  这是js下面的页面跳转
> >           }else {
> >             //到了这一步的时候，说明用户名是对的，但是密码错了
> >             $msg = '用户名或是密码错误...';
> >           }
> >            
> >          }else {
> >             //说明 用户名是不存在的
> >           $msg = '用户名不存在...';
> >          }
> >   ```
> >
> > - 2.在index.php页面中，设置如下代码
> >
> >   ```php
> >   <?php
> >       
> >       //判断用户是否登陆,只有登陆了才可以进行页面的访问
> >       //判断cookie里面有没有session的信息 
> >       session_start();
> >       // print_r($_SESSION['user_info']);
> >       if(!isset($_SESSION['user_info'])){
> >           //如果不存在，说明 还没有登陆，应该跳转到登陆页面
> >         header('location:/admin/login.php');
> >         exit;
> >       }
> >       
> >   ?>
> >   ```
> >
> >   # 管理后台首页
> >
> >   一般情况下我们在管理后台的首页展示的都是一些系统信息和数据统计。
> >
> >   ## 统计数据加载
> >
> >   **站点内容统计**版块的数据，需要通过查询数据库得到具体的数值。(实现方法不同)
> >
> >   ### SQL 语句
> >
> >   ```sql
> >   -- 文章总数:
> >   select count(1) from posts
> >
> >   -- 草稿总数:
> >   select count(1) from posts where status = 'drafted'
> >
> >   -- 分类总数:
> >   select count(1) from categories
> >
> >   -- 评论总数:
> >   select count(1) from comments
> >
> >   -- 待审核的评论总数:
> >   select count(1) from comments where status = 'held'
> >   ```
> >
> >   ### 执行 SQL 查询数据
> >
> >   在 `index.php` 页面加载（执行）过程中通过代码执行 SQL 语句，获取所需数据：
> >
> >   ```php
> >   // 查询文章总数
> >
> >   $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
> >
> >   if (!$connection) {
> >     die('<h1>Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error() . '</h1>');
> >   }
> >
> >   if ($result = mysqli_query($connection, 'select count(1) from posts')) {
> >     $post_count = mysqli_fetch_row($result)[0];
> >     mysqli_free_result($result);
> >   }
> >
> >   mysqli_close($connection);
> >
> >   // 其余类似。
> >   ```
> >
> >   ------
> >
> >   <?php 
> >
> >   		// 先引入外部文件
> >   		require('../functions.php');
> >   	// 1.获取提交过来的数据
> >   	  // $_POST
> >   		$id = $_POST['id'];
> >   		// $email = $_POST['email'];
> >   		// $slug = $_POST['slug'];
> >   		// $nickname = $_POST['nickname'];
> >   	
> >   		// print_r($_POST);
> >   		// exit;
> >   	
> >   		// // 2. 先连接数据库
> >   		// $conn = mysqli_connect('127.0.0.1','root','root','cmsdatabase');
> >   	
> >   		// // 3.判断是否连接成功
> >   		// if(!$conn){
> >   		// 	die('数据库连接失败...');
> >   		// }
> >   	
> >   		// // 4.设置编码集
> >   		// mysqli_set_charset($conn,'utf-8');
> >   	
> >   		// 5.修改数据
> >   	
> >   		// $sql='update users set email= "'.$email.'",slug = "'.$slug.'",nickname = "'.$nickname.'" where id = '.$id;
> >   	  // $sql =	"UPDATE users set email ='".$email."',slug='".$slug."',nickname = '".$nickname."' where id = ".$id;
> >   	 // $res =	mysqli_query($conn,$sql);
> >   		$res = update('users',$_POST,$id);
> >   	 if($res){
> >   	 	 $arr = array(
> >   	 	 	"code"=>200,
> >   	 	 	"msg"=>"修改成功"
> >   	 	 );
> >   	 }else {
> >   	 	$arr = array(
> >   	 	 	"code"=>201,
> >   	 	 	"msg"=>"修改失败"
> >   	 	 );
> >   	 }
> >   	
> >   	 echo json_encode($arr);
> >    ?>
> >
> >   ------
> >
> >   ## 获取当前登录用户信息
> >
> >   在管理后台一般我们都需要获取当前登录用户的信息，用于界面展示和后续业务逻辑（例如新增文章）中使用，所以我们必须要能获取到当前登录用户信息。
> >
> >   而登录用户信息只有在登录表单提交那次请求中知道，如果后续请求也需要的话，就必须借助 Session 去保存状态，在之前开发登录状态保持功能时，我们往 Session 中存放的只是一个标识变量，可以调整一下，改为保存用户标识（用户 ID）：
> >
> >   ```php
> >   // $_SESSION['is_logged_in'] = true;
> >   // 保存用户 ID 到 Session 中
> >   $_SESSION['current_logged_in_user_id'] = $user['id'];
> >   ```
> >
> >   需要访问控制的位置也需要调整：
> >
> >   ```php
> >   if (empty($_SESSION['current_logged_in_user_id'])) {
> >     ...
> >   }
> >   ```
> >
> >   ​
> >
>
> ## 1.封装函数
>
> ### 1.1封装判断登陆的函数
>
> 1.在项目的根目录(baixiu)下,新建一个functions.php文件
>
> 2.代码如下:
>
> ```js
> <?php 
> 	// 1.封装一个判断是否登陆的函数
> 		function checkLogin(){
> 		  session_start();// 如果要使用session的话,得先开启session
> 		 
> 		  if(!isset($_SESSION['userInfo'])){
> 		    header('Location:/admin/login.php');
> 		  }
> 		}
>  ?>
> ```
>
> 3.在index.php页面中进行引用和调用 
>
> ```js
> <?php 
>       // session_start();// 如果要使用session的话,得先开启session
>       // // print_r($_SESSION);
>       // // exit;
>       // // 判断是否有之前服务器设置给浏览器的sessionId,如果有的话,则可以正常的访问这个页面,如果没有,则跳转到登陆页面
>       // if(!isset($_SESSION['userInfo'])){
>       //   header('Location:/admin/login.php');
>       // }
>       require('../functions.php');
>       checkLogin();
>  ?>
> ```
>
> 4.在users.php页面中进行引入和调用,代码如下:
>
> ```js
> <?php 
>       // session_start();// 如果要使用session的话,得先开启session
>       // // print_r($_SESSION);
>       // // exit;
>       // // 判断是否有之前服务器设置给浏览器的sessionId,如果有的话,则可以正常的访问这个页面,如果没有,则跳转到登陆页面
>       // if(!isset($_SESSION['userInfo'])){
>       //   header('Location:/admin/login.php');
>       // }
>       require('../functions.php');
>       checkLogin();
> ...
> ```
>
> ### 1.2创建文件定义常量
>
> 1.在项目根目录(baixiu)下新建一个文件名为:config.php
>
> 2.在里面书写代码如下:
>
> ```js
> <?php 
> 	// 此文件中,定义一些常量,这些常量不经常被改动
> 	// 1.定义常量存储数据库的地址
> 	define('DB_HOST','127.0.0.1');
>
> 	// 2.定义常量存储数据库的登陆用户名
> 	define('DB_NAME','root');
>
> 	// 3.定义常量存储数据库的登陆密码
> 	define('DB_PASSWORD','root');
>
> 	// 4.定义常量存储数据库的名称
> 	define('DB_DATABASE','cmsdatabase');
>
> 	// 5.定义常量存储数据库的编码格式 
> 	define('DB_SET_CHARSET','utf-8');
>  ?>
> ```
>
> ### 1.3封装操作数据库的函数
>
> 1.在functions.php中先引入config.php文件 3
>
> ```js
> <?php 
> 		// 引入外部配置文件
> 		require '../config.php' ;
>
> 	// 1.封装一个判断是否登陆的函数
> 		function checkLogin(){
> 			session_start();// 如果要使用session的话,得先开启session
> 		 
> 		  if(!isset($_SESSION['userInfo'])){
> 		    header('Location:/admin/login.php');
> 		  }
> 		}
>
> 	// 2.	
>  ?>
> ```
>
> 2.在functions.php中封装连接数据库的函数
>
> ```js
> // 2.	封装连接数据库的函数
> 		function connect(){
> 			// 2.1  连接数据库服务器
> 			$conn = mysqli_connect(DB_HOST,DB_NAME,DB_PASSWORD,DB_DATABASE);
>
> 			// 2.2 判断登陆是否成功
> 			if(!$conn){
> 				die('数据库连接失败...');
> 			}
>
> 			// 2.3 设置数据库编码格式
> 			mysqli_set_charset($conn,DB_SET_CHARSET);
>
> 			// 2.4 返回连接状态
> 			return $conn;
> 		}
> ```
>
> 3.封装一个查询的函数
>
> ```js
> // 3.封装查询数据库的函数
> 		function query($sql){
> 			$conn = connect(); // 调用函数获取连接对象
> 			$result = mysqli_query($conn,$sql);
>
> 			return $result; // 返回查询到的结果集
> 		}
> ```
>
> 4.封装一个获取结果集中所有的数据的函数
>
> ```js
> function fetch($result){
> 			// 循环遍历这个结果集,取到每一条数据存入数组当中
> 			while($row = mysqli_fetch_assoc($result)){
> 				$arr[] = $row;
> 			}
>
> 			return $arr;// 返回存有所有的数据的数组
>  }
> ```
>
> 5.重新更新query函数
>
> ```js
> // 3.封装查询数据库的函数
> 		function query($sql){
> 			$conn = connect(); // 调用函数获取连接对象
> 			$result = mysqli_query($conn,$sql);
>
> 			// return $result; // 返回结果集
> 			$rows = fetch($result);
>
> 			return $rows;//返回具有查询到的每一条数据的数组
> 		}
> ```
>
> 6.封装一个添加数据的函数,在functions.php页面中添加如下代码
>
> ```js
> // 5.封装一个插入数据的函数
> 		function insert($sql){
> 			// 5.1调用函数,获取连接状态
> 			$conn = connect();
>
> 			// 5.2 调用方法插入数据 
> 			$res =mysqli_query($conn,$sql);
>
> 			// 5.3 判断是否插入数据成功
> 			// if($res){
> 			// 	return $res;
> 			// }else {
> 			// 	die('插入数据失败...');
> 			// }
> 			if(!$res){
> 				die('插入数据失败...');
> 			}
>
> 			return $res; // 返回成功的结果 是一个boolean类型的值
> 		}
> ```
>
> 7.到users.php页面中修改原来的代码，最终代码如下: 29
>
> ```js
> // 2.是否是post提交  现在要插入数据
>   if(!empty($_POST) && $_POST['id']=='') {  // add按钮的提交
>     // 因为这里不需要id
>
>     // 3.获取提交过来的数据
>
>     print_r($_POST);
>     $email = $_POST['email']; // 邮箱
>     $slug = $_POST['slug'];
>     $nickname = $_POST['nickname'];
>     $userPwd = isset($_POST['password'])?$_POST['password']:'';
>     // $status = 'activated';
>     // 4. 往数据库中添加数据
>     // 4.1 先连接数据库
>     // $conn = mysqli_connect('127.0.0.1','root','root','cmsdatabase');
>
>     // if(!$conn){ // 如果失败, 则提示用户,并且代码不要往下执行了
>     //   die('数据库连接失败...');
>     // }
>     
>     // // 4.2 设置编码格式
>     // mysqli_set_charset($conn,'utf-8');
>
>     // 4.3 将数据插入到数据库中
>     // $sql = 'insert into users (email,slug,nickname,password) values ()'
>     //INSERT INTO users (email,slug,nickname,password,status) values ("aa.com","abc","普通用户","123","activated");
>     $sql = 'INSERT INTO users (email,slug,nickname,password,status) values ("'.$email.'","'.$slug.'","'.$nickname.'","'.$userPwd.'","activated")';
>     // $res = mysqli_query($conn,$sql);
>     $res = insert($sql);
>     // var_dump($res);
>     // exit; // 阻止代码的向下运行
>     if($res){
>       // 添加成功的话,应该要刷新 当前的页面
>       header('Location:/admin/users.php');
>     }else {
>       die('添加失败...');
>     }
>     // 如果要是成功的话,则跳转到当前页面,相当于刷新
>   }
> ```
>
> 8.封装完善的添加数据的代码
>
> ```js
> // 5.封装一个插入数据的函数
> 		// function insert($sql){  //不这么判断了
> 		function insert($table,$arr){
> 			// 5.1调用函数,获取连接状态
> 			$conn = connect();
> 			// print_r($arr);
> 			if(isset($arr['id'])){
> 				unset($arr['id']);
> 			}
> 			// print_r($arr);
> 			$keys = array_keys($arr); // 获取关联数组中所有的属性
> 			$values = array_values($arr); // 获取关联数组中所有的属性值
> 			// print_r($keys);
> 			// print_r($values);
> 			// $str = implode(',',$keys);  // 将索引数组中的值以,连接成字符串
> 			// echo $str;
> 			// echo '<hr/>';
> 			// echo implode(',',$values);
> 			// $sql = 'INSERT INTO users (email,slug,nickname,password,status) values ("'.$email.'","'.$slug.'","'.$nickname.'","'.$userPwd.'","activated")';
> 			$sql = 'INSERT INTO users ('.implode(',',$keys).') values ("'.implode('","',$values).'")';
> 			// echo $sql;
> 			// exit;  // 代码中断,不会往下执行了
> 			// array_keys  array_values   implode   join
> 			// 5.2 调用方法插入数据 
> 			$res =mysqli_query($conn,$sql);
>
> 			// 5.3 判断是否插入数据成功
> 			// if($res){
> 			// 	return $res;
> 			// }else {
> 			// 	die('插入数据失败...');
> 			// }
> 			if(!$res){
> 				die('插入数据失败...'); // 还有return的功能,只要执行了die,代码不会往下执行
> 			}
>
> 			return $res; // 返回成功的结果 是一个boolean类型的值
> 		}
>
> ```
>
> 9.在users.php中进行调用,代码如下:
>
> ```js
> // 2.是否是post提交  现在要插入数据
>   if(!empty($_POST) && $_POST['id']=='') {  // add按钮的提交
>     // 因为这里不需要id
>
>     // 3.获取提交过来的数据
>
>     // print_r($_POST);
>     // $email = $_POST['email']; // 邮箱
>     // $slug = $_POST['slug'];
>     // $nickname = $_POST['nickname'];
>     // $userPwd = isset($_POST['password'])?$_POST['password']:'';
>     // // $status = 'activated';
>     $_POST['status'] = 'activated';
>     // 4. 往数据库中添加数据
>     // 4.1 先连接数据库
>     // $conn = mysqli_connect('127.0.0.1','root','root','cmsdatabase');
>
>     // if(!$conn){ // 如果失败, 则提示用户,并且代码不要往下执行了
>     //   die('数据库连接失败...');
>     // }
>     
>     // // 4.2 设置编码格式
>     // mysqli_set_charset($conn,'utf-8');
>
>     // 4.3 将数据插入到数据库中
>     // $sql = 'insert into users (email,slug,nickname,password) values ()'
>     //INSERT INTO users (email,slug,nickname,password,status) values ("aa.com","abc","普通用户","123","activated");
>     // $sql = 'INSERT INTO users (email,slug,nickname,password,status) values ("'.$email.'","'.$slug.'","'.$nickname.'","'.$userPwd.'","activated")';
>     // $res = mysqli_query($conn,$sql);
>     // $res = insert($sql);
>     $res = insert('users',$_POST);
>     // var_dump($res);
>     // exit; // 阻止代码的向下运行
>     if($res){
>       // 添加成功的话,应该要刷新 当前的页面
>       header('Location:/admin/users.php');
>     }else {
>       die('添加失败...');
>     }
>     // 如果要是成功的话,则跳转到当前页面,相当于刷新
>   }
> ```
>
> 10.封装一个删除数据的函数,在functions.php文件中,代码如下:
>
> ```js
>  // 6.封装一个删除数据的函数
>     function del($sql){
>         // 6.1 获取连接状态
>         $conn = connect();
>         // 6.2 执行删除语句
>         $res = mysqli_query($conn,$sql);
>
>         // 6.3 返回删除结果
>         return $res;
>     }
> ```
>
> 11.在delUers.php页面中进行调用,代码如下:
>
> ```js
> <?php 
> 	// 先引入文件
> 	require('../functions.php');
>
> 	// 1.先判断是否是get过来的,而且是否有user_id
> 	if(isset($_GET['user_id'])){
> 		// 获取用户id
> 		$userId = $_GET['user_id'];
>
> 		// // 2.连接数据库
> 		// $conn = mysqli_connect('127.0.0.1','root','root','cmsdatabase');
>
> 		// // 3.判断是否连接成功
> 		// if(!$conn){
> 		// 	die('数据库连接失败...');
> 		// }
>
> 		// // 4.设置编码
> 		// mysqli_set_charset($conn,'utf-8');
>
> 		// // 5.调用方法删除对应id的数据
> 		// $res = mysqli_query($conn,'delete from users where id = '.$userId);
>
> 		$res = del('delete from users where id = '.$userId);
> 		// 6.判断是否删除成功
> 		if($res){ // 删除成功则进行跳转...
> 			header('Location:/admin/users.php');
> 		}else {
> 			die('删除此条用户数据失败...');
> 		}
> 	}
>  ?>
> ```
>
> 12.单击编辑按钮,渲染页面数据,在users.php页面中的代码如下:
>
> ```js
>  // 第4大步 编辑的操作
>   if(isset($_GET['action'])){ // 是否是编辑
>     $userId = $_GET['user_id']; // 获取当前的id
>
>    //  // 4.1 连接数据库
>    // $conn = mysqli_connect('127.0.0.1','root','root','cmsdatabase');
>
>    // // 4.2 判断是否连接
>    // if(!$conn){
>    //  die('数据库连接失败...');
>    // }
>
>    // // 4.3 查询数据库中的数据
>    // $res = mysqli_query($conn,"select * from users where id = ".$userId);
>    // // print_r($res);
>    // // exit;
>
>    // // 4.4 从结果集中取出数据
>    // $row = mysqli_fetch_assoc($res); 
>    // print_r($row);
>    // exit;
>    // 4.4 断开数据库
>    // mysqli_close($conn);
>    // print_r($row);
>    //   Array
>    //    (
>    //        [id] => 2
>    //        [slug] => zce
>    //        [email] => w@zce.me
>    //        [password] => 123456
>    //        [nickname] => 汪磊
>    //        [avatar] => /static/uploads/avatar.jpg
>    //        [bio] => 
>    //        [status] => activated
>    //    )
>      $row = query("select * from users where id = ".$userId)[0];
>    // 原来查询到的结果变成了如下结果:
>         //  Array
>         // (
>         //     [0] => Array
>         //         (
>         //             [id] => 18
>         //             [slug] => ppaaaaaaaa
>         //             [email] => pp@aa.com
>         //             [password] => 123
>         //             [nickname] => pppaaaaaaaa
>         //             [avatar] => 
>         //             [bio] => 
>         //             [status] => activated
>         //         )
>
>         // )
>    //  exit;
>
>
>   } // edit
>
> ```
>
> 13.封装编辑的函数,代码如下:
>
> ```js
> // 7.封装一个修改数据的函数
> 		function update($table,$arr,$id){
> 			// 7.1 连接数据库
> 			$conn = connect();
>
> 			// print_r($arr);
> 			// exit;
> 			// 7.2 拼接sql语句
> 			// 因为在更新数据的时候,id是不需要更新的,所以先把id从$arr中删除掉
> 			unset($arr['id']); 
>
> 			$sql = 'UPDATE users set ';  //  定义一个变量
> 			foreach($arr as $key => $val){  // 遍历数组,拼接成key=value, key=value的格式
> 				$sql .= $key.'="'.$val.'", ';
> 			}
> 			// print_r($sql);
> 			// $sql = 'UPDATE users set email="qq@qq.com",slug="qq",nickname="aaadfa",';
> 			// exit;
> 			$sql = substr($sql,0,-2);
> 			// print_r($sql);
> 			$sql .= ' where id = '.$id;
> 			// print_r($sql);
> 			// exit;
> 			// $sql='update users set email= "'.$email.'",slug = "'.$slug.'",nickname = "'.$nickname.'" where id = '.$id;
> 	  // $sql =	"UPDATE users set email ='".$email."',slug='".$slug."',nickname = '".$nickname."' where id = ".$id;
>
> 			// 7.2 调用方法进行更新
> 		  $res =	mysqli_query($conn,$sql);
>
> 		  // 7.3 返回更新后的结果
> 		  return $res;
> 		}
> ```
>
> 14.在editUser.php的页面中调用,代码如下: 
>
> ```js
> <?php 
> 		// 先引入外部文件
> 		require('../functions.php');
> 	// 1.获取提交过来的数据
> 	  // $_POST
> 		$id = $_POST['id'];
> 		// $email = $_POST['email'];
> 		// $slug = $_POST['slug'];
> 		// $nickname = $_POST['nickname'];
>
> 		// print_r($_POST);
> 		// exit;
>
> 		// // 2. 先连接数据库
> 		// $conn = mysqli_connect('127.0.0.1','root','root','cmsdatabase');
>
> 		// // 3.判断是否连接成功
> 		// if(!$conn){
> 		// 	die('数据库连接失败...');
> 		// }
>
> 		// // 4.设置编码集
> 		// mysqli_set_charset($conn,'utf-8');
>
> 		// 5.修改数据
>
> 		// $sql='update users set email= "'.$email.'",slug = "'.$slug.'",nickname = "'.$nickname.'" where id = '.$id;
> 	  // $sql =	"UPDATE users set email ='".$email."',slug='".$slug."',nickname = '".$nickname."' where id = ".$id;
> 	 // $res =	mysqli_query($conn,$sql);
> 		$res = update('users',$_POST,$id);
> 	 if($res){
> 	 	 $arr = array(
> 	 	 	"code"=>200,
> 	 	 	"msg"=>"修改成功"
> 	 	 );
> 	 }else {
> 	 	$arr = array(
> 	 	 	"code"=>201,
> 	 	 	"msg"=>"修改失败"
> 	 	 );
> 	 }
>
> 	 echo json_encode($arr);
>  ?>
> ```
>
> ## 2.个人中心
>
> ### 2.1 渲染页面
>
> 1.首先把admin文件夹下面的profile.html文件修改成profile.php
>
> 2.到inc文件夹下面的navBar.php中将个人中心的链接修改成如下代码: 4
>
> ```js
> <nav class="navbar">
>       <button class="btn btn-default navbar-btn fa fa-bars"></button>
>       <ul class="nav navbar-nav navbar-right">
>         <li><a href="/admin/profile.php"><i class="fa fa-user"></i>个人中心</a></li>
>         <li><a href="login.html"><i class="fa fa-sign-out"></i>退出</a></li>
>       </ul>
> </nav>
> ```
>
> 3.在profile.php页面中,首先判断用户是否登陆:
>
> ```js
> <?php
>     // 1. 先导入外部文件
>   require('../functions.php');
>
>   // 2. 检测用户是否登陆
>   checkLogin();
> ```
>
> 4.根据id获取当前用户的数据,代码如下:
>
> ```js
> // 4. 根据id查询此用户的数据
>   $row = query('select * from users where id ='.$id)[0];
> ```
>
> 5.渲染页面,代码如下:
>
> ```js
> <form class="form-horizontal">
>         <div class="form-group">
>           <label class="col-sm-3 control-label">头像</label>
>           <div class="col-sm-6">
>             <label class="form-image">
>               <input id="avatar" type="file">
>               <img src="<?php echo $row['avatar'] ?>">
>               <i class="mask fa fa-upload"></i>
>             </label>
>           </div>
>         </div>
>         <div class="form-group">
>           <label for="email" class="col-sm-3 control-label">邮箱</label>
>           <div class="col-sm-6">
>             <input id="email" class="form-control" name="email" type="type" value="<?php echo $row['email'] ?>" placeholder="邮箱" readonly>
>             <p class="help-block">登录邮箱不允许修改</p>
>           </div>
>         </div>
>         <div class="form-group">
>           <label for="slug" class="col-sm-3 control-label">别名</label>
>           <div class="col-sm-6">
>             <input id="slug" class="form-control" name="slug" type="type" value="<?php echo $row['slug'] ?>" placeholder="slug">
>             <p class="help-block">https://zce.me/author/<strong>zce</strong></p>
>           </div>
>         </div>
>         <div class="form-group">
>           <label for="nickname" class="col-sm-3 control-label">昵称</label>
>           <div class="col-sm-6">
>             <input id="nickname" class="form-control" name="nickname" type="type" value="<?php echo $row['nickname'] ?>" placeholder="昵称">
>             <p class="help-block">限制在 2-16 个字符</p>
>           </div>
>         </div>
>         <div class="form-group">
>           <label for="bio" class="col-sm-3 control-label">简介</label>
>           <div class="col-sm-6">
>             <textarea id="bio" class="form-control" placeholder="Bio" cols="30" rows="6"><?php echo $row['bio'] ?></textarea>
>           </div>
>         </div>
>         <div class="form-group">
>           <div class="col-sm-offset-3 col-sm-6">
>             <button type="submit" class="btn btn-primary">更新</button>
>             <a class="btn btn-link" href="password-reset.html">修改密码</a>
>           </div>
>         </div>
>       </form>
> ```
>
> ### 2.2更新个人数据信息
>
> 1.在profile.php页面中修改from表单,添加method和action,代码如下:1
>
> ```js
> <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
>         <div class="form-group">
>           <label class="col-sm-3 control-label">头像</label>
>           <div class="col-sm-6">
>             <label class="form-image">
>               <input id="avatar" type="file">
>               <img src="<?php echo $row['avatar']?$row['avatar']:'../assets/img/aa.jpg' ?>">
>               <i class="mask fa fa-upload"></i>
>             </label>
>           </div>
>         </div>
> ```
>
> 2.在profile.php页面中书写更新的代码,如下:
>
> ```js
> <?php 
>   // 1. 先导入外部文件
>   require('../functions.php');
>
>   // 2. 检测用户是否登陆
>   checkLogin();
>
>   // 下面需要做的就是要渲染当前登陆用户的信息
>   // print_r($_SESSION['userInfo']);
>
>     // Array
>     // (
>     //     [id] => 1
>     //     [slug] => admin
>     //     [email] => admin@admin.com
>     //     [password] => 123456
>     //     [nickname] => 管理员
>     //     [avatar] => /static/uploads/avatar.jpg
>     //     [bio] => 
>     //     [status] => activated
>     // )
>   // 3. 获取当前登陆用户的id
>   $id = $_SESSION['userInfo']['id'];
>
>   // 4. 根据id查询此用户的数据
>   $row = query('select * from users where id ='.$id)[0];
>   // print_r($row);
>
>   // 5.判断用户是否是post提交
>   if(!empty($_POST)){
>
>     // 5.1 删除掉email,因为当前的更新不包括email的更新
>     unset($_POST['email']);
>
>     // 5.2 调用方法更新数据
>      $res = update('users',$_POST,$id);
>
>      // 5.3 判断是否更新成功
>      if(!$res){
>       // 刷新当前页面
>       $msg = '页面更新不成功...';
>      }else {
>        // 刷新 当前页面
>       header('Location:/admin/profile.php');
>      }
>
>   }
>
>   // Array
>   // (
>   //     [0] => Array
>   //         (
>   //             [id] => 1
>   //             [slug] => admin
>   //             [email] => admin@admin.com
>   //             [password] => 123456
>   //             [nickname] => 管理员
>   //             [avatar] => /uploads/avatar.jpg
>   //             [bio] => 
>   //             [status] => activated
>   //         )
>
>   // )
>   // exit;
>  ?>
> ```
>
> ### 2.3头像上传的实现
>
> 1.在profile.php文件中获取上传文件的表单,并注册事件
>
> ```js
> <script type="text/javascript">
>   // 1.给上传文件的表单注册一个change事件
>   $('#avatar').on('change',function(){
>     // console.log(123);
>     // change事件是在文件被选中,点打开按钮的一瞬间就被触发
>     // 可以在这个事件被触发的时候,向后台传输数据
>
>     // for(var key in this){
>     //   console.log(key+"==="+this[key]);// files 是存储所有要上传文件的一个列表信息
>     // }
>     // console.log(this['files'][0]); // 获取到要上传的图片信息
>     // 2.创建一个FormData对象
>     var data = new FormData(); // FormData()会将数据最终转换成二进制流进行传输
>
>     data.append('avatar',this['files'][0]);
>
>     // 3.创建异步对象
>     var xhr = new XMLHttpRequest();
>
>     // 4.设置请求行
>     xhr.open('post','/admin/uploadFile.php');
>
>     // 5.设置请求行 省略这一步  因为现在传输的是new FormData()的实例
>
>     // 6.设置请求体  发送数据
>     xhr.send(data);
>
>     // 7.监视异步对象的状态
>     xhr.onreadystatechange = function () {
>       if(xhr.status == 200 && xhr.readyState == 4){
>         // var txt = xhr.responseText;
>         // ../uploads/5b225a5172761.gif
>         $('#avatar').next().attr('src',xhr.responseText);
>       }
>     }
>     /**
>      * 上传文件的时候,前端做的工作
>      * 1.获取上传文件的标签对象,注册changer事件
>      * 2.创建序列化对象
>      * 3.将要上传的文件添加到data当中
>      * 4.使用原生异步的方式向后台传输数据
>      * 5.后台处理完毕之后,前端接收后台返回来的图片路径
>      * 6.将上传的图片渲染在当前的页面上
>      */
>   })
> </script>
> ```
>
> 2.在uploadFile.php文件中接收传输过来的图片,并存储到数据库
>
> ```js
> <?php 
> 	// 5. 先引入外部文件
> 	require('../functions.php');
>
> 	// 1.先判断是否有文件传过来
> 		// print_r($_FILES);
> 		// exit;
> 		// Array
> 		// (
> 		//     [avatar] => Array
> 		//         (
> 		//             [name] => 002.gif
> 		//             [type] => image/gif
> 		//             [tmp_name] => C:\Windows\php5901.tmp
> 		//             [error] => 0
> 		//             [size] => 20567
> 		//         )
>
> 		// )
> 	if(isset($_FILES['avatar'])){
> 		// 接收文件存储起来指定的目标文件夹  uploads
> 		// 2.判断目标文件夹是否存在
> 		if(!file_exists('../uploads')){
> 			mkdir('../uploads'); // 如果当前这个文件夹不存的话,则使用mkdir函数创建一个文件夹
> 		}
>
> 		// 因为上传的文件名称有可能重复,因为要生成一个随机的图片名称
> 		// 3.获取上传的图片的后缀
> 		$ext = explode('.',$_FILES['avatar']['name'])[1];
> 		// print_r($ext);
> 		// Array
> 		// (
> 		//     [0] => 00001
> 		//     [1] => jpg
> 		// )
> 		$name = uniqid().".".$ext;  // 5b2257e963a3b.gif
> 		// echo $name;
> 		// exit;
>
> 		// 4. 移动到指定的目录
> 		move_uploaded_file($_FILES['avatar']['tmp_name'],'../uploads/'.$name);
>
> 		// 6. 将图片路径存在数据库里
> 		$path = '../uploads/'.$name;
> 		$arr = array(
> 			'avatar'=>$path
> 		);
> 		session_start();
> 		$id = $_SESSION['userInfo']['id']; //获取当前要更新的数据的id
> 		$res = update('users',$arr,$id);
>
> 		// 7. 判断更新是否成功
> 		if($res){
> 			// 向前台返回一个路径
> 			echo $path;
> 		}else {
> 			echo '修改失败...';
> 		}
> 	}
>
> 	/**
> 	 * 上传图片的步骤 在后台里面的操作步骤
> 	 * 1. 判断是否有文件提交过来
> 	 * 2. 接收上传过来的文件,将此文件移动到指定的目标
> 	 * 3. 判断指定的目录文件夹是否存在,如果存在则直接移动,如果不存在,则先创建
> 	 * 4. 为了避免上传的文件名称重复,需要生成随机的文件名称
> 	 * 5. 获取文件名的后缀,拼接成一个随机的文件名称
> 	 * 6. 调用 move_uploaded_file()移动到指定的目标位置
> 	 * 7. 将当前的文件存储路径更新回数据库
> 	 * 8. 如果更新成功,则将当前的文件路径返回给前端
> 	 */
>  ?>
> ```
>
> 3.前台接收到用户传输过来的,路径渲染当前页面
>
> ```js
> // 7.监视异步对象的状态
>     xhr.onreadystatechange = function () {
>       if(xhr.status == 200 && xhr.readyState == 4){
>         // var txt = xhr.responseText;
>         // ../uploads/5b225a5172761.gif
>         $('#avatar').next().attr('src',xhr.responseText); // 给img添加标签
>       }
>     }
> ```
>
> ## 3.退出功能的实现
>
> 3.1在inc/navBar.php页面中写如下代码: 5
>
> ```js
> <nav class="navbar">
>    <button class="btn btn-default navbar-btn fa fa-bars"></button>
>    <ul class="nav navbar-nav navbar-right">
>       <li><a href="/admin/profile.php"><i class="fa fa-user"></i>个人中心</a></li>
>       <li><a href="/admin/logout.php"><i class="fa fa-sign-out"></i>退出</a></li>
>     </ul>
> </nav>
> ```
>
> 3.2在logout.php中书写如下代码:
>
> ```js
> <?php 
> 	// 要退出当前的登陆  其实就是将之前的sessionID给清除掉
>
> 	// 1.开启session
> 	session_start();
>
> 	// 2.删除掉sessionID
> 	unset($_SESSION['userInfo']);
> 	
> 	// 3.跳转到登陆页面
> 	header('Location:/admin/login.php');
>  ?>
> ```
>
> ## 4.侧边栏头像和昵称的实现
>
> 在aside.php中修改如下代码:
>
> ```js
> <div class="aside">
>     <div class="profile">
>       <img class="avatar" src="<?php echo $_SESSION['userInfo']['avatar']?$_SESSION['userInfo']['avatar']:'/assets/img/aa.jpg'?>">
>       <h3 class="name"><?php echo $_SESSION['userInfo']['nickname'] ?></h3>
>     </div>
> ```
>
> ## 1.所有文章页面的渲染
>
> ### 1.引入公共资源文件
>
> 1.将公共资源文件引入
>
> ```
> <?php include './inc/css.php' ?>
> <?php include './inc/script.php' ?>
> <?php include './inc/navBar.php' ?>
> <?php include './inc/aside.php' ?>
> ```
>
> ### 2.渲染当前页面数据
>
> 1.将admin/posts.html页面修改成posts.php
>
> 2.检测用户是否登陆
>
> ```js
> <?php 
>   // 1. 引入外部文件
>   require('../functions.php');
>
>   // 2. 检测用户是否登陆
>   checkLogin();// 
>  ?>
> ```
>
> 
>
> 3.在posts.php页面底部发送ajax请求,代码如下:
>
> ```js
> <script type="text/javascript">
>   // 发送ajax请求渲染页面
>   // 1.发送ajax请求
>   $.ajax({
>     type:'get',
>     url:'/admin/int/postsInt.php',
>     success:function(res){
>
>     }
>   })
> </script>
> ```
>
> 4.在admin/int新建postsInt.php文件,并写如下代码
>
> ```js
> <?php 
> 	
> 	// 1. 引入外部文件
> 	require('../../functions.php');
> 	// 2. 查询数据库获取数据
> 	$arr = query('select * from posts');
>
> 	// 3. 判断是否有查询结果
> 	if(!empty($arr)){
> 		$arr = array(
> 			'code'=>200,
> 			'msg'=>'查询成功',
> 			'data'=>$arr
> 		);
> 	}else {
> 		$arr=array(
> 			'code'=>201,
> 			'msg'=>'查询失败'
> 		);
> 	}
>
> 	// 4. 返回查询结果
> 	echo json_encode($arr);
>  ?>
> ```
>
> 5.前端接收后台数据并处理,代码如下:
>
> ```js
> <script type="text/javascript">
>   // 发送ajax请求渲染页面
>   // 1.发送ajax请求
>   $.ajax({
>     type:'get',
>     url:'/admin/int/postsInt.php',
>     dataType:'json',
>     success:function(res){
>       if(res&&res.code == 200){
>         // 要渲染页面
>         var htmlStr = template('PListTmp',res);
>         $('#list').html(htmlStr);
>       }
>     }
>   })
> </script>
> ```
>
> 6.要准备页面模板
>
> ```
> <script type="text/template" id="PListTmp">
>   {{each data as val key}}
>     <tr>
>       <td class="text-center"><input type="checkbox"></td>
>       <td>{{val.title}}</td>
>       <td>{{val.user_id}}</td>
>       <td>{{val.category_id}}</td>
>       <td class="text-center">{{val.created}}</td>
>       <td class="text-center">{{val.status}}</td>
>       <td class="text-center">
>         <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
>         <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
>       </td>
>     </tr>
>     {{/each}}
> </script>
> ```
>
> 7.记得给tbody添加一个list的id
>
> ```js
> <tbody id="list">
>           
>           
> </tbody>
> ```
>
> 8.显示的文章状态要改变一下,代码如下: 9--13行
>
> ```js
> <script type="text/template" id="PListTmp">
>   {{each data as val key}}
>     <tr>
>       <td class="text-center"><input type="checkbox"></td>
>       <td>{{val.title}}</td>
>       <td>{{val.user_id}}</td>
>       <td>{{val.category_id}}</td>
>       <td class="text-center">{{val.created}}</td>
>       {{if val.status == 'published'}}
>         <td class="text-center">已发布</td>
>       {{else if val.status == 'drafted'}}
>         <td class="text-center">草稿</td>
>       {{/if}}
>       <td class="text-center">
>         <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
>         <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
>       </td>
>     </tr>
>     {{/each}}
> </script>
> ```
>
> 9.页面显示的作者和分类的数字情况,应该是正常的作者名和分类名,这就要涉及到多表查询.
>
> ### 3.删除功能的实现
>
> 1.给删除按钮添加一个类,并添加data-id属性
>
> ```js
> <script type="text/template" id="postsListTmp">
>   {{each data as val key}}
>       <tr>
>         <td class="text-center"><input type="checkbox"></td>
>         <td>{{val.title}}</td>
>         <td>{{val.user_id}}</td>
>         <td>{{val.category_id}}</td>
>         <td class="text-center">{{val.created}}</td>
>         {{if val.status == 'published'}}
>           <td class="text-center">已发布</td>
>         {{else if val.status == 'drafted'}}
>           <td class="text-center">草稿</td>
>         {{/if}}
>         <td class="text-center">
>           <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
>           <button class="btn btn-danger btn-xs btnDel" data-id="{{val.id}}">删除</button>
>         </td>
>       </tr>
>   {{/each}}
> </script>
> ```
>
> 2.给删除按钮注册事件
>
> ```js
>  // 1. 给删除按钮注册事件
>   $('tbody').on('click','.btnDel',function(){
>     // 2. 获取当前按钮的id
>     var id = $(this).attr('data-id');
>
>     // 3. 发送ajax请求
>     $.ajax({
>       type:'get',
>       url:'/admin/int/postsInt.php',
>       data:{
>         id:id,
>         action:'delPosts'
>       },
>       dataType:'json',
>       success:function(res){
>         if(res&&res.code == 200){
>           // 重新渲染当前页面，也就是重新刷新 当前页面
>           renderData();
>         }
>       }
>     })
>   })
> ```
>
> 
>
> 3.因为要重新刷新页面,所以要对之前的代码进行封装
>
> ```js
>  // 发送请求,获取整个页面的数据
>   renderData();
>   function renderData(){
>      $.ajax({
>       type:'get',
>       url:'/admin/int/postsInt.php',
>       dataType:'json',
>       success:function(res){
>         if(res&&res.code == 200){
>           // 将数据渲染在页面上
>           var htmlStr = template('postsListTmp',res);// 准备模板字符串
>           $('tbody').html(htmlStr); // 渲染页面
>         }
>       }
>     })
>   }
> ```
>
> 
>
> ## 2.写文章页面的实现
>
> ### 1.引入公共资源文件
>
> 1.将admin/post-add.html页面改成post-add.php
>
> 2.引入公共资源文件
>
> ```js
> <?php include './inc/css.php' ?>
> <?php include './inc/script.php' ?>
> <?php include './inc/navBar.php' ?>
> <?php include './inc/aside.php' ?>
> ```
>
> 
>
> ### 2.渲染当前页面数据
>
> 1.当修改完了以上内容之后,在页面访问的时候,头像和昵称是会报错的,因为没有开启session
>
> 2.在post-add.php页面的顶部检测用户是否
>
> ```js
> <?php 
>   // 1. 引入外部文件
>    require('../functions.php');
>
>   // 2. 检测用户是否登陆
>    checkLogin();// 
>  ?> 
> ```
>
> 3.在post-add.php的页面底部写js代码发送ajax请求渲染当前页面内容
>
> ```js
> <script type="text/javascript">
>   $.ajax({
>     type:'get',
>     url:'/admin/int/post-addInt.php',
>     success:function(res){
>       
>     }
>   })
> </script>
> ```
>
> 4.在admin/int文件夹下面新建post-addInt.php文件,并写代码如下:
>
> ```js
> <?php 
> 	// 1.引入外部文件
> 	require('../../functions.php');
>
> 	// 2. 调用方法查询数据库
> 	$res = query('select * from categories');
>
> 	// 3. 判断查询结果
> 	if(!empty($res)){
> 		$arr = array(
> 			'code'=>200,
> 			'msg'=>'查询成功',
> 			'data'=>$res
> 		);
> 	}else {
> 		$arr = array(
> 			'code'=>201,
> 			'msg'=>'查询失败'
> 		);
> 	}
>
> 	// 4. 返回查询结果
> 	echo json_encode($res);
>  ?>
> ```
>
> 5.数据请求回来之后,处理如下：
>
> ```js
> <script type="text/javascript">
>   $.ajax({
>     type:'get',
>     url:'/admin/int/post-addInt.php',
>     dataType:'json',
>     success:function(res){
>       if(res&&res.code == 200){
>         // 渲染模板
>         var htmlStr = template('cateTmp',res);
>         $('#cateList').html(htmlStr);
>       }
>     }
>   })
> </script>
> ```
>
> 6.准备模板,渲染数据
>
> ```js
> <script type="text/template" id="cateTmp">
>   <label for="category">所属分类</label>
>        <select id="category" class="form-control" name="category">
>         {{each data as val key}}
>         <option value="{{val.id}}">{{val.name}}</option>
>         {{/each}}
>     </select>
> </script>
> ```
>
> 7.不要忘了给上面的div添加一个id
>
> ```js
> <div class="form-group" id="cateList">
>             
> </div>
> ```
>
> ### 3.上传图片
>
> 1.给按钮注册改变的事件
>
> ```js
>   // *****************下面是图片或是文件上传*********************
>   // 1. 给按钮注册事件
>   $('#feature').on('change',function(){
>     // 2. 创建对象 
>      var data = new FormData();
>
>      // console.log(this.files[0]); // this.files里面是所有的文件列表
>      // 3. 将要上传的文件添加到里面
>      data.append('feature',this.files[0]);
>
>      // 4. 创建异步对象
>      var xhr = new XMLHttpRequest();
>
>      // 5. 设置请求行
>      xhr.open('post','/admin/int/post-addUploadFile.php');
>
>      // 6. 设置请求头  这一步是可以省略的,是不用设置的
>
>      // 7. 设置请求体  就是往后台发送数据
>      xhr.send(data);
>
>      // 8. 监视异步对象的变化,注册监听事件
>      xhr.onreadystatechange = function () {
>        if(xhr.status == 200 && xhr.readyState == 4){
>          // 要将上传的图片展示在当前的这个位置
>          $('.thumbnail').attr('src',xhr.responseText).show();
>
>          // 将图片在服务器文件中的路径存在当前的表单当中
>          
>        }
>      }
>   })
>   /**
>    * 图片上传的思路:
>    * 1. 给文件按钮featurn注册change事件
>    * 2. 创建FormData对象
>    * 3. 将要上传的文件添加到这个对象当中
>    * 4. 创建异步对象
>    * 5. 设置请求行   请可以头可以省略
>    * 6. 设置请求体
>    * 7. 监视异步对象的变化
>    * 8. 将服务器返回来的图片路径,设置到img标签,让图片在本地渲染出来
>    * 9. 将图片的路径存在一个表单当中
>    * 10. 单击保存按钮，上传所有的数据
>    */
>
> ```
>
> 2.在admin/int下面新建一个post-addUploadFile.php的文件,写代码如下:
>
> ```js
> <?php 
> 	// 1. 判断是否有文件上传过来
> 	if(isset($_FILES['feature'])){
> 		// 2. 判断目标文件是否存
> 		if(!file_exists('../../uploads')){
> 			mkdir('../../uploads');
> 		}
>
> 		// 3. 获取文件的后缀
> 		$ext = explode('.',$_FILES['feature']['name'])[1];
> 		// print_r($ext);
> 			// Array
> 			// (
> 			//     [0] => 002
> 			//     [1] => gif
> 			// )
>
> 		// 4. 拼接路径
> 		$path = '../../uploads/'.uniqid().'.'.$ext;
>
> 		// 5. 将图片移动到指定的目标位置
> 		move_uploaded_file($_FILES['feature']['tmp_name'],$path);
>
> 		// 6. 将路径返回给前台浏览器
> 		echo $path;
> 	}
> 		// print_r($_FILES);
> 		// exit;
> 		// Array
> 		// (
> 		//     [feature] => Array
> 		//         (
> 		//             [name] => 002.gif
> 		//             [type] => image/gif
> 		//             [tmp_name] => C:\Windows\php670C.tmp
> 		//             [error] => 0
> 		//             [size] => 20567
> 		//         )
> 		// )
> 	/**
> 	 * 上传文件的思路
> 	 * 1.判断文件是否上传过来
> 	 * 2.判断目标目录是否存在
> 	 * 3.获取上传文件的后缀名
> 	 * 4.生一个路径和唯一的名称
> 	 * 5.移动到指定的目标位置
> 	 * 6.将图片存储的路径返回给前端
> 	 */
>  ?>
> ```
>
> ### 4.添加文章
>
> 1.在表单中添加两个隐藏域
>
> ```js
> <div class="form-group">
>      <label for="title">标题</label>
>      <input id="title" class="form-control input-lg" name="title" type="text" placeholder="文章标题">
>      <input type="hidden" name="user_id" value="<?php echo $_SESSION['userInfo']['id']?>">
>  </div>
>
> <div class="form-group">
>       <label for="feature">特色图像</label>
>       <!-- show when image chose -->
>       <img class="help-block thumbnail" style="display: none">
>      <input id="feature" class="form-control" type="file">
>     <input id="thumb" name="feature" type="hidden">
> </div>
> ```
>
> 2.修改一下name的值
>
> ```js
> <script type="text/template" id="cateListTmp">
>     <label for="category">所属分类</label>
>       <select id="category" class="form-control" name="category_id">
>         {{each data as val key}}
>           <option value="{{val.id}}">{{val.name}}</option>
>         {{/each}}
>       </select>
> </script>
> ```
>
> 
>
> 3.给保存按钮添加一个id
>
> ```js
> <div class="form-group">
>             <button class="btn btn-primary" id="btnSave" type="submit">保存</button>
> </div>
> ```
>
> 
>
> 4.给保存按钮注册事件
>
> ```js
> // ***************提交数据到服务器**********************
>   $('#btnSave').on('click',function(){
>     $.ajax({
>       type:'post',
>       url:'/admin/int/post-addInt.php',
>       data:$('form').serialize(),
>       success:function(res){
>
>       }
>     });
>
>     return false;// 不要刷新 页面
>   })
> ```
>
> 5.在后台页面post-addInt.php中书写代码,如下：
>
> ```js
> <?php 
> 	// 接收请求,进行处理,之后响应回去
> 	// 1. 引入外部文件
> 	require('../../functions.php');
>
> 	if(empty($_POST)){  // get请求的时候
> 		// 2. 调用方法,查询数据库
> 			$res = query('select * from categories');// 虽然当前是添加文章的页面,但是这个分类信息还是来源于分类表中的name
>
> 			// 3. 判断查询是否成功
> 			if(!empty($res)){
> 				$arr = array(
> 					'code'=>200,
> 					'msg'=>'查询成功',
> 					'data'=>$res
> 				);
> 			}else {
> 				$arr = array(
> 					'code'=>201,
> 					'msg'=>'查询失败'
> 				);
> 			}
>
> 			// 4. 返回结果
> 			echo json_encode($arr);
> 			exit;
> 	}
>
> 	// post请求的时候的数据
> 	if(!empty($_POST)){ // 是post过来的数据
> 		// 1. 调用方法进行提交
> 		$res = insert('posts',$_POST);
>
> 		// 2. 判断数据是否插入成功
> 		if($res){
> 			$arr = array(
> 				'code'=>200,
> 				'msg'=>'添加数据成功'
> 			);
> 		}else {
> 			$arr = array(
> 				'code'=>201,
> 				'msg'=>'添加数据失败'
> 			);
> 		}
>
> 		// 3. 将添加结果返回给前端页面
> 		echo json_encode($arr);
> 	}
>
>  ?>
> ```
>
> 
>
> 5.刷新页面
>
> ```js
> // ***************提交数据到服务器**********************
>   $('#btnSave').on('click',function(){
>     $.ajax({
>       type:'post',
>       url:'/admin/int/post-addInt.php',
>       data:$('form').serialize(),
>       dataType:'json',
>       success:function(res){
>         if(res&&res.code == 200){
>           location.href='./posts.php';// 跳转到另一个页面
>         }
>       }
>     });
>
>     return false;// 不要刷新 页面
>   })
> ```
>
> ## 3.评论功能的实现
>
> ### 1.改造页面
>
> 1.将admin/comments.html页面修改成admin/comments.php
>
> 2.引入公共样式文件
>
> ```js
> <?php include './inc/css.php' ?>
> <?php include './inc/script.php' ?>
> <?php include './inc/navBar.php' ?>
> <?php include './inc/aside.php' ?>
> ```
>
> 3.此时刷新 页面的话,会发现报错.
>
> 4.因此需要在页面的顶部开启用户验证
>
> ```js
> <?php 
>   // 1. 引入外部文件
>   require('../functions.php');
>
>   // 2. 检测用户是否登陆
>   checkLogin();
>  ?>
> ```
>
> ### 2.渲染当前页面
>
> 1.在页面底部发送ajax请求
>
> ```js
> <script type="text/javascript">
>   // 发送ajax请求
>   $.ajax({
>     type:'get',
>     url:'/admin/int/commentsInt.php',
>     dataType:'json',
>     success:function(res){
>      
>     }
>   })
> </script>
> ```
>
> 2.在admin/int文件夹下新建文件commentsInt.php文件
>
> 3.在此文件中写如下代码:
>
> ```js
> <?php 
> 	// 1. 引入外部文件
> 	require('../../functions.php');
>
> 	// 2. 调用方法查询数据
> 	$res = query('select * from comments');
>
> 	// 3. 判断读取的数据
> 	if(!empty($res)){
> 		$arr = array(
> 			'code'=>200,
> 			'msg'=>'读取成功',
> 			'data'=>$res
> 		);
> 	}else {
> 		$arr = array(
> 			'code'=>201,
> 			'msg'=>'读取失败'
> 		);
> 	}
>
> 	// 4. 将结果返回给前端页面
> 	echo json_encode($arr);
>  ?>
> ```
>
> 4.前台页面根据返回来的数据进行页面的渲染,首先拼接模板
>
> ```js
> <script type="text/template" id="commListTmp">
>   {{each data as val key}}
>       <tr class="danger">
>         <td class="text-center"><input type="checkbox"></td>
>         <td>{{val.author}}</td>
>         <td>{{val.content}}</td>
>         <td>《Hello world》</td>
>         <td>{{val.created}}</td>
>         {{if val.status =='approved'}}
>           <td>批准</td>
>         {{else if val.status =='rejected'}}
>           <td>拒绝</td>
>         {{else if val.status =='held'}}
>           <td>正在审核</td>
>         {{/if}}
>         <td class="text-center">
>           <a href="post-add.html" class="btn btn-info btn-xs">批准</a>
>           <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
>         </td>
>       </tr>
>    {{/each}}
> </script>
> ```
>
> 5.调用函数,渲染页面
>
> ```js
> <script type="text/javascript">
>   // 发送ajax请求
>   $.ajax({
>     type:'get',
>     url:'/admin/int/commentsInt.php',
>     dataType:'json',
>     success:function(res){
>       if(res&&res.code == 200){
>         // 根据数据渲染页面
>         var htmlStr = template('commListTmp',res);
>
>         // 渲染页面
>         $('tbody').html(htmlStr);
>       }
>     }
>   })
> </script>
> ```
>
> ## 4.导航菜单
>
> ### 1.引入公共资源文件
>
> 1.将admin/nav-munus.html页面改成nav-menus.php
>
> 2.引入公共样式
>
> ```js
> <?php include './inc/css.php' ?>
> <?php include './inc/script.php' ?>
> <?php include './inc/navBar.php' ?>
> <?php include './inc/aside.php' ?>
> ```
>
> 3.在页面的顶部引入外部文件,并检测用户是否登陆
>
> ```js
> <?php 
>   // 1. 引入外部文件
>   require('../functions.php');
>
>   // 2. 检测用户是否登陆
>   checkLogin();
>  ?>
> ```
>
> ### 2.渲染当前页面
>
> 1.在admin/nav-menus.php页面的底部发送ajax请求:
>
> ```js
> <script type="text/javascript">
>   // 发送请求,来渲染页面
>   $.ajax({
>     type:'get',
>     url:'/admin/int/nav-menusInt.php',
>     dataType:'json',
>     success:function(res){
>      
>     }
>   })
> </script>
> ```
>
> 2.在admin/int中新建文件nav-menusInt.php文件,并写代码如下:
>
> ```js
> <?php 
> 	// 1. 引入外部文件
> 	require('../../functions.php');
>
> 	// 2. 调用方法查询数据
> 	$res = query("SELECT `VALUE` from options where `key` = 'nav_menus'");
>
> 	// print_r($res[0]['VALUE']);
> 	// var_dump($res[0]['VALUE']);
>
> 	// 3. 判断数组是否为空
> 	if(!empty($res)){
> 		$json = json_decode($res[0]['VALUE'],true);
> 		// print_r($json);
> 		$arr = array(
> 			'code'=>200,
> 			'msg'=>'查询成功',
> 			'data'=>$json
> 		);
> 	}else {
> 		$arr = array(
> 			'code'=>201,
> 			'msg'=>'查询失败...'
> 		);
> 	}
>
> 	// 4.将查询结果返回给前端页面
> 	echo json_encode($arr); // 前后端数据的交互要么是二进制数据要么是字符串
>  ?>
> ```
>
> 3.准备模板
>
> ```js
> <script type="text/template" id="menusListTmp">
>   {{each data as val key}}
>       <tr>
>         <td class="text-center"><input type="checkbox"></td>
>         <td><i class="{{val.icon}}"></i>{{val.text}}</td>
>         <td>{{val.title}}</td>
>         <td>{{val.link}}</td>
>         <td class="text-center">
>           <button class="btn btn-danger btn-xs btnDel" data-id="{{key}}">删除</button>
>         </td>
>       </tr>
>    {{/each}}
> </script>
> ```
>
> 4.调用方法,渲染模板
>
> ```js
> <script type="text/javascript">
>   // 发送请求,来渲染页面
>   $.ajax({
>     type:'get',
>     url:'/admin/int/nav-menusInt.php',
>     dataType:'json',
>     success:function(res){
>       if(res&&res.code == 200){
>        var htmlStr = template('menusListTmp',res);
>        $('tbody').html(htmlStr);
>       }
>     }
>   })
> </script>
> ```
>
> ## 5.图片轮播
>
> ### 1.引入公共样式文件
>
> 1.将admin/slides.html页面修改成slides.php页面
>
> 2.引入公共资源文件
>
> ```js
> <?php include './inc/css.php' ?>
> <?php include './inc/script.php' ?>
> <?php include './inc/navBar.php' ?>
> <?php include './inc/aside.php' ?>
> ```
>
> 3.在页面的顶部检测用户名是否登陆
>
> ```js
> <?php 
>   // 1. 引入外部文件
>   require('../functions.php');
>
>   // 2. 检测用户名是否登陆
>   checkLogin();
>  ?>
> ```
>
> ### 2.渲染当前页面
>
> 1.在页面的顶部书写发送ajax请求的代码
>
> ```js
> <script type="text/javascript">
>   $.ajax({
>     type:'get',
>     url:'/admin/int/slidesInt.php',
>     success:function(res){
>      
>     }
>   })
> </script>
> ```
>
> 2.在admin/int文件夹下新建slidesInt.php文件书写如下代码:
>
> ```js
> <?php 
> 	// 1. 引入外部文件
> 	require('../../functions.php');
>
> 	// 2. 调用方法查询数据库
> 	$res = query('select `value` from options where `key` = "home_slides"' );
> 	// print_r($res[0]['value']);
> 	// 3. 判断查询到的数据
> 	if(!empty($res)){
> 		$json = json_decode($res[0]['value'],true);// 将字符串转换成数组
>
> 		$arr = array(
> 			'code'=>200,
> 			'msg' => '查询成功',
> 			'data'=>$json
> 		);
> 	}else {
> 		$arr = array(
> 			'code'=>200,
> 			'msg' => '查询成功'
> 		);
> 	}
>
> 	// 4. 返回查询结果
> 	echo json_encode($arr);
>  ?>
> ```
>
> 3.前台接收到后台传过来的数据,进行字符串的拼接: 5   7
>
> ```js
> <script type="text/javascript">
>   $.ajax({
>     type:'get',
>     url:'/admin/int/slidesInt.php',
>     dataType:'json',
>     success:function(res){
>       if(res&&res.code == 200){
>          // 准备模板渲染页面
>          var htmlStr = template('slidesListTmp',res);
>          $('tbody').html(htmlStr);
>       }
>     }
>   })
> </script>
> ```
>
> 4.拼接模板字符串:
>
> ```js
> <script type="text/template" id="slidesListTmp">
>     {{each data as val key}}
>       <tr>
>         <td class="text-center"><input type="checkbox"></td>
>         <td class="text-center"><img class="slide" src="{{val.image}}"></td>
>         <td>{{val.text}}</td>
>         <td>{{val.link}}</td>
>         <td class="text-center">
>           <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
>         </td>
>       </tr>
>     {{/each}}  
> </script>
> ```
>
> ## 6.网站设置
>
> ### 1.引入公共样式文件
>
> 1.将admin/settings.html页面修改成settings.php
>
> 2.引入公共样式文件
>
> ```js
> <?php include './inc/css.php' ?>
> <?php include './inc/script.php' ?>
> <?php include './inc/navBar.php' ?>
> <?php include './inc/aside.php' ?>
> ```
>
> 3.此时刷新页面,还是会报错的,应该在顶部检测用户是否登陆
>
> ```js
> <?php 
>   // 1. 引入外部文件
>   require('../functions.php');
>
>   // 2. 检测用户是否登陆
>   checkLogin();
>  ?>
> ```
>
> 4.刷新页面,此时显示的就是正常的了.
>
> ### 2.渲染当前页面
>
> 1.在页面的底部发送ajax请求
>
> ```js
> <script type="text/javascript">
>   // 发送ajax请求,渲染页面
>   $.ajax({
>     type:'get',
>     url:'./admin/int/settingsInt.php',
>     success:function(){
>       
>     }
>   })
> </script>
> ```
>
> 2.在admin/int文件夹下面新建settingsInt.php文件,并书写代码如下
>
> ```js
> <?php 
> 	// 1. 引入外部文件
> 	require('../../functions.php');
>
> 	// 2. 调用sql语句,查询数据
> 	$res = query('select * from options where id < 9');
>
> 	// print_r($res);
> 	// 3. 判断是否有数据
> 	if(!empty($res)){
> 		$arr = array(
> 			'code'=>200,
> 			'msg'=>'查询成功',
> 			'$data'=>$res
> 		);
> 	}else {
> 		$arr = array(
> 			'code'=>200,
> 			'msg'=>'查询成功'
> 		);
> 	}
>
> 	// 4. 返回查询的结果到前台页面
> 	echo json_encode($arr);
>  ?>
> ```
>
> 3.数据回来后要准备模板,代码如下:
>
> ```js
> <script type="text/template" id="settingsTmp">
>   <div class="form-group">
>           <label for="site_logo" class="col-sm-2 control-label">网站图标</label>
>           <div class="col-sm-6">
>             <input id="site_logo" name="site_logo" type="hidden">
>             <label class="form-image">
>               <input id="logo" type="file">
>               {{if data[1]['value']}}
>                 <img src="{{data[1]['value']}}">
>               {{else}}  
>                 <img src="../uploads/aa.jpg">
>               {{/if}}
>               <i class="mask fa fa-upload"></i>
>             </label>
>           </div>
>         </div>
>         <div class="form-group">
>           <label for="site_name" class="col-sm-2 control-label">站点名称</label>
>           <div class="col-sm-6">
>             <input id="site_name" value="{{data[2]['value']}}" name="site_name" class="form-control" type="type" placeholder="站点名称">
>           </div>
>         </div>
>         <div class="form-group">
>           <label for="site_description" class="col-sm-2 control-label">站点描述</label>
>           <div class="col-sm-6">
>             <textarea id="site_description" name="site_description" class="form-control" placeholder="站点描述" cols="30" rows="6">{{data[3]['value']}}</textarea>
>           </div>
>         </div>
>         <div class="form-group">
>           <label for="site_keywords" class="col-sm-2 control-label">站点关键词</label>
>           <div class="col-sm-6">
>             <input id="site_keywords" value="{{data[4]['value']}}" name="site_keywords" class="form-control" type="type" placeholder="站点关键词">
>           </div>
>         </div>
>         <div class="form-group">
>           <label class="col-sm-2 control-label">评论</label>
>           <div class="col-sm-6">
>             <div class="checkbox">
>               {{if data[6]['value']==0}}
>                  <label><input id="comment_status"  name="comment_status" type="checkbox" >开启评论功能</label>
>               {{else }}
>                  <label><input id="comment_status"  name="comment_status" type="checkbox" checked>开启评论功能</label>
>               {{/if}}   
>             </div>
>             <div class="checkbox">
>               <label><input id="comment_reviewed"{{if data[7]['value']==0}} "" {{else}} checked {{/if}}name="comment_reviewed" type="checkbox" >评论必须经人工批准</label>
>             </div>
>           </div>
>         </div>
>         <div class="form-group">
>           <div class="col-sm-offset-2 col-sm-6">
>             <button type="submit" class="btn btn-primary">保存设置</button>
>           </div>
>         </div>
> </script>
> ```
>
> 4.调用模板方法, 渲染模板
>
> ```js
> <script type="text/javascript">
>   // 发送ajax请求,渲染页面
>   $.ajax({
>     type:'get',
>     url:'/admin/int/settingsInt.php',
>     dataType:'json',
>     success:function(res){
>       if(res&&res.code == 200){
>         var htmlStr = template('settingsTmp',res);
>         $('form').html(htmlStr);
>       }
>     }
>   })
> </script>
> ```
>
> ### 3.头像上传
>
> 1.给文件标签注册事件,代码如下:
>
> ```js
> // ****************给文件上的按钮注册事件*************************
>   $('form').on('change','input[type=file]',function(){
>     // 1. 创建FormData对象
>     var data = new FormData()
>
>     // 2. 添加数据
>     data.append('site_logo',this.files[0]);
>
>     // 3. 创建异步对象
>     var xhr = new XMLHttpRequest();
>
>     // 4. 设置请求行
>     xhr.open('post','/admin/int/settingsInt.php');
>
>     // 5. 设置请求头 这一步是可以省略的
>
>     // 6. 设置请求体
>     xhr.send(data);
>
>     // 7. 监视异步对象的变化 
>     xhr.onreadystatechange = function(){
>       if(xhr.status == 200 && xhr.readyState == 4){
>         
>       }
>     }
>   })
> ```
>
> 2.后台接收发送来的文件,要进行处理,代码如下:
>
> ```js
> <?php 
> 	// 1. 引入外部文件
> 	require('../../functions.php');
>
> 	// 判断是不是get请求,这个是用来渲染页面的
> 		if(empty($_POST)&&!isset($_FILES['site_logo'])){
> 			// 2. 调用sql语句,查询数据
> 			$res = query('select * from options where id < 9');
>
> 			// print_r($res);
> 			// 3. 判断是否有数据
> 			if(!empty($res)){
> 				$arr = array(
> 					'code'=>200,
> 					'msg'=>'查询成功',
> 					'data'=>$res
> 				);
> 			}else {
> 				$arr = array(
> 					'code'=>200,
> 					'msg'=>'查询成功'
> 				);
> 			}
>
> 			// 4. 返回查询的结果到前台页面
> 			echo json_encode($arr);
> 		}
>
> 		
> 		//***********************接收传过来的图片的操作***********************
> 		// 1. 判断有没有文件传过来
> 			if(isset($_FILES['site_logo'])){
> 				// 2. 判断有没有指定的文件夹,如果没有则创建一个
> 				if(!file_exists('../../uploads')){
> 					mkdir('../../uploads');
> 				}
>
> 				// 3. 获取后缀
> 				$ext = explode('.',$_FILES['site_logo']['name'])[1];
>
> 				// 4. 生成图片的路径
> 				$path = '../../uploads/'.uniqid().'.'.$ext;
>
> 				// 5. 移动到指定的目标文件
> 				move_uploaded_file($_FILES['site_logo']['tmp_name'],$path);
>
> 				// 6.  返回此路径到前台页面
> 				echo $path;
> 			}
>  ?>
> ```
>
> 3.前台接收到数据之后,进行图片的渲染
>
> ```js
> // 7. 监视异步对象的变化 
>     xhr.onreadystatechange = function(){
>       if(xhr.status == 200 && xhr.readyState == 4){
>
>         // 8. 将接收到的数据渲染到当前页面上
>         $('img').attr('src',xhr.responseText);
>
>         // 9. 将文件路径存到隐藏域里一份
>         $('input[type=hidden]').val(xhr.responseText);
>       }
>     }
> ```
>
> ### 4.上传数据
>
> 1.给保存按钮注册事件,代码如下:
>
> ```js
> // *************给保存按钮注册事件*********************
>   // 1. 给按钮注册事件
>   $('form').on('click','button[type=submit]',function(){
>     
>     // 2. 发送ajax请求
>     $.ajax({
>       type:'post',
>       url:'/admin/int/settingsInt.php',
>       dataType:'json',
>       success:function(res){
>
>       }
>     })
>     return false; // 阻止浏览器的默认刷新行为
>   })
> ```
>
> 2.在settingsInt.php中做如下 处理:
>
> ```js
> // **************判断是不是post提交过来的数据******************
> 		 // 1. 判断是不是post提交过来的数据
> 		 if(!empty($_POST)){
>
> 		 	 // 2. 判断提交过来的有没有对应的属性 如果没有选中的话, 提交过来的数据是没有comment_status和comment_reviewed两个选项的
> 			 // 	Array
> 				// (
> 				//     [site_logo] => ../../uploads/5b279de2c668e.gif
> 				//     [site_name] => 阿里百秀 - 发现生活，发现美！
> 				//     [site_description] => 阿里百秀同阿里巴巴有咩关系，答案当然系一啲都冇zxcZxcZxc
> 				//     [site_keywords] => 生活, 旅行, 自由, 诗歌, 科技
> 				// )
> 			  // 	Array
> 				// (
> 				//     [site_logo] => ../../uploads/5b279de2c668e.gif
> 				//     [site_name] => 阿里百秀 - 发现生活，发现美！
> 				//     [site_description] => 阿里百秀同阿里巴巴有咩关系，答案当然系一啲都冇zxcZxcZxc
> 				//     [site_keywords] => 生活, 旅行, 自由, 诗歌, 科技
> 				//     [comment_status] => on
> 				//     [comment_reviewed] => on
> 				// )
>
> 		 	 $_POST['comment_status'] = isset($_POST['comment_status'])?1:0;
> 		 	 $_POST['comment_reviewed'] = isset($_POST['comment_reviewed'])?1:0;
>
> 		 	 // 3. 调用方法连接数据库
> 		 	 $conn = connect();
> 		 	 // 4.循环遍历数组,准备sql语句 
> 		 	 $flag = true;
> 		 	 foreach($_POST as $key => $val){
> 		 	 	 $sql = "update options set `value` = '".$val."' where `key` = '".$key."'";
> 		 	 	 // print_r($sql);
> 		 	 	 $res = mysqli_query($conn,$sql);
>
> 		 	 	 // 5. 判断是否更新成功
> 		 	 	 if(!$res){
> 		 	 	 	$flag = false;
> 		 	 	 	break;
> 		 	 	 }
> 		 	 }
>
> 		 	 	// 6. 判断结果
> 		 	 if($flag){
> 		 	 	$arr1 = array(
> 		 	 		'code'=>200,
> 		 	 		'msg'=>'更新成功'
> 		 	 	);
> 		 	 }else {
> 		 	 	$arr1 = array(
> 		 	 		'code'=>201,
> 		 	 		'msg'=>'更新失败'
> 		 	 	);
> 		 	 }
>
> 		 	 // 7. 将结果返回给前台
> 		 	 echo json_encode($arr);
> 		 }
> ```
>
> 3.前台接收数据进行处理,代码如下:
>
> ```js
> // *************给保存按钮注册事件*********************
>   // 1. 给按钮注册事件
>   $('form').on('click','button[type=submit]',function(){
>     
>     // 2. 发送ajax请求
>     $.ajax({
>       type:'post',
>       url:'/admin/int/settingsInt.php',
>       data:$('form').serialize(),
>       dataType:'json',
>       success:function(res){
>         if(res&& res.code == 200){
>           alert('更新成功...');
>           renderData();
>         }
>       }
>     })
>     return false; // 阻止浏览器的默认刷新行为
>   })
> ```
>
> ## 1.联表查询
>
> ```js
> SELECT * FROM posts  // 只能查询一张表的数据
> select * from posts inner join users;
> SELECT * FROM posts LEFT JOIN users on posts.user_id = users.id
> SELECT * FROM posts LEFT JOIN users on posts.user_id = users.id LEFT JOIN categories on posts.category_id = categories.id;
> SELECT posts.id,posts.title,posts.category_id,posts.created,posts.status,users.nickname,
>     categories.name FROM posts LEFT JOIN users on posts.user_id = users.id LEFT JOIN categories on  posts.category_id = categories.id;
> ```
>
> ## 2.所有文章内容修改
>
> 1.到admin/int/postsInt.php页面中,修改sql语句,代码如下:
>
> ```js
> $res = query('SELECT posts.id,posts.title,posts.category_id,posts.created,posts.status,users.nickname,categories.name FROM posts LEFT JOIN users on posts.user_id = users.id LEFT JOIN categories on  posts.category_id = categories.id');
>
> ```
>
> 2.模板内容也要进行改变, 6   7
>
> ```js
> <script type="text/template" id="postsListTmp">
>   {{each data as val key}}
>       <tr>
>         <td class="text-center"><input type="checkbox"></td>
>         <td>{{val.title}}</td>
>         <td>{{val.nickname}}</td>
>         <td>{{val.name}}</td>
>         <td class="text-center">{{val.created}}</td>
>         {{if val.status == 'published'}}
>           <td class="text-center">已发布</td>
>         {{else if val.status == 'drafted'}}
>           <td class="text-center">草稿</td>
>         {{/if}}
>         <td class="text-center">
>           <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
>           <button class="btn btn-danger btn-xs btnDel" data-id="{{val.id}}">删除</button>
>         </td>
>       </tr>
>   {{/each}}
> </script>
> ```
>
> 3.刷新页面,即可看到效果.
>
> ## 3.所有文章
>
> ### 1.所有文章编辑的实现
>
> 1.修改编辑按钮,代码如下:
>
> ```js
> <td class="text-center">
>           <a href="/admin/post-add.php?action=editPosts&postsId={{val.id}}" class="btn btn-default btn-xs">编辑</a>
>           <button class="btn btn-danger btn-xs btnDel" data-id="{{val.id}}">删除</button>
>         </td>
> ```
>
> 2.跳转到post-add.php页面后进行如下获取url中的参数,并存到一个对象当中,代码如下:
>
> ```js
>  // 1. 获得地址栏中的参数信息
>   var str = location.search; // ?action=editPosts&postsId=4
>
>   //  2. 判断是否有参数
>   if(!str){ // 此处是添加的功能 
>     renderData();
>   }else {  // 此处是编辑的功能
>       // 3. 截取?后面的内容 
>       str = str.substr(1); //action=editPosts&postsId=4
>
>       // 4. 以&进行切割 
>       var arr = str.split('&');
>       // console.log(arr); // ["action=editPosts", "postsId=4"]
>
>       // 5. 循环遍历数组,再切割存到对象当中
>       var obj = {};
>       for(var i=0;i<arr.length;i++){
>         var temp = arr[i].split('=');
>         obj[temp[0]] = temp[1];
>         console.log(obj); // {action: "editPosts", postsId: "4"}
>       }
>         
>   }
>
> ```
>
> 3.把之前发送请求的ajax放在一个函数中封装起来,函数名为renderData
>
> 4.发送ajax请求
>
> ```js
> // 1. 获得地址栏中的参数信息
>   var str = location.search; // ?action=editPosts&postsId=4
>
>   //  2. 判断是否有参数
>   if(str){
>     renderData();
>   }else { 
>       // 3. 截取?后面的内容 
>       str = str.substr(1); //action=editPosts&postsId=4
>
>       // 4. 以&进行切割 
>       var arr = str.split('&');
>       // console.log(arr); // ["action=editPosts", "postsId=4"]
>
>       // 5. 循环遍历数组,再切割存到对象当中
>       var obj = {};
>       for(var i=0;i<arr.length;i++){
>         var temp = arr[i].split('='); // 继续切割字符串
>         obj[temp[0]] = temp[1];
>         console.log(obj); // {action: "editPosts", postsId: "4"}
>       }
>
>       // 6. 发送ajax请求
>       $.ajax({
>         type:'get',
>         url:'/admin/int/post-addInt.php',
>         data:{
>           action:obj.action,
>           id:obj.postsId
>         },
>         success:function(res){
>
>         }
>       })
>         
>   }
> ```
>
> 5.post-addInt.php接收到请求后做如下处理:
>
> ```js
> <?php 
> 	// 接收请求,进行处理,之后响应回去
> 	// 1. 引入外部文件
> 	require('../../functions.php');
>
> 	// 如果是get提交过来的数据的话,要执行下面的代码
> 	if(empty($_POST)){
> 		 if(!isset($_GET['action'])){ // 普通的查询渲染
> 		 		// 2. 调用方法,查询数据库
> 				$res = query('select * from categories');// 虽然当前是添加文章的页面,但是这个分类信息还是来源于分类表中的name
>
> 				// 3. 判断查询是否成功
> 				if(!empty($res)){
> 					$arr = array(
> 						'code'=>200,
> 						'msg'=>'查询成功',
> 						'data'=>$res
> 					);
> 				}else {
> 					$arr = array(
> 						'code'=>201,
> 						'msg'=>'查询失败'
> 					);
> 				}
>
> 				// 4. 返回结果
> 				echo json_encode($arr);
> 			 }else { // 编辑的查询
>
> 			 	// 1. 获取id
> 			 	$id = $_GET['id'];//
>
> 			 	// 2. 查询数据
> 			 	$resPosts = query('select * from posts where id = '.$id);
> 			 	$resCate = query('select * from categories');// 
> 			 	// 3. 判断查询的数据是否存在
> 			 	if(!empty($resPosts)&&!empty($resCate)){
> 			 		$arr2 = array(
> 			 			'code'=>200,
> 			 			'msg'=>'查询成功',
> 			 			'dataPosts'=>$resPosts,
> 			 			'dataCate'=>$resCate
> 			 		);
> 			 	}else {
> 			 		$arr2 = array(
> 			 			'code'=>201,
> 			 			'msg'=>'查询失败'
> 			 		);
> 			 	}
>
> 			 	// 4. 将数据返回给前台页面
> 			 	echo json_encode($arr2);
> 			 }
> 		}
>
> 		// 如果是post提交过来的数据,则要执行下面的代码
> 		if(!empty($_POST)){
>
> 			// 1. 调用方法添加数据
> 			$res = insert('posts',$_POST);
>
> 			// 2. 判断是否添加成功
> 			if($res){
> 				$arr1 = array(
> 					'code'=>200,
> 					'msg'=>'数据添加成功...'
> 				);
> 			}else {
> 				$arr1 = array(
> 					'code'=>201,
> 					'msg'=>'数据添加失败'
> 				);
> 			}
>
> 			// 3. 返回添加后的结果给前端页面
> 			echo json_encode($arr1);
> 		}
>  ?>
> ```
>
> 6.前端页面需要重新定义模板
>
> ```js
> <script type="text/template" id="cateListTmp1">
>   <div class="col-md-9">
>           <div class="form-group">
>             <label for="title">标题</label>
>             <input id="title" value="{{dataPosts[0].title}}" class="form-control input-lg" name="title" type="text" placeholder="文章标题">
>             <input type="hidden"  name="user_id" value="{{dataPosts[0].id}}">
>           </div>
>           <div class="form-group">
>             <label for="content">标题</label>
>             <textarea id="content" class="form-control input-lg" name="content" cols="30" rows="10" placeholder="内容">{{dataPosts[0].content}}</textarea>
>           </div>
>         </div>
>         <div class="col-md-3">
>           <div class="form-group">
>             <label for="slug">别名</label>
>             <input id="slug" value="{{dataPosts[0].slug}}" class="form-control" name="slug" type="text" placeholder="slug">
>             <p class="help-block">https://zce.me/post/<strong>slug</strong></p>
>           </div>
>           <div class="form-group">
>             <label for="feature">特色图像</label>
>             <!-- show when image chose -->
>             {{if dataPosts[0].feature}}
>               <img class="help-block thumbnail" src="{{dataPosts[0].feature}}">
>             {{else}}
>               <img class="help-block thumbnail" style="display: none">
>             {{/if}}
>             <input id="feature" class="form-control"  type="file">
>             <input  name="feature" type="hidden" id="thumb">
>           </div>
>           <div class="form-group" id="cateList">
>             <label for="category">所属分类</label>
>             <select id="category" class="form-control" name="category_id">
>               {{each dataCate as val key}}
>                 <option value="{{val.id}}" {{if val.id==dataPosts[0].category_id}}selected {{/if}}>{{val.name}}</option>
>               {{/each}}
>             </select>
>           </div>
>           <div class="form-group">
>             <label for="created">发布时间</label>
>             <input id="created" value={{dataPosts[0].created.replace(' ','T')}} class="form-control" name="created" type="datetime-local">
>           </div>
>           <div class="form-group">
>             <label for="status">状态</label>
>             <select id="status" class="form-control" name="status">
>               <option value="drafted">草稿</option>
>               <option value="published">已发布</option>
>             </select>
>           </div>
>           <div class="form-group">
>             {{if dataPosts[0].id}}
>             <button class="btn btn-primary" type="submit" id="btnUdate">修改</button>
>             {{else }}
>               <button class="btn btn-primary" type="submit" id="btnSave">保存</button>
>             {{/if}}
>           </div>
>         </div>
> </script>
> ```
>
> 7.接收到服务器返回来的数据之后,要重新渲染页面
>
> ```js
>  // 6. 发送ajax请求
>       $.ajax({
>         type:'get',
>         url:'/admin/int/post-addInt.php',
>         data:{
>           action:obj.action,
>           id:obj.postsId
>         },
>         dataType:'json',
>         success:function(res){
>           if(res&&res.code == 200){
>             var htmlStr = template('cateListTmp1',res);
>             $('form').html(htmlStr);
>           }
>         }
>       })
> ```
>
> 8.注意还得重新给上传图片的按钮注册事件,因为是用模板生成的页面
>
> ```js
>   // 6. 发送ajax请求
>       $.ajax({
>         type:'get',
>         url:'/admin/int/post-addInt.php',
>         data:{
>           action:obj.action,
>           id:obj.postsId
>         },
>         dataType:'json',
>         success:function(res){
>           if(res&&res.code == 200){
>             var htmlStr = template('cateListTmp1',res);
>             $('form').html(htmlStr);
>
>             // *****************下面是图片或是文件上传*********************
>             // 1. 给按钮注册事件
>             $('form').on('change','#feature',function(){
>               // 2. 创建对象 
>                var data = new FormData();
>
>                // console.log(this.files[0]); // this.files里面是所有的文件列表
>                // 3. 将要上传的文件添加到里面
>                data.append('feature',this.files[0]);
>
>                // 4. 创建异步对象
>                var xhr = new XMLHttpRequest();
>
>                // 5. 设置请求行
>                xhr.open('post','/admin/int/post-addUploadFile.php');
>
>                // 6. 设置请求头  这一步是可以省略的,是不用设置的
>
>                // 7. 设置请求体  就是往后台发送数据
>                xhr.send(data);
>
>                // 8. 监视异步对象的变化,注册监听事件
>                xhr.onreadystatechange = function () {
>                  if(xhr.status == 200 && xhr.readyState == 4){
>                    // 要将上传的图片展示在当前的这个位置
>                    $('.thumbnail').attr('src',xhr.responseText).show();
>
>                    // 将图片在服务器文件中的路径存在当前的表单当中
>                    $('#thumb').val(xhr.responseText);
>                  }
>                }
>             })
>           }
>         }
>       })
> ```
>
> ### 2.给更新按钮注册事件
>
> 1.给更新按钮注册事件
>
> ```js
> // ************给更新按钮注册事件*******************
>             $('form').on('click','#btnUpdate',function(){
>               $.ajax({
>                 type:'post',
>                 url:'/admin/int/post-addInt.php',
>                 dataType:'json',
>                 data:$('form').serialize(),
>                 success:function(res){
>                  
>                 }
>               })
>               return false;// 阻止浏览器的默认刷新行为
>             })
> ```
>
> 2.post-addInt.php接收到请求后处理如下:
>
> ```js
> 	// 如果是post提交过来的数据,则要执行下面的代码
> 		if(!empty($_POST)){
>
> 			if(!isset($_POST['id'])){ // 这是添加的操作
> 				// 1. 调用方法添加数据
> 				$res = insert('posts',$_POST);
>
> 				// 2. 判断是否添加成功
> 				if($res){
> 					$arr1 = array(
> 						'code'=>200,
> 						'msg'=>'数据添加成功...'
> 					);
> 				}else {
> 					$arr1 = array(
> 						'code'=>201,
> 						'msg'=>'数据添加失败'
> 					);
> 				}
>
> 				// 3. 返回添加后的结果给前端页面
> 				echo json_encode($arr1);
> 			}else { // 这是更新的操作
> 				// 1. 获取id
> 				$id = $_POST['id'];
>
> 				// 2. 调用方法更新数据
> 				$res = update('posts',$_POST,$id);
>
> 				// 3. 判断更新是否成功
> 				if(!empty($res)){
> 					$arr3= array(
> 						'code'=>200,
> 						'msg'=>'更新成功'
> 					);
> 				}else {
> 					$arr3= array(
> 						'code'=>201,
> 						'msg'=>'更新失败'
> 					);
> 				}
>
> 				// 4. 返回更新结果给前台
> 				echo json_encode($arr3);
> 			}
> 		}
>  ?>
> ```
>
> 3.前台接收到数据之后做如下处理:
>
> ```js
> // ************给更新按钮注册事件*******************
>             $('form').on('click','#btnUpdate',function(){
>               $.ajax({
>                 type:'post',
>                 url:'/admin/int/post-addInt.php',
>                 dataType:'json',
>                 data:$('form').serialize(),
>                 success:function(res){
>                   if(res&&res.code == 200){
>                     // 跳转到所有文章的页面
>                     location.href='/admin/posts.php';
>                   }
>                 }
>               })
>               return false;// 阻止浏览器的默认刷新行为
>             })
> ```
>
> ## 4.导航菜单
>
> ### 1.删除的实现
>
> 1.给删除按钮注册事件
>
> ```js
> // ************这是删除的操作**********************
>   // 1. 给删除按钮注册事件
>   $('tbody').on('click','.btnDel',function(){
>     // 2. 获取当前的id
>     var id = $(this).attr('data-id');
>     // 3. 发送ajax请求 
>     $.ajax({
>       type:'get',
>       url:'/admin/int/nav-menusInt.php',
>       data:{
>         index:id
>       },
>       dataType:'json',
>       success:function(res){
>         if(res&&res.code == 200){
>           // 重新渲染页面
>           
>         }
>       }
>     })
>   })
> ```
>
> 2.后台接收数据进行处理
>
> ```js
> <?php 
> 	// 1. 引入外部文件
> 	require('../../functions.php');
>
> 	if(empty($_POST)){ // 这是普通的get提交
> 			if(!isset($_GET['index'])){
> 				// 2. 调用方法查询数据
> 				$res = query("SELECT `VALUE` from options where `key` = 'nav_menus'");
>
> 				// print_r($res[0]['VALUE']);
> 				// var_dump($res[0]['VALUE']);
>
> 				// 3. 判断数组是否为空
> 				if(!empty($res)){
> 					$json = json_decode($res[0]['VALUE'],true);
> 					// print_r($json);
> 					$arr = array(
> 						'code'=>200,
> 						'msg'=>'查询成功',
> 						'data'=>$json
> 					);
> 				}else {
> 					$arr = array(
> 						'code'=>201,
> 						'msg'=>'查询失败...'
> 					);
> 			 }
> 			 // 4.将查询结果返回给前端页面
> 			 echo json_encode($arr); // 前后端数据的交互要么是二进制数据要么是字符串
> 		 }else {
> 		 		// 1. 获取要删除的那一项的索引
> 				$index = $_GET['index'];
>
> 				// 2. 调用方法查询数据
> 				$res = query("SELECT `VALUE` from options where `key` = 'nav_menus'");
>
> 				// 3. 判断数组是否为空
> 				if(!empty($res)){
> 					// 4. 将数据转换为数组
> 					// print_r($res[0]['VALUE']);
> 					// exit;
> 					$arr1 = json_decode($res[0]['VALUE'],true);
> 					// print_r($arr);
> 					// exit;
> 					// 5. 删除数组中的元素
> 					unset($arr1[$index]);
> 					// print_r($arr);
> 					// exit;
>
> 					// 6. 将数据转换成字符串,更新回数据库
> 					$str = json_encode($arr1,JSON_UNESCAPED_UNICODE);
> 					// var_dump($str);
> 					// 7. 将数据返回给前台页面
> 					$arr2 = array(
> 						'code'=>200,
> 						'msg'=>'更新成功...',
> 						'data'=>$arr1
> 					);
> 					echo json_encode($arr2);
> 				}
>
>
> 		 }
>
> 	}
>  ?>
> ```
>
> 3.注意functions.php中的sql语句的结构,将引号互换一下：
>
> ```js
> 	// 7.3 拼接sql语句
> 			// $sql = 'UPDATE '.$table.' set ';  //  定义一个变量
> 			$sql = "UPDATE ".$table." set ";  //  定义一个变量
>
> 			// 7.4 遍历数组,拼接成key=value, key=value的格式
> 			foreach($arr as $key => $val){  // 遍历数组,拼接成key=value, key=value的格式
> 				// $sql .= $key.'="'.$val.'", ';
> 				$sql .= $key."='".$val."', ";
> 			}
> ```
>
> ### 2.添加的实现
>
> 1.给当前的表单添加一个选项
>
> ```js
>  <div class="form-group">
>       <label for="icon">图标</label>
>       <input id="icon" class="form-control" name="icon" type="text" placeholder="图标">
> </div>
> ```
>
> 2.给添加按钮注册事件
>
> ```js
>  // ***************给添加按钮注册事件*******************
>   $('#btnAdd').on('click',function(){
>     $.ajax({
>       type:'post',
>       url:'/admin/int/nav-menusInt.php',
>       data:$('form').serialize(),
>       dataType:'json',
>       success:function(res){
>         if(res&&res.code == 200){
>           
>         }
>       }
>     })
>
>     return false;// 阻止浏览器的默认刷新行为
>   })
> ```
>
> 3.后台接收数据,进行处理
>
> ```js
>  // 首先判断是不是post请求过来的数据
> 	 if(!empty($_POST)) { // 此时是post请求
>
> 	 	// 判断是否读取到数据
> 	 	if(!empty($res)){
> 	 		// print_r($res); // $res是一个数组,里面有一
> 	 		// 1. 将查询到的数据库的数据转换成对应的数组
> 	 		$arr3 = json_decode($res[0]['VALUE'],true);
> 	 		// print_r($arr);
>
> 	 		// 2. 将提交过来的数据追加到这个数组当中
> 	 		$arr3[] = $_POST;
> 	 		// print_r($arr);
>
> 	 		// 3. 添加回数据库
> 	 		$arr4 = array(
> 	 			'value'=> json_encode($arr3,JSON_UNESCAPED_UNICODE)
> 	 		);
> 	 		$result = update('options',$arr4,9);
>
> 	 		// 4. 判断是否成功
> 	 		if($result){
> 	 			$arr5 = array(
> 	 				'code'=>200,
> 	 				'msg'=>'添加成功',
> 	 				'data'=>$arr3
> 	 			);
> 	 		}else {
> 	 			$arr5 = array(
> 	 				'code'=>201,
> 	 				'msg'=>'添加失败'
> 	 			);
> 	 		}
>
> 	 		// 5. 返回添加的结果
> 	 		echo json_encode($arr5);
> 	 	}
> 	 }
> ```
>
> 5.前面接收数据,重新渲染页面
>
> ```js
> // ***************给添加按钮注册事件*******************
>   $('#btnAdd').on('click',function(){
>     $.ajax({
>       type:'post',
>       url:'/admin/int/nav-menusInt.php',
>       data:$('form').serialize(),
>       dataType:'json',
>       success:function(res){
>         if(res&&res.code == 200){
>           // 数据回来后,要重新渲染页面
>           var htmlStr = template('menusListTmp',res);
>           $('tbody').html(htmlStr);
>         } 
>       }
>     })
>
>     return false;// 阻止浏览器的默认刷新行为
>   })
> ```
>
> ## 5.前台页面的实现
>
> ### 1.提取公共样式
>
> 1.在项目的根目录下新建inc文件夹
>
> 2.在inc文件夹下,分别新建head.php,aside.php,footer.php,script.php
>
> 3.将公共样式提取出来,分别放在各自的文件夹中
>
> 4.将index.html页面修改成index.php,并引入公共样式
>
> ```js
> <?php include './inc/head.php' ?>
> <?php include './inc/aside.php' ?>
> <?php include './inc/footer.php' ?>
> <?php include './inc/script.php' ?>
> ```
>
> 5.刷新页面,测试是否成功
>
> ### 2.发送请求渲染数据
>
> 1.在页面的最下部写js代码
>
> ```js
> <script type="text/javascript">
>   $.ajax({
>     type:'get',
>     url:'/admin/int/nav-menusInt.php',
>     dataType:'json',
>     success:function(res){
>       if(res&&res.code == 200){
>        
>       }
>     }
>   })
> </script>
> ```
>
> 2.将head.php中的ul分别添加两个id,3   9
>
> ```js
> <div class="wrapper">
>     <div class="topnav">
>       <ul id="topNavlist">
>         
>       </ul>
>     </div>
>     <div class="header">
>       <h1 class="logo"><a href="index.html"><img src="assets/img/logo.png" alt=""></a></h1>
>       <ul class="nav" id="navList">
>         
>       </ul>
>       <div class="search">
>         <form>
>           <input type="text" class="keys" placeholder="输入关键字">
>           <input type="submit" class="btn" value="搜索">
>         </form>
>       </div>
>       <div class="slink">
>         <a href="javascript:;">链接01</a> | <a href="javascript:;">链接02</a>
>       </div>
>     </div>
> ```
>
> 3.数据返回来之后,准备模板字符串
>
> ```js
> <script type="text/template" id="listTmp">
>   {{each data as val key}}
>     <li><a href="javascript:;"><i class="fa fa-glass"></i>{{val.text}}</a></li>
>   {{/each}}
> </script>
> ```
>
> 4.调用方法渲染页面
>
> ```js
> <script type="text/javascript">
>   $.ajax({
>     type:'get',
>     url:'/admin/int/nav-menusInt.php',
>     dataType:'json',
>     success:function(res){
>       if(res&&res.code == 200){
>         var htmlStr = template('listTmp',res);
>         $('#navList').html(htmlStr);
>         $('#topNavlist').html(htmlStr);
>       }
>     }
>   })
> </script>
> ```
>
> 
>
> 
>
> # 其他前台页面功能与渲染todo:
>
> 待完善说明，项目也在完善中
>
> 
>
> 
