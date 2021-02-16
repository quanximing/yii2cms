<?php
namespace frontend\models;

use Yii;
use yii\base\NotSupportedException;
use common\models\Product;
use yii\db\Query;

class Mproduct extends Product
{
    public function updateViewed($product_id) {
        Yii::$app->db->createCommand()->update('product', ['viewed' => 'viewed' + 1], ['product_id '=>(int)$product_id])->execute();
    }

    public function getProduct($product_id) {
        $sql ="SELECT DISTINCT *, pd.name AS name, p.image, m.name AS manufacturer, 
                                              (SELECT price FROM  product_discount pd2 WHERE pd2.product_id = p.product_id  AND pd2.quantity = '1' AND ((pd2.date_start = '0000-00-00' OR pd2.date_start < NOW()) AND (pd2.date_end = '0000-00-00' OR pd2.date_end > NOW())) ORDER BY pd2.priority ASC, pd2.price ASC LIMIT 1) AS discount, 
                                              (SELECT price FROM  product_special ps WHERE ps.product_id = p.product_id AND  ((ps.date_start = '0000-00-00' OR ps.date_start < NOW()) AND (ps.date_end = '0000-00-00' OR ps.date_end > NOW())) ORDER BY ps.priority ASC, ps.price ASC LIMIT 1) AS special, 
                                              (SELECT points FROM product_reward pr WHERE pr.product_id = p.product_id ) AS reward,                                             
                                              (SELECT AVG(rating) AS total FROM review r1 WHERE r1.product_id = p.product_id AND r1.status = '1' GROUP BY r1.product_id) AS rating, 
                                              (SELECT COUNT(*) AS total FROM review r2 WHERE r2.product_id = p.product_id AND r2.status = '1' GROUP BY r2.product_id) AS reviews , p.sort_order 
                                              FROM product p 
                                              LEFT JOIN product_description pd ON (p.product_id = pd.product_id)                                                                              
                                              LEFT JOIN manufacturer m ON (p.manufacturer_id = m.manufacturer_id) 
                                              WHERE p.product_id = '" . $product_id . "' AND  p.status = '1'";

        $query =  Yii::$app->db->createCommand($sql)->queryOne();
        return $query;
    }
    public function getProducts($data = array()) {
        $sql = "SELECT p.product_id, (SELECT AVG(rating) AS total FROM review r1 WHERE r1.product_id = p.product_id AND r1.status = '1' GROUP BY r1.product_id) AS rating, 
(SELECT price FROM product_discount pd2 WHERE pd2.product_id = p.product_id AND pd2.quantity = '1' AND ((pd2.date_start = '0000-00-00' OR pd2.date_start < NOW()) AND (pd2.date_end = '0000-00-00' OR pd2.date_end > NOW())) ORDER BY pd2.priority ASC, pd2.price ASC LIMIT 1) AS discount, 
(SELECT price FROM product_special ps WHERE ps.product_id = p.product_id AND ((ps.date_start = '0000-00-00' OR ps.date_start < NOW()) AND (ps.date_end = '0000-00-00' OR ps.date_end > NOW())) ORDER BY ps.priority ASC, ps.price ASC LIMIT 1) AS special";

        if (!empty($data['filter_category_id'])) {
            if (!empty($data['filter_sub_category'])) {
                $sql .= " FROM category_path cp LEFT JOIN product_to_category p2c ON (cp.category_id = p2c.category_id)";
            } else {
                $sql .= " FROM product_to_category p2c";
            }

            if (!empty($data['filter_filter'])) {
                $sql .= " LEFT JOIN product_filter pf ON (p2c.product_id = pf.product_id) LEFT JOIN product p ON (pf.product_id = p.product_id)";
            } else {
                $sql .= " LEFT JOIN product p ON (p2c.product_id = p.product_id)";
            }
        } else {
            $sql .= " FROM product p";
            if (!empty($data['filter_filter'])) {
                $sql .= " LEFT JOIN product_filter pf ON (pf.product_id = p.product_id)";
            }
        }

        $sql .= " LEFT JOIN product_description pd ON (p.product_id = pd.product_id)  WHERE  p.status = '1'";

        if (!empty($data['filter_category_id'])) {
            if (!empty($data['filter_sub_category'])) {
                $sql .= " AND cp.path_id = '" . (int)$data['filter_category_id'] . "'";
            } else {
                $sql .= " AND p2c.category_id = '" . (int)$data['filter_category_id'] . "'";
            }

            if (!empty($data['filter_filter'])) {
                $implode = array();

                $filters = explode(',', $data['filter_filter']);

                foreach ($filters as $filter_id) {
                    $implode[] = (int)$filter_id;
                }

                $sql .= " AND pf.filter_id IN (" . implode(',', $implode) . ")";
            }
        }else{
            if (!empty($data['filter_filter'])) {
                $implode = array();

                $filters = explode(',', $data['filter_filter']);

                foreach ($filters as $filter_id) {
                    $implode[] = (int)$filter_id;
                }

                $sql .= " AND pf.filter_id IN (" . implode(',', $implode) . ")";
            }
        }


        if (!empty($data['filter_name']) || !empty($data['filter_tag'])) {
            $sql .= " AND (";

            if (!empty($data['filter_name'])) {
                $implode = array();

                $words = explode(' ', trim(preg_replace('/\s+/', ' ', $data['filter_name'])));

                foreach ($words as $word) {
                    $implode[] = "pd.name LIKE '%" . $this->db->escape($word) . "%'";
                }

                if ($implode) {
                    $sql .= " " . implode(" AND ", $implode) . "";
                }

                if (!empty($data['filter_description'])) {
                    $sql .= " OR pd.description LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
                }
            }

            if (!empty($data['filter_name']) && !empty($data['filter_tag'])) {
                $sql .= " OR ";
            }

            if (!empty($data['filter_tag'])) {
                $implode = array();

                $words = explode(' ', trim(preg_replace('/\s+/', ' ', $data['filter_tag'])));

                foreach ($words as $word) {
                    $implode[] = "pd.tag LIKE '%" . $this->db->escape($word) . "%'";
                }

                if ($implode) {
                    $sql .= " " . implode(" AND ", $implode) . "";
                }
            }

            if (!empty($data['filter_name'])) {
                $sql .= " OR LCASE(p.model) = '" . utf8_strtolower($data['filter_name']) . "'";
                $sql .= " OR LCASE(p.sku) = '" . utf8_strtolower($data['filter_name']) . "'";
                $sql .= " OR LCASE(p.upc) = '" . utf8_strtolower($data['filter_name']) . "'";
                $sql .= " OR LCASE(p.ean) = '" . utf8_strtolower($data['filter_name']) . "'";
                $sql .= " OR LCASE(p.jan) = '" . utf8_strtolower($data['filter_name']) . "'";
                $sql .= " OR LCASE(p.isbn) = '" . utf8_strtolower($data['filter_name']) . "'";
                $sql .= " OR LCASE(p.mpn) = '" . utf8_strtolower($data['filter_name']) . "'";
            }

            $sql .= ")";
        }

        if (!empty($data['filter_manufacturer_id'])) {
            $sql .= " AND p.manufacturer_id = '" . (int)$data['filter_manufacturer_id'] . "'";
        }
        if (!empty($data['feature_home'])) {
            $sql .= " AND p.feature_home = '" . (int)$data['feature_home'] . "'";
        }
        $sql .= " GROUP BY p.product_id";

        $sort_data = array(
            'pd.name',
            'p.model',
            'p.quantity',
            'p.price',
            'rating',
            'p.sort_order',
            'p.date_added'
        );

     /* if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
            if ($data['sort'] == 'pd.name' || $data['sort'] == 'p.model') {
                $sql .= " ORDER BY LCASE(" . $data['sort'] . ")";
            } elseif ($data['sort'] == 'p.price') {
                $sql .= " ORDER BY (CASE WHEN special IS NOT NULL THEN special WHEN discount IS NOT NULL THEN discount ELSE p.price END)";
            } else {
                $sql .= " ORDER BY " . $data['sort'];
            }
        } else {
            $sql .= " ORDER BY p.sort_order DESC";
        }*/
        $sql .= " ORDER BY p.sort_order DESC";
       /* if (isset($data['order']) && ($data['order'] == 'DESC')) {
            $sql .= "LCASE(pd.name) DESC";
        } else {
            $sql .= " LCASE(pd.name) ASC";
        }*/

        if (isset($data['start']) || isset($data['limit'])) {

            if ($data['start'] < 0) {
                $data['start'] = 0;
            }

            if ($data['limit'] < 1) {
                $data['limit'] = 20;
            }

            $sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
        }

        $product_data = array();
        //echo $sql;
        $query = Yii::$app->db->createCommand($sql)->queryAll();

        foreach ($query as $result) {
            $product_data[$result['product_id']] = $this->getProduct($result['product_id']);
        }

        return $product_data;
    }
    public function getProductOptionValue($product_id) {
        $value =array();
        $product_option_value_query = Yii::$app->db->createCommand("SELECT * FROM  product_option_value ov WHERE ov.product_id = '" . (int)$product_id . "'")->queryAll();
        foreach ($product_option_value_query as $product_option_value) {
            $value['num'] = count(explode(',',$product_option_value['value']));
            if(strpos($product_option_value['price'],'||')){
                $prices = explode('||',$product_option_value['price']);
                $price = 0;
                foreach ($prices as $vp){
                    $price += $vp ;
                }
                $product_option_value['price'] = $price;
            }
            $value[$product_option_value['value']] = array(
                'product_option_value_id'=>$product_option_value['product_option_value_id']  ,
                'product_id' => $product_option_value['product_id'],
                'value'=>$product_option_value['value'],
                'sku'=>$product_option_value['sku'],
                'quantity'=>$product_option_value['quantity'] ,
                'price'=>$product_option_value['price'],
                'special_price'=>$product_option_value['special_price']>0?$product_option_value['special_price']:'',
                'rush_buy_price'=>$product_option_value['rush_buy_price']>0?$product_option_value['rush_buy_price']:'',
                'points' =>$product_option_value['points'],
            );
        }
        return $value;

    }
    public function getProductValue($product_option_value_id) {
        $product_option_value_query =Yii::$app->db->createCommand("SELECT * FROM  product_option_value ov WHERE ov.product_option_value_id = '" . (int)$product_option_value_id ."'")->queryOne();
        $mprice ='';
        if(strpos($product_option_value_query['price'],'||')){
            $prices = explode('||',$product_option_value_query['price']);
            $price = 0;
            foreach ($prices as $vp){
                $price += $vp ;
            }
            $mprice =$product_option_value_query['price'];
            $product_option_value_query['price']= $price;
        }

        return array(
                'product_option_value_id'=>$product_option_value_query['product_option_value_id']  ,
                'product_id' => $product_option_value_query['product_id'],
                'value'=>$product_option_value_query['value'],
                'sku'=>$product_option_value_query['sku'],
                'quantity'=>$product_option_value_query['quantity'] ,
                'price'=>$product_option_value_query['price'],
                'special_price'=>$product_option_value_query['special_price']>0?$product_option_value_query['special_price']:'',
                'rush_buy_price'=>$product_option_value_query['rush_buy_price']>0?$product_option_value_query['rush_buy_price']:'',
                'mprice' =>$mprice,
                'points' =>$product_option_value_query['points'],
            );
    }
    public function getProductGroupValue($product_id){
        $result =array();
        $product_group_value_sql =Yii::$app->db->createCommand("SELECT * FROM product_option_group_value og 	WHERE og.product_id = '" . (int)$product_id . "'")->queryAll();
        foreach ($product_group_value_sql as $val) {
            $result[$val['product_option_group_value_id']] =$val;
        }
        return $result;
    }

    public function getProductOptions($product_id) {
        $product_option_data = array();
        $sql = "SELECT * FROM product_option_group_value ogvalue LEFT JOIN `product_option_group` og ON (ogvalue.`product_option_group_id` = og.`product_option_group_id`) 	WHERE og.product_id = '" . (int)$product_id ."' ORDER BY og.sort_order";
        $product_option_query = Yii::$app->db->createCommand($sql)->queryAll();

        foreach ($product_option_query as $product_option) {
            $product_option_data[$product_option['product_option_group_id']]['name'] =$product_option['name'] ;
            $product_option_data[$product_option['product_option_group_id']]['type'] =$product_option['type'] ;
            $product_option_data[$product_option['product_option_group_id']]['required'] =$product_option['required'] ;
            $product_option_data[$product_option['product_option_group_id']]['sort_order'] =$product_option['sort_order'] ;
            $product_option_data[$product_option['product_option_group_id']]['is_show'] =$product_option['is_show'] ;
            $product_option_data[$product_option['product_option_group_id']]['for_price'] =$product_option['for_price'] ;
            $product_option_data[$product_option['product_option_group_id']]['group_val'][$product_option['product_option_group_value_id']] = array(
                'product_option_group_value_id'     => $product_option['product_option_group_value_id'],
                //'name'                              => $product_option['name'],
                //'type'                              => $product_option['type'],
                'image'                             => $product_option['image'],
                'description'                       => html_entity_decode($product_option['description']),
                'opvalue'                             => $product_option['value'],
                //'required'                          => $product_option['required'],
                //'sort_order'                        => $product_option['sort_order']
            );
        }

        return $product_option_data;
    }
    public function getProductImages($product_id) {
        $query = Yii::$app->db->createCommand("SELECT * FROM product_image WHERE product_id = '" . (int)$product_id . "' ORDER BY sort_order ASC")->queryAll();
        return $query;
    }
    public function getProducttabs($product_id) {
        $query = Yii::$app->db->createCommand("SELECT * FROM product_customtab pc LEFT JOIN product_customtab_description pcd ON (pc.product_customtab_id  = pcd.product_customtab_id) WHERE pc.product_id = '" . (int)$product_id . "'  AND status > 0 ORDER BY sort_order ASC")->queryAll();
        return $query;
    }
    public function getProductByCategory(){
        $result = (new \yii\db\Query())
            ->select('d.*,pd.*,p.*')
            ->from("category c")
            ->leftJoin('category_description d','c.category_id=d.category_id')
            ->rightJoin('product_to_category pd','pd.category_id=c.category_id')
            ->leftJoin('product p','pd.product_id=p.product_id')
            ->where(['c.top'=>1])
            ->all();
       foreach ($result as $value){
            $data[$value['category_id']][$value['product_id']]=$value;
        }
       // var_dump($data);
        return $data;
    }

    public function getTotalProducts($data = array()) {
        $sql = "SELECT COUNT(DISTINCT p.product_id) AS total";

        if (!empty($data['filter_category_id'])) {
            if (!empty($data['filter_sub_category'])) {
                $sql .= " FROM  category_path cp LEFT JOIN  product_to_category p2c ON (cp.category_id = p2c.category_id)";
            } else {
                $sql .= " FROM  product_to_category p2c";
            }

            if (!empty($data['filter_filter'])) {
                $sql .= " LEFT JOIN  product_filter pf ON (p2c.product_id = pf.product_id) LEFT JOIN  product p ON (pf.product_id = p.product_id)";
            } else {
                $sql .= " LEFT JOIN  product p ON (p2c.product_id = p.product_id)";
            }
        } else {
            $sql .= " FROM  product p";
        }

        $sql .= " LEFT JOIN  product_description pd ON (p.product_id = pd.product_id)  WHERE pd.language_id =1 AND p.status = '1' AND p.date_available <= NOW()";

        if (!empty($data['filter_category_id'])) {
            if (!empty($data['filter_sub_category'])) {
                $sql .= " AND cp.path_id = '" . (int)$data['filter_category_id'] . "'";
            } else {
                $sql .= " AND p2c.category_id = '" . (int)$data['filter_category_id'] . "'";
            }

            if (!empty($data['filter_filter'])) {
                $implode = array();

                $filters = explode(',', $data['filter_filter']);

                foreach ($filters as $filter_id) {
                    $implode[] = (int)$filter_id;
                }

                $sql .= " AND pf.filter_id IN (" . implode(',', $implode) . ")";
            }
        }

        if (!empty($data['filter_name']) || !empty($data['filter_tag'])) {
            $sql .= " AND (";

            if (!empty($data['filter_name'])) {
                $implode = array();

                $words = explode(' ', trim(preg_replace('/\s+/', ' ', $data['filter_name'])));

                foreach ($words as $word) {
                    $implode[] = "pd.name LIKE '%" .$word. "%'";
                }

                if ($implode) {
                    $sql .= " " . implode(" AND ", $implode) . "";
                }

                if (!empty($data['filter_description'])) {
                    $sql .= " OR pd.description LIKE '%" . $data['filter_name']. "%'";
                }
            }

            if (!empty($data['filter_name']) && !empty($data['filter_tag'])) {
                $sql .= " OR ";
            }

            if (!empty($data['filter_tag'])) {
                $implode = array();

                $words = explode(' ', trim(preg_replace('/\s+/', ' ', $data['filter_tag'])));

                foreach ($words as $word) {
                    $implode[] = "pd.tag LIKE '%" . $word . "%'";
                }

                if ($implode) {
                    $sql .= " " . implode(" AND ", $implode) . "";
                }
            }

            if (!empty($data['filter_name'])) {
                $sql .= " OR LCASE(p.model) = '" .  utf8_strtolower($data['filter_name'])  . "'";
                $sql .= " OR LCASE(p.sku) = '" .  utf8_strtolower($data['filter_name'])  . "'";
                $sql .= " OR LCASE(p.upc) = '" .  utf8_strtolower($data['filter_name']) . "'";
                $sql .= " OR LCASE(p.ean) = '" .  utf8_strtolower($data['filter_name'])  . "'";
                $sql .= " OR LCASE(p.jan) = '" .  utf8_strtolower($data['filter_name']) . "'";
                $sql .= " OR LCASE(p.isbn) = '" .  utf8_strtolower($data['filter_name']) . "'";
                $sql .= " OR LCASE(p.mpn) = '" .  utf8_strtolower($data['filter_name']). "'";
            }

            $sql .= ")";
        }

        if (!empty($data['filter_manufacturer_id'])) {
            $sql .= " AND p.manufacturer_id = '" . (int)$data['filter_manufacturer_id'] . "'";
        }

        $query =Yii::$app->db->createCommand($sql)->queryScalar();
        return $query;
    }
}