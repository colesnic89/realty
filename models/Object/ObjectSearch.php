<?php

namespace app\models\Object;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Object\Object;

/**
 * ObjectSearch represents the model behind the search form of `app\models\Object\Object`.
 */
class ObjectSearch extends Object
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CreatedBy'], 'integer'],
            [['Price'], 'number'],
            [['Title', 'CreatedAt', 'Status'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $this->load($params);
        
        $query = Object::find()->with(['createdBy', 'objectCategories.category']);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        // grid filtering conditions
        $query->andFilterWhere([
            'Price' => $this->Price,
            'CreatedBy' => $this->CreatedBy,
            'Status' => $this->Status,
        ]);
        
        $query->andFilterWhere(['like', 'Title', $this->Title]);
        
        if ($this->CreatedAt) {
            $query->andWhere(['DATE(CreatedAt)' => date('Y-m-d', strtotime($this->CreatedAt))]);
        }

        return $dataProvider;
    }
}
