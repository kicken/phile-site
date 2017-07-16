<?php
/**
 * @author PhileCMS
 * @link https://philecms.com
 * @license http://opensource.org/licenses/MIT
 * @package Phile
 */

require_once '../vendor/autoload.php';

$config = include '../config.php';
$core = \Phile\Core::bootstrap($config);
$core->handleRequest();
