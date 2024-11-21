<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string $name
 * @property int $id_province
 * @property int $id_cities
 * @property string $kurir
 * @property string $service
 * @property int $ongkir
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'id_province', 'id_cities', 'kurir', 'service', 'ongkir'], 'required'],
            [['id_province', 'id_cities', 'ongkir'], 'integer'],
            [['name', 'kurir', 'service'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'id_province' => 'Province',
            'id_cities' => 'City',
            'kurir' => 'Kurir',
            'service' => 'Service',
            'ongkir' => 'Ongkir',
        ];
    }
}
