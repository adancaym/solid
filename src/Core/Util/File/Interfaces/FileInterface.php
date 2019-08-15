<?php
namespace Solid\Core\Util\File\Interfaces;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author AdanC
 */
interface FileInterface {
    public function open($mode);
    public function close();
    public function write($data);
    public function read();
}
