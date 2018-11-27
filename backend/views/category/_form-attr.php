<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $form yii\widgets\ActiveForm */
/* @var $selectedAttr common\models\Category */
/* @var $attributes */
?>

<div class="category-form-attr">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?//= $form->field($model, 'categoryType_id')->textInput() ?>

    <?= $form->field($model, 'optForList')->dropDownList($model->getSelectedOptFromDropDown(), [
        'multiple' => true,
        'size' => 15,
    ]) ?>

    <?= $form->field($model, 'optShort')->dropDownList($model->getSelectedOptFromDropDown(), [
        'multiple' => true,
        'size' => 15,
    ]) ?>

    <?= $form->field($model, 'optFromCart')->dropDownList($model->getSelectedOptFromDropDown(), [
        'multiple' => true,
        'size' => 15,
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
