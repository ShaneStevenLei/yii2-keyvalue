<?php
use stevenlei\keyvalue\assets\KvAsset;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model stevenlei\keyvalue\models\KeyValue */
/* @var $form yii\widgets\ActiveForm */

KvAsset::register($this);
?>

<div class="key_value-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'key')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= $form->field($model, 'value')->textarea(['rows' => 20, 'id' => 'source']) ?>
        <pre id="result" class="fail" style="display: none; color: red;"></pre>
    </div>

    <?= $form->field($model, 'memo')->textarea(['rows' => 6, 'style' => 'resize:none']) ?>

    <?= $form->field($model, 'status')->dropDownList($model->getStatus(), ['prompt' => '状态']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', [
            'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<div id="template">
    <div id="template-content" style="display: none" class="btn-group" data-toggle="buttons">
        <label id="text-content" onclick="jsonsh.type_change(1)" class="btn btn-sm btn-success active">
            <input type="radio" name="options">Text
        </label>
        <label id="json-content" onclick="jsonsh.type_change(2)" class="btn btn-sm btn-success">
            <input type="radio" name="options">JSON
        </label>
    </div>
</div>

<script>
    <?php $this->beginBlock('js_import') ?>
    $(document).ready(function () {
        $('#source').after($('#template').html());
        $('#template-content').show();
        $("#source").setTextareaCount();
    });

    <?php
    $this->endBlock();
    $this->registerJs($this->blocks ['js_import'], \yii\web\View::POS_END);
    ?>
</script>
