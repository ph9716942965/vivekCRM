<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Disposition;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Leads */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="leads-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'disposition_id')->DropdownList(ArrayHelper::map(Disposition::find()->all(),'id','name'),['prompt'=>'Disposition']) ?>

    <?= $form->field($model, 'name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'phone')->textInput() ?>

    <?= $form->field($model, 'email')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'problem')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'next_calling_after')->widget(DateTimePicker::classname(), [
	'options' => ['placeholder' => 'Enter Next Calling time ...'],
	'pluginOptions' => [
		'autoclose' => true
	]
]); ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'city')->textInput() ?>

    <?= $form->field($model, 'state')->textInput() ?>

    <?= $form->field($model, 'pincode')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
