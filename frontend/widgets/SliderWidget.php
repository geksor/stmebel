<?php
namespace frontend\widgets;

use common\models\Category;
use common\models\Slider;
use yii\base\Widget;

/**
 * Class SliderWidget
 * @package frontend\widgets
 *
 * @property int $sliderId
 */
class SliderWidget extends Widget
{
    public $sliderId;

    public function run()
    {
        if ($this->sliderId){
            $model = Slider::findOne(['id' => $this->sliderId]);
        }else{
            $model = Slider::find()->one();
        }

        return $this->render('sliderWidget', [
            'model' => $model,
        ]);
    }
}