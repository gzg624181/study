

(C)2010-2019  配置相关01
update: 2019-09-10 15:25:00
person: Gang


1.配置文件格式

  a) ThinkPHP支持多种格式的配置格式，但最终都是解析为php数组的方式

  b) 我们主要的学习形式就是数组

     return [

          'name'=> '',

          'age'=> ''
     ]2

2. 配置的形式

   1. 惯例配置

      a. 配置地址：  tp5/thinkphp/convention.php

      b. 注意：
         大家一般不要修改惯例配置

   2. 应用配置

      a. 应用配置： tp5/application/config.php

   3. 扩展配置

      a.扩展配置的定义：其实就是对配置文件进行分目录的管理

      b.扩展配置的目录：

         # tp5/application/database.phpver

         # tp5/application/extra/用户可以自定义配置文件
      c:如何读取database扩展配置

       读取扩展项
      dump(config('database.password'));

      dump(config('database')); //读取所有database的扩展

      d.自定义扩展配置

      1.在扩展目录下面（tp5/application/extra) 下，新建user.php  扩展文件

      2.打开文件

      <?php

      //新建user.php   自定义扩展配置
      return [

          'name'=>'gzg',

          'sex'=>'男',

          'age'=>'18',

          'school'=>'湖北省黄冈市黄梅县濯港镇'
      ]

       ?>

       3.读取自定义的配置

       dump(config('user'));

       echo config('user.name');

   4. 场景配置

    a. 解决问题

      开发过程中，可能在不同的环境下进行开发

    b. 如何使用

      1. 修改应用配置（tp5/application/config.php)

      2.   // 应用模式状态

         <1>  'app_status'             => 'home',

         <2>在应用目录下面新建（tp5/application),新建对应的文件名 home.php

         <3> 在home.php 中书写代码


   5. 模块配置

    a.解决问题：每个模块，都有自己特有的配置

    b.如何使用（以前台模块为例）

      <1>.在前台模块下(tp5/application/index)新建config.php

      <2>.打开配置文件书写

      <?php

       return [

        'index'=>'我是前台的配置'

       ]

       ?>

   6. 动态配置（临时性的配置）

      a.如何配置

        系统方法：

        //config(参数1，参数2)
        dump(config('name'));
        config('name','PHP开发');
        dump(config('name'));

        系统类：

        \think\Config::set('name','WEB前端');

        config::set("name","小程序开发");


        use think\config;
        dump(config('name'));


3.读取配置


1.通过系统类

   # 如果配置项存在，直接输出，不存在则返回NULL

   1.打印配置信息
   echo   \think\config::get('name');

   2.打印数组配置信息
   dump(\think\config::get('abc'));

2.通过系统方法

     1. 打印配置信息
     echo config('name');

     2.打印数组配置信息
     dump(config('teacher'));
     dump(config('teacher.name'));
     dump(config('teacher.sex'));

     3.读取所有的配置

     dump(config());

3.使用use
     1.打印配置信息
       use \think\Config;
       echo Config::get('kouhao');

    2.打印数组配置信息

      use \think\Config;
      dump(config::get('teacher'));
      echo Config::get('teacher.name');


4.系统类（tp5/ThinkPHP/library/think）

  Config 设置和获取配置文件


5.系统方法（tp5/thinkphp/library/helper.php）

  Controller  实例化控制器

  action      调用模块的操作方法

  config      设置和获取配置文件

  dump        浏览器友好的变量输出

 6.配置文件之间的加载顺序

 <1>优先级

 动态配置 > 模块配置 > 场景配置 > 扩展配置 > 应用配置 >惯例配置

 <2>加载顺序

   惯例配置->应用配置->扩展配置->场景配置->模块配置->动态配置

<3>配置文件实现原理

  #后面加载的配置，把前面加载匹配同名进行覆盖

7.环境变量配置
