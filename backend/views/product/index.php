<?php

use yii\helpers\Html;
use backend\widgets\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <div class="box box-primary">
        <div class="box-body">

            <?php Pjax::begin(); ?>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a('Создать товар', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    [
                        'attribute' => 'id',
                        'headerOptions' => ['width' => 50],
                    ],
                    [
                        'attribute' => 'filterCat',
                        'filter'=> $searchModel::getCatFromDropDown(),
                        'filterInputOptions' => ['prompt' => 'Все', 'class' => 'form-control form-control-sm'],
                        'headerOptions' => ['width' => 170],
                        'value' => function ($data){
                            /* @var $data \common\models\Product */
                            return $data->mainCat->title;
                        },
                    ],
                    [
                        'attribute' => 'main_image',
                        'filter' => false,
                        'enableSorting' => false,
                        'headerOptions' => ['width' => 50],
                        'format' => 'raw',
                        'value' => function ($data){
                            /* @var $data \common\models\Product */
                            return Html::img($data->getThumbMainImage(),['width' => 70]);
                        }
                    ],
                    'title',
//                    'description:ntext',
                    [
                        'attribute' => 'rank',
                        'format' => 'raw',
                        'value' => function ($data){
                            /* @var $data \common\models\Product */
                            return Html::input('number', 'rank' ,$data->rank, ['class' => 'form-control', 'id' => $data->id]);
                        }

                    ],
                    [
                        'attribute' => 'publish',
                        'label' => 'Состояние',
                        'filter'=>[0=>"Не опубликованные",1=>"Опубликованные"],
                        'filterInputOptions' => ['prompt' => 'Все', 'class' => 'form-control form-control-sm'],
                        'headerOptions' => ['width' => 50],
                        'format' => 'raw',
                        'value' => function ($data){
                            /* @var $data \common\models\Product */
                            if ($data->publish){
                                return Html::a('Снять с публикации',
                                    ['publish', 'id' => $data->id, 'publish' => false],
                                    ['class' => 'btn btn-default col-xs-12']);
                            }
                            return Html::a('Опубликовать',
                                ['publish', 'id' => $data->id, 'publish' => true],
                                ['class' => 'btn btn-success col-xs-12']);
                        }
                    ],

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
            <?php Pjax::end(); ?>
        </div>
    </div>
</div>

<?
$js = <<< JS
    $('[name = rank]').keypress(function(e){
        if(e.keyCode==13){
            $.ajax({
                type: "GET",
                url: "/admin/product/rank",
                data: 'id='+ $(this).attr('id') +'&rank='+ $(this).val(),
            })
        }
    });
JS;

$this->registerJs($js, $position = yii\web\View::POS_END, $key = null);
?>

<?php
$css= <<< CSS

.prodDesc{
    max-height: 200px;
    overflow-y: auto;
}

CSS;

$this->registerCss($css, ["type" => "text/css"], "callBack" );
?>​

