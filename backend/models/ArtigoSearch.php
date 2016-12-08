<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Artigo;

/**
 * ArtigoSearch represents the model behind the search form about `common\models\Artigo`.
 */
class ArtigoSearch extends Artigo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idartigo'], 'integer'],
            [['categoria', 'nome', 'conteudo'], 'safe'],
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
        $query = Artigo::find();

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
            'idartigo' => $this->idartigo,
        ]);

        $query->andFilterWhere(['like', 'categoria', $this->categoria])
            ->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'conteudo', $this->conteudo]);

        return $dataProvider;
    }
}
