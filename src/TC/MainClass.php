<?php
namespace TC;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use Pocketmine\utils\Config;
use pocketmine\utils\TextFormat;

class MainClass extends PluginBase{
	public function onLoad(){
		$this->getLogger()->info("TeamCore has loaded.");
	}
	public function onEnable(){
		$this->getLogger()->info("TeamCore has been enabled.");
    }
	public function onDisable(){
		$this->getLogger()->info("Team core has been disabled.");
	}
	public function onCommand(CommandSender $sender, Command $command, $label, array $args){
		switch($command->getName()){
			case "team":
                    $teams = array('red', 'blue');
                    $team = array_rand($teams);
                    

                    
                    $this->getLogger()->info("A team has been joined.");
                    $sender->sendMessage("-----");
		    $sender->sendMessage("You are on the " . $teams[$team] . " team.");
                    $sender->sendMessage("-----");
           
                    // set nametag
                    $name = $sender->getName();
                    $sender->setNameTag("[ $teams[$team] ] $name");
				return true;
	    	default:
				return false;
		}
	}
	/**
	 * @param PlayerRespawnEvent $event
	 *
	 * @priority        NORMAL
	 * @ignoreCancelled false
	 */
	 // leave team on death
	public function onSpawn(PlayerRespawnEvent $event){
		
	}
}
