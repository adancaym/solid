<?php
namespace Solid\Core\Util\Directory\Classes;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Directory
 *
 * @author AdanC
 */
class Directory {

    private $path;
    
    public function __construct($path) {
        $this->path = $path;
    }
    public function getPath(){
        return $this->path;
    }
}
