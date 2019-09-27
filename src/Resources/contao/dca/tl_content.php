<?php

/*
 * Copyright 2019 leiers//DESIGN.
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['content_icon'] = '{type_legend}, type, headline;'
        . 'font_awesome_icon;'
        . '{icon_text_legend:hide}, icon_position, icon_text;'
        . '{icon_link_legend:hide}, add_icon_url;'
        . '{template_legend:hide}, customTpl;'
        . '{expert_legend:hide}, cssID;'
        . '{invisible_legend:hide},invisible,start,stop;';

/**
 * Selectors
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'add_icon_url';

/**
 * Subpalettes
 */
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['add_icon_url'] = 'link_whole_box, icon_url, fullsize, titleText';

/**
 * Callbacks
 */
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = ['LeiersDesign\\ContaoFontAwesomeIcons\\Classes\\BackendHelper', 'generateBackendMessages'];

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['font_awesome_icon'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['font_awesome_icon'],
    'exclude' => true,
    'inputType' => 'select',
    'eval' => [
        'mandatory' => true,
        'tl_class' => 'w50',
        'chosen' => true,
        'submitOnChange' => true
    ],
    'options_callback' => [
        'LeiersDesign\\ContaoFontAwesomeIcons\\Classes\\BackendHelper', 'returnIconsAsArray'
    ],
    'sql' => "varchar(50) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_content']['fields']['icon_position'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['icon_position'],
    'default' => 'above',
    'exclude' => true,
    'inputType' => 'radioTable',
    'options' => [
        'above',
        'left',
        'right',
        'below'
    ],
    'eval' => [
        'cols' => 4, 'tl_class' => 'w50'
    ],
    'reference' => &$GLOBALS['TL_LANG']['MSC'],
    'sql' => "varchar(32) NOT NULL default ''"
];

/*$GLOBALS['TL_DCA']['tl_content']['fields']['icon_headline'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['icon_headline'],
    'exclude' => true,
    'search' => true,
    'inputType' => 'inputUnit',
    'options' => [
        'h1', 'h2', 'h3', 'h4', 'h5', 'h6'
    ],
    'eval' => [
        'maxlength' => 200,
        'tl_class' => 'w50 clr m12'
    ],
    'sql' => "varchar(255) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_content']['fields']['icon_headline_position'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['icon_headline_position'],
    'exclude' => true,
    'inputType' => 'select',
    'eval' => [
        'mandatory' => true,
        'tl_class' => 'w50 m12'
    ],
    'options' => [
        'above' => $GLOBALS['TL_LANG']['tl_content']['icon_headline_position']['options']['above'],
        'below' => $GLOBALS['TL_LANG']['tl_content']['icon_headline_position']['options']['below']
    ],
    'sql' => "varchar(50) NOT NULL default ''"
];*/

$GLOBALS['TL_DCA']['tl_content']['fields']['icon_text'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['icon_text'],
    'exclude' => true,
    'search' => true,
    'inputType' => 'textarea',
    'eval' => [
        'mandatory' => false,
        'rte' => 'tinyMCE',
        'tl_class' => 'clr m12'
    ],
    'explanation' => 'insertTags',
    'sql' => "mediumtext NULL"
];

$GLOBALS['TL_DCA']['tl_content']['fields']['add_icon_url'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['add_icon_url'],
    'default' => 0,
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => [
        'tl_class' => 'w50 m12',
        'submitOnChange' => true,
    ],
    'sql' => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_content']['fields']['link_whole_box'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['link_whole_box'],
    'default' => 0,
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => [
        'tl_class' => 'w50',
        'submitOnChange' => false,
    ],
    'sql' => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_content']['fields']['icon_url'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['icon_url'],
    'exclude' => true,
    'search' => true,
    'inputType' => 'text',
    'eval' => [
        'rgxp' => 'url',
        'decodeEntities' => true,
        'maxlength' => 255,
        'dcaPicker' => true,
        'tl_class' => 'w50 wizard clr',
        'mandatory' => true
    ],
    'sql' => "varchar(255) NOT NULL default ''"
];
