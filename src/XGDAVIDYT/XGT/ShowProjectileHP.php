<?php

namespace XGDAVIDYT\XGT\ShowProjectileHP;

use pocketmine\Player;

use pocketmine\plugin\PluginBase;

use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;

use pocketmine\utils\TextFormat;
use pocketmine\utils\Utils;
use pocketmine\utils\Config;

use pocketmine\event\Listener;

class ShowProjectileHP extends PluginBase implements Listener{

	public function onEnable(){
		$this->saveResource("config.yml");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
	}
	
	public function Lovitura(EntityDamageEvent $event){
	 if($event->getCause() === EntityDamageByEntityEvent::CAUSE_PROJECTILE){
			$player = $event->getDamager();
			if($player instanceof Player){
				$hp = $event->getEntity()->getHealth();
				$name = $event->getEntity()->getName();
				$messagehp = str_replace(["@name", "@hp"], [$name, $hp], $this->config->get("MessageHP"));
				$popupgehp = str_replace(["@name", "@hp"], [$name, $hp], $this->config->get("PopupHP"));
				$titlehp = str_replace(["@name", "@hp"], [$name, $hp], $this->config->get("TitleHP"));
				if($this->config->get("Format") == 1){
					$player->sendMessage($messagehp);
				}elseif($this->config->get("Format") == 2){
					$player->sendPopup($popupgehp);
				}elseif($this->config->get("Format") == 3){
					$player->addTitle($titlehp);
				}
			}
		}
	}
}