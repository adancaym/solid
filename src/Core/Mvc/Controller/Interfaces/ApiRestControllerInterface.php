<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Solid\Core\Mvc\Controller\Interfaces;

/**
 *
 * @author AdanC
 */
interface ApiRestControllerInterface {

    public function index();
    public function store();
    public function delete();

}
