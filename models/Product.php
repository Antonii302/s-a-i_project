<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $ProductCategory_id
 * @property string $name
 * @property int $UnitMeasurement_id
 *
 * @property ProductCategory $productCategory
 * @property ProductsInventory[] $productsInventories
 * @property UnitMeasurement $unitMeasurement
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
            [['ProductCategory_id', 'name', 'UnitMeasurement_id'], 'required'],
            [['ProductCategory_id', 'UnitMeasurement_id'], 'integer'],
            [['name'], 'string', 'max' => 40],
            [['name'], 'unique'],
            [['ProductCategory_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCategory::class, 'targetAttribute' => ['ProductCategory_id' => 'id']],
            [['UnitMeasurement_id'], 'exist', 'skipOnError' => true, 'targetClass' => UnitMeasurement::class, 'targetAttribute' => ['UnitMeasurement_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ProductCategory_id' => 'Product Category ID',
            'name' => 'Name',
            'UnitMeasurement_id' => 'Unit Measurement ID',
        ];
    }

    /**
     * Gets query for [[ProductCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategory()
    {
        return $this->hasOne(ProductCategory::class, ['id' => 'ProductCategory_id']);
    }

    /**
     * Gets query for [[ProductsInventories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductsInventories()
    {
        return $this->hasMany(ProductsInventory::class, ['Product_id' => 'id']);
    }

    /**
     * Gets query for [[UnitMeasurement]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUnitMeasurement()
    {
        return $this->hasOne(UnitMeasurement::class, ['id' => 'UnitMeasurement_id']);
    }
}
