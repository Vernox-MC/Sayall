<?php 
declare(strict_types=1);

namespace VernoxMC\Sayall;

use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\utils\TextFormat;

class Main extends PluginBase
{
 
    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
    {
        switch ($command->getName()) {
            case "sayall":
                    if (!isset($args[0])) {
                        $sender->sendMessage(TextFormat::RED . "An unknown error occurred when attempting to perform this command");
                        break;
                    }


                                if($sender->hasPermission("sayall")) {
                                
                                $message5 = implode(" ", array_slice($args, 0));
                                foreach ($this->getServer()->getOnlinePlayers() as $onlinePlayer) {
                                    try{
                                    $onlinePlayer->chat($message5);
                                    }  catch (\Throwable $err) {

                                            $sender->sendMessage(TextFormat:: RED . "An error occurred!");

                                    }
                                }
                                } else $sender->sendMessage(TextFormat::RED . "You do not have permission to use this command!");
                           
                        }



        return true;
    }
}