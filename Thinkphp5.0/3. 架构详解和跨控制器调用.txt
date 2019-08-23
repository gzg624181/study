

(C)2010-2019  架构详解和跨控制器调用
update: 2019-8-22 22:45:10
person: Gang



1. TP架构的概述

  ThinkPHP 使用了MVC模式，它强制性的使应用程序的输入、处理和输出分开。使用MVC应用程序被分成三个核心部件：模型（M）、视图（V）、控制器（C），它们各自处理自己的任务。

2. URL解析

http://   127.0.0.1    /index.php     /Index    /Index      /index

协议       域名          入口文件       模块        控制器        方法


3. 入口文件

  ①. 文件地址  （tp5/public/index.php）

  ②. 作用：

     负责整个Tp的请求

4. 应用

   ①.应用地址  tp5/application

   ②.作用： 一个应用代表一个网站


5.模块（以前台为例）

  ①. 模块地址  tp5/application/index

  ②. 作用：网站的所有前台相关都与其有关

  ③. 新建后台模块

    a.在应用目录（tp5/application)新建admin目录

    b.在admin目录下面，新建model ，view 和controller

    c. 在controller目录中新建Index控制器(Index.php)

    d. 在Index.php 中书写代码

    <?php

    //声明命名空间
    namespace app\admin\controller;

    //声明控制器

    class Index{

     public function Index()
     {
       return "我是后台模块Index控制器的Index方法";
     }

    }

    ?>

6.控制器

  ①. 控制器目录 tp5/application/Index/controller

  ②. 作用：书写业务逻辑

  ③. 新建控制器（以前台为例）

    a. 在前台控制器目录下（tp5/application/Index/controller/index/User.php

    b. 在控制器中能书写代码

    <?php
    // 声明命名空间

    namespace app\index\controller;

    //声明控制器

    class User{

          //index 方法

        public function index(){

          return "我是前台User控制器中的index方法"

        }
    }
     ?>

     c.地址栏访问

     http://localhost:8888/tp5/public/index.php/index/user/index

     http://serverName/index.php（或者其它应用入口文件）/模块/控制器/操作/参数/值…


     d. 注意

      <1>.控制器的文件名必须首字母大写

      <2>.控制器中必须声明命名空间

      <3>.控制器中类名必须与控制器名一致

7. 操作（方法）

    1.操作地址

     操作一般都在控制器文件中

    2. 新建一个操作（以前台index控制器为例）

     <1>. 打开前台index控制器（application/index/controller/Index.php）

     <2>. 在控制器中新建test方法

     public function test(){

       return "我是用户自己创建的方法";

     }

     <3>.地址栏的访问

     http://localhost:8888/tp5/public/index.php/index/index/test

8.模型（数据模型）

  1.数据模型地址

    application/index/model

  2.作用：主要是负责数据库相关的处理


9. 视图（页面）

   1.视图地址

   application/index/view

   2.其实就是网站的页面

10. 命名空间

   与目录有关（以前台index控制命名空间为例）

   namespace app\index\controller

11.跨控制器调用

   1.使用命名空间

   $model = new \app\admin\controller\Index ;

   echo $model->index();


   2.使用use的方式

   use  \app\admin\controller\Index as AdminIndex;

   $model = new AdminIndex();

   echo $model->index();

   3.使用系统方法

   #系统方法一般在（thinkphp/helper.php）

   实例化控制器 格式：[模块/]控制器

   $model = controller('admin/Index');

   echo $model->index();
