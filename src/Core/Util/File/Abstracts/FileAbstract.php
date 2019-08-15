<?php
namespace Solid\Core\Util\File\Abstracts;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Solid\Core\Util\Directory\Classes\Directory;
use Solid\Core\Util\File\Constants\FileConstanst;
/**
 * Description of FileAbstract
 *
 * @author AdanC
 */
abstract class FileAbstract {

    private $dir;
    private $name;
    private $handler;
    private $data;

    public function __construct(Directory $dir, $name) {
        $this->dir = $dir;
        $this->name = $name;
    }
    public function open($mode){
        $this->handler = fopen($this->getfullPath(), $mode);
    }
    public function close():bool{
        return fclose($this->getHandler());
    }
    public function write($data){
        $this->open(FileConstanst::WRITE_AND_CREATE);
        $size = fwrite($this->getHandler(), $data);
        $this->close();
        return $size;
    }
    public function read(){
        $this->open(FileConstanst::READ_INIT);
        $this->data = fread($this->getHandler(), filesize($this->getfullPath()));
        $this->close();
        return $this->data;
    }
    public function getInfoFile(){
        return pathinfo($this->getfullPath());
    }
    
    public function getHandler(){
        return $this->handler;
    }

    public function getData(){
        return $this->data;
    }

    public function getDir(): Directory{
        return $this->dir;
    }
    
    public function getfullPath():string {
        return $this->dir->getPath().$this->getName();
    }
    
    public function getName(): string{
        return $this->name;
    }
}
