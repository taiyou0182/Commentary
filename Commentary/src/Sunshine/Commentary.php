<?php

namespace Sunshine;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\TextFormat;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerCommandPreprocessEvent;
use pocketmine\event\server\ServerCommandEvent;

class Commentary extends PluginBase implements Listener{

    public function onEnable(){
        $plugin = "Commentary";
        $this->getLogger()->info(TextFormat::GREEN.$plugin."を読み込みました".TextFormat::BLUE." By Sunshine");
        $this->getLogger()->info(TextFormat::RED.$plugin."を二次配布するのは禁止です");
        $this->getServer()->getPluginManager()->registerEvents($this,$this);
    }

    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if($command->getName() =="c"){
            if (!$sender instanceof Player) return $sender->sendMessage("端末から実行してください。");
            $subCommand = strtolower(array_shift($args));
            $Name = $sender->getPlayer()->getName();
            switch ($subCommand){
                case"hello":
                    $this->getServer()->broadcastMessage("§bこんにちは！ §6by§a".$Name);
                break;
                case"bye":
                    $this->getServer()->broadcastMessage("§cさようなら！ §6by§a".$Name);
                break;

            default:
                $sender->sendMessage("/c ".$subCommand." はないよ！");
                $sender->sendMessage("helloかbyeで答えてね！");
                break;
            }
        }
    }
}
