<?php

namespace app\modules\contactus\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ContactusSearch represents the model behind the search form about `app\modules\contactus\models\Contactus`.
 */
class ContactusSearch extends Contactus
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'contacts', 'country', 'city', 'hasFile', 'createdAt'], 'safe'],
            [['hasFile'], 'default', 'value' => self::FILE_UNDEFINED],
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
        $query = Contactus::find();

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
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'contacts', $this->contacts])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'city', $this->city])
            //->andFilterWhere(['like', 'file', $this->file])
            ->andFilterWhere(['like', 'createdAt', $this->createdAt]);

        if ($this->hasFile == self::FILE_YES) {
            $query->andWhere(['is not', 'file', null]);
        } elseif ($this->hasFile == self::FILE_NO) {
            $query->andWhere(['is ', 'file', null]);
        }

        return $dataProvider;
    }
}
