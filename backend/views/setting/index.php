<?php

use yii\helpers\Html;
use yii\grid\GridView;
use mdm\admin\components\Helper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\query\SettingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '系统设置常量列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <?= Html::a('添加配置项', ['create'], ['class' => 'btn btn-success']) ?>
            </div>
            <div class="box-body" style="overflow:auto">

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'code',
            'key',
            'value',
            [
                'attribute' => 'serialized',
                'value' => function($model) {
                    switch($model->serialized){
                        case 0:
                            return '否';
                        case 1:
                            return '是';
                    }
                },
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => Helper::filterActionColumn(['view', 'update', 'delete']),
            ],
        ],
    ]);
    ?>
</div>
        </div>
    </div>
</div>
