<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products_inventory".
 *
 * @property int $id
 * @property int $product_id
 * @property int $current_quantity
 * @property string|null $date_expiry
 * @property int|null $purchaseDetails_id
 * @property string|null $extra_details
 * @property int $inventory_id
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
            [['product_id', 'current_quantity', 'inventory_id'], 'required'],
            [['product_id', 'current_quantity', 'purchaseDetails_id', 'inventory_id'], 'integer'],
            [['date_expiry'], 'safe'],
            [['extra_details'], 'string'],
            [['inventory_id'], 'exist', 'skipOnError' => true, 'targetClass' => Inventory::class, 'targetAttribute' => ['inventory_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product_id' => 'id']],
            [['purchaseDetails_id'], 'exist', 'skipOnError' => true, 'targetClass' => PurchaseDetails::class, 'targetAttribute' => ['purchaseDetails_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'current_quantity' => 'Current Quantity',
            'date_expiry' => 'Date Expiry',
            'purchaseDetails_id' => 'Purchase Details ID',
            'extra_details' => 'Extra Details',
            'inventory_id' => 'Inventory ID',
        ];
    }

    /**
     * Gets query for [[Inventory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInventory()
    {
        return $this->hasOne(Inventory::class, ['id' => 'inventory_id']);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }

    /**
     * Gets query for [[PurchaseDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseDetails()
    {
        return $this->hasOne(PurchaseDetails::class, ['id' => 'purchaseDetails_id']);
    }
}
