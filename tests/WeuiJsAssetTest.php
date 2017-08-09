<?php

namespace tests;

use zacksleo\yii2\weui\assets\WeuiJsAsset;
use Yii;
use yii\web\AssetBundle;

/**
 * WeuiAssetTest
 */
class WeuiJsAssetTest extends TestCase
{
    public function testAsset()
    {
        $view = $this->getView();
        $this->assertEmpty($view->assetBundles);
        WeuiJsAsset::register($view);
        $asset = new WeuiJsAsset();
        $this->assertEquals('@npm/weui.js', $asset->sourcePath);
        $this->assertArrayHasKey('only', $asset->publishOptions);
        $this->assertAttributeEquals(['dist/weui.min.js'], 'js', $asset);
        $this->assertAttributeEquals(['zacksleo\yii2\weui\assets\WeuiAsset'], 'depends', $asset);
        $this->assertEquals(2, count($view->assetBundles));
        $this->assertArrayHasKey('zacksleo\\yii2\\weui\\assets\\WeuiJsAsset', $view->assetBundles);
        $this->assertArrayHasKey('zacksleo\\yii2\\weui\\assets\\WeuiAsset', $view->assetBundles);
        $this->assertTrue($view->assetBundles['zacksleo\\yii2\\weui\\assets\\WeuiJsAsset'] instanceof AssetBundle);
        $content = $view->renderFile('@tests/data/views/layout.php');
        $this->assertContains('weui.min.js', $content);
        $this->assertContains('weui.min.css', $content);
    }
}
