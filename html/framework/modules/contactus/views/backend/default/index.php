<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\contactus\models\ContactusQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('system', 'Contactus');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">

    <div class="card-header">
        <h4 class="card-title"><?= Html::encode($this->title) ?></h4>
    </div>

    <div class="card-content">

        <?= GridView::widget([
            'tableOptions' => ['class' => 'table'],
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'name',
                'contacts',
                'country',
                'city',
                [
                    'attribute' => 'hasFile',
                    'filter' => $searchModel::getFileList(),
                    'value' => function (\app\modules\contactus\models\Contactus $model) {
                        return $model->getFile();
                    },
                ],
                [
                    'class' => \krok\extend\grid\DatePickerColumn::class,
                    'attribute' => 'createdAt',
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {delete}',
                ],
            ],
        ]); ?>

    </div>
</div>
