<?php

/*
 * Copyright 2019 leiers//DESIGN.
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LeiersDesign\ContaoSlider\Widget;

/**
 * Class ListWidget
 */
class ListWidget extends \Widget {

    /**
     * @var bool
     */
    protected $blnSubmitInput = true;

    /**
     * @var string
     */
    protected $strTemplate = 'be_widget';

    /**
     * @param mixed $varInput
     * @return mixed
     */
    protected function validator($varInput) {
        return parent::validator($varInput);
    }

    /**
     * @return string
     */
    public function generate() {
        
        // Textfeld
        $field = sprintf(
                '<input type="text" name="%s" id="ctrl_%s" value="%s">',
                $this->strName,
                $this->strId,
                $this->varValue
        );
        
        die();
        return $field;
    }

}
