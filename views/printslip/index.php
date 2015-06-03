<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* if (Yii::$app->request->isPost) {
  print_r($money);
  } */

$this->title = 'ประมวลผลเพื่อออกรายงาน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-12">
    <div class="panel panel-material-light-blue-800">
        <div class="panel-heading">
            <h3 class="panel-title">พิมพิ์รายงาน</h3>
        </div>
        <div class="panel-body">
            <?php ActiveForm::begin(); ?>
            
            <div class="col-md-6">
                เลือกวันที่ :
                <?php
                if (Yii::$app->request->isPost) {
                    $date1 = $date1;
                } else {
                    $date1 = date('Y-m-d');
                    ;
                }
                echo yii\jui\DatePicker::widget([
                    'name' => 'date1',
                    'value' => $date1,
                    'language' => 'th',
                    'dateFormat' => 'yyyy-MM-dd',
                    'clientOptions' => [
                        'changeMonth' => true,
                        'changeYear' => true,
                    ],
                ]);
                ?>

            </div>
        </div>
          <a href="javascript:void(0)" class="btn btn-flat btn-success">Success</a>
            <?php ActiveForm::end(); ?>
    </div>
</div>


