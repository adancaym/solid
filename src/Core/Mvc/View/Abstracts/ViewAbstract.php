<?php
namespace Solid\Core\Mvc\View\Abstracts;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Solid\Core\Util\Directory\Classes\Directory;
/**
 * Description of ViewAbstract
 *
 * @author AdanC
 */
abstract class ViewAbstract {

    private $directory;
    private $html;


    public function __construct(Directory $directory) {
        $this->directory= $directory;
    }
    
    function parse($tags) {
        if(is_array($tags) && count($tags) > 0) {
            foreach($tags as $tag => $data) {
              $this->html = str_replace('{{'.$tag.'}}', $data, $this->html);
            }
        }
        return $this;
    }
    
    public function getHtml() {
        return $this->html;
    }

        
    public function getView($name){
        $this->html = file_get_contents($this->getDirectory()->getPath().$name);
        return $this;
    }
    
    private function getDirectory():Directory{
        return $this->directory;
    }
}
