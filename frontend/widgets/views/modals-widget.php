



<? \yii\widgets\Pjax::begin(['id' => 'modalAlert']) ?>
<? if (Yii::$app->session->hasFlash('success')) {?>
<div class="modalAlertSuccess modalAlert">
    <div class="messWrap">
        <p>
            <?= Yii::$app->session->getFlash('success') ?>
        </p>
    </div>
</div>
<?}?>
<? if (Yii::$app->session->hasFlash('warning')) {?>
<div class="modalAlertError modalAlert">
    <div class="messWrap">
        <p>
            <?= Yii::$app->session->getFlash('warning') ?>
        </p>
    </div>
</div>
<?}?>
<? if (Yii::$app->session->hasFlash('error')) {?>
<div class="modalAlertError modalAlert">
    <div class="messWrap">
        <p>
            <?= Yii::$app->session->getFlash('error') ?>
        </p>
    </div>
</div>
<?}?>


<?
$js = <<< JS
    $('.modalAlert').show('blind', 300, function() {
        setTimeout( function(){ $('.modalAlert').hide('blind', 300) } , 3000);
    });
JS;

$this->registerJs($js, $position = yii\web\View::POS_END, $key = null);

?>

<? \yii\widgets\Pjax::end() ?>


<?
$cssAlert = <<<CSS
    .modalAlert{
        position: fixed;
        display: none;
        top: 0;
        left: 0;
        width: 100%;
        padding: 20px 10px;
        font-size: 16px;
        color: #ffffff;
        z-index: 100;
    }
    .modalAlertSuccess{
        background-color: rgba(0,208,129,0.95);
    }
    .modalAlertError{
        background-color: rgba(243,78,78,0.95);
    }
    .messWrap{
        display: flex;
        justify-content: center;
    }

CSS;


$this->registerCss($cssAlert, ["type" => "text/css"], "alert" );
?>
