<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use frontend\models\Disposition;
use common\models\User;
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

           // 'id',
            // 'user.username',
            [ 'format' => 'html', 
            'label' => 'User',
            'attribute'=>'user_id', 
            'filter'=>ArrayHelper::map(User::find()->all(),'id','username'), //with custome sarch
            'value'=>'user.username'
            ],
            // 'disposition.name',
            [ 'format' => 'html', 
            'label' => 'Disposition',
            'attribute'=>'disposition_id', 
            'filter'=>ArrayHelper::map(Disposition::find()->all(),'id','name'), //with custome sarch
            'value'=>'disposition.name'
            ],
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
