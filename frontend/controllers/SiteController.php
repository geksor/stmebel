<?php
namespace frontend\controllers;

use backend\models\Contact;
use common\models\CallBack;
use common\models\Certificate;
use common\models\Comment;
use common\models\WeDocs;
use common\models\WePartner;
use frontend\widgets\ModalsWidget;
use Yii;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{

    /**
     * @param $action
     * @return bool
     * @throws \yii\web\BadRequestHttpException
     */
    public function beforeAction($action)//Обязательно нужно отключить Csr валидацию, так не будет работать
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
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

        return $this->render('index');
    }

    /**
     * Displays reviews
     *
     * @return string
     */
    public function actionReviews()
    {
        $model = Comment::find()->where(['publish' => 1])->orderBy(['created_at' => SORT_ASC])->all();

        $formModel = new Comment();

        if ($formModel->load(Yii::$app->request->post())){
            if ($formModel->name){
                return $this->redirect('reviews');
            }
            if ($formModel->save()){
                Yii::$app->session->setFlash('popUp', 'Благодарим Вас за отзыв.');
                $message = "Новый отзыв\n Имя: $formModel->user_name \n Текст отзыва: $formModel->text";
                \Yii::$app->bot->sendMessage((integer)Yii::$app->params['Contact']['chatId'], $message);
                $formModel->sendEmail();
            }else{
                Yii::$app->session->setFlash('popUp', 'Ошибка. Попробуйте еще раз.');
            }
            return $this->redirect('reviews');
        }

        return $this->render('reviews', [
            'model' => $model,
            'formModel' => $formModel,
        ]);
    }


    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new Contact();
        $model->load(Yii::$app->params);

        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionDelivery()
    {
        return $this->render('delivery');
    }

    public function actionPartner()
    {
        $model = WePartner::findOne(['id' => 1]);

        return $this->render('partner', [
            'model' => $model,
        ]);
    }

    public function actionDocuments()
    {
        $modelDoc = WeDocs::find()->all();
        $modelCert = Certificate::findOne(['id' => Yii::$app->params['SiteSettings']['certificate_id']]);

        return $this->render('documents', [
            'modelDoc' => $modelDoc,
            'modelCert' => $modelCert,
        ]);
    }

    public function actionCallBack()
    {
        $model = new CallBack();

        if ($model->load(Yii::$app->request->post())){
            if ($model->lastName){
                return $this->redirect(Yii::$app->request->referrer);
            }
            if ($model->save()){
                \Yii::$app->session->setFlash('popUp', 'Ваша заявка принята');
                $message = "Запрос обратного звонка\n Имя: $model->name \n Телефон: $model->phone";
                \Yii::$app->bot->sendMessage((integer)Yii::$app->params['Contact']['chatId'], $message);
                $model->sendEmail();
            }else{
                \Yii::$app->session->setFlash('popUp', 'Ошибка. Попробуйте еще раз');
            }
        }
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionAlertWidget()
    {
        if (Yii::$app->request->isPjax){
            return $this->renderAjax(ModalsWidget::widget());
        }
        return $this->redirect(Yii::$app->request->referrer);
    }
}
