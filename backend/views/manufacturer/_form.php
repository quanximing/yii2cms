<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\library\image\image;
$res_image = new image();
$this->registerJsFile('@web/js/common.js',['depends'=>['backend\assets\AppAsset']]);
/* @var $this yii\web\View */
/* @var $model backend\models\Bmanufacturer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bmanufacturer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>


    <div class="form-group field-bmanufacturer-">
        <?= Html::hiddenInput('Bmanufacturer[image]',$model->image) ?>
        <a href="" id="thumb-image" data-toggle="image" class="img-thumbnail">
            <img src="<?=!empty($model->image)?$res_image->resize($model->image,100,100):Yii::$app->params['image_url'].'/images/cache/no_image-100x100.png'?>" alt="" title="" data-placeholder="<?=isset($model->image)?$model->image:Yii::$app->params['image_url'].'/images/cache/no_image-100x100.png'?>" />
        </a>
    </div>
    <?= $form->field($model, 'config_input')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sort_order')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
