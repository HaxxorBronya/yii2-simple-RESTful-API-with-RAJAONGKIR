<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cities".
 *
 * @property int $id
 * @property int $city_id
 * @property int $province_id
 * @property string $province
 * @property string $type
 * @property string $city_name
 * @property int $postal_code
 */
class Cities extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city_id', 'province_id', 'province', 'type', 'city_name', 'postal_code'], 'required'],
            [['city_id', 'province_id', 'postal_code'], 'integer'],
            [['province', 'type', 'city_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city_id' => 'City ID',
            'province_id' => 'Province ID',
            'province' => 'Province',
            'type' => 'Type',
            'city_name' => 'City Name',
            'postal_code' => 'Postal Code',
        ];
    }
}
