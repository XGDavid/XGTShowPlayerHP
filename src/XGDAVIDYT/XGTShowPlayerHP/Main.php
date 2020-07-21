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
		if($this->config->get("version") !== 1.2){
			$this->getServer()->getLogger()->error("[XGTShowPlayerHP] Config is outdata!");
			$this->getServer()->getPluginManager()->disablePlugin($this);
		}
	}
	
	public function Lovitura(EntityDamageEvent $event){
		if($this->config->get("Show") == 1){
			if($event->getCause() === EntityDamageByEntityEvent::CAUSE_PROJECTILE){
				$player = $event->getDamager();
				if($player instanceof Player){
					$hp = floor($event->getEntity()->getHealth());
					$name = $event->getEntity()->getName();
					$messagehp = str_replace(["@name", "@hp"], [$name, $hp], $this->config->get("MessageHP"));
					$popupgehp = str_replace(["@name", "@hp"], [$name, $hp], $this->config->get("PopupHP"));
					$titlehp = str_replace(["@name", "@hp"], [$name, $hp], $this->config->get("TitleHP"));
					if($this->config->get("Type") == 1){
						if($this->config->get("Format") == 1){
							$player->sendMessage($messagehp);
						}elseif($this->config->get("Format") == 2){
							$player->sendPopup($popupgehp);
						}elseif($this->config->get("Format") == 3){
							$player->addTitle($titlehp);
						}
					}elseif($this->config->get("Type") == 2){
						if($hp == 20){
							if($this->config->get("Format") == 1){
								$player->sendMessage("§6§lDMG Informer »§6 ".$name."§4 ❤❤❤❤❤❤❤❤❤❤");
							}elseif($this->config->get("Format") == 2){
								$player->sendPopup("§6§l".$name."§4 ❤❤❤❤❤❤❤❤❤❤");
							}elseif($this->config->get("Format") == 3){
								$player->addTitle("§6§l".$name. "\n§4❤❤❤❤❤❤❤❤❤❤");
							}
						}elseif($hp == 19){
							if($this->config->get("Format") == 1){
								$player->sendMessage("§6§lDMG Informer »§6 ".$name."§4 ❤❤❤❤❤❤❤❤❤§c❤");
							}elseif($this->config->get("Format") == 2){
								$player->sendPopup("§6§l".$name."§4 ❤❤❤❤❤❤❤❤❤§c❤");
							}elseif($this->config->get("Format") == 3){
								$player->addTitle("§6§l".$name. "\n§4 ❤❤❤❤❤❤❤❤❤§c❤");
							}
						}elseif($hp == 18){
							if($this->config->get("Format") == 1){
								$player->sendMessage("§6§lDMG Informer »§r§6 §l".$name."§4 ❤❤❤❤❤❤❤❤❤§7❤");
							}elseif($this->config->get("Format") == 2){
								$player->sendPopup("§6§l".$name."§4 ❤❤❤❤❤❤❤❤❤§7❤");
							}elseif($this->config->get("Format") == 3){
								$player->addTitle("§6§l".$name. "\n§4 ❤❤❤❤❤❤❤❤❤§7❤");
							}
						}elseif($hp == 17){
							if($this->config->get("Format") == 1){
								$player->sendMessage("§6§lDMG Informer »§r§6 §l".$name."§4 ❤❤❤❤❤❤❤❤§c❤§7❤");
							}elseif($this->config->get("Format") == 2){
								$player->sendPopup("§6§l".$name."§4 ❤❤❤❤❤❤❤❤§c❤§7❤");
							}elseif($this->config->get("Format") == 3){
								$player->addTitle("§6§l".$name. "\n§4 ❤❤❤❤❤❤❤❤§c❤§7❤");
							}
						}elseif($hp == 16){
							if($this->config->get("Format") == 1){
								$player->sendMessage("§6§lDMG Informer »§6§r§6 §l".$name."§4 ❤❤❤❤❤❤❤❤§7❤§7❤");
							}elseif($this->config->get("Format") == 2){
								$player->sendPopup("§6§l".$name."§4 ❤❤❤❤❤❤❤❤§7❤§7❤");
							}elseif($this->config->get("Format") == 3){
								$player->addTitle("§6§l".$name. "\n§4 ❤❤❤❤❤❤❤❤§7❤§7❤");
							}
						}elseif($hp == 15){
							if($this->config->get("Format") == 1){
								$player->sendMessage("§6§lDMG Informer »§6§r§6§l ".$name."§4 ❤❤❤❤❤❤❤§c❤§7❤§7❤");
							}elseif($this->config->get("Format") == 2){
								$player->sendPopup("§6§l".$name."§4 ❤❤❤❤❤❤❤§c❤§7❤§7❤");
							}elseif($this->config->get("Format") == 3){
								$player->addTitle("§6§l".$name. "\n§4 ❤❤❤❤❤❤❤§c❤§7❤§7❤");
							}
						}elseif($hp == 14){
							if($this->config->get("Format") == 1){
								$player->sendMessage("§6§lDMG Informer »§6§r§6§l ".$name."§4 ❤❤❤❤❤❤❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 2){
								$player->sendPopup("§6§l".$name."§4 ❤❤❤❤❤❤❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 3){
								$player->addTitle("§6§l".$name. "\n§4 ❤❤❤❤❤❤❤§7❤§7❤§7❤");
							}
						}elseif($hp == 13){
							if($this->config->get("Format") == 1){
								$player->sendMessage("§6§lDMG Informer »§6§r§6§l ".$name."§4 ❤❤❤❤❤❤§c❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 2){
								$player->sendPopup("§6§l".$name."§4 ❤❤❤❤❤❤§c❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 3){
								$player->addTitle("§6§l".$name. "\n§4 ❤❤❤❤❤❤§c❤§7❤§7❤§7❤");
							}
						}elseif($hp == 12){
							if($this->config->get("Format") == 1){
								$player->sendMessage("§6§lDMG Informer »§6§r§6§l ".$name."§4 ❤❤❤❤❤❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 2){
								$player->sendPopup("§6§l".$name."§4 ❤❤❤❤❤❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 3){
								$player->addTitle("§6§l".$name. "\n§4 ❤❤❤❤❤❤§7❤§7❤§7❤§7❤");
							}
						}elseif($hp == 11){
							if($this->config->get("Format") == 1){
								$player->sendMessage("§6§lDMG Informer »§6§r§6§l ".$name."§4 ❤❤❤❤❤§c❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 2){
								$player->sendPopup("§6§l".$name."§4 ❤❤❤❤❤§c❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 3){
								$player->addTitle("§6§l".$name. "\n§4 ❤❤❤❤❤§c❤§7❤§7❤§7❤§7❤");
							}
						}elseif($hp == 10){
							if($this->config->get("Format") == 1){
								$player->sendMessage("§6§lDMG Informer »§6§r§6§l ".$name."§4 ❤❤❤❤❤§7❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 2){
								$player->sendPopup("§6§l".$name."§4 ❤❤❤❤❤§7❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 3){
								$player->addTitle("§6§l".$name. "\n§4 ❤❤❤❤❤§7❤§7❤§7❤§7❤§7❤");
							}
						}elseif($hp == 9){
							if($this->config->get("Format") == 1){
								$player->sendMessage("§6§lDMG Informer »§6§r§6§l ".$name."§4 ❤❤❤❤§c❤§7❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 2){
								$player->sendPopup("§6§l".$name."§4 ❤❤❤❤§c❤§7❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 3){
								$player->addTitle("§6§l".$name. "\n§4 ❤❤❤❤§c❤§7❤§7❤§7❤§7❤§7❤");
							}
						}elseif($hp == 8){
							if($this->config->get("Format") == 1){
								$player->sendMessage("§6§lDMG Informer »§6§r§6§l ".$name."§4 ❤❤❤❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 2){
								$player->sendPopup("§6§l".$name."§4 ❤❤❤❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 3){
								$player->addTitle("§6§l".$name. "\n§4 ❤❤❤❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}
						}elseif($hp == 7){
							if($this->config->get("Format") == 1){
								$player->sendMessage("§6§lDMG Informer »§6§r§6§l ".$name."§4 ❤❤❤§c❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 2){
								$player->sendPopup("§6§l".$name."§4 ❤❤❤§c❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 3){
								$player->addTitle("§6§l".$name. "\n§4 ❤❤❤§c❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}
						}elseif($hp == 6){
							if($this->config->get("Format") == 1){
								$player->sendMessage("§6§lDMG Informer »§6§r§6§l ".$name."§4 ❤❤❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 2){
								$player->sendPopup("§6§l".$name."§4 ❤❤❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 3){
								$player->addTitle("§6§l".$name. "\n§4 ❤❤❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}
						}elseif($hp == 5){
							if($this->config->get("Format") == 1){
								$player->sendMessage("§6§lDMG Informer »§6§r§6§l ".$name."§4 ❤❤§c❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 2){
								$player->sendPopup("§6§l".$name."§4 ❤❤§c❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 3){
								$player->addTitle("§6§l".$name. "\n§4 ❤❤§c❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}
						}elseif($hp == 4){
							if($this->config->get("Format") == 1){
								$player->sendMessage("§6§lDMG Informer »§6§r§6§l ".$name."§4 ❤❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 2){
								$player->sendPopup("§6§l".$name."§4 ❤❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 3){
								$player->addTitle("§6§l".$name. "\n§4 ❤❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}
						}elseif($hp == 3){
							if($this->config->get("Format") == 1){
								$player->sendMessage("§6§lDMG Informer »§6§r§6§l ".$name."§4 ❤§c❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 2){
								$player->sendPopup("§6§l".$name."§4 ❤§c❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 3){
								$player->addTitle("§6§l".$name. "\n§4 ❤§c❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}
						}elseif($hp == 2){
							if($this->config->get("Format") == 1){
								$player->sendMessage("§6§lDMG Informer »§6§r§6§l ".$name."§4 ❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 2){
								$player->sendPopup("§6§l".$name."§4 ❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 3){
								$player->addTitle("§6§l".$name. "\n§4 ❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}
						}elseif($hp == 1){
							if($this->config->get("Format") == 1){
								$player->sendMessage("§6§lDMG Informer »§6§r§6 §l".$name."§c ❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 2){
								$player->sendPopup("§6§l".$name."§c ❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 3){
								$player->addTitle("§6§l".$name. "\n§c ❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}
						}
					}
				}
			}
		}elseif($this->config->get("Show") == 2){
			if($event->getCause() === EntityDamageByEntityEvent::CAUSE_ENTITY_ATTACK or $event->getCause() === EntityDamageByEntityEvent::CAUSE_PROJECTILE){
				$player = $event->getDamager();
				if($player instanceof Player){
					$hp = floor($event->getEntity()->getHealth());
					$name = $event->getEntity()->getName();
					$messagehp = str_replace(["@name", "@hp"], [$name, $hp], $this->config->get("MessageHP"));
					$popupgehp = str_replace(["@name", "@hp"], [$name, $hp], $this->config->get("PopupHP"));
					$titlehp = str_replace(["@name", "@hp"], [$name, $hp], $this->config->get("TitleHP"));
					if($this->config->get("Type") == 1){
						if($this->config->get("Format") == 1){
							$player->sendMessage($messagehp);
						}elseif($this->config->get("Format") == 2){
							$player->sendPopup($popupgehp);
						}elseif($this->config->get("Format") == 3){
							$player->addTitle($titlehp);
						}
					}elseif($this->config->get("Type") == 2){
						if($hp == 20){
							if($this->config->get("Format") == 1){
								$player->sendMessage("§6§lDMG Informer »§6 ".$name."§4 ❤❤❤❤❤❤❤❤❤❤");
							}elseif($this->config->get("Format") == 2){
								$player->sendPopup("§6§l".$name."§4 ❤❤❤❤❤❤❤❤❤❤");
							}elseif($this->config->get("Format") == 3){
								$player->addTitle("§6§l".$name. "\n§4❤❤❤❤❤❤❤❤❤❤");
							}
						}elseif($hp == 19){
							if($this->config->get("Format") == 1){
								$player->sendMessage("§6§lDMG Informer »§6 ".$name."§4 ❤❤❤❤❤❤❤❤❤§c❤");
							}elseif($this->config->get("Format") == 2){
								$player->sendPopup("§6§l".$name."§4 ❤❤❤❤❤❤❤❤❤§c❤");
							}elseif($this->config->get("Format") == 3){
								$player->addTitle("§6§l".$name. "\n§4 ❤❤❤❤❤❤❤❤❤§c❤");
							}
						}elseif($hp == 18){
							if($this->config->get("Format") == 1){
								$player->sendMessage("§6§lDMG Informer »§r§6 §l".$name."§4 ❤❤❤❤❤❤❤❤❤§7❤");
							}elseif($this->config->get("Format") == 2){
								$player->sendPopup("§6§l".$name."§4 ❤❤❤❤❤❤❤❤❤§7❤");
							}elseif($this->config->get("Format") == 3){
								$player->addTitle("§6§l".$name. "\n§4 ❤❤❤❤❤❤❤❤❤§7❤");
							}
						}elseif($hp == 17){
							if($this->config->get("Format") == 1){
								$player->sendMessage("§6§lDMG Informer »§r§6 §l".$name."§4 ❤❤❤❤❤❤❤❤§c❤§7❤");
							}elseif($this->config->get("Format") == 2){
								$player->sendPopup("§6§l".$name."§4 ❤❤❤❤❤❤❤❤§c❤§7❤");
							}elseif($this->config->get("Format") == 3){
								$player->addTitle("§6§l".$name. "\n§4 ❤❤❤❤❤❤❤❤§c❤§7❤");
							}
						}elseif($hp == 16){
							if($this->config->get("Format") == 1){
								$player->sendMessage("§6§lDMG Informer »§6§r§6 §l".$name."§4 ❤❤❤❤❤❤❤❤§7❤§7❤");
							}elseif($this->config->get("Format") == 2){
								$player->sendPopup("§6§l".$name."§4 ❤❤❤❤❤❤❤❤§7❤§7❤");
							}elseif($this->config->get("Format") == 3){
								$player->addTitle("§6§l".$name. "\n§4 ❤❤❤❤❤❤❤❤§7❤§7❤");
							}
						}elseif($hp == 15){
							if($this->config->get("Format") == 1){
								$player->sendMessage("§6§lDMG Informer »§6§r§6§l ".$name."§4 ❤❤❤❤❤❤❤§c❤§7❤§7❤");
							}elseif($this->config->get("Format") == 2){
								$player->sendPopup("§6§l".$name."§4 ❤❤❤❤❤❤❤§c❤§7❤§7❤");
							}elseif($this->config->get("Format") == 3){
								$player->addTitle("§6§l".$name. "\n§4 ❤❤❤❤❤❤❤§c❤§7❤§7❤");
							}
						}elseif($hp == 14){
							if($this->config->get("Format") == 1){
								$player->sendMessage("§6§lDMG Informer »§6§r§6§l ".$name."§4 ❤❤❤❤❤❤❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 2){
								$player->sendPopup("§6§l".$name."§4 ❤❤❤❤❤❤❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 3){
								$player->addTitle("§6§l".$name. "\n§4 ❤❤❤❤❤❤❤§7❤§7❤§7❤");
							}
						}elseif($hp == 13){
							if($this->config->get("Format") == 1){
								$player->sendMessage("§6§lDMG Informer »§6§r§6§l ".$name."§4 ❤❤❤❤❤❤§c❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 2){
								$player->sendPopup("§6§l".$name."§4 ❤❤❤❤❤❤§c❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 3){
								$player->addTitle("§6§l".$name. "\n§4 ❤❤❤❤❤❤§c❤§7❤§7❤§7❤");
							}
						}elseif($hp == 12){
							if($this->config->get("Format") == 1){
								$player->sendMessage("§6§lDMG Informer »§6§r§6§l ".$name."§4 ❤❤❤❤❤❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 2){
								$player->sendPopup("§6§l".$name."§4 ❤❤❤❤❤❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 3){
								$player->addTitle("§6§l".$name. "\n§4 ❤❤❤❤❤❤§7❤§7❤§7❤§7❤");
							}
						}elseif($hp == 11){
							if($this->config->get("Format") == 1){
								$player->sendMessage("§6§lDMG Informer »§6§r§6§l ".$name."§4 ❤❤❤❤❤§c❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 2){
								$player->sendPopup("§6§l".$name."§4 ❤❤❤❤❤§c❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 3){
								$player->addTitle("§6§l".$name. "\n§4 ❤❤❤❤❤§c❤§7❤§7❤§7❤§7❤");
							}
						}elseif($hp == 10){
							if($this->config->get("Format") == 1){
								$player->sendMessage("§6§lDMG Informer »§6§r§6§l ".$name."§4 ❤❤❤❤❤§7❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 2){
								$player->sendPopup("§6§l".$name."§4 ❤❤❤❤❤§7❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 3){
								$player->addTitle("§6§l".$name. "\n§4 ❤❤❤❤❤§7❤§7❤§7❤§7❤§7❤");
							}
						}elseif($hp == 9){
							if($this->config->get("Format") == 1){
								$player->sendMessage("§6§lDMG Informer »§6§r§6§l ".$name."§4 ❤❤❤❤§c❤§7❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 2){
								$player->sendPopup("§6§l".$name."§4 ❤❤❤❤§c❤§7❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 3){
								$player->addTitle("§6§l".$name. "\n§4 ❤❤❤❤§c❤§7❤§7❤§7❤§7❤§7❤");
							}
						}elseif($hp == 8){
							if($this->config->get("Format") == 1){
								$player->sendMessage("§6§lDMG Informer »§6§r§6§l ".$name."§4 ❤❤❤❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 2){
								$player->sendPopup("§6§l".$name."§4 ❤❤❤❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 3){
								$player->addTitle("§6§l".$name. "\n§4 ❤❤❤❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}
						}elseif($hp == 7){
							if($this->config->get("Format") == 1){
								$player->sendMessage("§6§lDMG Informer »§6§r§6§l ".$name."§4 ❤❤❤§c❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 2){
								$player->sendPopup("§6§l".$name."§4 ❤❤❤§c❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 3){
								$player->addTitle("§6§l".$name. "\n§4 ❤❤❤§c❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}
						}elseif($hp == 6){
							if($this->config->get("Format") == 1){
								$player->sendMessage("§6§lDMG Informer »§6§r§6§l ".$name."§4 ❤❤❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 2){
								$player->sendPopup("§6§l".$name."§4 ❤❤❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 3){
								$player->addTitle("§6§l".$name. "\n§4 ❤❤❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}
						}elseif($hp == 5){
							if($this->config->get("Format") == 1){
								$player->sendMessage("§6§lDMG Informer »§6§r§6§l ".$name."§4 ❤❤§c❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 2){
								$player->sendPopup("§6§l".$name."§4 ❤❤§c❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 3){
								$player->addTitle("§6§l".$name. "\n§4 ❤❤§c❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}
						}elseif($hp == 4){
							if($this->config->get("Format") == 1){
								$player->sendMessage("§6§lDMG Informer »§6§r§6§l ".$name."§4 ❤❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 2){
								$player->sendPopup("§6§l".$name."§4 ❤❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 3){
								$player->addTitle("§6§l".$name. "\n§4 ❤❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}
						}elseif($hp == 3){
							if($this->config->get("Format") == 1){
								$player->sendMessage("§6§lDMG Informer »§6§r§6§l ".$name."§4 ❤§c❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 2){
								$player->sendPopup("§6§l".$name."§4 ❤§c❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 3){
								$player->addTitle("§6§l".$name. "\n§4 ❤§c❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}
						}elseif($hp == 2){
							if($this->config->get("Format") == 1){
								$player->sendMessage("§6§lDMG Informer »§6§r§6§l ".$name."§4 ❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 2){
								$player->sendPopup("§6§l".$name."§4 ❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 3){
								$player->addTitle("§6§l".$name. "\n§4 ❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}
						}elseif($hp == 1){
							if($this->config->get("Format") == 1){
								$player->sendMessage("§6§lDMG Informer »§6§r§6 §l".$name."§c ❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 2){
								$player->sendPopup("§6§l".$name."§c ❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}elseif($this->config->get("Format") == 3){
								$player->addTitle("§6§l".$name. "\n§c ❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤§7❤");
							}
						}
					}
				}
			}
		}
	}
}
