<h1>
    Products data list:
</h1>
<?php

use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<?php //$form = ActiveForm::begin(); ?>
<? //= $form->field($product, 'name')->textInput() ?>
<?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
]);
?>
<!--<div class="form-group">-->
<!--    --><? //= Html::submitButton('Save', ['class' => 'btn-success']) ?>
<!--</div>-->
<?php //ActiveForm::end(); ?>