<?php

declare(strict_types=1);

namespace XGDAVIDYT\XGTShowPlayerHP;

use pocketmine\Player;

use pocketmine\plugin\PluginBase;

use pocketmine\event\Listener;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;

use pocketmine\utils\TextFormat;
use pocketmine\utils\Utils;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener{
  
public function onEnable(){
		$this->saveResource("config.yml");
		$this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML);
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    if($this->config->get("Format") == 0){
      $this->getServer()->getLogger()->notice("[XGTShowPlayerHP] the plugin will not send any alerts when a player hits another player because the format is disabled!");
    }
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
