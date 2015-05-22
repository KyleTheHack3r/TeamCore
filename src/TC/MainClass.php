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

                    /*

gameStatus 0 = error / not defined (used to cancel everything or on a new game)
gameStatus 1 = players are at team spawnpoints (>= 1 player)
gameStatus 2 = both teams are full (automatically move players so the team's are equal)
gameStatus 3 = game has started (allow moving & placing blocks)
gameStatus 4 = end of game (calculate the winning team and give coins)
gameStatus 5 = reset everything

                    */
                    $gameStatus = 0;

                    
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
