<?php

/*
 * Copyright 2019 leiers//DESIGN.
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LeiersDesign\ContaoFontAwesomeIcons\Classes;

use Contao\DataContainer;
use Contao\Message;

/**
 * Description of BackendHelper
 *
 * @author LEIERS//design <info@leiers-design.de>
 */
class BackendHelper {
    
    private $dbCon;

    public function __construct() {
        $this->dbCon = \Contao\System::getContainer()->get('database_connection');
    }
    
    
    public function generateBackendMessages(DataContainer $dc){
        
        $arrContentElement = $this->dbCon->fetchAssoc("SELECT * FROM tl_content WHERE id = ?", array($dc->id));
        
        if(!$arrContentElement) {
            return;
        }
        
        if($arrContentElement['type'] = 'content_icon' && $arrContentElement['fullsize'] == 1) {
            Message::addInfo(sprintf($GLOBALS['TL_LANG']['tl_content']['icon_link']['includeTemplates'], 'moo_mediabox', 'j_colorbox'));
        }
        
        
    }

    public function returnIconsAsArray() {
        $csvFile = $_SERVER['DOCUMENT_ROOT'] . '/bundles/contaofontawesomeicons/data/fa-icons.csv';
        
        if(!file_exists($csvFile)) {
            throw new \Exception(sprintf($GLOBALS['TL_LANG']['MSC']['contao_font_awesome_icons']['errors']['file_not_found'], $csvFile));
        }
        
        $arrCSV = array_map('str_getcsv', file($csvFile));
        
        $arrIcons = [];
        foreach($arrCSV as $key => $value) {
            /**
             * Remove "" marks
             */
            $value = str_replace('"', '', $value[0]);
            
            /**
             * Remove class "fa"
             */
            $value = str_replace('fa ', '', $value);
            
            /**
             * Split csv string into array
             */
            $tempArray = preg_split("[;]", $value);
            
            /**
             * Remove last (empty) element from array
             */
            array_pop($tempArray);
            
            /**
             * Add "'" to unicode string
             */
            $tempArray[2] .= ';';
            
            $arrIcons[$tempArray[1]] = $tempArray[2] . ' ' . $tempArray[0];
        }

        return $arrIcons;
    }

}
