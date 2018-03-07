<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="row wrap search-options-content">
    <?php $form = ActiveForm::begin([
        'action'  => ['index'],
        'method'  => 'get',
        'options' => ['class' => 'form-inline'],
        'id'      => 'withhold-search-form',
    ]); ?>
    <div class="col-xs-12">
        <?= $form->field($model, 'key_value_key', ['template' => '{input}'])
            ->textInput([
                'placeholder' => 'Key',
                'class'       => 'input-sm input-s form-control',
            ])
            ->label('') ?>
        <?= $form->field($model, 'key_value_value', ['template' => '{input}'])
            ->textInput([
                'placeholder' => 'Value',
                'class'       => 'input-sm input-s form-control',
            ])
            ->label('') ?>
        <?= $form->field($model, 'key_value_memo', ['template' => '{input}'])
            ->textInput([
                'placeholder' => 'Memo',
                'class'       => 'input-sm input-s form-control',
            ])
            ->label('') ?>
        <?= $form->field($model, 'key_value_status', ['template' => '{input}'])
            ->dropDownList($model->getStatus(), [
                'class'  => 'input-sm input-s form-control',
                'prompt' => '状态',
            ])
            ->label('') ?>
    </div>

    <div class="col-xs-12">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-sm btn-primary search-btn']) ?>
        <?= Html::a('重置搜索条件', 'javascript:void(0);', ['class' => 'btn btn-sm btn-default reset-btn']); ?>
        <?= Html::a('创建KeyValue', ['create'], ['class' => 'btn btn-sm btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
