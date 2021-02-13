<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Bcategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bcategory-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'parent_id')->textInput() ?>
    <?= $form->field($model, 'top')->textInput() ?>
    <?= $form->field($model, 'column')->textInput() ?>
    <?= $form->field($model, 'sort_order')->textInput() ?>
    <?= $form->field($model, 'status')->textInput() ?>
    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
