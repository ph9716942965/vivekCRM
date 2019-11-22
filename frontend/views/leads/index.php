<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\LeadsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Leads';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leads-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Leads', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'disposition_id',
            'name:ntext',
            'phone',
            //'email:ntext',
            //'problem:ntext',
            //'next_calling_after',
            //'address:ntext',
            //'city:ntext',
            //'state:ntext',
            //'pincode',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
