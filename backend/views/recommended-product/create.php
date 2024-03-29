<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\RecommendedProduct */

$this->title = 'Create Recommended Product';
$this->params['breadcrumbs'][] = ['label' => 'Recommended Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recommended-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
