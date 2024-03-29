<?php

/* @var $this \frontend\components\View */
/* @var $siteSettings \common\models\SiteSettings */
/* @var $model \common\models\DeliveryPage */

$this->registerMetaTag([
    'name' => 'title',
    'content' => $model->meta_title?$model->meta_title:$siteSettings->meta_title,
]);
$this->registerMetaTag([
    'name' => 'description',
    'content' => $model->meta_description?$model->meta_description:$siteSettings->meta_description,
]);

$this->title = $model->title?$model->title:'Доставка';
$this->params['breadcrumbs'][] = $this->title;
?>
<? if ($model->pageCode) {
    echo $model->pageCode;
}else{?>
    <div class="content flex_1">
        <div class="dost flex">
            <div class="dost_left dost_flex dost_p">
                <h1>Доставка</h1>
                <p>Доставка товара осуществляется до подъезда. Подъем и сборка являются дополнительными услугами и оплачиваются отдельно.</p>
                <p>При желании, Вы можете забрать товар со склада самостоятельно.</p>
            </div>
            <div class="dost_right flex">
                <div class="dost_right_1 flex dost_right_1_1">
                    <img src="/public/img/tachila.svg" alt="Доставка">
                    <div>
                        <p class="dost_full">400 руб.</p>
                        <p class="">Доставка<br>по г. Ставрополю</p>
                    </div>
                </div>
                <div class="dost_right_1 flex dost_right_1_2">
                    <img src="/public/img/tachila.svg" alt="Доставка">
                    <div>
                        <p class="dost_full">+ 24 руб/км</p>
                        <p class="">Доставка мебели<br>в другие города</p>
                    </div>
                </div>
            </div>
            <div class="dost dost_p">
                <h2>Подъем и Сборка</h2>
                <p>Уважаемые покупатели, если Вы решили воспользоваться услугами, по сборке, купленной у нас мебели, то стоимость составит 10% от стоимости товара, но не менее 500р. Так же Вы можете собрать ее самостоятельно. Сборка осуществляется на следующий день или в день доставки товара.</p>
                <p>Расчет подъема осуществляется в момент составления заявки.</p>
                <p>Стоимость подъема на лифте для некрупной мебели (кресла, столы, стулья, тумбы и тд.) - 300 рублей с 1 человека, пешком - 100 рублей за каждый этаж.</p>
                <p>Подъем крупногабаритных товаров - на лифте 300 рублей, пешком от 200 до 250 руб за каждый этаж.</p>
            </div>
            <div class="dost dost_p">
                <h2>Способы оплаты</h2>
                <nav>
                    <h3>Оплата для физических лиц:</h3>
                    <li>Оплата наличными при получении товара.</li>
                    <li>Перевод на карту Сбербанка (позвоните менеджеру 218-113 и Вам вышлют реквизиты)</li>
                    <li>Обращаем Ваше внимание, что при заказе необходимо вносить предоплату от 30% до 50% от общей стоимости заказа.</li>
                </nav>
                <nav>
                    <h3>Оплата для юридических лиц:</h3>
                    <li>Оплата по безналичному расчету с НДС или БЕЗ НДС.</li>
                    <li>Полный пакет документов предоставляется во время доставки товара или почтой.</li>
                </nav>
            </div>
        </div>
    </div>
<?}?>

