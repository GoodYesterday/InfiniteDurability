<?php
declare(strict_types= 1);

namespace GY\PM4\form;

use pocketmine\item\Durable;
use pocketmine\form\Form;
use pocketmine\player\Player;

class IdForm implements Form {
    public function jsonSerialize() : array
    {
        return [
            "type" => "form",
            "title" => "GYo.O",
            "content" => "§l§a✔ §f내구도를 관리합니다.\n\n",
            "buttons" => [
                [
                "text" => "§l§f내구도 무한\n§l§7내구도가 무한이 됩니다."
                    ]
            ]
        ];
    }
    public function handleResponse(Player $player, $data): void
    {
        if (($data === null)) {
            return;
        }
        if ($data === 0) {
            $item = $player->getInventory()->getItemInHand();
            if ($item->isNull()) {
                $player->sendMessage("§l§7[ §f내구도 §7] §f손에 아이템을 들어주세요.");
            }
            if ($item instanceof Durable) {
                $item->setUnbreakable(true);
                $player->getInventory()->setItemInHand($item);
                $player->sendMessage("§l§7[ §f내구도 §7] §f해당 아이템을 §a| §f내구도 무한 §a| §f으로 설정하셨습니다.");
            }
        }
    }
}