<?php

/* @var $this \frontend\components\View */
/* @var $model \common\models\Product */
/* @var $modelCat \common\models\Category */
/* @var $alias \frontend\controllers\CatalogController */
/* @var $child \frontend\controllers\CatalogController */


$this->registerMetaTag([
    'name' => 'title',
    'content' => $model->meta_title,
]);
$this->registerMetaTag([
    'name' => 'description',
    'content' => $model->meta_description,
]);

$this->headerClass = 'item-house';
$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => $modelCat->title, 'url' => ['index', 'alias' => $alias, 'child' => $modelCat->alias]];
$this->params['breadcrumbs'][] = $this->title;
//\yii\helpers\VarDumper::dump($model,10,true);die;
?>
<div id="item-block" class="container mw-1200 mt-5 pt-5">
    <div class="row justify-content-center justify-content-lg-between">
        <div class="d-flex flex-column flex-md-row justify-content-between max-h-lg-350  align-self-start">
            <div class="d-flex flex-row flex-md-column justify-content-between pl-lg-3">
                <?
                $imgSrc = '/no_image.png';
                $imgAlt = 'Нет изображения';
                foreach ($model->getBehavior('galleryBehavior')->getImages() as $key => $image) {
                    /* @var $image \zxbodya\yii2\galleryManager\GalleryImage */ ?>
                    <? if ($key !== 0) { ?>
                        <img src="<?= $image->getUrl('small') ?>" class="s-100 s-90" alt="<?= $image->name ?>">
                    <? } else {
                        $imgSrc = $image->getUrl('medium');
                        $imgAlt = $image->name;
                    } ?>
                <? } ?>
            </div>
            <div class="mt-3 mt-md-0 ml-md-4 s-350 s-300 position-relative">
                <img src="<?= $imgSrc ?>" class="position-absolute w-100 h-100" alt="<?= $imgAlt ?>"
                     style="object-fit: cover">
            </div>
        </div>
        <div class="col-11 col-lg-6 mt-4 mt-lg-0 text-justify text-lg-left">
            <div class="mb-4">
                <?= $model->description ?>
            </div>
            <? foreach ($model->attributes0 as $attribute) {
                /* @var $attribute \common\models\Attributes */
                ?>
                <? if ($attribute->type >= 1 && $attribute->type < 3) { ?>

                    <p class="mb-2">
                        <span class="text-muted">
                            <?= $attribute->viewName ?>:&nbsp;
                        </span>
                        <span class="black">
                            <?= $attribute->getAttrValue($model->id) ?>
                        </span>
                    </p>

                <? } ?>

            <? } ?>
            <p class="mt-4"></p>
            <? foreach ($model->attributes0 as $attribute) {
                /* @var $attribute \common\models\Attributes */ ?>
                <? if ($attribute->type === 3) { ?>

                    <p class="mb-4 text-muted text-center text-lg-left"><?= $attribute->viewName ?>:</p>
                    <? foreach ($attribute->getAttrValue($model->id) as $item) {
                        /* @var $item \common\models\AttrColor */ ?>
                        <div class="s-45 mr-lg-3"
                             style="
                                     display: inline-block;
                                     width: 60px;
                                     height: 60px;
                                     border-radius: 50%;
                                     background-color: <?= $item->color ?>
                                     "
                             aria-label="<?= $item->title ?>"></div>
                    <? } ?>

                <? } ?>

            <? } ?>
        </div>
    </div>
</div>

<div id="interior" class="container mw-1200 mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-12 mb-5 text-center text-md-left">
            <h2 class="text-center text-lg-left"><?= $model->addBlockTitle ?></h2>
        </div>

        <? foreach ($model->getBehavior('galleryBehaviorAddBlock')->getImages() as $image) {
        /* @var $image \zxbodya\yii2\galleryManager\GalleryImage */ ?>

            <div class="col-11 col-md-6 col-lg-3 text-center mt-4 mt-lg-0">

                <a href="<?=$image->getUrl('original')?>" data-fancybox="<?= $model->addBlockTitle ?>" data-caption="<?=$image->name?>">
                    <?= \yii\helpers\Html::img($image->getUrl('medium'), ['class' => 'img-fluid', 'alt' => $image->name]) ?>
                </a>

            </div>

        <?}?>

    </div>
</div>