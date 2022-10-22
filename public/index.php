<?php
/**
 * @author PhileCMS
 * @link https://philecms.com
 * @license http://opensource.org/licenses/MIT
 * @package Phile
 */

require_once '../vendor/autoload.php';
if (!file_exists('../var/cache')){
    mkdir('../var/cache', 0777, true);
}

$config = include '../config.php';
$core = \Phile\Core::bootstrap($config);
$core->handleRequest($_SERVER['REQUEST_URI']);
