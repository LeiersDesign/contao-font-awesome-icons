<?php

namespace LeiersDesign\ContaoSlider\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use LeiersDesign\ContaoSlider\ContaoSliderBundle;

class Plugin implements BundlePluginInterface {

    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser) {
        return [
                    BundleConfig::create(ContaoSliderBundle::class)
                    ->setLoadAfter([ContaoCoreBundle::class])
                    ->setReplace(['contao-slider']),
        ];
    }

}
