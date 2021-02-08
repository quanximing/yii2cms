<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Bbanner */

$this->title = '修改横幅广告';
$this->params['breadcrumbs'][] = ['label' => '横幅广告', 'url' => ['index']];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="bbanner-update">
    <?= $this->render('_form', [
        'model' => $model,
        'banner_images'=>$banner_images,
    ]) ?>

</div>
