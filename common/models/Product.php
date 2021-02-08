<?php

namespace common\models;


use Yii;
use common\models\ProductDescription;
use common\models\ProductAttribute;
use common\models\ProductCustomtab;
use common\models\ProductCustomtabDescription;
use common\models\ProductImage;
use common\models\ProductOptionGroup;
use common\models\ProductOptionGroupValue;
use common\models\ProductOptionValue;
use common\models\ProductToCategory;
use common\models\ProductRelated;
use common\models\ProductDiscount;
use common\models\ProductFilter;
/**
 * This is the model class for table "product".
 *
 * @property int $product_id
 * @property string $model
 * @property string $sku
 * @property string $location
 * @property int $quantity
 * @property int $stock_status_id
 * @property string $image
 * @property int $manufacturer_id
 * @property int $shipping
 * @property string $price
 * @property string $unit 价格单位
 * @property int $points
 * @property string $date_available
 * @property int $subtract
 * @property int $minimum
 * @property int $sort_order
 * @property int $status
 * @property int $viewed
 * @property string $date_added
 * @property int $is_pt
 * @property int $pt_y_discount 拼团折扣比例  除以100
 * @property int $pt_n_discount 拼团折扣比例  除以100
 * @property string $date_modified
 * @property int $is_fx 是否分销
 * @property int $sales_num 销量
 * @property string $commission 佣金比例
 * @property string $commission_extend 附加奖品
 * @property string $template 选择产品展示的模板
 * @property string $header_url 跳转链接
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['model', 'sku', 'manufacturer_id', 'date_available', 'date_added'], 'required'],
            [['quantity', 'stock_status_id', 'manufacturer_id', 'shipping', 'points', 'subtract', 'minimum', 'sort_order', 'status', 'viewed', 'is_pt', 'is_fx','sales_num'], 'integer'],
            [['price','pt_y_discount','pt_n_discount', 'commission'], 'number'],
            [['date_available', 'date_added', 'date_modified'], 'safe'],
            [['model', 'sku'], 'string', 'max' => 64],
            [['location'], 'string', 'max' => 128],
            [['image'], 'string', 'max' => 255],
            [['unit'], 'string', 'max' => 50],
            [['commission_extend', 'template', 'header_url'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'model' => 'Model',
            'sku' => 'Sku',
            'location' => 'Location',
            'quantity' => 'Quantity',
            'stock_status_id' => 'Stock Status ID',
            'image' => 'Image',
            'manufacturer_id' => 'Manufacturer ID',
            'shipping' => 'Shipping',
            'price' => 'Price',
            'unit' => 'Unit',
            'points' => 'Points',
            'date_available' => 'Date Available',
            'subtract' => 'Subtract',
            'minimum' => 'Minimum',
            'sort_order' => 'Sort Order',
            'status' => 'Status',
            'viewed' => 'Viewed',
            'date_added' => 'Date Added',
            'is_pt' => '是否拼团',
            'pt_y_discount' => '拼团月付折扣',
            'pt_n_discount' => '拼团年付折扣',
            'date_modified' => 'Date Modified',
            'is_fx' => 'Is FX',
            'sales_num' => '销量',
            'commission' => 'Commission',
            'commission_extend' => 'Commission Extend',
            'template' => 'Template',
            'header_url' => 'Header Url',
        ];
    }
	
	public function getProductDesc(){
		return $this->hasOne(ProductDescription::className(),['product_id'=>'product_id']);
	}
	
	public function getManufacturer(){
		return $this->hasOne(Manufacturer::className(),['manufacturer_id'=>'manufacturer_id']);
	}
	
	public function getImages(){
		return $this->hasMany(ProductImage::className(),['product_id'=>'product_id']);
	}
	public function getFilters(){
		return $this->hasMany(ProductFilter::className(),['product_id'=>'product_id']);
	}
	
	public function getAbutes()
	{
		return $this->hasMany(ProductAttribute::className(),['product_id'=>'product_id']);
	}
}
