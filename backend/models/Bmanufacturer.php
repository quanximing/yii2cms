<?php

namespace backend\models;

use Yii;
use common\models\Manufacturer;
/**
 * This is the model class for table "manufacturer".
 *
 * @property int $manufacturer_id
 * @property string $name
 * @property string $image
 * @property string $config_input json
 * @property int $sort_order
 */
class Bmanufacturer extends Manufacturer
{

    public function getManufacturers($data = array()) {
        $sql = "SELECT * FROM manufacturer";

        if (!empty($data['filter_name'])) {
            $sql .= " WHERE name LIKE '" . $data['filter_name'] . "%'";
        }

        $sort_data = array(
            'name',
            'sort_order'
        );

        if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
            $sql .= " ORDER BY " . $data['sort'];
        } else {
            $sql .= " ORDER BY name";
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
