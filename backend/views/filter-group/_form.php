<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Alert;
/* @var $this yii\web\View */
/* @var $model common\models\FilterGroup */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="filter-group-form">
    <?php
    if( Yii::$app->getSession()->hasFlash('save-error') ) {
        echo Alert::widget([
            'options' => [
                'class' => 'alert-error',
            ],
            'body' => Yii::$app->getSession()->getFlash('save-error'),
        ]);
    }
    ?>

    <?php $form = ActiveForm::begin(); ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-pencil"></i>添加筛选</h3>
            <div style="margin-top:15px;">
                <!--<button type="submit" form="form-product" data-toggle="tooltip" title="保存" class="btn btn-primary"><i class="fa fa-save"></i></button>-->
                <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
                <a href="<?php echo Yii::$app->request->referrer?>" data-toggle="tooltip" title="取消" class="btn btn-default"><i class="fa fa-reply"></i></a>
            </div>
        </div>
        <div class="panel-body">

                <fieldset id="option-value">
                    <legend>筛选过滤组</legend>
                    <div class="form-group required">
                        <?= $form->field($group_description, 'name')->textInput(['placeholder'=>'筛选分组名称']) ?>
                    </div>
                    <div class="form-group">
                        <?= $form->field($model, 'sort_order')->textInput() ?>
                    </div>
                </fieldset>
                <fieldset id="option-value">
                    <legend>筛选过滤值</legend>
                    <table id="filter" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <td class="text-left required">筛选名称</td>
                            <td class="text-right">排序</td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $filter_row = 0 ;?>
                        <?php if(!empty($filters)):?>
                        <?php foreach ($filters as $k=>$filter):?>
                        <tr id="filter-row<?=$k?>">
                            <td class="text-left" style="width: 70%;">
                                <input type="hidden" name="filter[<?=$k?>][filter_id]" value="<?=$filter->filter_id?>" />
                                <div class="input-group">
                                    <input type="text" name="filter[<?=$k?>][name]" value="<?=$filter->description->name;?>" placeholder="筛选名称" class="form-control" />
                                </div>
                            </td>
                            <td class="text-right"><input type="text" name="filter[<?=$k?>][sort_order]" value="<?=$filter->sort_order?>" placeholder="排序" id="input-sort-order" class="form-control" /></td>
                            <td class="text-right"><button type="button" onclick="$('#filter-row<?=$k?>').remove();" data-toggle="tooltip" title="删除" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>
                        </tr>
                        <?php $filter_row = $filter_row + 1 ?>
                        <?php endforeach;
                        endif;
                        ?>
                        </tbody>

                        <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td class="text-right"><button type="button" onclick="addFilterRow();" data-toggle="tooltip" title="{{ button_filter_add }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></td>
                        </tr>
                        </tfoot>
                    </table>
                </fieldset>
        </div>
    </div>
    <?php ActiveForm::end(); ?>



<script type="text/javascript"><!--
var filter_row = <?=!empty($filter_row)?$filter_row:0?>;
function addFilterRow() {
html  = '<tr id="filter-row' + filter_row + '">';
    html += '  <td class="text-left" style="width: 70%;"><input type="hidden" name="filter[' + filter_row + '][filter_id]" value="" />';
    html += '  <div class="input-group">';
    html += '<input type="text" name="filter[' + filter_row + '][name]" value="" placeholder="筛选名称" class="form-control" />';
    html += '  </div>';
    html += '  </td>';
    html += '  <td class="text-right"><input type="text" name="filter[' + filter_row + '][sort_order]" value="" placeholder="排序" id="input-sort-order" class="form-control" /></td>';
    html += '  <td class="text-right"><button type="button" onclick="$(\'#filter-row' + filter_row + '\').remove();" data-toggle="tooltip" title="删除" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
    html += '</tr>';

$('#filter tbody').append(html);

filter_row++;
}
//--></script>
</div>