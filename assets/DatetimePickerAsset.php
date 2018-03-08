<?php
namespace stevenlei\keyvalue\assets;

use yii\web\AssetBundle;

class DatetimePickerAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@stevenlei/keyvalue/assets/dist';
    /**
     * @inheritdoc
     */
    public $css = [
        'datepicker/css/bootstrap-datetimepicker.min.css',
    ];
    /**
     * @inheritdoc
     */
    public $js = [
        'datepicker/js/bootstrap-datetimepicker.min.js',
        'datepicker/js/locales/bootstrap-datetimepicker.zh-CN.js',
    ];
    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}