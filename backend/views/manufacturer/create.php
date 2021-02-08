<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Bmanufacturer */

$this->title = '添加合作伙伴';
$this->params['breadcrumbs'][] = ['label' => 'Bmanufacturers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bmanufacturer-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
