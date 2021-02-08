<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '登录';
?>

<div class="login-box sty1">
    <div class="login-box-body sty1">
        <div class="login-logo">
            <a href="/"><img src="/img/logo-blue.png" alt=""></a>
        </div>
        <p class="login-box-msg">用户登录</p>
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <div class="form-group has-feedback">
                <?= $form->field($model, 'username')->textInput(['autofocus' => true,'placeholder'=>"用户名",'class'=>"form-control sty1"]) ?>
            </div>
            <div class="form-group has-feedback">
                <?= $form->field($model, 'password')->passwordInput(['placeholder'=>"密码",'class'=>"form-control sty1"]) ?>
            </div>
            <div>
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <?= $form->field($model, 'rememberMe')->checkbox() ?>
                        </label>
                        <a href="/" class="pull-right"><i class="fa fa-lock"></i> 忘记密码?</a> </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4 m-t-1">
                    <?= Html::submitButton('登录', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
                </div>
                <!-- /.col -->
            </div>
        <?php ActiveForm::end(); ?>
        <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-weixin"></i> 微信扫描登录</a>
        </div>
        <!-- /.social-auth-links -->

        <div class="m-t-2">没有账户或忘记密码联系管理员? <a href="/" class="text-center">注册（不开放）</a></div>
    </div>
    <!-- /.login-box-body -->
</div>
