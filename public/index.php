<?php
/**
 * @author PhileCMS
 * @link https://philecms.com
 * @license http://opensource.org/licenses/MIT
 * @package Phile
 */

require_once '../vendor/autoload.php';

try {
    $config = include '../config.php';
    $core = \Phile\Core::bootstrap($config);
    $core->handleRequest();
} catch (\Exception $e) {
    if (\Phile\Core\ServiceLocator::hasService('Phile_ErrorHandler')) {

        /** @var \Phile\ServiceLocator\ErrorHandlerInterface $errorHandler */
        $errorHandler = \Phile\Core\ServiceLocator::getService(
            'Phile_ErrorHandler'
        );
        $errorHandler->handleException($e);
    }
}
