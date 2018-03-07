<?php
namespace stevenlei\keyvalue;

use yii\web\AssetBundle;

class AutocompleteAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@mdm/admin/assets';
    /**
     * @inheritdoc
     */
    public $js = [
        'layer/layer.js',
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
