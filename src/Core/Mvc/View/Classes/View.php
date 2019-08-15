<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Solid\Core\Mvc\View\Classes;
use Solid\Core\Mvc\View\Abstracts\ViewAbstract;
use Solid\Core\Util\Directory\Classes\Directory;
/**
 * Description of View
 *
 * @author AdanC
 */
class View extends ViewAbstract{

    public function __construct(Directory $directory) {
        parent::__construct($directory);
    }
}
