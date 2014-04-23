<?php

namespace Phile\Plugin\Phile\PhpFastCache;

/**
 * Class Plugin
 * Default Phile cache engine
 *
 * @author  Frank Nägler
 * @link    https://philecms.com
 * @license http://opensource.org/licenses/MIT
 * @package Phile\Plugin\Phile\PhpFastCache
 */
class Plugin extends \Phile\Plugin\AbstractPlugin implements \Phile\Gateway\EventObserverInterface {
	public function __construct() {
		\Phile\Event::registerEvent('plugins_loaded', $this);
	}

	public function on($eventKey, $data = null) {
		// check $eventKey for which you have registered
		if ($eventKey == 'plugins_loaded') {
			require_once(\Phile\Utility::resolveFilePath('MOD:phile/phpFastCache/lib/phpfastcache/phpfastcache.php'));

			\phpFastCache::setup($this->settings);
			$cache = phpFastCache();
			\Phile\ServiceLocator::registerService('Phile_Cache', new \Phile\Plugin\Phile\PhpFastCache\PhpFastCache($cache));
		}
	}
}
