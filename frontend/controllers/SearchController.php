<?php
namespace frontend\controllers;

use common\models\SiteSettings;
use frontend\models\SiteSearch;
use Yii;
use yii\web\Controller;

/**
 * Site controller
 */
class SearchController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SiteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $products = $dataProvider->getModels();

        $siteSettings = new SiteSettings();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'products' => $products,
            'siteSettings' => $siteSettings,
        ]);
    }

}
