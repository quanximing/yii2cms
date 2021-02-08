<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Bmanufacturer */

$this->title = '修改合作伙伴';
$this->params['breadcrumbs'][] = ['label' => '合作伙伴', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bmanufacturer-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
