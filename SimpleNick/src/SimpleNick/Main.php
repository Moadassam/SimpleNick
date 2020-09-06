<?php

namespace SimpleNick;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;

class Main extends PluginBase implements Listener{

    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getServer()->getLogger()->info("§aON");
    }


    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool{

            switch($cmd->getName()){
            case "nick":
                if($args[0] === null){
                    $sender->sendMessage("§4Tu dois mettre quelque chose");
                }else{
                    if($sender->hasPermission("nick.use")){

                        $sender->setDisplayName($args[0]);
                        $sender->setNameTag($args[0]);
                        $sender->sendMessage("§aTon pseudo a été changé en " . $args[0]);
                    }else{
                        $sender->sendMessage("Tu n'as pas les permissions");
                    }
                }
                break;
            }
        return true;
    }
}
