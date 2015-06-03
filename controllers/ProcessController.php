<?php

namespace app\controllers;

use yii;

class ProcessController extends \yii\web\Controller {

    public function actionIndex() {

        return $this->render('index');
    }

    public function actionProcess1() {
        $date1 = date('Y-m-d');
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
        }

        if (Yii::$app->request->isPost) {


            $connection = Yii::$app->db;
            $sql = "INSERT IGNORE INTO report_total 
                SELECT fyear,IF(LENGTH(fmonth)=1,CONCAT('0',fmonth),fmonth) AS fmonth,cid,tcheck
                FROM (
                SELECT fyear-543 AS fyear,fmonth,cid,'Yes' AS tcheck
                FROM p_money_report r
                LEFT JOIN p_typemoney t ON t.code=r.typesalary
                WHERE fyear=Year('$date1')+543 AND fmonth=Month('$date1') AND status='1' and  typesalary NOT IN('money10','money21')
                UNION ALL
                SELECT YEAR(rs.salarydate),MONTH(rs.salarydate),cid,
                IF(rs.no LIKE '1%' AND typesalary IN('carry','receive','paid'),'No','Yes') AS tcheck
                FROM p_money_report_sw rs
                LEFT JOIN p_typemoney_sw ts ON ts.code=rs.typesalary
                WHERE YEAR(rs.salarydate)='$date1' AND MONTH(rs.salarydate)=Month('$date1') 
                    AND status='1'
                HAVING tcheck='Yes'
                ORDER BY cid  ) AS tt
                GROUP BY cid";
            $data = $connection->createCommand($sql)->execute();
            Yii::$app->session->setFlash('success', 'อัพโหลดไฟล์เรียบร้อยแล้ว');
        }

        return $this->render('process1',['date1'=>$date1]);
    }

}
