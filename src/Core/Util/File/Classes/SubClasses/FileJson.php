<?php
namespace Solid\Core\Util\File\Classes\SubClasses;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Solid\Core\Util\File\Classes\File;
/**
 * Description of FileJson
 *
 * @author AdanC
 */
class FileJson extends File{
    
    public function __construct(\Solid\Core\Util\Directory\Classes\Directory $dir, $name) {
        parent::__construct($dir, $name);
    }
    
    public function getData() {
        return json_decode($this->read());
    }
    public function write($data) {
        $data = json_encode($data,JSON_PRETTY_PRINT);
        return parent::write($data);
    }
}
