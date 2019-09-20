<?php

namespace common\models\complex;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * Class ComplexSearch
 * @package common\models\complex
 */
class ComplexSearch extends Complex
{
    public $createdBy;
    public $updatedBy;

    public function rules()
    {
        return [
            // integer rules
            [['complex_id'], 'integer'],
            // string rules
            [['name', 'address', 'createdBy', 'updatedBy'], 'string'],
            // safe rules
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Complex::find()->notDeleted();

        $query->joinWith(['createdBy cb', 'updatedBy ub']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 25,
            ],
            'sort' => [
                'defaultOrder' => [
                    'complex_id' => SORT_DESC
                ],
            ]
        ]);

        $dataProvider->sort->attributes['createdBy'] = [
            'asc' => ['cb.username' => SORT_ASC],
            'desc' => ['cb.username' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['updatedBy'] = [
            'asc' => ['ub.username' => SORT_ASC],
            'desc' => ['ub.username' => SORT_DESC],
        ];

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'complex_id' => $this->complex_id,
        ]);

        $expressionCreatedAt = new \yii\db\Expression('(complex.created_at::text)');
        $expressionUpdatedAt = new \yii\db\Expression('(complex.updated_at::text)');

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', $expressionCreatedAt , $this->created_at])
            ->andFilterWhere(['like', $expressionUpdatedAt, $this->updated_at])
            ->andFilterWhere(['like', 'cb.username', $this->createdBy])
            ->andFilterWhere(['like', 'ub.username', $this->updatedBy]);

        return $dataProvider;
    }
}
