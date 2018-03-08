<?php
namespace stevenlei\keyvalue\assets;

use yii\web\AssetBundle;

class SelectAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@stevenlei/keyvalue/assets/dist';
    /**
     * @inheritdoc
     */
    public $css = [
        'select2/select2.css',
    ];
    /**
     * @inheritdoc
     */
    public $js = [
        'select2/select2.full.min.js',
        'select2/i18n/zh-CN.js',
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