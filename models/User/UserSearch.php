<?php

namespace app\models\User;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User\User;

/**
 * UserSearch represents the model behind the search form of `app\models\User\User`.
 */
class UserSearch extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID'], 'integer'],
            [['Email', 'Password', 'NickName', 'FirstName', 'LastName', 'RegistrationDate', 'Type', 'Status'], 'safe'],
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
        $query = User::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        // grid filtering conditions
        $query->andFilterWhere([
            'Type' => $this->Type,
            'Status' => $this->Status,
        ]);
        
        if ($this->RegistrationDate)
        {
            $query->andWhere(['DATE(RegistrationDate)' => date('Y-m-d', strtotime($this->RegistrationDate))]);
        }

        $query->andFilterWhere(['like', 'Email', $this->Email])
            ->andFilterWhere(['like', 'Password', $this->Password])
            ->andFilterWhere(['like', 'NickName', $this->NickName])
            ->andFilterWhere(['like', 'FirstName', $this->FirstName])
            ->andFilterWhere(['like', 'LastName', $this->LastName]);

        return $dataProvider;
    }
}
