<?php
namespace TC;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\TextFormat;

class MainClass extends PluginBase{
	public function onLoad(){
		$this->getLogger()->info("TeamCore has loaded.");
	}
	public function onEnable(){
	  $leave_team = 0;
	  $teams = array("team1", "team1", "team3");
		$this->getLogger()->info("TeamCore has been enabled.");
    }
	public function onDisable(){
		$this->getLogger()->info("Team core has been disabled.");
	}
	public function onCommand(CommandSender $sender, Command $command, $label, array $args){
		switch($command->getName()){
			case "team":
		    if ($leave_team == 1){
		      // do something
		    }
				$sender->sendMessage("-----");
				$random_team=array_rand($teams,1);
				// this dosen't work yet :P
				$sender->sendMessage("You are on " . $random_team .);
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
		$leave_team = 1;
	}
}
