<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inventory".
 *
 * @property int $id
 * @property string $name
 * @property string|null $global_setting
 *
 * @property ProductsInventory[] $productsInventories
 */
class Inventory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inventory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['global_setting'], 'string'],
            [['name'], 'string', 'max' => 80],
            [['name'], 'unique'],
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
            'global_setting' => 'Global Setting',
        ];
    }

    /**
     * Gets query for [[ProductsInventories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductsInventories()
    {
        return $this->hasMany(ProductsInventory::class, ['Inventory_id' => 'id']);
    }
}
