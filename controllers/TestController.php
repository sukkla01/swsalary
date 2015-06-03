<?php

namespace app\controllers;
use yii;

class TestController extends \yii\web\Controller {

    public function actionIndex() {
        $connection = Yii::$app->db;
        
        $sql="SELECT '2' as t1,1 as t2,CONCAT(username,'@swsalary.com') as email,username,ssn,pass,name FROM userinfo  WHERE username like 'ict%'  ";
        $data = $connection->createCommand($sql)->queryAll();
        for ($nu = 0; $nu < sizeof($data); $nu++) {
            $t1=$data[$nu]['t1'];
            $t2=$data[$nu]['t2'];
            $email=$data[$nu]['email'];
            $username=$data[$nu]['username'];
            $ssn=$data[$nu]['ssn'];
            $pass1=$data[$nu]['pass'];
            $pass=Yii::$app->security->generatePasswordHash($pass1);
            $date1=date('Y-m-d');
            $name=$data[$nu]['name'];
            
             $data1 = $connection->createCommand("INSERT IGNORE INTO `user` (role_id,status,email,username,cid,password)  VALUES  ('$t1','$t2','$email','$username','$ssn','$pass')")->execute();
             $data2 = $connection->createCommand("INSERT IGNORE INTO `profile`  (create_time,update_time,full_name) VALUES ('$date1','$date1','$name') ")->execute();
             $data3 = $connection->createCommand("UPDATE `profile` SET user_id=id")->execute();
            //echo  $pass1.'<Br>'; 
        }
        echo $nu;
        return $this->render('index');
    }

    public function actionAddUser() {
    }

}
