<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '合作品牌';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bmanufacturer-index">



    <p>
        <?= Html::a('添加合作品牌', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],
            'manufacturer_id',
            'name',
            'image',
            'config_input:ntext',
            'sort_order',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
