<?php

namespace tests;

use zacksleo\yii2\weui\assets\WeuiAsset;
use Yii;
use yii\web\AssetBundle;

/**
 * WeuiAssetTest
 */
class WeuiAssetTest extends TestCase
{
    public function testAsset()
    {
        $view = $this->getView();
        $this->assertEmpty($view->assetBundles);
        WeuiAsset::register($view);
        $this->assertEquals(1, count($view->assetBundles));
        $this->assertArrayHasKey('zacksleo\\yii2\\weui\\assets\\WeuiAsset', $view->assetBundles);
        $this->assertTrue($view->assetBundles['zacksleo\\yii2\\weui\\assets\\WeuiAsset'] instanceof AssetBundle);
        $content = $view->renderFile('@tests/data/views/layout.php');
        $this->assertContains('weui.min.css', $content);
    }
}
