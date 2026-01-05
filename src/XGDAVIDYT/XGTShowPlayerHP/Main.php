<?php

declare(strict_types=1);

namespace XGDAVIDYT\XGTShowPlayerHP;

use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\Listener;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener
{

    private Config $config;
    private int $showMode;
    private int $displayType;
    private int $formatType;
    private int $maxHearts;
    private string $heartFull;
    private string $heartHalf;
    private string $heartEmpty;
    private string $messageFormat;
    private string $popupFormat;
    private string $titleFormat;
    private string $heartsPrefixMessage;
    private string $heartsPrefixPopup;
    private string $heartsPrefixTitle;

    protected function onEnable(): void
    {
        $this->saveResource("config.yml");
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML);

        if ($this->config->get("version") !== 2.0) {
            $this->getLogger()->error("Config is outdated! Please delete config.yml and restart");
            $this->getServer()->getPluginManager()->disablePlugin($this);
            return;
        }

        $this->loadConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    private function loadConfig(): void
    {
        $this->showMode = $this->config->get("show-mode", 2);
        $this->displayType = $this->config->get("display-type", 2);
        $this->formatType = $this->config->get("format-type", 2);
        $this->maxHearts = $this->config->get("max-hearts", 10);
        $this->heartFull = $this->config->get("heart-full", "§4❤");
        $this->heartHalf = $this->config->get("heart-half", "§c❤");
        $this->heartEmpty = $this->config->get("heart-empty", "§7❤");
        $this->messageFormat = $this->config->get("message-format", "§l§e@name §cis now in§e @hp §cHP");
        $this->popupFormat = $this->config->get("popup-format", "§l§7@name§c @hp §4❤");
        $this->titleFormat = $this->config->get("title-format", "§l§b@name §r§c\n@hp §4❤");
        $this->heartsPrefixMessage = $this->config->get("hearts-prefix-message", "§6§lDMG Informer »§6 ");
        $this->heartsPrefixPopup = $this->config->get("hearts-prefix-popup", "§6§l");
        $this->heartsPrefixTitle = $this->config->get("hearts-prefix-title", "§6§l");
    }

    public function onEntityDamage(EntityDamageByEntityEvent $event): void
    {
        if ($this->displayType === 0) return;


        $cause = $event->getCause();
        $validCause = match ($this->showMode) {
            1 => $cause === EntityDamageEvent::CAUSE_PROJECTILE,
            2 => $cause === EntityDamageEvent::CAUSE_ENTITY_ATTACK || $cause === EntityDamageEvent::CAUSE_PROJECTILE,
            default => false
        };

        if (!$validCause) return;

        $damager = $event->getDamager();
        if (!$damager instanceof Player) return;


        $entity = $event->getEntity();

        if (!($entity instanceof Player)) return;

        if ($entity->isCreative()) return;

        $hp = floor($entity->getHealth());
        $maxHp = floor($entity->getMaxHealth());
        $name = $entity->getName();

        if ($this->displayType === 1) {
            $this->sendNumericHP($damager, $name, $hp);
        } else {
            $this->sendHeartsHP($damager, $name, $hp, $maxHp);
        }
    }

    private function sendNumericHP(Player $player, string $name, int|float $hp): void
    {
        $replacements = ["@name" => $name, "@hp" => $hp];

        match ($this->formatType) {
            1 => $player->sendMessage($this->formatMessage($this->messageFormat, $replacements)),
            2 => $player->sendPopup($this->formatMessage($this->popupFormat, $replacements)),
            3 => $player->sendTitle($this->formatMessage($this->titleFormat, $replacements)),
            default => null
        };
    }

    private function formatMessage(string $format, array $replacements): string
    {
        return str_replace(array_keys($replacements), array_values($replacements), $format);
    }

    private function sendHeartsHP(Player $player, string $name, float $hp, float $maxHp): void
    {
        $heartsDisplay = $this->generateHeartsDisplay($hp, $maxHp);

        match ($this->formatType) {
            1 => $player->sendMessage($this->heartsPrefixMessage . $name . $heartsDisplay),
            2 => $player->sendPopup($this->heartsPrefixPopup . $name . $heartsDisplay),
            3 => $player->sendTitle($this->heartsPrefixTitle . $name . "\n" . $heartsDisplay),
            default => null
        };
    }

    private function generateHeartsDisplay(int|float $hp, int|float $maxHp): string
    {
        $totalHearts = $this->maxHearts;
        $hpPerHeart = $maxHp / $totalHearts;

        $fullHearts = floor($hp / $hpPerHeart);
        $remainder = fmod($hp, $hpPerHeart);
        $hasHalfHeart = $remainder > 0.01 && $fullHearts < $totalHearts;

        $display = "";

        for ($i = 0; $i < $totalHearts; $i++) {
            if ($i < $fullHearts) {
                $display .= $this->heartFull;
            } elseif ($i === $fullHearts && $hasHalfHeart) {
                $display .= $this->heartHalf;
            } else {
                $display .= $this->heartEmpty;
            }
        }

        return $display;
    }




}

