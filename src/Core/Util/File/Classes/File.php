<?php
namespace Solid\Core\Util\File\Classes;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Solid\Core\Util\File\Abstracts\FileAbstract;
use Solid\Core\Util\File\Interfaces\FileInterface;
use Solid\Core\Util\Directory\Classes\Directory;
/**
 * Description of File
 *
 * @author AdanC
 */
class File extends FileAbstract implements FileInterface {

    public function __construct(Directory $dir, $name) {
        parent::__construct($dir, $name);
    }
    
}
