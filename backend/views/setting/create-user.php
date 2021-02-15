<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\User;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mdm\admin\models\form\Signup */

$this->title = '创建用户';
$this->params['breadcrumbs'][] = $this->title;
$model->type =1;
?>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
            </div>
            <div class="box-body" style="overflow:auto">
                <?= Html::errorSummary($model)?>
                    <div class="col-md-8">
                        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <?= $form->field($model, 'username') ?>
                            </div>
                            <div class="col-md-6">
                                <?= $form->field($model, 'email') ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <?= $form->field($model, 'password')->passwordInput() ?>
                            </div>
                            <div class="col-md-6">
                                <?= $form->field($model, 'retypePassword')->passwordInput() ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <?= $form->field($model, 'type')->radioList(User::typelist()) ?>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-12">
                                <?= $form->field($model, 'data_source')->textarea(['placeholder'=>'多条数据以分号;为分隔符']) ?>
                                <div class="help-block">多条数据以分号;为分隔符，示例1;2 (类型供应商的，填写供应商表的ID 作为数据关联。 公司员工，填写员工的ID作为数据关联)</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <?= Html::submitButton('添加', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
            </div>
        </div>
    </div>
</div>
