<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\contactus\models\NotificationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('system', 'Notifications');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">

    <div class="card-header">
        <h4 class="card-title"><?= Html::encode($this->title) ?></h4>
    </div>

    <div class="card-header">
        <p>
            <?= Html::a(Yii::t('system', 'Create'), ['create'], [
                'class' => 'btn btn-success',
            ]) ?>
        </p>
    </div>

    <div class="card-content">

        <?= GridView::widget([
            'tableOptions' => ['class' => 'table'],
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'email:email',
                [
                    'attribute' => 'banned',
                    'filter' => $searchModel::getBannedList(),
                    'value' => function (\app\modules\contactus\models\Notifications $model) {
                        return $model->getBanned();
                    },
                ],

                [
                    'class' => \krok\extend\grid\DatePickerColumn::class,
                    'attribute' => 'createdAt',
                ],
                [
                    'class' => \krok\extend\grid\DatePickerColumn::class,
                    'attribute' => 'updatedAt',
                ],

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>

    </div>
</div>
