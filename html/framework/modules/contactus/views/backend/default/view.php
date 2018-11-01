<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\contactus\models\Contactus */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('system', 'Contactus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">

    <div class="card-header">
        <h4 class="card-title"><?= Html::encode($this->title) ?></h4>
    </div>

    <div class="card-content">

        <?= DetailView::widget([
            'options' => ['class' => 'table'],
            'model' => $model,
            'attributes' => [
                'name',
                'contacts:ntext',
                'message:ntext',
                'country',
                'city',
                'createdAt:date',
                [
                    'attribute' => 'file',
                    'visible' => $model->hasFile(),
                    'value' => Html::a('Download file', '/uploads' . $model->file->getSrc()),
                    'format' => 'raw',
                ],
            ],
        ]) ?>

    </div>
</div>
