<?php
/**
 * Created by PhpStorm.
 * User: Q个
 * Date: 2021/2/13
 * Time: 17:53
 */
namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use frontend\models\Mproduct;
use common\models\Manufacturer;
use common\models\Category;
use backend\models\BproductAttribute;
use common\models\ProductOptionGroupValue;
class ProductsController extends Controller
{
    /**
     * 首页产品列表
     */
    public function actionIndex(){
        $cate_id = (int)Yii::$app->request->get('cate_id');
        $manufacturer_id = (int)Yii::$app->request->get('manufacturer_id');
        $filter_filter =(int)Yii::$app->request->get('filter_filter');
        $display = Yii::$app->request->get('display');
        $data =array('is_fx'=>1);
        if(!empty($manufacturer_id)){
            $data['filter_manufacturer_id']=$manufacturer_id;
        }
        if(!empty($cate_id)){
            $data['filter_category_id']=$cate_id;
        }
        if(!empty($filter_filter)){
            //$data['filter_category_id']=1;
            $data['filter_filter']=$filter_filter;
        }
        $products = new Mproduct();
        $lists =$products->getProducts($data);
        foreach ($lists as $k => $value){
            $attributes = BproductAttribute::findAll(['product_id'=>$k]);
            foreach ($attributes as $v){
                $lists[$k]['attributes'][$v->attributeDescription->name] =$v->text;
            }
        }

        if($display == 'lists'){
            return $this->render('products-lists', [
                'data'=>$lists
            ]);
        }else{
            return $this->render('products-grid', [
                'data'=>$lists
            ]);
        }

    }
}