<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Merchant */

$this->title = '添加商户';
$this->params['breadcrumbs'][] = ['label' => '商户列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="merchant-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
