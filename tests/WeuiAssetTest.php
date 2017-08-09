<?php
/**
 * @link https://github.com/2amigos/yii2-dosamigos-asset-bundle
 * @copyright Copyright (c) 2013-2015 2amigOS! Consulting Group LLC
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

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
        $this->assertEquals(2, count($view->assetBundles));
        $this->assertArrayHasKey('zacksleo\\yii2\\assets\WeuiAsset', $view->assetBundles);
        $this->assertTrue($view->assetBundles['zacksleo\\yii2\\weui\assets\WeuiAsset'] instanceof AssetBundle);
        $content = $view->renderFile('@tests/data/views/layout.php');
        $this->assertContains('jquery.js', $content);
        $this->assertContains('dosamigos.js', $content);
    }
}
