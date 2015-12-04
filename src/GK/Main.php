<?php
namespace GK;

use pocketmine\item\Item;
use pocketmine\command\CommandExecutor;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\utils\TextFormat;
class Main extends PluginBase implements Listener
{
	public function onEnable() {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getLogger()->info(TextFormat::YELLOW . "[" . TextFormat::GOLD . "GiveKey" . TextFormat::YELLOW. "] " . TextFormat::GREEN . "Plugin has been enabled!");
		$this->getLogger()->info(TextFormat::YELLOW . "[" . TextFormat::GOLD . "GiveKey" . TextFormat::YELLOW. "] " . TextFormat::GREEN . "Created by " . TextFormat::WHITE . "SavionLegendZzz");
	}
	
	public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) {
        	if(strtolower($cmd->getName()) === "givekey") {
        		if($sender instanceof Player){
        			if(isset($args[0])) {
        			        $amount = $args[0];
        			        foreach($args as $item){
        					foreach($this->getServer()->getOnlinePlayers() as $p){
        						$p->getInventory()->addItem(Item::get(Item::SLIMEBALL, 0, $item));
        						$p->sendMessage($sender->getName()." gave you ".$item." CrateKeys!");
        						return true;
        				        }
        			        }
        		        }else{
                			$sender->sendMessage("usage: /givekey (amount)");
        		        }
        	        }else{
      				$sender->sendMessage("Please do this command in-game");
      				return false;
        		}
		}
	}
}
              
