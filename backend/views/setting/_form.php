<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Setting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setting-form">
    <div class="custom_block">
        <h4>设置信息</h4>
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-2"><?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-2"><?= $form->field($model, 'key')->textInput(['maxlength' => true]) ?></div>
    </div>
    <div class="row">
        <div class="col-md-2"><?= $form->field($model, 'serialized')->radioList(['否','是']) ?></div>
    </div>
    <div class="row">
        <div class="col-md-4"><?= $form->field($model, 'value')->textarea(['rows' => 1]) ?></div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
</div>
