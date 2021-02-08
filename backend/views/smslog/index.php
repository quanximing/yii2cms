<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\SmslogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bsms Logs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bsms-log-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bsms Log', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],
            'id',
            'mobile',
           // 'session_id',
            'code',
            'status',
            'msg',
            'scene',
           // 'error_msg:ntext',
            'create_time:datetime',
           // 'used_time:datetime',

           // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
