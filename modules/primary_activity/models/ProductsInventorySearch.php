<?php

namespace app\modules\primary_activity\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProductsInventory;

/**
 * ProductsInventorySearch represents the model behind the search form of `app\models\ProductsInventory`.
 */
class ProductsInventorySearch extends ProductsInventory
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'product_id', 'current_quantity', 'purchaseDetails_id', 'inventory_id'], 'integer'],
            [['date_expiry', 'extra_details'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ProductsInventory::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'product_id' => $this->product_id,
            'current_quantity' => $this->current_quantity,
            'date_expiry' => $this->date_expiry,
            'purchaseDetails_id' => $this->purchaseDetails_id,
            'inventory_id' => $this->inventory_id,
        ]);

        $query->andFilterWhere(['like', 'extra_details', $this->extra_details]);

        return $dataProvider;
    }
}
