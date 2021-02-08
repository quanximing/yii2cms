<?php

namespace backend\controllers;


use backend\models\BproductRecurring;
use common\models\Attribute;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Bproduct;
use backend\models\BproductFilter;
use backend\models\BproductDescription;
use backend\models\search\ProductSearch;
use backend\models\BproductCustomtab;
use backend\models\BproductCustomtabDescription;
use backend\models\BproductImage;
use backend\models\BproductToCategory;
use backend\models\BproductOptionGroup;
use backend\models\BproductOptionGroupValue;
use backend\models\BproductOptionValue;
use backend\models\Bcategory;
use backend\models\BproductAttribute;
use backend\models\Battribute;
use backend\models\BproductExtend;
use common\library\image\image;
use yii\base\Exception;
use yii\web\Response;
/**
 * ProductController implements the CRUD actions for Bproduct model.
 */
class ProductController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Bproduct models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }



    /**
     * Creates a new Bproduct model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $product= new Bproduct();
        $product_description = new BproductDescription();
        if(Yii::$app->request->isPost){
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $product->attributes =Yii::$app->request->post('Bproduct');
                $product->date_added      =date('Y-m-d H:i:s',time());
                $product->date_modified   =date('Y-m-d H:i:s',time());
                $product->date_available  =date('Y-m-d H:i:s',strtotime("+1 year"));
                if(!$product->save()){
                    throw new Exception ( '保存产品信息错误:'.json_encode($product->errors));
                }
                $product_id = $product->product_id;

                $pdescription = Yii::$app->request->post('BproductDescription');
                if(!empty($pdescription)){
                    $product_description->product_id = $product_id;
                    $product_description->language_id =1;
                    $product_description->name = $pdescription['name'];
                    $product_description->description =htmlentities($pdescription['description']) ;
                    $product_description->tag          =$pdescription['tag'];
                    $product_description->meta_title = $pdescription['meta_title'];
                    $product_description->meta_description = $pdescription['meta_description'];
                    $product_description->meta_keyword = $pdescription['meta_keyword'];
                    if(!$product_description->save()){
                        throw new Exception ( '保存产品描述信息错误:'.json_encode($product_description->errors));
                    }
                }

                $pimages = Yii::$app->request->post('product_image');
                if(!empty($pimages)){
                    foreach ($pimages as $img){
                        $proimage = new BproductImage();
                        $proimage->product_id = $product_id;
                        $proimage->image      = $img['image'];
                        $proimage->sort_order = !empty($img['sort_order'])?$img['sort_order']:0;
                        //$proimage->save();
                        if(!$proimage->save()){
                            throw new Exception ( '保存产品附加图错误:'.json_encode($proimage->errors));
                        }
                    }
                }

                $options = Yii::$app->request->post('options');
                if(!empty($options)){
                    $options = json_decode($options,true);
                    foreach ($options['option_group'] as $k =>$group){
                        $product_option_group = new BproductOptionGroup();
                        $product_option_group->product_id =$product_id;
                        $product_option_group->language_id =1;
                        $product_option_group->type     =$group['type'];
                        $product_option_group->name     =$group['name'];
                        $product_option_group->required =$group['required'];
                        $product_option_group->for_price=$group['forPrice'];
                        $product_option_group->is_show  =$group['isShow'];
                        $product_option_group->sort_order=$group['sort'];
                        if(!$product_option_group->save()){
                            throw new Exception ( '保存Group表出错:'.json_encode($product_option_group->errors));
                        }
                        $group_key[$k] = $product_option_group->product_option_group_id;
                    }
                    if(!empty($group_key)){
                        foreach ($options['option_group_value'] as $k =>$group_value){
                            $product_gourp_value = new BproductOptionGroupValue();
                            $product_gourp_value->product_id                = $product_id;
                            $product_gourp_value->product_option_group_id   = $group_key[$group_value['id']];
                            $product_gourp_value->value = $group_value['value'];
                            $product_gourp_value->key = $group_value['key'];
                            $product_gourp_value->image = $group_value['image'];
                            $product_gourp_value->description =htmlentities($group_value['description']);
                            if(!$product_gourp_value->save()){
                                throw new Exception ( '保存Group value表出错:'.json_encode($product_gourp_value->errors));
                            }
                            $group_key_value[$group_value['value']] = $product_gourp_value->product_option_group_value_id;
                        }
                    }

                    if(!empty($group_key_value)){
                        foreach ($options['option_value'] as $k =>$option_value){
                            $temp = explode(',',$option_value['value']);
                            $tmp_option=array();
                            foreach ($temp as $value){
                                $tmp_option[]=$group_key_value[$value];
                            }
                            $op_value = implode(',',$tmp_option);
                            $product_option_value  =new BproductOptionValue();
                            $product_option_value->product_id    = $product_id;
                            $product_option_value->language_id   = 1;
                            $product_option_value->value    = $op_value;
                            $product_option_value->sku      = $option_value['sku'];
                            $product_option_value->price    = $option_value['price'];
                            $product_option_value->quantity = 0;
                            $product_option_value->points   = !empty($option_value['points'])?$option_value['points']:0;

                            if(!$product_option_value->save()){
                                throw new Exception ( '保存option value表出错:'.json_encode($product_option_value->errors));
                            }
                        }
                    }

                }



                $tab = Yii::$app->request->post('product_customtab');
                if (!empty($tab)){
                    foreach ($tab as $value){
                        $product_customtab = new BproductCustomtab();
                        $product_customtab->product_id = $product_id;
                        $product_customtab->sort_order =$value['sort_order'];
                        $product_customtab->status     =$value['status'];
                        if(!$product_customtab->save()){
                            throw new Exception ( '保存TAB主表错误:'.json_encode($product_customtab->errors));
                        }

                        $pcustom_id =$product_customtab->product_customtab_id;

                        $product_customtab_description = new BproductCustomtabDescription();
                        $product_customtab_description->product_customtab_id =$pcustom_id;
                        $product_customtab_description->product_id = $product_id;
                        $product_customtab_description->language_id = 1;
                        $product_customtab_description->title =$value['title'];;
                        $product_customtab_description->description = htmlentities(trim($value['description']));
                        //$product_customtab_description->save();
                        if(!$product_customtab_description->save()){
                            throw new Exception ( '保存TAB描述信息错误:'.json_encode($product_customtab_description->errors));
                        }
                    }

                }

                $ptocate = Yii::$app->request->post('product_category');
                if(!empty($ptocate)){
                    foreach ($ptocate as $value){
                        $product_cate = new BproductToCategory();
                        $product_cate->product_id =$product_id;
                        $product_cate->category_id =$value;
                        //$product_cate->save();
                        if(!$product_cate->save()){
                            throw new Exception ( '保存产品分类错误:'.json_encode($product_cate->errors));
                        }
                    }
                }
                $filters = Yii::$app->request->post('product_filter');
                if(!empty($filters)){
                    foreach ($filters as $value){
                        $filter = new BproductFilter();
                        $filter->filter_id =$value;
                        $filter->product_id =$product_id;
                        if(!$filter->save()){
                            throw new Exception ( '保存产品过滤错误:'.json_encode($filter->errors));
                        }
                    }
                }
                $recurring = Yii::$app->request->post('product_recurring');
                if(!empty($recurring)){
                    foreach ($recurring as $value){
                        $product_recurring = new BproductRecurring();
                        $product_recurring->product_id =$product_id;
                        $product_recurring->fee         =$value['fee'];
                        $product_recurring->frequency   =$value['frequency'];
                        $product_recurring->duration    =$value['duration'];
                        $product_recurring->cycle       =$value['cycle'];
                        $product_recurring->name        =$value['name'];
                        $product_recurring->status      =$value['status'];
                        $product_recurring->sort_order  =$value['sort_order'];
                        if(!$product_recurring->save()){
                            throw new Exception ( '保存产品分期设置错误:'.json_encode($product_recurring->errors));
                        }
                    }
                }
                $attributes = Yii::$app->request->post('product_attribute');
                if(!empty($attributes)){
                    foreach ($attributes as $value){
                        $attribute = new BproductAttribute();
                        $attribute->product_id = $product_id;
                        $attribute->attribute_id =$value['attribute_id'];
                        $attribute->language_id =1;
                        $attribute->text =$value['text'];
                        if(!$attribute->save()){
                            throw new Exception ( '保存产品属性错误:'.json_encode($attribute->errors));
                        }
                    }
                }
	            $extend = Yii::$app->request->post('product_extend');
	            if(!empty($extend)){
		            foreach ($extend as $value){
			            $extend = new BproductExtend();
			            $extend->product_id = $product_id;
			            $extend->name =$value['name'];
			            $extend->url =$value['url'];
			            $extend->desction =$value['desction'];
			            $extend->status =$value['status'];
			            $extend->at_time =time();
			            if(!$extend->save()){
				            throw new Exception ( '保存产品条款错误:'.json_encode($attribute->errors));
			            }
		            }
	            }
                $transaction->commit();//提交
            } catch (Exception $e) {
                $transaction->rollBack();//回滚
                Yii::$app->session->setFlash('save-error',$e->getMessage());
            }
            //var_dump($product->errors);

            return $this->redirect(['index']);

        }
        $product_image = new BproductImage();
        $product_to_cate = new BproductToCategory();
        $product_extend = new BproductExtend();
        
        return $this->render('create', [
            'product'=>$product,
            'product_description'=>$product_description,
            'product_image'=>$product_image ,
            'product_to_cate'=>$product_to_cate ,
            'product_extend'=>$product_extend ,
        ]);
    }

    /**
     * Updates an existing Bproduct model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $product=Bproduct::findOne($id);
        $product_description = BproductDescription::findOne(['product_id'=>$id]);
        $product_customtab = BproductCustomtab::findAll(['product_id'=>$id]);
        $product_image        =BproductImage::findAll(['product_id'=>$id]);
        $product_to_cate      =BproductToCategory::findOne(['product_id'=>$id]);;
        $product_option_group =BproductOptionGroup::findAll(['product_id'=>$id]);
        $product_gourp_value  =BproductOptionGroupValue::findAll(['product_id'=>$id]);
        $product_option_value =BproductOptionValue::findAll(['product_id'=>$id]);
        $product_extend =BproductExtend::findAll(['product_id'=>$id]);
        $product_recurring = BproductRecurring::findAll(['product_id'=>$id]);

       if (Yii::$app->request->isPost) {
           $transaction = Yii::$app->db->beginTransaction();
           try {
               $product->attributes =Yii::$app->request->post('Bproduct');
               $product->date_modified   =date('Y-m-d H:i:s',time());
               if(!$product->save()){
                   throw new Exception ( '产品信息错误:'.json_encode($product->errors) );
               }
               //$product->save();

               $pdescription = Yii::$app->request->post('BproductDescription');
               if(!empty($pdescription)){
                   $product_description->name = $pdescription['name'];
                   $product_description->description =htmlentities($pdescription['description']) ;
                   $product_description->tag          =$pdescription['tag'];
                   $product_description->meta_title = $pdescription['meta_title'];
                   $product_description->meta_description = $pdescription['meta_description'];
                   $product_description->meta_keyword = $pdescription['meta_keyword'];
                   //$product_description->save();
                   if(!$product_description->save()){
                       throw new Exception ( '产品描述信息错误:'.json_encode($product_description->errors) );
                   }
               }

               $pimages = Yii::$app->request->post('product_image');
               if(!empty($pimages)){
                   BproductImage::deleteAll(['product_id'=>$id]);
                   foreach ($pimages as $img){
                       $proimage = new BproductImage();
                       $proimage->product_id = $id;
                       $proimage->image      = $img['image'];
                       $proimage->sort_order = !empty($img['sort_order'])?$img['sort_order']:0;
                       //$proimage->save();
                       if(!$proimage->save()){
                           throw new Exception ( '产品附加图错误:'.json_encode($proimage->errors) );
                       }
                   }
               }

               $tab = Yii::$app->request->post('product_customtab');
               if (!empty($tab)){
                   BproductCustomtab::deleteAll(['product_id'=>$id]);
                   BproductCustomtabDescription::deleteAll(['product_id'=>$id]);
                   foreach ($tab as $value){
                       $product_customtab = new BproductCustomtab();
                       $product_customtab->product_id = $id;
                       $product_customtab->sort_order =$value['sort_order'];
                       $product_customtab->status     =$value['status'];
                       if(!$product_customtab->save()){
                           throw new Exception ( '保存TAB主表错误:'.json_encode($product_customtab->errors));
                       }
                      // $product_customtab->save();
                       $pcustom_id =$product_customtab->product_customtab_id;

                       $product_customtab_description = new BproductCustomtabDescription();
                       $product_customtab_description->product_customtab_id =$pcustom_id;
                       $product_customtab_description->product_id = $id;
                       $product_customtab_description->language_id = 1;
                       $product_customtab_description->title =$value['title'];;
                       $product_customtab_description->description = htmlentities(trim($value['description']));
                       //$product_customtab_description->save();
                       if(!$product_customtab_description->save()){
                           throw new Exception ( '保存TAB描述信息错误:'.json_encode($product_customtab_description->errors));
                       }
                   }

               }
	
	           $extend = Yii::$app->request->post('product_extend');
	           if (!empty($extend)){
		           BproductExtend::deleteAll(['product_id'=>$id]);
		           foreach ($extend as $value){
			           $product_extend = new BproductExtend();
			           $product_extend->product_id = $id;
			           $product_extend->name =$value['name'];
			           $product_extend->url =$value['url'];
			           $product_extend->desction =htmlentities($value['desction']);
			           $product_extend->status =$value['status'];
			           $product_extend->at_time =time();
			           if(!$product_extend->save()){
				           throw new Exception ( '保存条款错误:'.json_encode($product_customtab->errors));
			           }
		           }
		
	           }
               
               $options = Yii::$app->request->post('options');
               if(!empty($options)){
                   BproductOptionGroup::deleteAll(['product_id'=>$id]);
                   BproductOptionGroupValue::deleteAll(['product_id'=>$id]);
                   BproductOptionValue::deleteAll(['product_id'=>$id]);

                   $options = json_decode($options,true);
                   foreach ($options['option_group'] as $k =>$group){
                       $product_option_group = new BproductOptionGroup();
                       $product_option_group->product_id =$id;
                       $product_option_group->language_id =1;
                       $product_option_group->type     =$group['type'];
                       $product_option_group->name     =$group['name'];
                       $product_option_group->required =$group['required'];
                       $product_option_group->for_price=$group['forPrice'];
                       $product_option_group->is_show  =$group['isShow'];
                       $product_option_group->sort_order=$group['sort'];
                       if(!$product_option_group->save()){
                           throw new Exception ( '保存Group表出错:'.json_encode($product_option_group->errors));
                       }
                       $group_key[$k] = $product_option_group->product_option_group_id;
                   }
                   if(!empty($group_key)){
                       foreach ($options['option_group_value'] as $k =>$group_value){
                           $product_gourp_value = new BproductOptionGroupValue();
                           $product_gourp_value->product_id                = $id;
                           $product_gourp_value->product_option_group_id   = $group_key[$group_value['id']];
                           $product_gourp_value->value = $group_value['value'];
                           $product_gourp_value->key = $group_value['key'];
                           $product_gourp_value->image = $group_value['image'];
                           $product_gourp_value->description = htmlentities($group_value['description']);
                           if(!$product_gourp_value->save()){
                               throw new Exception ( '保存Group value表出错:'.json_encode($product_gourp_value->errors));
                           }
                           $group_key_value[$group_value['value']] = $product_gourp_value->product_option_group_value_id;
                       }
                   }

                   if(!empty($group_key_value)){
                       foreach ($options['option_value'] as $k =>$option_value){
                           $temp = explode(',',$option_value['value']);
                           $tmp_option=array();
                           foreach ($temp as $k=>$value){
                               @$tmp_option[]=$group_key_value[$value];
                           }
                           $op_value = implode(',',$tmp_option);
                           $product_option_value  =new BproductOptionValue();
                           $product_option_value->product_id    = $id;
                           $product_option_value->language_id   = 1;
                           $product_option_value->value    = $op_value;
                           $product_option_value->sku      = $option_value['sku'];
                           $product_option_value->price    = $option_value['price'];
                           $product_option_value->quantity = 0;
                           $product_option_value->points   = !empty($option_value['points'])?$option_value['points']:0;

                           if(!$product_option_value->save()){
                               throw new Exception ( '保存option value表出错:'.json_encode($product_option_value->errors));
                           }
                       }
                   }

               }

               $ptocate = Yii::$app->request->post('product_category');
               if(!empty($ptocate)){
                   BproductToCategory::deleteAll(['product_id'=>$id]);
                   foreach ($ptocate as $value){
                       $product_cate = new BproductToCategory();
                       $product_cate->product_id =$id;
                       $product_cate->category_id =$value;
                       //$product_cate->save();
                       if(!$product_cate->save()){
                           throw new Exception ( '保存产品分类错误:'.json_encode($product_cate->errors));
                       }
                   }
               }

               $filters = Yii::$app->request->post('product_filter');
               if(!empty($filters)){
                   BproductFilter::deleteAll(['product_id'=>$id]);
                   foreach ($filters as $value){
                       $filter = new BproductFilter();
                       $filter->filter_id =$value;
                       $filter->product_id =$id;
                       if(!$filter->save()){
                           throw new Exception ( '保存产品过滤错误:'.json_encode($filter->errors));
                       }
                   }
               }

               $recurring = Yii::$app->request->post('product_recurring');
               if(!empty($recurring)){
                   BproductRecurring::deleteAll(['product_id'=>$id]);
                   foreach ($recurring as $value){
                       $product_recurring = new BproductRecurring();
                       $product_recurring->product_id  =$id;
                       $product_recurring->fee         =$value['fee'];
                       $product_recurring->frequency   =$value['frequency'];
                       $product_recurring->duration    =$value['duration'];
                       $product_recurring->cycle       =$value['cycle'];
                       $product_recurring->name        =$value['name'];
                       $product_recurring->status      =$value['status'];
                       $product_recurring->sort_order  =$value['sort_order'];
                       if(!$product_recurring->save()){
                           throw new Exception ( '保存产品分期设置错误:'.json_encode($product_recurring->errors));
                       }
                   }
               }


               $attributes = Yii::$app->request->post('product_attribute');
               if(!empty($attributes)){
                   BproductAttribute::deleteAll(['product_id'=>$id]);
                   foreach ($attributes as $value){
                       $attribute = new BproductAttribute();
                       $attribute->product_id = $id;
                       $attribute->attribute_id =$value['attribute_id'];
                       $attribute->language_id =1;
                       $attribute->text =$value['text'];
                       if(!$attribute->save()){
                           throw new Exception ( '保存产品属性错误:'.json_encode($attribute->errors));
                       }
                   }
               }
               $transaction->commit();//提交
           } catch (Exception $e) {
               $transaction->rollBack();//回滚
               Yii::$app->session->setFlash('save-error',$e->getMessage());
           }
           return $this->redirect(['index']);
        }
        $image = new image();
        //$product->image = $image->resize($product->image,'100','100');
        $product_description->description = html_entity_decode($product_description->description);

        $product_cate =new Bproduct();
        $categories = $product_cate->getProductCategories($id);
        $data['product_categories'] = array();
        $category = new Bcategory();
        foreach ($categories as $category_id) {
            $category_info = $category->getCategory($category_id);
            if ($category_info) {
                $data['product_categories'][] = array(
                    'category_id' => $category_info['category_id'],
                    'name'        => ($category_info['path']) ? $category_info['path'] . ' &gt; ' . $category_info['name'] : $category_info['name']
                );
            }
        }
        $opdata = array();
        foreach ($product_option_group as $k=>$value){
            $opdata['option_group'][$k]=$value->attributes;
        }
        $group_value_label = array();
        foreach ($product_gourp_value as $k=>$value){
            $opdata['option_group_value'][$k]=$value->attributes;
            $opdata['option_group_value'][$k]['description']=html_entity_decode($value->description);
            $group_value_label[$value->product_option_group_value_id] = $value->value;
        }

        foreach ($product_option_value as $k=>$value){
            $opdata['option_value'][$k]=$value->attributes;
            $temp = explode(',',$value->value);
            $tmp_option=array();
            foreach ($temp as $value){
                @$tmp_option[]=$group_value_label[$value];
            }
            $op_value = implode(',',$tmp_option);
            $opdata['option_value'][$k]['value']=$op_value;
        }

        return $this->render('update', [
            'product'=>$product,
            'product_description'=>$product_description,
            'product_customtab'=>$product_customtab ,
            'product_image'=>$product_image ,
            'product_to_cate'=>$product_to_cate ,
            'product_options'=>json_encode($opdata),
            'product_categories'=>$data['product_categories'],
            'product_extend'=>$product_extend,
            'product_recurring'=>$product_recurring,
	        
        ]);
    }

    /**
     * Deletes an existing Bproduct model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Bproduct model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bproduct the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bproduct::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionFilterAutocomplete() {
        Yii::$app->response->format=Response::FORMAT_JSON;
        $json = array();


        $filter_data = array(
                'filter_name' => Yii::$app->request->get('filter_name'),
                'start'       => 0,
                'limit'       => Yii::$app->request->get('config_limit_autocomplete')
        );
        $filter = new BproductFilter;
        $filters = $filter->getFilters($filter_data);

        foreach ($filters as $filter) {
                $json[] = array(
                    'filter_id' => $filter['filter_id'],
                    'name'      => strip_tags(html_entity_decode($filter['group'] . ' &gt; ' . $filter['name'], ENT_QUOTES, 'UTF-8'))
                );
        }

        $sort_order = array();
        foreach ($json as $key => $value) {
            $sort_order[$key] = $value['name'];
        }
        array_multisort($sort_order, SORT_ASC, $json);
        return $json;
    }

    public function actionAttributeAutocomplete(){
        Yii::$app->response->format=Response::FORMAT_JSON;
        $json = array();
        $attribute = new Battribute();

        $filter_data = array(
                'filter_name' => Yii::$app->request->get('filter_name'),
                'start'       => 0,
                'limit'       => Yii::$app->request->get('config_limit_autocomplete')
         );

        $results = $attribute->getAbutes($filter_data);

        foreach ($results as $result) {
                $json[] = array(
                    'attribute_id'    => $result['attribute_id'],
                    'name'            => strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8')),
                    'attribute_group' => $result['attribute_group']
                );
        }


        $sort_order = array();

        foreach ($json as $key => $value) {
            $sort_order[$key] = $value['name'];
        }

        array_multisort($sort_order, SORT_ASC, $json);
        return $json;
    }

}
