<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Merchant */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="merchant-form" style="background: #f9f9f9;padding: 30px 20px;">

    <?php $form = ActiveForm::begin(); ?>
    <div class="form-group">
        <div class="col-md-4">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-4">
            <?= $form->field($model, 'status')->dropDownList([1=>'启用',0=>'禁用']) ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-4">
            <?= $form->field($model, 'telephone')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-4">
        <?= Html::submitButton('添加', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
