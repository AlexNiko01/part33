<h1>
    Products data list:
</h1>
<?php

use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Html;


$form = ActiveForm::begin(); ?>
<?= $form->field($product, 'name')->textInput() ?>
<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>
<?php ActiveForm::end(); ?>
<?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'name',
        ['class' => 'yii\grid\ActionColumn', 'template' => '{update}{delete}{link}'],
        ['class' => 'yii\grid\SerialColumn']
    ],
]);
?>
