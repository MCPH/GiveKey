<?php
namespace GK;


use pocketmine\command\CommandExecutor;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\command\ConsoleCommandSender;
class Main extends PluginBase implements Listener
{
public function onEnable() {
		

		$this->getServer()->getPluginManager()->registerEvents($this,$this);
		
		}
		 public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) {
        if(strtolower($cmd->getName()) === "givekey") {
        if($sender instanceof Player){
          if(isset($args[0])) {
                $amount = $args[0];
        foreach($this->getServer()->getOnlinePlayers() as $p){
        $p->getInventory()->addItem(341,0, $args);
        $p->sendMessage($sender->getName()." gave you ".$amount." CrateKeys!");
        return true;
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