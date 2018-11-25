<?php

namespace backend\controllers;

use common\models\Options;
use Yii;
use common\models\ProductOptions;
use common\models\ProductOptionsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductOptionsController implements the CRUD actions for ProductOptions model.
 */
class ProductOptionsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ProductOptions models.
     * @return mixed
     */
    public function actionIndex($par_id, $opt_id = null, $ajax = null)
    {
        $searchModel = new ProductOptionsSearch();
        $searchModel->product_id = $par_id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $model = new ProductOptions();
        $model->product_id = $par_id;
        if ($opt_id){
            $model->options_id = $opt_id;
            $model->is_list = Options::findOne($opt_id)->type;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model = new ProductOptions();
            $model->product_id = $par_id;

            return $this->redirect(['index', 'par_id' => $model->product_id,]);
        }

        if (Yii::$app->request->isAjax && $ajax){
            return $this->redirect(['index', 'par_id' => $par_id, 'opt_id' => $opt_id]);
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single ProductOptions model.
     * @param integer $product_id
     * @param integer $options_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($product_id, $options_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($product_id, $options_id),
        ]);
    }

    /**
     * Creates a new ProductOptions model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductOptions();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'product_id' => $model->product_id, 'options_id' => $model->options_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProductOptions model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $product_id
     * @param integer $options_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($product_id, $options_id)
    {
        $model = $this->findModel($product_id, $options_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'product_id' => $model->product_id, 'options_id' => $model->options_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProductOptions model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $product_id
     * @param integer $options_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($product_id, $options_id)
    {
        $this->findModel($product_id, $options_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductOptions model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $product_id
     * @param integer $options_id
     * @return ProductOptions the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($product_id, $options_id)
    {
        if (($model = ProductOptions::findOne(['product_id' => $product_id, 'options_id' => $options_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
