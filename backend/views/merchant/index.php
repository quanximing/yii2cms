<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\MerchantSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '商户（大客户）管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="merchant-index" style="padding: 30px 15px; background: #f4f4f4">
    <div class="col-md-2">
            <?= Html::a('添加商户', ['create'], ['class' => 'btn btn-success']) ?>
    </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'merchant_id',
            'username',
            'status',
            //'access_token',
            //'auth_key',
            'telephone',
            //'password_hash',
            //'password_reset_token',
            'created_at:date',
            'updated_at:date',
            'logged_at:date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
