<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '筛选分组';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="filter-group-index">



    <p>
        <?= Html::a('添加筛选分组', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            //'filter_group_id',
            'groupdescription.name',
            'sort_order',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
