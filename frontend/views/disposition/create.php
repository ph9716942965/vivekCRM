<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Disposition */

$this->title = 'Create Disposition';
$this->params['breadcrumbs'][] = ['label' => 'Dispositions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="disposition-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
