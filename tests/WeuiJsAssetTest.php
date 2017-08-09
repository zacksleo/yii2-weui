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
        $this->assertEquals(2, count($view->assetBundles));
        $this->assertArrayHasKey('zacksleo\\yii2\\assets\WeuiJsAsset', $view->assetBundles);
        $this->assertTrue($view->assetBundles['zacksleo\\yii2\\weui\assets\WeuiJsAsset'] instanceof AssetBundle);
        $content = $view->renderFile('@tests/data/views/layout.php');
        $this->assertContains('weui.min.js', $content);
    }
}
