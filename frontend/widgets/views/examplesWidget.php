<?

/* @var $model \common\models\Product */
/* @var $title \frontend\widgets\ExamplesWidget */
/* @var $category \frontend\widgets\ExamplesWidget */

?>

<div id="examples" class="container mw-1200 mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-12 mb-5 text-center text-md-left">
            <h2 class="text-center text-lg-left"><?= $title ?></h2>
        </div>
        <? foreach ($model as $item) { /* @var $item \common\models\Product */?>
            <div class="item col-lg-3 col-sm-6 col-12 mt-2 mt-lg-0">
                <div class="bg-gray furniture">
                    <div class="pl-4 pt-2">
                        <span class="gray mr-1">Артикул:</span><span>292891</span><br>
                    </div>
                    <? $image = $item->getBehavior('galleryBehavior')->getImages()[0]; /* @var $image \zxbodya\yii2\galleryManager\GalleryImage */?>
                    <div class="mt-5 mx-auto d-bloc position-relative" style="height: 150px; width: 200px">
                        <img
                                src="<?= $image->getUrl('small') ?>"
                                class="position-absolute w-100 h-100"
                                alt="<?= $item->title ?>"
                                style="
                                    object-fit: cover;
                                    object-position: center;
                                "
                        >
                    </div>
                </div>
                <p class="furniture-name text-center my-2"><?= $item->title ?></p>
                <a class="btn btn-outline-primary my-2 my-sm-0 mx-auto hovered d-block w-140 rounded-0"
                   href="<?= $item->getLink($category) ?>">Подробнее</a>
            </div>
        <?}?>
    </div>
</div>