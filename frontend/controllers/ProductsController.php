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
use yii\data\Pagination;
use frontend\models\Mproduct;
use common\models\Manufacturer;
use common\models\Category;
use yii\web\Response;
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
        $size=(int)(Yii::$app->request->get('page_size')??10);
        $page =(int)(Yii::$app->request->get('page')??1);

        $display = Yii::$app->request->get('display');
        $data =array();
        $data['start'] = $size*($page-1);
        $data['limit'] =$size;
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
        $count= $products->getTotalProducts($data);
        foreach ($lists as $k => $value){
            $attributes = BproductAttribute::findAll(['product_id'=>$k]);
            foreach ($attributes as $v){
                $lists[$k]['attributes'][$v->attributeDescription->name] =$v->text;
            }
        }

        $pages = new Pagination(['totalCount' => $count,'pageSize' =>$size,]);
        if($display == 'list'){
            return $this->render('products-list', [
                'data'=>$lists,
                'totalCount' => $count,
                'pageSize'=>$size,
                'pages' => $pages,
            ]);
        }else{
            return $this->render('products-grid', [
                'data'=>$lists,
                'totalCount' => $count,
                'pageSize'=>$size,
                'pages' => $pages,
            ]);
        }

    }

    /**
     * 弹窗ajax加载
     */
    public function actionProductIntro(){
        Yii::$app->response->format=Response::FORMAT_JSON;
        $product_id = Yii::$app->request->post('product_id');
        $html_content =<<<HTNL
 <div class="product">
                <!-- === popup-title === -->
                <div class="popup-title">
                    <div class="h1 title">Laura <small>product category</small></div>
                </div>
                <!-- === product gallery === -->
                <div class="owl-product-gallery">
                    <img src="/images/product-1.png" alt="" width="640" />
                    <img src="/images/product-2.png" alt="" width="640" />
                    <img src="/images/product-3.png" alt="" width="640" />
                    <img src="/images/product-4.png" alt="" width="640" />
                </div>
                <!-- === product-popup-info === -->
                <div class="popup-content">
                    <div class="product-info-wrapper">
                        <div class="row">
                            <!-- === left-column === -->
                            <div class="col-sm-6">
                                <div class="info-box">
                                    <strong>Maifacturer</strong>
                                    <span>Brand name</span>
                                </div>
                                <div class="info-box">
                                    <strong>Materials</strong>
                                    <span>Wood, Leather, Acrylic</span>
                                </div>
                                <div class="info-box">
                                    <strong>Availability</strong>
                                    <span><i class="fa fa-check-square-o"></i> in stock</span>
                                </div>
                            </div>
                            <!-- === right-column === -->
                            <div class="col-sm-6">
                                <div class="info-box">
                                    <strong>Available Colors</strong>
                                    <div class="product-colors clearfix">
                                        <span class="color-btn color-btn-red"></span>
                                        <span class="color-btn color-btn-blue checked"></span>
                                        <span class="color-btn color-btn-green"></span>
                                        <span class="color-btn color-btn-gray"></span>
                                        <span class="color-btn color-btn-biege"></span>
                                    </div>
                                </div>
                                <div class="info-box">
                                    <strong>Choose size</strong>
                                    <div class="product-colors clearfix">
                                        <span class="color-btn color-btn-biege">S</span>
                                        <span class="color-btn color-btn-biege checked">M</span>
                                        <span class="color-btn color-btn-biege">XL</span>
                                        <span class="color-btn color-btn-biege">XXL</span>
                                    </div>
                                </div>
                            </div>

                        </div> <!--/row-->
                    </div> <!--/product-info-wrapper-->
                </div> <!--/popup-content-->
                <!-- === product-popup-footer === -->
                <div class="popup-table">
                    <div class="popup-cell">
                        <div class="price">
                            <span class="h3">$ 1999,00 <small>$ 2999,00</small></span>
                        </div>
                    </div>
                    <div class="popup-cell">
                        <div class="popup-buttons">
                            <a href="product.html"><span class="icon icon-eye"></span> <span class="hidden-xs">View more</span></a>
                            <a href="javascript:void(0);"><span class="icon icon-cart"></span> <span class="hidden-xs">Buy</span></a>
                        </div>
                    </div>
                </div>
            </div>
HTNL;

    }
}