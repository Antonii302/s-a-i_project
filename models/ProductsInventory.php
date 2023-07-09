<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products_inventory".
 *
 * @property int $id
 * @property int $Product_id
 * @property int $current_quantity
 * @property string|null $date_expiry
 * @property int|null $PurchaseDetails_id
 * @property string|null $extra_details
 * @property int $Inventory_id
 *
 * @property Inventory $inventory
 * @property Product $product
 * @property PurchaseDetails $purchaseDetails
 */
class ProductsInventory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products_inventory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Product_id', 'current_quantity', 'Inventory_id'], 'required'],
            [['Product_id', 'current_quantity', 'PurchaseDetails_id', 'Inventory_id'], 'integer'],
            [['date_expiry'], 'safe'],
            [['extra_details'], 'string'],
            [['Inventory_id'], 'exist', 'skipOnError' => true, 'targetClass' => Inventory::class, 'targetAttribute' => ['Inventory_id' => 'id']],
            [['Product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['Product_id' => 'id']],
            [['PurchaseDetails_id'], 'exist', 'skipOnError' => true, 'targetClass' => PurchaseDetails::class, 'targetAttribute' => ['PurchaseDetails_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Product_id' => 'Product ID',
            'current_quantity' => 'Current Quantity',
            'date_expiry' => 'Date Expiry',
            'PurchaseDetails_id' => 'Purchase Details ID',
            'extra_details' => 'Extra Details',
            'Inventory_id' => 'Inventory ID',
        ];
    }

    /**
     * Gets query for [[Inventory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInventory()
    {
        return $this->hasOne(Inventory::class, ['id' => 'Inventory_id']);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'Product_id']);
    }

    /**
     * Gets query for [[PurchaseDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseDetails()
    {
        return $this->hasOne(PurchaseDetails::class, ['id' => 'PurchaseDetails_id']);
    }
}
