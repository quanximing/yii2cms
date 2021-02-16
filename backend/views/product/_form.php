<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dlds\summernote\SummernoteWidget;
use common\library\image\image;
kartik\date\DatePickerAsset::register($this);
$res_image = new image();

$this->registerJsFile('@web/js/common.js',['depends'=>['backend\assets\AppAsset']]);
$this->registerJsFile('@web/js/csumernote.js',['depends'=>['backend\assets\AppAsset']]);
?>


    <div class="container-fluid">
     <?php $form = ActiveForm::begin(); ?>
     <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?=$this->title?></h3>
        <div style="margin-top:15px;">
          <!--<button type="submit" form="form-product" data-toggle="tooltip" title="保存" class="btn btn-primary"><i class="fa fa-save"></i></button>-->
            <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
          <a href="<?php echo Yii::$app->request->referrer?>" data-toggle="tooltip" title="取消" class="btn btn-default"><i class="fa fa-reply"></i></a>
      </div>
      </div>
      <div class="panel-body">

        <ul class="nav nav-tabs">
           <li class="active"><a href="#tab-general" data-toggle="tab">常规</a></li>
           <li><a href="#tab-extend" data-toggle="tab">扩展</a></li>
           <li><a href="#tab-attibute" data-toggle="tab">属性</a></li>
           <li><a href="#tab-image" data-toggle="tab">图像</a></li>
            <li><a href="#tab-special" data-toggle="tab">特价</a></li>
           <li><a href="#tab-option" data-toggle="tab">选项</a></li>
            <li><a href="#tab-recurring" data-toggle="tab">分期</a></li>
           <li><a href="#tab-insure" data-toggle="tab">保险三要素</a></li>
           <li><a href="#tab-customtabmain" data-toggle="tab">自定义Tab</a></li>
        </ul>
        <div class="tab-content">
          <!-- 常规 -->
           <div class="tab-pane active" id="tab-general">

                 <div class="form-group required">
                   <div class="col-sm-6">
                       <?= $form->field($product_description, 'name')->textInput(['maxlength' => true,'id'=>'input-name1','class'=>"form-control"]) ?>
                    </div>
                     <div class="col-sm-3">
                         <?= $form->field($product, 'model')->textInput(['maxlength' => true,'id'=>'input-model','class'=>"form-control"]) ?>
                     </div>
                     <div class="col-sm-3">
                         <?= $form->field($product, 'sku')->textInput(['maxlength' => true,'id'=>'input-sku','class'=>"form-control"]) ?>
                     </div>
                 </div>

                 <div class="form-group">
                     <div class="col-sm-6">
                         <?= $form->field($product, 'price')->textInput(['maxlength' => true,'id'=>'input-price','class'=>"form-control"]) ?>
                     </div>
                     <div class="col-sm-6">
                         <?= $form->field($product_description, 'tag')->textInput(['maxlength' => true,'id'=>'input-tag','class'=>"form-control"]) ?>
                     </div>
                 </div>
               <div class="form-group">
                   <div class="col-sm-6">
                       <?= $form->field($product, 'commission')->textInput(['maxlength' => true,'id'=>'input-commission','class'=>"form-control"]) ?>
                   </div>
                   <div class="col-sm-6">
                       <?= $form->field($product, 'commission_extend')->textInput(['maxlength' => true,'id'=>'input-commission_extend','class'=>"form-control"]) ?>
                   </div>
               </div>
                   <div class="form-group">
                       <div class="col-sm-12">
                         <?= $form->field($product_description, 'description')->widget(SummernoteWidget::className(), [
                          'clientOptions' => [
                          ],
                             'options'=>[
                                     'data-toggle'=>'summernote',
                             ]
                        ]) ?>
                       </div>
                   </div>
                   <div class="form-group">
                       <div class="col-sm-6">
                           <?= $form->field($product, 'template')->textInput(['maxlength' => true,'id'=>'input-template','class'=>"form-control"]) ?>
                       </div>
                       <div class="col-sm-6">
                           <?= $form->field($product, 'header_url')->textInput(['maxlength' => true,'id'=>'input-header_url','class'=>"form-control"]) ?>
                       </div>
                   </div>
                 <div class="form-group required">
                     <div class="col-sm-6">
                         <?= $form->field($product_description, 'meta_title')->textarea(['maxlength' => true,'id'=>'input-meta-title1','class'=>"form-control"]) ?>
                     </div>
                     <div class="col-sm-6">
                         <?= $form->field($product_description, 'meta_keyword')->textarea(['maxlength' => true,'id'=>'input-meta-keword','class'=>"form-control"]) ?>
                     </div>
                 </div>
                 <div class="form-group">
                     <div class="col-sm-12">
                         <?= $form->field($product_description, 'meta_description')->textarea(['maxlength' => true,'id'=>'input-meta-description1','class'=>"form-control"]) ?>
                     </div>
                 </div>


           </div>
           <!-- 图像 -->
          <div class="tab-pane" id="tab-image">
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <td class="text-left">图像</td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-left">
                          <a href="" id="thumb-image" data-toggle="image" class="img-thumbnail">
                              <img src="<?=isset($product->image)?$res_image->resize($product->image,100,100):Yii::$app->params['image_url'].'/images/cache/no_image-100x100.png'?>" alt="" title="" data-placeholder="<?=isset($product->image)?$product->image:Yii::$app->params['image_url'].'/images/cache/no_image-100x100.png'?>" />
                          </a>
                          <?php //=$form->field($product,'image')->hiddenInput(['id'=>'input-image']) ?>
                          <?=Html::hiddenInput('Bproduct[image]',$product->image,['id'=>'input-image'])?>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="table-responsive">
                <table id="images" class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <td class="text-left">附加图片</td>
                      <td class="text-right">排序</td>
                      <td></td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($product->images)){
                        $img_num = count($product->images);
                        foreach ($product->images as $k => $image){ ?>
                            <tr id="image-row<?=$k?>">
                                <td class="text-left">
                                    <a href="" id="thumb-image<?=$k?>" data-toggle="image" class="img-thumbnail">
                                        <img src="<?=$res_image->resize($image->image,100,100)?>" alt="" title="" data-placeholder="<?=\Yii::$app->params['image_url']?>/image/cache/no_image-100x100.png">
                                    </a><input type="hidden" name="product_image[<?=$k?>][image]" value="<?=$image->image?>" id="input-image2"></td>
                                <td class="text-right"><input type="text" name="product_image[<?=$k?>][sort_order]" value="<?=$image->sort_order?>" placeholder="排序" class="form-control"></td>
                                <td class="text-left"><button type="button" onclick="$('#image-row<?=$k?>').remove();" data-toggle="tooltip" title="移除" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>
                            </tr>
                    <?php  }
                    }?>


                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="2"></td>
                      <td class="text-left"><button type="button" onclick="addImage();" data-toggle="tooltip" title="添加图片" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
            <!--特价-->
          <div class="tab-pane" id="tab-special">
                <div class="table-responsive">
                    <table id="special" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <td class="text-left">会员等级</td>
                            <td class="text-right">优先级</td>
                            <td class="text-right">价格</td>
                            <td class="text-left">开始日期</td>
                            <td class="text-left">结束日期</td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>

                        <?php if (!empty($product_specials)):?>
                        <?php foreach ($product_specials as $key => $product_special):?>

                        <tr id="special-row<?=$key?>">
                            <td class="text-left"><select name="product_special[<?=$key?>][customer_group_id]" class="form-control">
                                    <option value="1" selected="selected">普通</option>
                                </select></td>
                            <td class="text-right"><input type="text" name="product_special[<?=$key?>][priority]" value="{{ product_special.priority }}" placeholder="优先级" class="form-control" /></td>
                            <td class="text-right"><input type="text" name="product_special[<?=$key?>][price]" value="{{ product_special.price }}" placeholder="价格" class="form-control" /></td>
                            <td class="text-left" style="width: 20%;"><!--<div class="input-group date">
                                    <input type="text" name="product_special[<?/*=$key*/?>][date_start]" value="{{ product_special.date_start }}" placeholder="开始日期" data-date-format="YYYY-MM-DD" class="form-control" />
                                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
                        </span></div>-->
                                <?=DatePicker::widget([
                                    'name' => "product_special[$key][date_start]",
                                    'value' => isset($product_special['date_start'])?$product_special['date_start']:'',
                                    'options' => ['placeholder' => '开始时间'],
                                    'pluginOptions' => [
                                        'format' => 'yyyy-mm-dd',
                                        'todayHighlight' => true
                                    ]
                                ]);?>
                            </td>
                            <td class="text-left" style="width: 20%;"><!--<div class="input-group date">
                                    <input type="text" name="product_special[<?/*=$key*/?>][date_end]" value="{{ product_special.date_end }}" placeholder="结束日期" data-date-format="YYYY-MM-DD" class="form-control" />
                                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
                        </span></div>-->
                                <?=DatePicker::widget([
                                    'name' => "product_special[$key][date_end]",
                                    'value' => isset($product_special['date_end'])?$product_special['date_end']:'',
                                    'options' => ['placeholder' => '结束时间'],
                                    'pluginOptions' => [
                                        'format' => 'yyyy-mm-dd',
                                        'todayHighlight' => true
                                    ]
                                ]);?>

                            </td>
                            <td class="text-left"><button type="button" onclick="$('#special-row<?=$key?>').remove();" data-toggle="tooltip" title="{{ button_remove }}" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>
                        </tr>
                       <?php endforeach;?>
                       <?php endif; ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="5"></td>
                            <td class="text-left"><button type="button" onclick="addSpecial();" data-toggle="tooltip" title="{{ button_special_add }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
          <!-- 添加Tab -->
          <div class="tab-pane" id="tab-customtabmain">
              <div class="col-sm-2">
                <ul class="nav nav-pills nav-stacked" id="customtab">
                    <?php if(!empty($product_customtab)){
                        foreach ( $product_customtab as $k => $customtab) { ?>
                            <li class="">
                                <a href="#tab-customtab<?=$k?>" data-toggle="tab" aria-expanded="false">
                                    <i class="fa fa-minus-circle" onclick="$('a[href=\'#tab-customtab<?=$k?>\']').parent().remove(); $('#tab-customtab<?=$k?>').remove(); $('#customtab li a:first').tab('show');"></i>
                                    自定义Tab <?=$k?>
                                </a>
                            </li>
                          <!--  //var_dump($customtab->description);-->
                    <?php   }
                    } ?>
                  <li id="customtab-add"><a onclick="addCustomtab()"><i class="fa fa-plus-circle"></i> 添加Tab </a></li>
                </ul>
              </div>
              <div class="col-sm-10">
                  <div class="tab-content tab-content2">
                      <?php if(!empty($product_customtab)){
                          $num =count($product_customtab);
                          foreach ( $product_customtab as $k => $customtab) { ?>
                      <div id="tab-customtab<?=$k?>" class="tab-pane <?=$k==0?'active':''?>">
                          <div class="tab-content">
                              <div class="form-group"><label class="col-sm-2 control-label" for="input-title0">Tab标签</label>
                                  <div class="col-sm-10">
                                      <input type="text" name="product_customtab[<?=$k?>][title]" placeholder="Tab标签" id="input-title0-language1" value="<?=$customtab->description['title']?>" class="form-control">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 control-label" for="input-description0">描述</label>
                                  <div class="col-sm-10"><textarea name="product_customtab[<?=$k?>][description]" data-toggle="summernote" data-lang="" class="form-control" id="input-description0-language1">
                                          <?=$customtab->description['description']?>
                                      </textarea>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 control-label" for="input-status0">状态</label>
                                  <div class="col-sm-10">
                                      <select name="product_customtab[<?=$k?>][status]" class="form-control">
                                          <option value="1" <?=$customtab->status ==1?'selected':''?>>启用 </option>
                                          <option value="0" <?=$customtab->status ==0?'selected':''?>>停用 </option>
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group"><label class="col-sm-2 control-label" for="input-sort_order0">排序 </label>
                                  <div class="col-sm-10"><input type="text" name="product_customtab[<?=$k?>][sort_order]" value="<?=$customtab->sort_order;?>" class="form-control"></div>
                              </div>
                          </div>
                      </div>
                      <?php   }
                      } ?>
                  </div>
              </div>
          </div>

          <!-- 添加分期-->
            <div class="tab-pane" id ="tab-recurring">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <td class="text-left">分期名称</td>
                            <td class="text-left">分期期数</td>
                            <td class="text-left">分期费率</td>
                            <td class="text-left">频率</td>
                            <td class="text-left">周期</td>
                            <td class="text-left">排序</td>
                            <td class="text-left">状态</td>
                            <td class="text-left"> </td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(!empty($product_recurring) && count($product_recurring) >0){
                        $recurring_num =count($product_recurring);
                        foreach ( $product_recurring as $k => $recurring){?>
                        <tr id="recurring-row<?=$k?>">
                            <td class="left">
                                <input type="text" name="product_recurring[<?=$k?>][name]" value="<?=$recurring['name']?>" class="form-control"/>
                            </td>
                            <td class="left">
                                <select name="product_recurring[<?=$k?>][duration]" class="form-control">&gt;
                                    <option value="24" <?=$recurring['duration']==24?'selected':''?>>分24期</option>
                                    <option value="18" <?=$recurring['duration']==18?'selected':''?>>分18期</option>
                                    <option value="12" <?=$recurring['duration']==12?'selected':''?>>分12期</option>
                                    <option value="6" <?=$recurring['duration']==6?'selected':''?>>分6期</option>
                                    <option value="3" <?=$recurring['duration']==3?'selected':''?>>分3期</option>
                                </select>
                            </td>
                            <td class="left">
                                <input type="text" name="product_recurring[<?=$k?>][fee]" value="<?=$recurring['fee']?>" class="form-control"/>
                            </td>
                            <td class="left">
                                <input type="text" name="product_recurring[<?=$k?>][cycle]" value="<?=$recurring['cycle']?>" class="form-control"/>
                            </td>
                            <td class="left">
                                <select name="product_recurring[<?=$k?>][frequency]" id="input-frequency" class="form-control">
                                    <option value="day" <?=$recurring['frequency']=='day'?'selected':''?> >日</option>
                                    <option value="week" <?=$recurring['frequency']=='week'?'selected':''?>>周</option>
                                    <option value="semi_month" <?=$recurring['frequency']=='semi_month'?'selected':''?>>半月</option>
                                    <option value="month" <?=$recurring['frequency']=='month'?'selected':''?>>月</option>
                                    <option value="year" <?=$recurring['frequency']=='year'?'selected':''?>>年</option>
                                </select>
                            </td>
                            <td class="left">
                                <input type="text" name="product_recurring[<?=$k?>][sort_order]" value="<?=$recurring['sort_order']?>" class="form-control"/>
                            </td>
                            <td class="left">
                                <select name="product_recurring[<?=$k?>][status]" id="input-status" class="form-control">
                                    <option value="1" <?=$recurring['status']==1?'selected':''?> >启用</option>
                                    <option value="0" <?=$recurring['status']==0?'selected':''?>>停用</option>
                                </select>
                            </td>
                            <td class="left">
                                <a onclick="$('#recurring-row<?=$k?>').remove()" data-toggle="tooltip" title="移除" class="btn btn-danger">
                                    <i class="fa fa-minus-circle"></i></a>
                            </td>
                        </tr>
                        <?php }}?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="7"></td>
                            <td class="text-left"><button type="button" onclick="addRecurring()" data-toggle="tooltip" title="Add Recurring" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
          <!-- 扩展 -->
          <div class="tab-pane" id="tab-extend">
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-manufacturer"><span data-toggle="tooltip" title="(输入时自动筛选结果)">制造商/品牌</span></label>
                <div class="col-sm-10">
                  <input type="text" name="manufacturer" value="<?php echo isset($product->manufacturer->name)?$product->manufacturer->name:'';?>" placeholder="制造商/品牌" id="input-manufacturer" class="form-control" />
                  <input type="hidden" name="Bproduct[manufacturer_id]" value="<?=$product->manufacturer_id;?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-category"><span data-toggle="tooltip" title="(输入时自动筛选结果)">分类</span></label>
                <div class="col-sm-10">
                  <input type="text" name="category" value="" placeholder="分类" id="input-category" class="form-control" />
                  <div id="product-category" class="well well-sm" style="height: 150px; overflow: auto;">
                      <?php if(isset($product_categories)): ?>
                        <?php foreach ($product_categories as $product_category) { ?>
                              <div id="product-category{{ product_category.category_id }}"><i class="fa fa-minus-circle"></i>
                                   <?=$product_category['name']?>
                                  <input type="hidden" name="product_category[]" value="<?=$product_category['category_id']?>" />
                              </div>
                        <?php }?>
                      <?php endif;?>
                  </div>
                </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-filter"><span data-toggle="tooltip" title="(输入时自动筛选结果)">筛选</span></label>
                  <div class="col-sm-10">
                      <input type="text" name="filter" value="" placeholder="筛选" id="input-filter" class="form-control" />
                      <div id="product-filter" class="well well-sm" style="height: 150px; overflow: auto;">
                          <?php if (!empty($product->filters)):?>
                          <?php foreach ($product->filters as $filter):?>
                          <div id="product-filter<?=$filter->filter_id?>"><i class="fa fa-minus-circle"></i>
                              <?=$filter->filterdescription->name?>
                              <input type="hidden" name="product_filter[]" value="<?=$filter->filter_id?>" />
                          </div>

                          <?php endforeach;?>
                          <?php endif;?>
                      </div>
                  </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-length-class">单位</label>
                <div class="col-sm-10">
                  <select name="Bproduct[unit]" id="input-length-class" class="form-control">
                    <option value="天" <?=$product->unit=='天'?'selected':''?> >天</option>
                    <option value="月" <?=$product->unit=='月'?'selected':''?> >月</option>
                    <option value="年" <?=$product->unit=='年'?'selected':''?> >年</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                  <div class="col-sm-10">
                      <?= $form->field($product, 'sort_order')->textInput(['maxlength' => true,'id'=>'input-sort_order','class'=>"form-control"]) ?>
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-sm-4">
                      <?= $form->field($product, 'status')->radioList([0=>'停用',1=>'启用']) ?>
                  </div>
<!--                  <div class="col-sm-6">-->
<!--		              --><?//= $form->field($product, 'sales_num')->textInput(['maxlength' => true,'id'=>'input-sales_num','class'=>"form-control"]) ?>
<!--                  </div>-->
              </div>
              <div class="form-group">
                  <div class="col-sm-4">
                      <?= $form->field($product, 'is_fx')->radioList([0=>'停用',1=>'启用']) ?>
                  </div>
                  <div class="col-sm-4">
                      <?= $form->field($product, 'feature_home')->radioList([0=>'停用',1=>'启用']) ?>
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-sm-10">
			          <?= $form->field($product, 'is_pt')->radioList([0=>'停用',1=>'启用']) ?>
                  </div>
              </div>
              <div class="form-group required">
                  <div class="col-sm-6">
			          <?= $form->field($product, 'pt_y_discount')->textInput(['maxlength' => true,'id'=>'input-pt_y_discount','class'=>"form-control"]) ?>
                  </div>
                  <div class="col-sm-6">
			          <?= $form->field($product, 'pt_n_discount')->textInput(['maxlength' => true,'id'=>'input-pt_n_discount','class'=>"form-control"]) ?>
                  </div>

              </div>
          </div>

          <!-- 属性-->
          <div class="tab-pane" id="tab-attibute">
              <div class="table-responsive">
                  <table id="attribute" class="table table-striped table-bordered table-hover">
                      <thead>
                      <tr>
                          <td class="text-left">属性</td>
                          <td class="text-left">内容</td>
                          <td></td>
                      </tr>
                      </thead>
                      <tbody>
                      <?php

                      if(!empty($product->abutes)):
                          $attribute_row = count($product->abutes);
                      foreach ($product->abutes as $k=> $value): ?>
                      <tr id="attribute-row<?=$k?>">
                          <td class="text-left" style="width: 40%;">
                              <input type="text" name="product_attribute[<?=$k?>][name]" value="<?=$value->attributeDescription->name?>" placeholder="属性" class="form-control" />
                              <input type="hidden" name="product_attribute[<?=$k?>][attribute_id]" value="<?=$value->attribute_id?>" /></td>
                          <td class="text-left">
                              <div class="input-group" style="width: 100%;">
                                  <textarea name="product_attribute[<?=$k?>][text]" rows="5" placeholder="内容" class="form-control"><?=$value->text?></textarea>
                              </div>
                               </td>
                          <td class="text-right"><button type="button" onclick="$('#attribute-row<?=$k?>').remove();" data-toggle="tooltip" title="删除" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>
                      </tr>
                      <?php endforeach;
                      endif;
                      ?>
                      </tbody>

                      <tfoot>
                      <tr>
                          <td colspan="2"></td>
                          <td class="text-right"><button type="button" onclick="addAttribute();" data-toggle="tooltip" title="添加属性" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></td>
                      </tr>
                      </tfoot>
                  </table>
              </div>
           </div>
          <!-- 选项 -->
            <div class="tab-pane" id="tab-option">
                <table id="option-value" class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <td></td>
                        <td class="required">Type</td>
                        <td>Name</td>
                        <td>Required</td>
                        <td>ForPrice</td>
                        <td>Show</td>
                        <td>Sort</td>
                        <td class="form1-handle">
                            <button type="button" data-toggle="tooltip" title="添加选项值" class="btn btn-primary option-add-1">
                                <i class="fa fa-plus-circle"></i>
                            </button>
                        </td>
                    </tr>
                    </thead>
                    <tbody id='option-body'>
	                    <tr id="option_group0">
	                        <td class="option-choice" data-num = "0">
	                            <i class="fa fa-check-square" style="font-size: 27px; color: #367fa9;"></i>
	                        </td>
	                        <td>
	                            <select class="form-control">
	                                <option value="radio">radio</option>
	                                <option value="select">select</option>
	                                <option value="date">date</option>
	                            </select>
	                        </td>
	                        <td>
	                            <input type="text" class="form-control" placeholder="名称" value="">
	                        </td>
	                        <td>
	                            <select class="form-control" >
	                                <option value="1">是</option>
	                                <option value="0">否</option>
	                            </select>
	                        </td>
	                        <td>
	                            <select class="form-control for-price">
	                                <option value="1">是</option>
	                                <option value="0">否</option>
	                            </select>
	                        </td>
	                        <td>
	                            <select class="form-control">
	                                <option value="1">是</option>
	                                <option value="0">否</option>
	                            </select>
	                        </td>
	                        <td>
	                            <input type="text" class="form-control" value="">
	                        </td>
	                        <td>
	                            <button type="button" data-toggle="tooltip" title="添加选项值" class="btn btn-danger option-delete-1">
	                                <i class="fa fa-minus-circle"></i>
	                            </button>
	                        </td>
	                    </tr>
                    </tbody>
                </table>
                <table id="option-value-2" class="table table-striped table-bordered table-hover">
                    <thead>
	                    <tr>
	                        <td style="width: 170px;">Value</td>
	                        <td style="width: 60px;">Key</td>
	                        <td style="width: 60px;">Image</td>
	                        <td>Description</td>
	                        <td class="form2-handle">
	                            <button type="button" data-toggle="tooltip" title="添加选项值" class="btn btn-primary option-add-2">
	                                <i class="fa fa-plus-circle"></i>
	                            </button>
	                        </td>
	                    </tr>
                    </thead>
                    <tbody class='option-body-2'>
	                    <tr>
	                        <td><input type="text" class="form-control form2-value" /></td>
	                        <td><input type="text" class="form-control" /></td>
	                        <!--<td><input type="text" class="form-control"/></td>-->
	                        <td class="text-left">
	                            <a href="" id="thumb-image" data-toggle="image" class="img-thumbnail">
	                                <img style="width: 27px;" src="<?=isset($product->image)?$product->image:Yii::$app->params['image_url'].'/images/cache/no_image-100x100.png'?>" alt="" title="" data-placeholder="<?=isset($product->image)?$product->image:Yii::$app->params['image_url'].'/images/cache/no_image-100x100.png'?>" />
	                            </a>
	                            <?php //=$form->field($product,'image')->hiddenInput(['id'=>'input-image']) ?>
	                            <?=Html::hiddenInput('group_value[image]',$product->image,['id'=>'input-image'])?>
	                        </td>
	                        <td><input type="text" class="form-control option-description"/></td>
	                        <td>
	                            <button type="button" data-toggle="tooltip" title="添加选项值" class="btn btn-danger option-delete-2">
	                                <i class="fa fa-minus-circle"></i>
	                            </button>
	                        </td>
	                    </tr>
                    </tbody>
                </table>
                <div class="option-next option-judge">
                    <button type="button" data-toggle="tooltip" title="下一步" class="btn btn-primary">
                		下一步
                    </button>
                </div>
                <table id="option-value-3" class="table table-striped table-bordered table-hover">

                </table>
                <div class="option-submit">
                    <button type="button" data-toggle="tooltip" title="生成数据" class="btn btn-primary">
                		生成数据
                    </button>
                </div>
                <input type="hidden" name="options" value="" id='option-final-value' />
            </div>
          <!-- 保险三要素 -->
          <div class="tab-pane" id="tab-insure">
              <div class="col-sm-2">
                <ul class="nav nav-pills nav-stacked" id="extend-2">
                    <?php if(!empty($product_extend)){
                        foreach ( $product_extend as $k => $extend) { ?>
                            <li class="">
                                <a href="#tab-extend<?=$k?>" data-toggle="tab" aria-expanded="false">
                                    <i class="fa fa-minus-circle" onclick="$('a[href=\'#tab-extend<?=$k?>\']').parent().remove(); $('#tab-extend<?=$k?>').remove(); $('#extend-2 li a:first').tab('show');"></i>
                                    自定义条款<?=$k?>
                                </a>
                            </li>
                          <!--  //var_dump($customtab->description);-->
                    <?php   }
                    } ?>
                  <li id="customtab-add-2"><a onclick="addCustomtab2()"><i class="fa fa-plus-circle"></i>添加条款</a></li>
                </ul>
              </div>
              <div class="col-sm-10">
                  <div class="tab-content tab-content2">
                      <?php if(!empty($product_extend)){
                          $extend_num =count($product_extend);
                          foreach ( $product_extend as $k => $extend) { ?>
                      <div id="tab-extend<?=$k?>" class="tab-pane <?=$k==0?'active':''?>">
                          <div class="tab-content">
                              <div class="form-group"><label class="col-sm-2 control-label" for="input-title0">条款名称</label>
                                  <div class="col-sm-10">
                                      <input type="text" name="product_extend[<?=$k?>][name]" placeholder="条款名称" id="input-title0-language1" value="<?=$extend->name ?>" class="form-control">
                                  </div>
                              </div>
                              <div class="form-group"><label class="col-sm-2 control-label" for="input-title0">条款URL</label>
                                  <div class="col-sm-10">
                                      <input type="text" name="product_extend[<?=$k?>][url]" placeholder="条款URL" id="input-title0-language1" value="<?=$extend->url ?>" class="form-control">
                                  </div>
                                  <p style="font-size:12px;">(URL与描述任选其一填写)</p>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 control-label" for="input-description0">条款描述</label>
                                  <div class="col-sm-10"><textarea name="product_extend[<?=$k?>][desction]" data-toggle="summernote" data-lang="" class="form-control" id="input-description0-language1">
                                          <?=$extend->desction ?>
                                      </textarea>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 control-label" for="input-status0">状态</label>
                                  <div class="col-sm-10">
                                      <select name="product_extend[<?=$k?>][status]" class="form-control">
                                          <option value="1" <?=$extend->status ==1?'selected':''?>>启用 </option>
                                          <option value="0" <?=$extend->status ==0?'selected':''?>>停用 </option>
                                      </select>
                                  </div>
                              </div>
<!--                              <div class="form-group"><label class="col-sm-2 control-label" for="input-sort_order0">排序 </label>-->
<!--                                  <div class="col-sm-10"><input type="text" name="product_extend[--><?//=$k?><!--][sort_order]" value="--><?//=$extend->sort_order;?><!--" class="form-control"></div>-->
<!--                              </div>-->
                          </div>
                      </div>
                      <?php   }
                      } ?>
                  </div>
              </div>
          </div>
      </div>
    </div>
   </div>
    <?php ActiveForm::end(); ?>
</div>
<?php $this->beginBlock('product') ?>
	//options 判断是编辑(true)还是添加(false)
	//optionsStatus 判断在编辑状态  数据结构是否改变
    var options = <?=isset($product_options)?$product_options:'false'?>;
    var optionsStatus = true; //未改变
   	if(options.length === 0){
   		options = false;
   	}
    var option_group = 0;
	var option_index = 0;

	if(options){
		var obj1 = options.option_group;
		$('#option-body').empty();
		var htmls1 = '';
		obj1.map(val => {
			htmls1 +=`<tr id="option_group0">
                <td class="option-choice">

                </td>
                <td>
                    <select class="form-control">
                        <option value="radio" ${val.type === 'radio' ? 'selected' : ''}>radio</option>
                        <option value="select" ${val.type === 'select' ? 'selected' : ''}>select</option>
                        <option value="date" ${val.type === 'date' ? 'selected' : ''}>date</option>
                    </select>
                </td>
                <td>
                    <input type="text" class="form-control" placeholder="名称" value="${val.name}">
                </td>
                <td>
                    <select class="form-control" >
                        <option value="1" ${val.required === 1 ? 'selected' : ''}>是</option>
                        <option value="0" ${val.required === 0 ? 'selected' : ''}>否</option>
                    </select>
                </td>
                <td>
                    <select class="form-control for-price">
                        <option value="1" ${val.for_price === 1 ? 'selected' : ''}>是</option>
                        <option value="0" ${val.for_price === 0 ? 'selected' : ''}>否</option>
                    </select>
                </td>
                <td>
                    <select class="form-control">
                        <option value="1" ${val.is_show === 1 ? 'selected' : ''}>是</option>
                        <option value="0" ${val.is_show === 0 ? 'selected' : ''}>否</option>
                    </select>
                </td>
                <td>
                    <input type="text" class="form-control" value="${val.sort_order}">
                </td>
                <td>
                    <button type="button" data-toggle="tooltip" title="添加选项值" class="btn btn-danger option-delete-1">
                        <i class="fa fa-minus-circle"></i>
                    </button>
                </td>
            </tr>`;
		})
		$('#option-body').append(htmls1);

		var obj2 = options.option_group_value;
		$('#option-value-2 .option-body-2').remove();
		var newArr = [];
		for(let i = 0; i < obj1.length; i ++){
			newArr.push([]);
			for(let val1 of obj2){
				if(obj1[i].product_option_group_id == val1.product_option_group_id){
					newArr[i].push(val1);
				}
			}
		}
		var htmls2 = '';
		console.log(newArr);
		newArr.map(val => {
			htmls2 += `<tbody class='option-body-2 option-hid'>
	                    ${val.map(value => {
	                    	var image = value.image || 'cache/no_image-100x100.png';
	                    	return `<tr>
				                        <td><input type="text" class="form-control form2-value" value="${value.value}" /></td>
				                        <td><input type="text" class="form-control" value="${value.key}" /></td>
				                        <td class="text-left">
				                            <a href="" id="thumb-image" data-toggle="image" class="img-thumbnail">
				                                <img style="width: 27px;" src="<?=isset($product->image)?$product->image:Yii::$app->params['image_url'].'/images/cache/no_image-100x100.png'?>"
				                                	alt="" title="" data-placeholder="<?=isset($product->image)?$product->image:Yii::$app->params['image_url'].'/images/cache/no_image-100x100.png'?>" />
				                            </a>
				                            <?php //=$form->field($product,'image')->hiddenInput(['id'=>'input-image']) ?>
				                            <?=Html::hiddenInput('group_value[image]',$product->image,['id'=>'input-image'])?>
				                        </td>
				                        <td><input type="text" class="form-control option-description" value='${value.description}'/></td>
				                        <td>
				                            <button type="button" data-toggle="tooltip" title="添加选项值" class="btn btn-danger option-delete-2">
				                                <i class="fa fa-minus-circle"></i>
				                            </button>
				                        </td>
				                    </tr>`;
	                    })}
	                </tbody>`;
		})
		$('#option-value-2').append(htmls2);
		$('.option-body-2').eq(option_index).removeClass('option-hid');

		var obj2 = options.option_value;
		var htmls = `<thead>
					<tr>
					    <td>value</td>
					    <td>sku</td>
					    <td>price</td>
					    <td>points</td>
					</tr>
					</thead>
					<tbody class="option-body-3">`;
					obj2.map(val => {
						htmls += `<tr>
						    <td><input type="text" value=${val.value} class="form-control form2-value"/></td>
						    <td><input type="text" value=${val.sku} class="form-control"/></td>
						    <td><input type="text" value=${val.price} class="form-control"/></td>
						    <td><input type="text" value=${val.points} class="form-control"/></td>
						</tr>`;
					})
					htmls += `</tbody>`;
					$('#option-value-3').append(htmls);
					$(".option-submit").css('visibility', 'visible');

		//不让表一表二编辑
		$('#tab-option #option-value').find('input').attr('readonly', 'readonly');
		$('#tab-option #option-value').find('select').attr('disabled', 'disabled');
		$('#tab-option #option-value-2').find('input').attr('readonly', 'readonly');
		$('#tab-option #option-value-2').find('select').attr('disabled', 'disabled');
		$('.option-next button').text('取  消');
		$('.option-next').addClass('option-next-init').removeClass('option-next');
		//第一次点击取消
		$('.option-next-init button').bind('click', function(){
			$('#tab-option').find('input').removeAttr('readonly');
			$('#tab-option').find('select').removeAttr('disabled');
			<!--$('#option-value-3').empty();-->
			$('#option-value-3').css('display', 'none');
			$('.option-next-init button').text('下一步');
			$(".option-submit").css('visibility', 'hidden');

			$('.option-next-init').addClass('option-next').removeClass('option-next-init');
			$('.option-next button').bind('click', createForm3);
		});
		//初始默人选中表一第一条数据



		var optionChoice = $('.option-choice');
		for(let i = 0; i < optionChoice.length; i ++){
			$('.option-choice').eq(i).on('click', function(){

				option_group = $(this).attr('data-num');
				option_index = $(this).parent()[0].sectionRowIndex;
				$('#option-body').find('.option-choice').empty();
				$(this).append('<i class="fa fa-check-square" style="font-size: 27px; color: #367fa9;"></i>');
				$('.option-body-2').addClass('option-hid');
				$('.option-body-2').eq(option_index).removeClass('option-hid');

			})
		}
		$('.option-choice').eq(0).append('<i class="fa fa-check-square" style="font-size: 27px; color: #367fa9;"></i>');
		submitData();
	}




	//表一数据
	$('.option-add-1').on('click', function(){
		//取消其他选择
		optionsStatus = false; //编辑状态数据结构发生改变
		$('#option-body').find('.option-choice').empty();
		//动态添加第一张表数据
		addOptionValue();
		bindClickForChoice();
		bindClickFordelete();
		if($('.option-judge button').text() == '取  消'){
			$('.option-judge button').click();
		}
	})
	//表二数据
	$('.option-add-2').on('click', function(){
		//添加第二张表数据
		optionsStatus = false; //编辑状态数据结构发生改变
		addOptionValue2();
		bindClickFordelete2();
		if($('.option-judge button').text() == '取  消'){
			$('.option-judge button').click();
		}
	})

	//为第一个option-choice绑定点击事件
	bindClickForChoice();
	//初始化，为进入页面时所有的option-delete添加删除事件
	bindAlldeleteInit();
	function bindAlldeleteInit(){
		//表一
		var optionDelete = $('.option-delete-1');
		for(let j = 0; j < optionDelete.length; j ++){
			$('.option-delete-1').eq(j).on('click', function(){
				optionsStatus = false; //编辑状态数据结构发生改变
				option_index = $(this).parent().parent()[0].sectionRowIndex;
				optionDelete.eq(j).parent().parent().remove();
				$('.option-body-2').eq(option_index).remove();

				//删除完切换到最后一条
				option_index = $('#option-body tr').length - 1;
				$('#option-body').find('.option-choice').empty();
				$('.option-choice').last().append('<i class="fa fa-check-square" style="font-size: 27px; color: #367fa9;"></i>');
				$('.option-body-2').addClass('option-hid');
				$('.option-body-2').eq(option_index).removeClass('option-hid');
				if($('.option-judge button').text() == '取  消'){
					$('.option-judge button').click();
				}
			})
		}

		//表二
		var optionDelete2 = $('.option-delete-2');
		for(let i = 0; i < optionDelete2.length; i ++){
			$('.option-delete-2').eq(i).on('click', function(){
				optionsStatus = false; //编辑状态数据结构发生改变
				optionDelete2.eq(i).parent().parent().remove();
				if($('.option-judge button').text() == '取  消'){
					$('.option-judge button').click();
				}
			})
		}

	}

	//为每个新生成的option-choice绑定点击事件
	function bindClickForChoice(){
		var optionChoice = $('.option-choice').last();
		optionChoice.on('click', function(){
			option_group = $(this).attr('data-num');
			option_index = $(this).parent()[0].sectionRowIndex;
			$('#option-body').find('.option-choice').empty();
			optionChoice.append('<i class="fa fa-check-square" style="font-size: 27px; color: #367fa9;"></i>');
			$('.option-body-2').addClass('option-hid');
			$('.option-body-2').eq(option_index).removeClass('option-hid');
		})
	}
	//为表一每个新生成的option-delete绑定点击事件
	function bindClickFordelete(){
		var optionDelete = $('.option-delete-1').last();
		optionDelete.on('click', function(){
			optionsStatus = false; //编辑状态数据结构发生改变
			option_index = $(this).parent().parent()[0].sectionRowIndex;
			optionDelete.parent().parent().remove();
			$('.option-body-2').eq(option_index).remove();

			//删除完切换到最后一条
			option_index = $('#option-body tr').length - 1;
			$('#option-body').find('.option-choice').empty();
			$('.option-choice').last().append('<i class="fa fa-check-square" style="font-size: 27px; color: #367fa9;"></i>');
			$('.option-body-2').addClass('option-hid');
			$('.option-body-2').eq(option_index).removeClass('option-hid');
			if($('.option-judge button').text() == '取  消'){
				$('.option-judge button').click();
			}
		})
	}
	//为表二每个新生成的option-delete绑定点击事件
	function bindClickFordelete2(){
		var optionDelete = $('.option-delete-2').last();
		optionDelete.on('click', function(){
			optionsStatus = false; //编辑状态数据结构发生改变
			optionDelete.parent().parent().remove();
			if($('.option-judge button').text() == '取  消'){
				$('.option-judge button').click();
			}
		})
	}
	function addOptionValue() {
		option_group++;
		var htmls = `<tr id="option_group${option_group}">
		    <td class='option-choice'>
		        <i class="fa fa-check-square" style="font-size: 27px; color: #367fa9;"></i>
		    </td>
		    <td>
		        <select class="form-control">
		            <option value="radio">radio</option>
		            <option value="select">select</option>
		            <option value="date">date</option>
		        </select>
		    </td>
		    <td>
		        <input type="text" placeholder="名称" class="form-control" />
		    </td>
		    <td>
		        <select class="form-control">
		            <option value="1">是</option>
		            <option value="0">否</option>
		        </select>
		    </td>
		    <td>
		        <select class="form-control for-price">
		            <option value="1">是</option>
		            <option value="0">否</option>
		        </select>
		    </td>
		    <td>
		        <select class="form-control">
		            <option value="1">是</option>
		            <option value="0">否</option>
		        </select>
		    </td>
		    <td>
		        <input type="text" value="" class="form-control" />
		    </td>
		    <td>
		        <button type="button" data-toggle="tooltip" title="移除" class="btn btn-danger option-delete-1">
		            <i class="fa fa-minus-circle"></i>
		        </button>
		    </td>
		</tr>`;

		$('#option-value #option-body').append(htmls);
		option_index = $('#option-body tr').length - 1;


		var html = `<tbody class='option-body-2'>
			<tr>
			    <td><input type="text" class="form-control form2-value"/></td>
			    <td><input type="text" class="form-control"/></td>
			    <td class="text-left">
			        <a href="" id="thumb-image" data-toggle="image" class="img-thumbnail">
			            <img style="width: 27px;" src="<?=isset($product->image)?$product->image:Yii::$app->params['image_url'].'/images/cache/no_image-100x100.png'?>" alt="" title="" data-placeholder="<?=isset($product->image)?$product->image:Yii::$app->params['image_url'].'/images/cache/no_image-100x100.png'?>" />
			        </a>
			        <?php //=$form->field($product,'image')->hiddenInput(['id'=>'input-image']) ?>
			        <?=Html::hiddenInput('group_value[image]',$product->image,['id'=>'input-image'])?>
			    </td>
			    <td><input type="text" class="form-control option-description"/></td>
			    <td>
			        <button type="button" data-toggle="tooltip" title="添加选项值" class="btn btn-danger option-delete-2">
			            <i class="fa fa-minus-circle"></i>
			        </button>
			    </td>
			</tr>
			</tbody>`;

		$('.option-body-2').addClass('option-hid');
		$('#option-value-2').append(html);
		bindClickFordelete2();
	}

	function addOptionValue2(){
		var htmls = `<tr>
			    <td><input type="text" class="form-control form2-value"/></td>
			    <td><input type="text" class="form-control"/></td>
			    <td class="text-left">
			        <a href="" id="thumb-image" data-toggle="image" class="img-thumbnail">
			            <img style="width: 27px;" src="<?=isset($product->image)?$product->image:Yii::$app->params['image_url'].'/images/cache/no_image-100x100.png'?>" alt="" title="" data-placeholder="<?=isset($product->image)?$product->image:Yii::$app->params['image_url'].'/images/cache/no_image-100x100.png'?>" />
			        </a>
			        <?php //=$form->field($product,'image')->hiddenInput(['id'=>'input-image']) ?>
			        <?=Html::hiddenInput('group_value[image]',$product->image,['id'=>'input-image'])?>
			    </td>
			    <td><input type="text" class="form-control option-description"/></td>
			    <td>
			        <button type="button" data-toggle="tooltip" title="添加选项值" class="btn btn-danger option-delete-2">
			            <i class="fa fa-minus-circle"></i>
			        </button>
			    </td>
			</tr>`;
		$('.option-body-2').eq(option_index).append(htmls);
		//添加删除
		var optionDelete = $('.option-body-2').eq(option_index).find('.option-delete-2').last();
		optionDelete.on('click', function(){
			optionDelete.parent().parent().remove();
		})
	}


	$('.option-next button').bind('click', createForm3)

	function deleteFrom3(){
		console.log(123123);
		$('#tab-option').find('input').removeAttr('readonly');
		$('#tab-option').find('select').removeAttr('disabled');
		<!--$('#option-value-3').empty();-->
		$('#option-value-3').css('display', 'none');
		$('.option-judge button').text('下一步');
		$('.option-judge button').unbind('click', deleteFrom3);
		<!--$('.option-next button').bind('click', createForm3);-->
		$(".option-submit").css('visibility', 'hidden');
		console.log(123)
	}

function createForm3(){
	//不让表一表二编辑
	$('#tab-option').find('input').attr('readonly', 'readonly');
	$('#tab-option').find('select').attr('disabled', 'disabled');
	$('.option-judge button').text('取  消');
	$('.option-judge button').unbind('click', createForm3);
	$('.option-judge button').bind('click', deleteFrom3)

	//1.在表一中找for-price对应的数组长度
	var len1 = $('#option-body tr').length;
	var arr1 = {};
	for(let i = 0; i < len1; i ++){
		if($('#option-body tr').eq(i).find('.for-price').val() == 1){
			arr1[i] = 1;
		}
	}
	//2.在表二中找每一组的长度以及值
	let {keys, values, entries} = Object;
	const arr2 = [];
	for(let key of keys(arr1)){
		let len = $('.option-body-2').eq(key).find('tr').length;
		arr1[key] = [];
		arr2[key] = [];
		for(let l = 0; l < len; l ++){
			arr1[key].push($('.option-body-2').eq(key).find('tr').eq(l).find('.form2-value').val());
			arr2[key].push($('.option-body-2').eq(key).find('tr').eq(l).find('.form2-value').val());
		}
	}
	let arr2Len = arr2.length;

	//3.排列组合，生成新的表单三
	const arr3 = [];
	var str = [];
	if(arr2Len >= 1){
		for(let i = 0; i < arr2[0].length; i ++){
			str.push(arr2[0][i]);
			if(arr2Len >= 2){
				for(let j = 0; j < arr2[1].length; j ++){
					str.push(arr2[1][j]);
					if(arr2Len >= 3){
						for(let k = 0; k < arr2[2].length; k ++){
							str.push(arr2[2][k]);
							if(arr2Len >= 4){
								for(let l = 0; l < arr2[2].length; l ++){
									str.push(arr2[3][l]);
									if(arr2Len >= 5){

									}else{
										arr3.push(str);
										if(l == arr2[3].length - 1){
											if(k == arr2[2].length - 1){
												if(j == arr2[1].length - 1){
													str = str.slice(0, -4);
												}else{
													str = str.slice(0, -3);
												}
											}else{
												str = str.slice(0, -2);
											}
										}else{
											str = str.slice(0, -1);
										}
									}
								}
							}else{
								arr3.push(str);
								if(k == arr2[2].length - 1){
									if(j == arr2[1].length - 1){
										str = str.slice(0, -3);
									}else{
										str = str.slice(0, -2);
									}
								}else{
									str = str.slice(0, -1);
								}
							}
						}
					}else{
						arr3.push(str);
						if(j == arr2[1].length - 1){
							str = [];
						}else{
							str = str.slice(0, -1);
						}
					}
				}
			}else{
				arr3.push(str);
				if(i == arr2[0].length - 1){
					str = [];
				}else{
					str = str.slice(0, -1);
				}
			}
		}
	}
	console.log(optionsStatus)
	if(options && optionsStatus){

	}else{
		console.log(1234)
		var htmls = `<thead>
					<tr>
					    <td>value</td>
					    <td>sku</td>
					    <td>price</td>
					    <td>points</td>
					</tr>
					</thead>
					<tbody class="option-body-3">`;


		arr3.map(val => {
			htmls += `<tr>
			    <td><input type="text" value=${val} class="form-control form2-value"/></td>
			    <td><input type="text" class="form-control"/></td>
			    <td><input type="text" class="form-control"/></td>
			    <td><input type="text" class="form-control"/></td>
			</tr>`;
		})
		htmls += `</tbody>`;
		$('#option-value-3').empty();
		$('#option-value-3').append(htmls);
	}
	$('#option-value-3').css('display', 'block');
	$(".option-submit").css('visibility', 'visible');


}

	$('.option-submit').on('click', submitData);

	function submitData(){
		const dataObj = {
			option_group: [],
			option_group_value: [],
			option_value: [],
		}

		const len1 = $('#option-body tr').length;
		for(let i = 0; i < len1; i++){
			const obj = {};
			const optionNode = $('#option-body tr').eq(i).find('td');
			obj.type = optionNode.eq(1).find('select').val();
			obj.name = optionNode.eq(2).find('input').val();
			obj.required = optionNode.eq(3).find('select').val();
			obj.forPrice = optionNode.eq(4).find('select').val();
			obj.isShow = optionNode.eq(5).find('select').val();
			obj.sort = optionNode.eq(6).find('input').val();
			dataObj.option_group.push(obj);
		}
		const len2 = $('.option-body-2').length;
		for(let i = 0; i < len2; i ++){
			const len = $('.option-body-2').eq(i).find('tr').length;
			for(let j = 0; j < len; j ++){
				const obj = {};
				const optionNode = $('.option-body-2').eq(i).find('tr').eq(j).find('td');
				obj.value = optionNode.eq(0).find('input').val();
				obj.key = optionNode.eq(1).find('input').val();
				obj.image = optionNode.eq(2).find('input').val();
				obj.description = optionNode.eq(3).find('input').val();
				obj.id = i;
				dataObj.option_group_value.push(obj);
			}
		}
		const len3 = $('.option-body-3 tr').length;
		for(let i = 0; i < len3; i ++){
			const obj = {};
			const optionNode = $('.option-body-3 tr').eq(i).find('td');
			obj.value = optionNode.eq(0).find('input').val();
			obj.sku = optionNode.eq(1).find('input').val();
			obj.price = optionNode.eq(2).find('input').val();
			obj.points = optionNode.eq(3).find('input').val();
			dataObj.option_value.push(obj);
		}
		$('#option-final-value').val(JSON.stringify(dataObj));

	}


    $('input[name=\'manufacturer\']').autocomplete({
        'source': function(request, response) {
            $.ajax({
                url: '/manufacturer/autocomplete?filter_name=' +  encodeURIComponent(request),
                dataType: 'json',
                success: function(json) {
                    json.unshift({
                        manufacturer_id: 0,
                        name: '——无——'
                    });

                    response($.map(json, function(item) {
                        return {
                            label: item['name'],
                            value: item['manufacturer_id']
                        }
                    }));
                }
            });
        },
        'select': function(item) {
            $('input[name=\'manufacturer\']').val(item['label']);
            $('input[name=\'Bproduct[manufacturer_id]\']').val(item['value']);
        }
    });



    $('input[name=\'category\']').autocomplete({
        'source': function(request, response) {
            $.ajax({
                url: '/category/autocomplete?filter_name=' +  encodeURIComponent(request),
                dataType: 'json',
                success: function(json) {
                    response($.map(json, function(item) {
                        return {
                            label: item['name'],
                            value: item['category_id']
                        }
                    }));
                }
            });
        },
        'select': function(item) {
            $('input[name=\'category\']').val('');

            $('#product-category' + item['value']).remove();

            $('#product-category').append('<div id="product-category' + item['value'] + '"><i class="fa fa-minus-circle"></i> ' + item['label'] + '<input type="hidden" name="product_category[]" value="' + item['value'] + '" /></div>');
        }
    });

    $('#product-category').delegate('.fa-minus-circle', 'click', function() {
    $(this).parent().remove();
    });

    // Filter
    $('input[name=\'filter\']').autocomplete({
        'source': function(request, response) {
        $.ajax({
        url: '/product/filter-autocomplete?filter_name=' +  encodeURIComponent(request),
        dataType: 'json',
        success: function(json) {
            response($.map(json, function(item) {
                return {
                    label: item['name'],
                    value: item['filter_id']
                }
            }));
        }
        });
        },
        'select': function(item) {
        $('input[name=\'filter\']').val('');

        $('#product-filter' + item['value']).remove();

        $('#product-filter').append('<div id="product-filter' + item['value'] + '"><i class="fa fa-minus-circle"></i> ' + item['label'] + '<input type="hidden" name="product_filter[]" value="' + item['value'] + '" /></div>');
        }
    });

    $('#product-filter').delegate('.fa-minus-circle', 'click', function() {
        $(this).parent().remove();
    });

//属性
var attribute_row = <?=isset($attribute_row)?$attribute_row:0?>;

function addAttribute() {
    html  = '<tr id="attribute-row' + attribute_row + '">';
        html += '  <td class="text-left" style="width: 20%;"><input type="text" name="product_attribute[' + attribute_row + '][name]" value="" placeholder="属性" class="form-control" /><input type="hidden" name="product_attribute[' + attribute_row + '][attribute_id]" value="" /></td>';
        html += '  <td class="text-left">';
        html += '<div class="input-group" style="width: 100%;"><textarea name="product_attribute[' + attribute_row + '][text]" rows="2" placeholder="内容" class="form-control"></textarea></div>';
        html += '  </td>';
        html += '  <td class="text-right"><button type="button" onclick="$(\'#attribute-row' + attribute_row + '\').remove();" data-toggle="tooltip" title="删除" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
        html += '</tr>';
    $('#attribute tbody').append(html);
    attributeautocomplete(attribute_row);
    attribute_row++;
}

function attributeautocomplete(attribute_row) {
        $('input[name=\'product_attribute[' + attribute_row + '][name]\']').autocomplete({
            'source': function(request, response) {
                $.ajax({
                    url: '/product/attribute-autocomplete?filter_name=' +  encodeURIComponent(request),
                    dataType: 'json',
                    success: function(json) {
                    response($.map(json, function(item) {
                    return {
                        category: item.attribute_group,
                        label: item.name,
                        value: item.attribute_id
                    }
                    }));
            }
        });
    },
    'select': function(item) {
        $('input[name=\'product_attribute[' + attribute_row + '][name]\']').val(item['label']);
        $('input[name=\'product_attribute[' + attribute_row + '][attribute_id]\']').val(item['value']);
    }
    });
}

$('#attribute tbody tr').each(function(index, element) {
    attributeautocomplete(index);
});

    var image_row =<?=isset($img_num)?$img_num:0?>;
    function addImage() {
        html  = '<tr id="image-row' + image_row + '">';
        html += '  <td class="text-left"><a href="" id="thumb-image' + image_row + '"data-toggle="image" class="img-thumbnail"><img src="<?=\Yii::$app->params['image_url']?>/images/cache/no_image-100x100.png" alt="" title="" data-placeholder="<?=\Yii::$app->params['image_url']?>/images/cache/no_image-100x100.png" /></a><input type="hidden" name="product_image[' + image_row + '][image]" value="" id="input-image' + image_row + '" /></td>';
        html += '  <td class="text-right"><input type="text" name="product_image[' + image_row + '][sort_order]" value="" placeholder="排序" class="form-control" /></td>';
        html += '  <td class="text-left"><button type="button" onclick="$(\'#image-row' + image_row  + '\').remove();" data-toggle="tooltip" title="移除" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
        html += '</tr>';

        $('#images tbody').append(html);

        image_row++;
    }


    var recurring_row =<?=isset($recurring_num)?$recurring_num:0 ?>;
    function addRecurring() {
        html = '<tr id="recurring-row' + recurring_row + '">';
        html += '<td class="left">';
            html += '<input type="text" name="product_recurring[' + recurring_row + '][name]" class="form-control"/>';
            html += '</td>';
        html += '<td class="left">';
            html += '<select name="product_recurring[' + recurring_row + '][duration]" class="form-control">&gt;';
                html += '<option value="24">分24期</option>';
                html += '<option value="18">分18期</option>';
                html += '<option value="12">分12期</option>';
                html += '<option value="6">分6期</option>';
                html += '<option value="3">分3期</option>';
                html += '</select>';
            html += '</td>';
        html += '<td class="left">';
            html += '<input type="text" name="product_recurring[' + recurring_row + '][fee]" class="form-control"/>';
            html += '</td>';
        html += '<td class="left">';
            html += '<input type="text" name="product_recurring[' + recurring_row + '][cycle]" class="form-control"/>';
            html += '</td>';
        html += '<td class="left">';
            html += '<select name="product_recurring[' + recurring_row + '][frequency]" id="input-frequency" class="form-control">';
                html += '<option value="day">日</option>';
                html += '<option value="week">周</option>';
                html += '<option value="semi_month">半月</option>';
                html += '<option value="month" selected="selected">月</option>';
                html += '<option value="year">年</option>';
                html += '</select>';
            html += '</td>';
        html += '<td class="left">';
            html += '<input type="text" name="product_recurring[' + recurring_row + '][sort_order]" class="form-control"/>';
            html += '</td>';
        html += '<td class="left">';
            html += '<select name="product_recurring[' + recurring_row + '][status]" id="input-status" class="form-control">';
                html += '<option value="1" selected="selected">启用</option>';
                html += '<option value="0">停用</option>';
                html += '</select>';
            html += '</td>';
        html += '<td class="left">';
            html += '<a onclick="$(\'#recurring-row' + recurring_row + '\').remove()" data-toggle="tooltip" title="移除" class="btn btn-danger"><i class="fa fa-minus-circle"></i></a>';
            html += '</td>';
        html += '</tr>';
        $('#tab-recurring table tbody').append(html);
        recurring_row++;
    }


    var special_row = <?=isset($special_num)?$special_num:0?>;

    function addSpecial() {
            html  = '<tr id="special-row' + special_row + '">';
            html += '  <td class="text-left"><select name="product_special[' + special_row + '][customer_group_id]" class="form-control"><option value="1">普通</option></select></td>';
            html += '  <td class="text-right"><input type="text" name="product_special[' + special_row + '][priority]" value="" placeholder="优先级" class="form-control" /></td>';
            html += '  <td class="text-right"><input type="text" name="product_special[' + special_row + '][price]" value="" placeholder="价格" class="form-control" /></td>';
            html += '  <td class="text-left" style="width: 20%;"><div class="input-group date"><input type="text" name="product_special[' + special_row + '][date_start]" value="" placeholder="开始日期" data-date-format="YYYY-MM-DD" class="form-control" /><span class="input-group-btn"><button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button></span></div></td>';
            html += '  <td class="text-left" style="width: 20%;"><div class="input-group date"><input type="text" name="product_special[' + special_row + '][date_end]" value="" placeholder="结束日期" data-date-format="YYYY-MM-DD" class="form-control" /><span class="input-group-btn"><button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button></span></div></td>';
            html += '  <td class="text-left"><button type="button" onclick="$(\'#special-row' + special_row + '\').remove();" data-toggle="tooltip" title="删除" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
            html += '</tr>';

            $('#special tbody').append(html);

            special_row++;
        }


    var customtab_row =<?=isset($num)?$num:0 ?>;
    function addCustomtab() {
        html  = '<div id="tab-customtab' + customtab_row + '" class="tab-pane">';
        html += '  <div class="tab-content">';
        html += '      <div class="form-group">';
        html += '        <label class="col-sm-2 control-label" for="input-title' + customtab_row + '">Tab标签</label>';
        html += '        <div class="col-sm-10"><input type="text" name="product_customtab[' + customtab_row + '][title]" placeholder="Tab标签" id="input-title' + customtab_row + '-language1" value="" class="form-control"/></div>';
        html += '      </div>';
        html += '      <div class="form-group">';
        html += '        <label class="col-sm-2 control-label" for="input-description' + customtab_row + '">描述</label>';
        html += '        <div class="col-sm-10"><textarea name="product_customtab[' + customtab_row + '][description]" data-toggle="summernote" data-lang="" class="form-control"  id="input-description' + customtab_row + '-language1"></textarea></div>';
        html += '      </div>';
        html += '  </div>';
        html += '  <div class="form-group">';
        html += '    <label class="col-sm-2 control-label" for="input-status' + customtab_row +'">状态</label>';
        html += '    <div class="col-sm-10"><select name="product_customtab[' + customtab_row + '][status]" class="form-control"><option value="1">启用 </option><option value="0">停用 </option></select></div>';
        html += '  </div>';
        html += '  <div class="form-group">';
        html += '    <label class="col-sm-2 control-label" for="input-sort_order' + customtab_row +'">排序 </label>';
        html += '    <div class="col-sm-10"><input type="text" name="product_customtab[' + customtab_row + '][sort_order]" value="" class="form-control" /></div>';
        html += '  </div>';
        html += '</div>';
        html +=" <script type=\"text/javascript\">";
        html +="$('#input-description" + customtab_row + "-language1').summernote({";
        html +="  lang: $(this).attr('data-lang'),";
        html +="     disableDragAndDrop: true,";
        html +="     height: 300,";
        html +="     emptyPara: '',";
        html +="     codemirror: { ";
        html +="         mode: 'text/html',";
        html +="        htmlMode: true,";
        html +="         lineNumbers: true,";
        html +="        theme: 'monokai'";
        html +="    },";
        html +="     fontsize: ['8', '9', '10', '11', '12', '14', '16', '18', '20', '24', '30', '36', '48' , '64'],";
        html +="    toolbar: [";
        html +="        ['style', ['style']],";
        html +="        ['font', ['bold', 'underline', 'clear']],";
        html +="       ['fontname', ['fontname']],";
        html +="        ['fontsize', ['fontsize']],";
        html +="        ['color', ['color']],";
        html +="         ['para', ['ul', 'ol', 'paragraph']],";
        html +="        ['table', ['table']],";
        html +="        ['insert', ['link', 'image', 'video']],";
        html +="        ['view', ['fullscreen', 'codeview', 'help']]";
        html +="     ],";
        html +="     popover: {";
        html +="         image: [";
        html +="             ['custom', ['imageAttributes']],";
        html +="             ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],";
        html +="             ['float', ['floatLeft', 'floatRight', 'floatNone']],";
        html +="             ['remove', ['removeMedia']]";
        html +="        ],";
        html +="     },";
        html +="     buttons: {";
        html +="        image: function() {";
        html +="            var ui = $.summernote.ui;";
        html +="            var button = ui.button({";
        html +="                contents: '<i class=\"note-icon-picture\" />',";
        html +="                tooltip: $.summernote.lang[$.summernote.options.lang].image.image,";
        html +="                click: function () {";
        html +="                    $('#modal-image').remove();";
        html +="                    $.ajax({";
        html +="                       url: '/common/file-manager',";
        html +="                       dataType: 'html',";
        html +="                        beforeSend: function() {";
        html +="                            $('#button-image i').replaceWith('<i class=\"fa fa-circle-o-notch fa-spin\"></i>');";
        html +="                            $('#button-image').prop('disabled', true);";
        html +="                        },";
        html +="                        complete: function() {";
        html +="                           $('#button-image i').replaceWith('<i class=\"fa fa-upload\"></i>');";
        html +="                           $('#button-image').prop('disabled', false);";
        html +="                       },";
        html +="                       success: function(html) {";
        html +="                           $('body').append('<div id=\"modal-image\" class=\"modal\">' + html + '</div>');";
        html +="                          $('#modal-image').modal('show');";
        html +="                            $('#modal-image').delegate('a.thumbnail', 'click', function(e) {";
        html +="                                e.preventDefault();";
        html +="                               $('#input-description" + customtab_row + "-language1').summernote('insertImage', $(this).attr('href'));";
        html +="                                  $('#modal-image').modal('hide');";
        html +="                          });";
        html +="                        }";
        html +="                      });";
        html +="               }";
        html +="           });";
        html +="           return button.render();";
        html +="         }";
        html +="    }";
        html +="   });";
        $('#tab-customtabmain .tab-content2').append(html);
        $('#customtab a[href=\'#tab-customtab' + customtab_row + '\']').tab('show');



        $('#customtab-add').before('<li><a href="#tab-customtab' + customtab_row + '" data-toggle="tab"><i class="fa fa-minus-circle" onclick="$(\'a[href=\\\'#tab-customtab' + customtab_row + '\\\']\').parent().remove(); $(\'#tab-customtab' + customtab_row + '\').remove(); $(\'#customtab li a:first\').tab(\'show\');"></i> 自定义Tab ' + customtab_row + '</a></li>');


        $('#customtab-' + customtab_row).trigger('click');

        customtab_row++;
    }


    var extend_row =<?=isset($extend_num)?$extend_num:0 ?>;
    function addCustomtab2() {
        html  = '<div id="tab-extend' + extend_row + '" class="tab-pane">';
        html += '  <div class="tab-content">';
        html += '      <div class="form-group">';
        html += '        <label class="col-sm-2 control-label" for="input-title' + extend_row + '">条款名称</label>';
        html += '        <div class="col-sm-10"><input type="text" name="product_extend[' + extend_row + '][name]" placeholder="条款名称" id="input-title' + extend_row + '-language1" value="" class="form-control"/></div>';
        html += '      </div>';
        html += '  <div class="form-group">';
        html += '    <label class="col-sm-2 control-label" for="input-sort_order' + extend_row +'">条款URL</label>';
        html += '    <div class="col-sm-10"><input type="text" name="product_extend[' + extend_row + '][url]" value="" class="form-control" /></div>';
        html += ' <p style="font-size:12px;">(URL与描述任选其一填写)</p>';
        html += '  </div>';
        html += '      <div class="form-group">';
        html += '        <label class="col-sm-2 control-label" for="input-description' + extend_row + '">条款描述</label>';
        html += '        <div class="col-sm-10"><textarea name="product_extend[' + extend_row + '][desction]" data-toggle="summernote" data-lang="" class="form-control"  id="input-description' + extend_row + '-language1"></textarea></div>';
        html += '      </div>';
        html += '  </div>';
        html += '  <div class="form-group">';
        html += '    <label class="col-sm-2 control-label" for="input-status' + extend_row +'">状态</label>';
        html += '    <div class="col-sm-10"><select name="product_extend[' + extend_row + '][status]" class="form-control"><option value="1">启用 </option><option value="0">停用 </option></select></div>';
        html += '  </div>';
        html += '</div>';
        html +=" <script type=\"text/javascript\">";
        html +="$('#input-description" + extend_row + "-language1').summernote({";
        html +="  lang: $(this).attr('data-lang'),";
        html +="     disableDragAndDrop: true,";
        html +="     height: 300,";
        html +="     emptyPara: '',";
        html +="     codemirror: { ";
        html +="         mode: 'text/html',";
        html +="        htmlMode: true,";
        html +="         lineNumbers: true,";
        html +="        theme: 'monokai'";
        html +="    },";
        html +="     fontsize: ['8', '9', '10', '11', '12', '14', '16', '18', '20', '24', '30', '36', '48' , '64'],";
        html +="    toolbar: [";
        html +="        ['style', ['style']],";
        html +="        ['font', ['bold', 'underline', 'clear']],";
        html +="       ['fontname', ['fontname']],";
        html +="        ['fontsize', ['fontsize']],";
        html +="        ['color', ['color']],";
        html +="         ['para', ['ul', 'ol', 'paragraph']],";
        html +="        ['table', ['table']],";
        html +="        ['insert', ['link', 'image', 'video']],";
        html +="        ['view', ['fullscreen', 'codeview', 'help']]";
        html +="     ],";
        html +="     popover: {";
        html +="         image: [";
        html +="             ['custom', ['imageAttributes']],";
        html +="             ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],";
        html +="             ['float', ['floatLeft', 'floatRight', 'floatNone']],";
        html +="             ['remove', ['removeMedia']]";
        html +="        ],";
        html +="     },";
        html +="     buttons: {";
        html +="        image: function() {";
        html +="            var ui = $.summernote.ui;";
        html +="            var button = ui.button({";
        html +="                contents: '<i class=\"note-icon-picture\" />',";
        html +="                tooltip: $.summernote.lang[$.summernote.options.lang].image.image,";
        html +="                click: function () {";
        html +="                    $('#modal-image').remove();";
        html +="                    $.ajax({";
        html +="                       url: '/common/file-manager',";
        html +="                       dataType: 'html',";
        html +="                        beforeSend: function() {";
        html +="                            $('#button-image i').replaceWith('<i class=\"fa fa-circle-o-notch fa-spin\"></i>');";
        html +="                            $('#button-image').prop('disabled', true);";
        html +="                        },";
        html +="                        complete: function() {";
        html +="                           $('#button-image i').replaceWith('<i class=\"fa fa-upload\"></i>');";
        html +="                           $('#button-image').prop('disabled', false);";
        html +="                       },";
        html +="                       success: function(html) {";
        html +="                           $('body').append('<div id=\"modal-image\" class=\"modal\">' + html + '</div>');";
        html +="                          $('#modal-image').modal('show');";
        html +="                            $('#modal-image').delegate('a.thumbnail', 'click', function(e) {";
        html +="                                e.preventDefault();";
        html +="                               $('#input-description" + extend_row + "-language1').summernote('insertImage', $(this).attr('href'));";
        html +="                                  $('#modal-image').modal('hide');";
        html +="                          });";
        html +="                        }";
        html +="                      });";
        html +="               }";
        html +="           });";
        html +="           return button.render();";
        html +="         }";
        html +="    }";
        html +="   });";
        $('#tab-insure .tab-content2').append(html);
        $('#customtab a[href=\'#tab-extend' + extend_row + '\']').tab('show');

        $('#customtab-add-2').before('<li><a href="#tab-extend' + extend_row + '" data-toggle="tab"><i class="fa fa-minus-circle" onclick="$(\'a[href=\\\'#tab-extend' + extend_row + '\\\']\').parent().remove(); $(\'#tab-extend' + extend_row + '\').remove(); $(\'#customtab li a:first\').tab(\'show\');"></i> 自定义条款' + extend_row + '</a></li>');

        $('#customtab-' + extend_row).trigger('click');

        extend_row++;
    }

<?php $this->endBlock() ?>
<?php $this->registerJs($this->blocks['product'], \yii\web\View::POS_END);?>
