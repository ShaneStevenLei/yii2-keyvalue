<?php
namespace stevenlei\keyvalue\assets;

use yii\web\AssetBundle;

class KvAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@stevenlei/keyvalue/assets/dist';
    /**
     * @inheritdoc
     */
    public $js = [
        'layer/layer.js',
        'jsonFormat.js',
        'auto-line-number.js',
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