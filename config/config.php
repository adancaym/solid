<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Solid\App\Config\ConfigApp;

$configApp = new ConfigApp();

/*
*Router values
 */
$configApp->setDefaultNameSpaceApiRest('Solid\\App\\ApiRest');
$configApp->setDefaultController('HomeController');
$configApp->setDefaultMethod('index');

/*
 * DAtabase settings
 *  */

$configApp->setPathDatabaseConnections("../config/database/");
$configApp->setNameFileDatabaseConections('connection.json');