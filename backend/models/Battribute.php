<?php

namespace backend\models;

use Yii;
use common\models\Attribute;
/**
 * This is the model class for table "attribute".
 *
 * @property int $attribute_id
 * @property int $attribute_group_id
 * @property int $sort_order
 */
class Battribute extends Attribute
{
    public function getAbutes($data = array()) {
        $sql = "SELECT *, (SELECT agd.name FROM attribute_group_description agd WHERE agd.attribute_group_id = a.attribute_group_id AND agd.language_id = '1') AS attribute_group FROM attribute a LEFT JOIN attribute_description ad ON (a.attribute_id = ad.attribute_id) WHERE ad.language_id = '1'";

        if (!empty($data['filter_name'])) {
            $sql .= " AND ad.name LIKE '" . $data['filter_name'] . "%'";
        }

        if (!empty($data['filter_attribute_group_id'])) {
            $sql .= " AND a.attribute_group_id = '" . $data['filter_attribute_group_id'] . "'";
        }

        $sort_data = array(
            'ad.name',
            'attribute_group',
            'a.sort_order'
        );

        if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
            $sql .= " ORDER BY " . $data['sort'];
        } else {
            $sql .= " ORDER BY attribute_group, ad.name";
        }

        if (isset($data['order']) && ($data['order'] == 'DESC')) {
            $sql .= " DESC";
        } else {
            $sql .= " ASC";
        }

        if (isset($data['start']) || isset($data['limit'])) {
            if ($data['start'] < 0) {
                $data['start'] = 0;
            }

            if ($data['limit'] < 1) {
                $data['limit'] = 20;
            }

            $sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
        }

        $query =  Yii::$app->db->createCommand($sql)->queryAll();

        return $query;
    }
}
