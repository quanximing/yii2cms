<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Alert;
/* @var $this yii\web\View */
/* @var $model backend\models\BattributeGroup */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel panel-default">
    <?php
    if( Yii::$app->getSession()->hasFlash('save-error') ) {
        echo Alert::widget([
            'options' => [
                'class' => 'alert-error',
            ],
            'body' => Yii::$app->getSession()->getFlash('save-error'),
        ]);
    }
    ?>
    <?php $form = ActiveForm::begin(); ?>
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i>属性组</h3>
        <div style="margin-top:15px;">
            <!--<button type="submit" form="form-product" data-toggle="tooltip" title="保存" class="btn btn-primary"><i class="fa fa-save"></i></button>-->
            <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
            <a href="<?php echo Yii::$app->request->referrer?>" data-toggle="tooltip" title="取消" class="btn btn-default"><i class="fa fa-reply"></i></a>
        </div>
    </div>
    <div class="panel-body">

            <div class="form-group required">
                <?= $form->field($group_description, 'name')->textInput() ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'sort_order')->textInput() ?>
            </div>

    </div>
    <?php ActiveForm::end(); ?>
</div>