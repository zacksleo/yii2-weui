<?php

namespace zacksleo\yii2\weui\assets;

use yii\web\AssetBundle;

class WeuiAsset extends AssetBundle
{
    public $sourcePath = '@npm/weui';

    public $publishOptions = [
        'only' => [
            'dist/style/*'
        ]
    ];

    public $css = [
        'dist/style/weui.min.css'
    ];
}
