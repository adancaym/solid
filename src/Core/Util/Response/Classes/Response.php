<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Solid\Core\Util\Response\Classes;
use \Solid\Core\Util\Response\Abstracts\ResponseAbstract;
use Solid\Core\Util\Request\Abstracts\RequestAbstract;
/**
 * Description of Response
 *
 * @author AdanC
 */
class Response extends ResponseAbstract{
    
    public function __construct(RequestAbstract $request) {
        parent::__construct($request);
    }
}
