<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FilterGroup */

$this->title = '修改 筛选分组';
$this->params['breadcrumbs'][] = ['label' => '筛选分组', 'url' => ['index']];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="filter-group-update">
    <?= $this->render('_form', [
        'model' => $model,
        'group_description'=>$group_description,
        'filters'=>$filters,
    ]) ?>

</div>
