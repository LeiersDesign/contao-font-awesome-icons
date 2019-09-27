<?php

/* 
 * Copyright 2019 leiers//DESIGN.
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Load font awesome css
 */
if(empty($GLOBALS['TL_CSS']['font_awesome'])) {
    $GLOBALS['TL_CSS']['font_awesome'] = 'bundles/contaofontawesomeicons/css/font-awesome.min.css';
}

if(TL_MODE == 'BE') {
    $GLOBALS['TL_CSS']['fa_backend'] = 'bundles/contaofontawesomeicons/css/fa_backend.css';
}

if(TL_MODE == 'FE' && empty($GLOBALS['TL_CSS']['fa_frontend'])) {
    $GLOBALS['TL_CSS']['fa_frontend'] = 'bundles/contaofontawesomeicons/css/fa_frontend.css';
}


/**
 * Content element
 */
$GLOBALS['TL_CTE']['font_awesome_icons']['content_icon'] = 'LeiersDesign\\ContaoFontAwesomeIcons\\Elements\\ContentIcon';

