<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AttrValue */

$this->title = 'Редактирование: ' . $model->value;
$this->params['breadcrumbs'][] = ['label' => 'Значения атрибута', 'url' => ['index', 'par_id' => $model->attr_id]];
$this->params['breadcrumbs'][] = ['label' => $model->value, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="attr-list-update">

    <div class="box box-primary">
        <div class="box-body">

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

        </div>
    </div>

</div>
