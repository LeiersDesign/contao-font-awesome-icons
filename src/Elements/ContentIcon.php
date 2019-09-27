<?php

/*
 * Copyright 2019 leiers//DESIGN.
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LeiersDesign\ContaoFontAwesomeIcons\Elements;

use Contao\FilesModel;

/**
 * Class ContentIcon
 *
 * @author LEIERS//design <info@leiers-design.de>
 */
class ContentIcon extends \ContentElement {

    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'ce_content_icon';

    /**
     * Compile the content element
     */
    protected function compile() {
        if (TL_MODE == 'BE') {
            $this->genBeOutput();
        } else {
            $this->genFeOutput();
        }
    }

    /**
     * @return string
     */
    private function genBeOutput() {
        $this->strTemplate = 'be_wildcard';
        $this->Template = new \BackendTemplate($this->strTemplate);
        $this->Template->title = $this->headline;
        $this->Template->wildcard = "### Font Awesome icon ###";
    }

    /**
     * @return string
     */
    private function genFeOutput() {

        $this->Template->icon = sprintf('<i class="fa %s"></i>', $this->font_awesome_icon);
        $this->Template->link_open = sprintf('<a href="%s"%s>', $this->icon_url, $this->returnLinkArguments($this->icon_url, $this->fullsize));
        $this->Template->link = $this->icon_url;
        $this->Template->link_close = '</a>';
        $this->Template->icon_text = $this->generateIconText($this->icon_text, $this->icon_position);
    }
    
    /**
     * 
     * @param string $strText
     * @param string $strPos
     * @return string
     */
    private function generateIconText($strText, $strPos) {
        switch ($strPos) {
            case 'above':
            case 'below':
                return sprintf('<div>%s</div>', $strText);

            default:
                return sprintf('<span class="icon_inline">%s</span>', $strText);
        }
    }

    /**
     * 
     * @param string $strInsertTag
     * @return string
     */
    private function getLinkType($strInsertTag) {
        /**
         * Split inserttags into array
         */
        $urlType = explode("::", str_replace(['{{', '}}'], ['', ''], $strInsertTag));

        switch ($urlType[0]) {
            case 'file':
                $uuid = $urlType[1];
                $objFile = \FilesModel::findByUuid($uuid);
                if (strpos(\Config::get('validImageTypes'), $objFile->extension) !== false) {
                    return 'image';
                }
                return 'pdf';

            default:
                return 'url';
        }
    }

    /**
     * 
     * @param string $strLink
     * @return string
     */
    private function returnLinkArguments($strLink, $blnNewWindow) {
        $linkType = $this->getLinkType($strLink);

        switch ($linkType) {
            case 'image':
                return ($blnNewWindow ? ' class="cboxElement" data-lightbox' : '');
            case 'pdf':
                return ($blnNewWindow ? ' target="_blank"' : '');
            default:
                return ($blnNewWindow ? ' target="_blank"' : '');
        }
    }

}