<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Bbanner */

$this->title = '添加横幅广告';
$this->params['breadcrumbs'][] = ['label' => '横幅广告', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bbanner-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
