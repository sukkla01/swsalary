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
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-material-pink-400" id="btnB" > <!--onclick="OpenStimu()" -->
                <i class="icon-print align-top bigger-125"></i>
                พิมพิ์
            </button>


        </div>


    </div>
</div>
<?php
$gyear = date('Y') + 543;
$gmonth = '0'.date('m');
?>

<?php
$script = <<< JS
$('#btnB').click(function() {
                    // alert('ok');
                   
            start1 = $('#date1').val();
                   
        
                    //alert(date1);
                   window.open('http://203.157.82.68:8080/stimulja/?report=slip.mrt&gyear=' + $gyear +'&gmonth=' + $gmonth );
                });
JS;
$this->registerJs($script);
?>
