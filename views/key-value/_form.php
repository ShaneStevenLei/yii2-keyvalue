<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\KeyValue */
/* @var $form yii\widgets\ActiveForm */

$this->registerJsFile('/js/jsonFormat.js', ['depends' => 'backend\assets\AdminLteAsset']);
$this->registerJsFile('/js/auto-line-number.js', ['depends' => 'backend\assets\AdminLteAsset']);
?>

<div class="key_value-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'key_value_key')->textInput(['maxlength' => true]) ?>

    <div>
        <?= $form->field($model, 'key_value_value')->textarea(['rows' => 20, 'id' => 'source']) ?>
        <pre id="result" class="fail" style="display: none; color: red;"></pre>
    </div>

    <?= $form->field($model, 'key_value_memo')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'key_value_status')->dropDownList(
        ['active' => 'Active', 'inactive' => 'Inactive',],
        ['prompt' => '']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', [
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

        <?php if (!in_array($model->key_value_key, ['hnbank_paydayloan', 'hn_bank'])): //海南私钥不需要自动转义?>
            <label id="json-content" onclick="jsonsh.type_change(2)" class="btn btn-sm btn-success">
                <input id="json-content-btn" type="radio" name="options">JSON
            </label>
        <?php endif; ?>
    </div>
</div>

<script>
    <?php $this->beginBlock('js_import') ?>
    $(document).ready(function () {
        $('#source').after($('#template').html());
        $('#template-content').show();
    });

    $("#source").setTextareaCount();
    <?php
    $this->endBlock();
    $this->registerJs($this->blocks ['js_import'], \yii\web\View::POS_END);
    ?>
</script>
