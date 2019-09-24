<?php

/*
 * Copyright 2019 leiers//DESIGN.
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


$GLOBALS['TL_DCA']['tl_contao_slider'] = [
    // Config
    'config' => [
        'dataContainer' => 'Table',
        'sql' => [
            'keys' => [
                'id' => 'primary'
            ]
        ],
    /* 'onsubmit_callback' => [
      ['tl_contao_slider', 'generateMapAlias'],
      ],
      'onload_callback' => [
      ['tl_contao_slider', 'showJsLibraryHint'],
      ], */
    ],
    // List
    'list' => [
        'sorting' => [
            'mode' => 1,
            'fields' => ['title'],
            'flag' => 1,
            'panelLayout' => 'search, limit; filter;'
        ],
        'label' => [
            'fields' => ['title'],
            'format' => '%s'
        ],
        'global_operations' => [
            'all' => [
                'label' => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href' => 'act=select',
                'class' => 'header_edit_all',
                'attributes' => 'onclick="Backend.getScrollOffset()" accesskey="e"'
            ]
        ],
        'operations' => [
            'edit' => [
                'label' => &$GLOBALS['TL_LANG']['tl_contao_slider']['edit'],
                'href' => 'act=edit',
                'icon' => 'header.svg'
            ],
            'delete' => [
                'label' => &$GLOBALS['TL_LANG']['tl_contao_slider']['delete'],
                'href' => 'act=delete',
                'icon' => 'delete.gif',
                'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
            ],
            'copy' => [
                'label' => &$GLOBALS['TL_LANG']['tl_contao_slider']['copy'],
                'href' => 'act=copy',
                'icon' => 'copy.gif'
            ],
            'show' => [
                'label' => &$GLOBALS['TL_LANG']['tl_contao_slider']['show'],
                'href' => 'act=show',
                'icon' => 'show.gif',
            ],
        ]
    ],
    // Palettes
    'palettes' => [
        '__selector__' => ['controls_zoom'],
        'default' => 'title, alias;'
        . 'center_address, center_country, center;'
        . 'map_zoom;'
        . 'map_size_width, map_size_height;'
        . '{controls_legend}, controls_zoom;'
        . 'fit_markers;'
        . '{layout_legend}, map_layout;'
    ],
    'subpalettes' => [
        'controls_zoom' => 'controls_zoom_position'
    ],
    // Fields
    'fields' => [
        'id' => [
            'sql' => "int(10) unsigned NOT NULL auto_increment"
        ],
        'tstamp' => [
            'sql' => "int(10) unsigned NOT NULL default '0'"
        ],
        'title' => [
            'label' => &$GLOBALS['TL_LANG']['tl_contao_slider']['title'],
            'inputType' => 'text',
            'exclude' => true,
            'sorting' => true,
            'flag' => 1,
            'search' => true,
            'eval' => [
                'mandatory' => true,
                'maxlength' => 100,
                'tl_class' => 'w50',
            ],
            'sql' => "varchar(100) NOT NULL default ''"
        ],
        'alias' => [
            'label' => &$GLOBALS['TL_LANG']['tl_contao_slider']['alias'],
            'inputType' => 'text',
            'exclude' => true,
            'search' => false,
            'eval' => [
                'unique' => true,
                'maxlength' => 128,
                'tl_class' => 'w50',
                'disabled' => false,
                'doNotCopy' => true,
                'rgxp' => 'alias'
            ],
            'sql' => "varchar(128) NOT NULL default ''"
        ],
    ]
];
