<?php

namespace zacksleo\yii2\weui\assets;

use yii\web\AssetBundle;

class WeuiJsAsset extends AssetBundle
{
    public $sourcePath = '@npm/weui.js';

    public $publishOptions = [
        'only' => [
            'dist/*'
        ]
    ];

    public $js = [
        'dist/weui.min.js'
    ];
    public $depends = [
        'zacksleo\yii2\weui\assets\WeuiAsset'
    ];
}
