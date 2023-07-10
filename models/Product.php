<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $productCategory_id
 * @property string $name
 * @property int $unitMeasurement_id
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
            [['productCategory_id', 'name', 'unitMeasurement_id'], 'required'],
            [['productCategory_id', 'unitMeasurement_id'], 'integer'],
            [['name'], 'string', 'max' => 40],
            [['name'], 'unique'],
            [['productCategory_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCategory::class, 'targetAttribute' => ['productCategory_id' => 'id']],
            [['unitMeasurement_id'], 'exist', 'skipOnError' => true, 'targetClass' => UnitMeasurement::class, 'targetAttribute' => ['unitMeasurement_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'productCategory_id' => 'Product Category ID',
            'name' => 'Name',
            'unitMeasurement_id' => 'Unit Measurement ID',
        ];
    }

    /**
     * Gets query for [[ProductCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategory()
    {
        return $this->hasOne(ProductCategory::class, ['id' => 'productCategory_id']);
    }

    /**
     * Gets query for [[ProductsInventories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductsInventories()
    {
        return $this->hasMany(ProductsInventory::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[UnitMeasurement]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUnitMeasurement()
    {
        return $this->hasOne(UnitMeasurement::class, ['id' => 'unitMeasurement_id']);
    }
}
