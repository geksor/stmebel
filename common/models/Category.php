<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Inflector;
use yii\helpers\Json;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $title
 * @property string $meta_title
 * @property string $meta_description
 * @property string $description
 * @property string $alias
 * @property string $image
 * @property int $rank
 * @property int $publish
 * @property string $show_opt_to_product_list
 * @property string $show_opt_to_product_card
 * @property string $show_opt_to_cart
 * @property array $selectedAttrs
 * @property array $selectedOptions
 * @property array $catAttr
 * @property array $catOpt
 * @property array $uploadImage
 * @property array $optForList
 * @property array $optFromCart
 * @property array $optShort
 * @property bool $newRecord
 * @property int $view_from_main
 * @property string $url
 *
 * @property CategoryAttr[] $categoryAttrs
 * @property Attr[] $attrs
 * @property CategoryOptions[] $categoryOptions
 * @property Options[] $options
 * @property CategoryProduct[] $categoryProducts
 * @property Product[] $products
 * @property Category[] $parent
 * @property Category[] $child
 */
class Category extends \yii\db\ActiveRecord
{
    public $uploadImage;
    public $catAttr;
    public $catOpt;
    public $newRecord;
    public $optForList;
    public $optFromCart;
    public $optShort;

    public function afterFind()
    {
        $this->catAttr = $this->selectedAttrs;
        $this->catOpt = $this->selectedOptions;
        $this->optForList = Json::decode($this->show_opt_to_product_list);
        $this->optFromCart = Json::decode($this->show_opt_to_cart);
        $this->optShort = Json::decode($this->show_opt_to_product_card);
        parent::afterFind();
    }

    public function getParentsFromBread()
    {
        $breadArr = [];
        if ($this->parent){
            $tempModel = $this->parent;
            /* @var $tempModel Category */
            $breadArr[] = ['rank' => 1, 'alias' => $tempModel->alias, 'title' => $tempModel->title];
            $rank = 2;
            while ($tempModel->parent){
                $tempModel = $tempModel->parent;
                $breadArr[] = ['rank' => $rank, 'alias' => $tempModel->alias, 'title' => $tempModel->title];
                $rank++;
            }
            ArrayHelper::multisort($breadArr, 'rank', SORT_DESC);
        }
        return $breadArr;
    }

    public function getUrl()
    {
        return [
            'catalog/index',
            'alias' => $this->alias,
        ];
    }

    /**
     * @return false|int
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function saveShowOptions()
    {
        $this->show_opt_to_product_list = Json::encode($this->optForList);
        $this->show_opt_to_product_card = Json::encode($this->optShort);
        $this->show_opt_to_cart = Json::encode($this->optFromCart);
        return $this->update(false);
    }

    /**
     * @return array
     */
    public function getSelectedOptFromDropDown()
    {
        $optsId = $this->getSelectedOptions();
        return ArrayHelper::map(Options::findAll(['id' => $optsId]), 'id', 'title');
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'rank', 'publish', 'view_from_main',], 'integer'],
            [['parent_id'], 'default', 'value' => 0],
            [['rank'], 'default', 'value' => 1],
            [['title'], 'required'],
            [['image'], 'string'],
            [['catAttr', 'catOpt', 'optShort', 'optForList', 'optFromCart'], 'safe'],
            [['uploadImage'], 'image', 'extensions' => ['svg']],
            [['description', 'show_opt_to_product_list', 'show_opt_to_product_card', 'show_opt_to_cart'], 'string'],
            [['title', 'meta_title', 'meta_description', 'alias'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Родительская категория',
            'title' => 'Название',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'description' => 'Описание',
            'alias' => 'Путь',
            'image' => 'Изображение',
            'rank' => 'Порядок вывода',
            'publish' => 'Публикация',
            'show_opt_to_product_list' => 'Характеристики в списке товаров',
            'show_opt_to_product_card' => 'Характеристики в разделе с ценой',
            'show_opt_to_cart' => 'Характеристики в корзине',
            'optShort' => 'Показывать в разделе с ценой',
            'optForList' => 'Показывать в списке товаров',
            'optFromCart' => 'Показывать в корзине',
            'view_from_main' => 'Показывать на главной'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryAttrs()
    {
        return $this->hasMany(CategoryAttr::className(), ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttrs()
    {
        return $this->hasMany(Attr::className(), ['id' => 'attr_id'])->viaTable('category_attr', ['category_id' => 'id']);
    }

    /**
     * @return array
     */
    public function getSelectedAttrs()
    {
        $selectedAttrs = $this->getAttrs()->select('id')->asArray()->all();
        return ArrayHelper::getColumn($selectedAttrs, 'id');
    }

    /**
     * @return array
     */
    public function getSelectedOptions()
    {
        $selectedOptions = $this->getOptions()->select('id')->asArray()->all();
        return ArrayHelper::getColumn($selectedOptions, 'id');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryOptions()
    {
        return $this->hasMany(CategoryOptions::className(), ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOptions()
    {
        return $this->hasMany(Options::className(), ['id' => 'options_id'])->viaTable('category_options', ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryProducts()
    {
        return $this->hasMany(CategoryProduct::className(), ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['id' => 'product_id'])->viaTable('category_product', ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Category::className(), ['id' => 'parent_id']);
    }


    /**
     * @return string
     */
    public function getParentName()
    {
        /* @var $parent Category */
        $parent = $this->parent;

        return $parent ? $parent->title : 'Верхний уровень';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChild()
    {
        return $this->hasMany(Category::className(), ['parent_id' => 'id']);
    }

    /**
     * @return array
     */
    public static function getParentsList()
    {
        $parents = Category::find()
            ->select(['id', 'title'])
            ->asArray()
            ->all();

        $parents[] = ['id' => 0, 'title' => 'Верхний уровень'];

        ArrayHelper::multisort($parents, 'id');

        return ArrayHelper::map($parents, 'id', 'title');

    }

    public function saveAttr($attrs)
    {
        CategoryAttr::deleteAll(['category_id' => $this->id]);
        if (is_array($attrs))
        {
            foreach ($attrs as $attr_id)
            {
                $attr = Attr::findOne($attr_id);
                $this->link('attrs', $attr);
            }
        }
    }

    public function saveOpt($options)
    {
        CategoryOptions::deleteAll(['category_id' => $this->id]);
        if (is_array($options))
        {
            foreach ($options as $options_id)
            {
                $opt = Options::findOne($options_id);
                $this->link('options', $opt);
            }
        }
    }

    /**
     * @return bool
     * For the Inflector to work, need an extension intl in php.ini
     */
    public function beforeValidate()
    {
        if (!$this->alias){
            $this->alias = $this->title;
        }

        $this->alias = Inflector::slug($this->alias);

        return parent::beforeValidate();
    }

    public function beforeSave($insert)
    {
        $this->isNewRecord?$this->newRecord = true:$this->newRecord = false;
        return parent::beforeSave($insert);
    }

    public function afterSave($insert, $changedAttributes)
    {
        if ($this->newRecord){
            $attrModels = Attr::findAll(['all_cats' => 1]);
            if ($attrModels){
                foreach ($attrModels as $attrModel){
                    $this->link('attrs', $attrModel);
                }
            }
            $optionModels = Options::findAll(['allCats' => 1]);
            if ($optionModels){
                foreach ($optionModels as $optionModel){
                    $this->link('options', $optionModel);
                }
            }
        }
        parent::afterSave($insert, $changedAttributes);
    }

    /**
     * @return array
     */
    public static function getAttrFromDropDown()
    {
        return ArrayHelper::map(Attr::find()->all(), 'id', 'title');
    }

    /**
     * @return array
     */
    public static function getOptFromDropDown()
    {
        return ArrayHelper::map(Options::find()->all(), 'id', 'title');
    }

    public function afterDelete()
    {
        parent::afterDelete();
        $products = Product::find()->where(['main_category' => $this->id])->with('categories')->all();
        $defCat = Category::findOne(['publish' =>1]);
        if ($products){
            foreach ($products as $product){/* @var $product Product */
                if ($product->categories){
                    $product->main_category = $product->categories[0]->id;
                }else{
                    if ($defCat){
                        $product->main_category = $defCat->id;
                    }else{
                        $product->main_category = null;
                    }
                }
                $product->save(false);
            }
        }
    }

}
