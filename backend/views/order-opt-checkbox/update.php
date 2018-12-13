<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\OrderOptCheckbox */

$this->title = 'Update Order Opt Checkbox: '.$model->title;
$this->params['breadcrumbs'][] = ['label' => 'Order Opt Checkboxes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="order-opt-checkbox-update">

    <div class="box box-primary">
        <div class="box-body">

            <p>
                <?= Html::a('<i class="fa fa-reply" aria-hidden="true"></i>', ['view', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
            </p>

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

        </div>
    </div>

</div>
