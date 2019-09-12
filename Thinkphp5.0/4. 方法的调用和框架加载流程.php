

(C)2010-2019  方法的调用和框架加载流程
update: 2019-8-23 23:09:10
person: Gang


1.调用方法


  <1>. 调用当前控制器的test,index方法（使用面向对象的方法）

<?php
echo  $this->test();

echo  self::test();

echo  Index::test();

?>

  <2>.使用系统方法

  echo action('index');

  <3>.调用User控制器下的index方法

  #1.使用命名空间
  $model =new  \app\index\controller\User;  //实例话这个类

  echo $model->index();

  echo "<Hr>";

  #2.使用系统方法

  echo action('User/index');
