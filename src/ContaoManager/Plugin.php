<?php

namespace LeiersDesign\ContaoFontAwesomeIcons\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use LeiersDesign\ContaoFontAwesomeIcons\ContaoFontAwesomeIconsBundle;

class Plugin implements BundlePluginInterface {

    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser) {
        return [
                    BundleConfig::create(ContaoFontAwesomeIconsBundle::class)
                    ->setLoadAfter([ContaoCoreBundle::class])
                    ->setReplace(['contao-slider']),
        ];
    }

}
