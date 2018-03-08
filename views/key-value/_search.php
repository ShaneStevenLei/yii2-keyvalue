<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $model stevenlei\keyvalue\models\KeyValueSearch */
?>

<div class="row wrap search-options-content">
    <?php $form = ActiveForm::begin([
        'action'  => ['index'],
        'method'  => 'get',
        'options' => ['class' => 'form-inline search-form'],
        'id'      => 'kev-search-form',
    ]); ?>
    <div class="col-xs-12">
        <?= $form->field($model, 'key', ['template' => '{input}'])
            ->textInput([
                'placeholder' => '键',
                'class'       => 'input-sm input-s form-control',
            ])
            ->label(false) ?>
        <?= $form->field($model, 'value', ['template' => '{input}'])
            ->textInput([
                'placeholder' => '值',
                'class'       => 'input-sm input-s form-control',
            ])
            ->label(false) ?>
        <?= $form->field($model, 'memo', ['template' => '{input}'])
            ->textInput([
                'placeholder' => '备注',
                'class'       => 'input-sm input-s form-control',
            ])
            ->label(false) ?>
        <?= $form->field($model, 'status', ['template' => '{input}'])
            ->dropDownList($model->getStatus(), [
                'class'  => 'input-sm input-s form-control',
                'prompt' => '状态',
            ])
            ->label(false) ?>
    </div>

    <div class="col-xs-12">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-sm btn-primary search-btn']) ?>
        <?= Html::a('重置', 'javascript:void(0);', ['class' => 'btn btn-sm btn-default reset-btn']); ?>
        <?= Html::a('创建', ['create'], ['class' => 'btn btn-sm btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
