<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Solid\Core\Database\Interfaces;

/**
 *
 * @author AdanC
 */
interface PdoInterface {

    function connect();
    function execute($sql);
    function row();
    function rows();
    function get($row=false);

    
}
