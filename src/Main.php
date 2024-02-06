<?php

namespace fly;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat;


class Main extends PluginBase implements Listener {

    public function onEnable(): void {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TextFormat::GREEN . "PLugin Iniciado.");
    }

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool {

        if($cmd->getName() === "fly") {

            if(empty($args[0])) { return false; }
            switch($args[0]) {
                case "on":
                    $sender->setAllowFlight(true);
                    $sender->sendMessage(TextFormat::GREEN . TextFormat::BOLD . "»" . TextFormat::RESET . TextFormat::GREEN . " Agora você pode voar");
                    return true;
                    break;
                case "off":
                    $sender->setAllowFlight(false);
                    $sender->setFlying(false);
                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . "»" . TextFormat::RESET . TextFormat::RED . " Agora você não pode voar");
                    return true;
                    break;
                default:
                return false;
            }
        }
    }
}