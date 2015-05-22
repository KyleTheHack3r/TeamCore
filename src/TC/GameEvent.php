<?php 

namespace TC;

use pocketmine\event\plugin\PluginEvent;
use pocketmine\plugin\Plugin;


abstract class GameEvent extends PluginEvent{
	/**
	 * @param $plugin
	 */
	public function __construct(Plugin $plugin){
		parent::__construct($plugin);
	}
}
?>
