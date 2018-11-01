<?php

namespace app\modules\contactus\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * NotificationsSearch represents the model behind the search form about `app\modules\contactus\models\Notifications`.
 */
class NotificationsSearch extends Notifications
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['email', 'banned', 'createdAt', 'updatedAt'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
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
        $query = Notifications::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'banned', $this->banned])
            ->andFilterWhere(['like', 'createdAt', $this->createdAt])
            ->andFilterWhere(['like', 'updatedAt', $this->updatedAt]);

        return $dataProvider;
    }
}
