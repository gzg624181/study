


(C)2010-2019  目录结构
update: 2019-8-21 21:48:10
person: Gang


1.目录结构

  |--application   应用目录，是整个网站的核心，应用目录（可设置）
  |-----|----- index  前台目录
  |-----|----- |-----  controller  控制器
  |-----|----- |-----  model       数据模型
  |-----|----- |-----  view        页面
  |-----|----- admin  后台目录
  |--extend    扩展类库目录（可定义）
  |--public    静态资源和入口文件
  |-----|-----static  存放静态资源（css js  img）
  |-----|-----index.php   入口文件
  |--runtime   网站运行临时目录
  |--tests     测试目录
  |--thinkphp  tp框架的核心文件
  |-----|-----lang      语言包
  |-----|-----library   tp核心文件
  |-----|-----tpl       模板页面
  |--vendor    第三方的扩展目录


  详细目录结构：

  project  应用部署目录

├─application           应用目录（可设置）
│  ├─common             公共模块目录（可更改）
│  ├─index              模块目录(可更改)
│  │  ├─config.php      模块配置文件
│  │  ├─common.php      模块函数文件
│  │  ├─controller      控制器目录
│  │  ├─model           模型目录
│  │  ├─view            视图目录
│  │  └─ ...            更多类库目录
│  ├─command.php        命令行工具配置文件
│  ├─common.php         应用公共（函数）文件
│  ├─config.php         应用（公共）配置文件
│  ├─database.php       数据库配置文件
│  ├─tags.php           应用行为扩展定义文件
│  └─route.php          路由配置文件
├─extend                扩展类库目录（可定义）
├─public                WEB 部署目录（对外访问目录）
│  ├─static             静态资源存放目录(css,js,image)
│  ├─index.php          应用入口文件
│  ├─router.php         快速测试文件
│  └─.htaccess          用于 apache 的重写
├─runtime               应用的运行时目录（可写，可设置）
├─vendor                第三方类库目录（Composer）
├─thinkphp              框架系统目录
│  ├─lang               语言包目录
│  ├─library            框架核心类库目录
│  │  ├─think           Think 类库包目录
│  │  └─traits          系统 Traits 目录
│  ├─tpl                系统模板目录
│  ├─.htaccess          用于 apache 的重写
│  ├─.travis.yml        CI 定义文件
│  ├─base.php           基础定义文件
│  ├─composer.json      composer 定义文件
│  ├─console.php        控制台入口文件
│  ├─convention.php     惯例配置文件
│  ├─helper.php         助手函数文件（可选）
│  ├─LICENSE.txt        授权说明文件
│  ├─phpunit.xml        单元测试配置文件
│  ├─README.md          README 文件
│  └─start.php          框架引导文件
├─build.php             自动生成定义文件（参考）
├─composer.json         composer 定义文件
├─LICENSE.txt           授权说明文件
├─README.md             README 文件
├─think                 命令行入口文件

2 url 地址了解

  http://localhost:8888/tp5/public/   index.php     /index       /index       /index

            域名                        入口文件       前台         前台控制器      方法

3.tp的开放模式

  ①. 链接数据库（tp5/application/database.php）

  // 数据库类型
  'type'            => 'mysql',
  // 服务器地址
  'hostname'        => '127.0.0.1',
  // 数据库名
  'database'        => 'tp5',
  // 用户名
  'username'        => 'root',
  // 密码
  'password'        => 'root',

4.开启调试模式（tp5/application/config.php）

  'app_debug'              => true,


5.代码的书写  （tp5/application/index/controller/Index.php）

    <?php

    namespace app\index\controller;

    #引入系统数据库类
    use think\Db;

    #引入系统控制器类
    use think\controller;

    class Index extends controller
    {
        public function index()
        {
            //从数据库中读取数据,类的静态方法
            $data = Db::table('user')->select();

            //分配数据给页面

            $this->assign('data',$data);

            //加载页面

            return view();
        }
    }

6.页面的书写  （tp5/application/index/view/index/Index.html)

   {volist name="data" id="value"}

     <tr>

       <td>{$value.id}</td>
       <td>{$value.name}</td>
       <td>{$value.pass}</td>

     </tr>

   {/volist}


7.MVC 模式

  M mode  模型

  # tp5/application/index/model

  作用：执行数据库相关处理

  V view 视图

  #tp5/application/index/view

  作用：其实就是页面

  C controller  控制器

  #tp5/application/index/controller

  作用：主要负责整个逻辑的运转

8. MVC的变形

  1. MC  模型和控制

    # 主要作用：主要用于API接口开发

  2. VC 视图和控制器

    # 主要作用 ：单页面的网站
