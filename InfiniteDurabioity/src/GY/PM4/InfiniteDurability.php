<?php
declare(strict_types= 1);

namespace GY\PM4;

use pocketmine\plugin\PluginBase;
use pocketmine\command\{Command, CommandSender};
use pocketmine\player\Player;

use GY\PM4\form\IdForm;

class InfiniteDurability extends PluginBase {
    public function onEnable(): void
    {
        $this->getServer()->getPluginManager()->enablePlugin($this);
    }
    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
    {
        if ($sender instanceof Player){
            if ($command->getName() === "내구도") {
                $sender->sendForm(new IdForm());
            }
        }
        return true;
    }
}