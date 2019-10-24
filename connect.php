<?php

 $dns = "mysql:host=localhost;dbname=simple";

 $user = "root";

 $password = "";

 $options = [
     PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ,
     PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
 ];

 $pdo = new PDO($dns,$user,$password,$options);





//
// framework == laravel/ codeignitor/  yii / symphony/ lumen / zend
//python == django / flask
//java === java ee/ spring / spring boot
//mysql
//nosql == monogodb/ cassandra db
//javascript== raw js=> react/ angular
//
//
//how to develop apis == means two system talk
                                                                                                                                                                                                                                                                                                                                                                                                                                abs(a)              a