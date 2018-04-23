<h1>
    Edit product:
</h1>
<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;


$form = ActiveForm::begin(); ?>
<?= $form->field($product, 'name')->textInput(); ?>
<?= $form->field($product, 'id')->hiddenInput()->label(false); ?>
<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>
<?php ActiveForm::end(); ?>

