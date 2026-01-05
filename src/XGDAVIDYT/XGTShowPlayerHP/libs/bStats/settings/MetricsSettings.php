<?php

namespace XGDAVIDYT\XGTShowPlayerHP\libs\bStats\settings;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class MetricsSettings
{
    private bool $enabled = true;
    private ?int $pluginId = null;
    private bool $log_failed_requests = false;
    private bool $log_sent_data = false;
    private bool $log_response_status_text = false;
    private ?string $serverUUID = null;
    private ?string $pluginName = null;
    private string $metricsVersion = "3.1.1-SNAPSHOT";

    public function __construct(PluginBase $plugin, int $pluginId)
    {
        @mkdir($plugin->getDataFolder() . "/bStats/");
        if (!is_file($plugin->getDataFolder() . "/bStats/config.yml")) {
            $config = new Config($plugin->getDataFolder() . "/bStats/config.yml", Config::YAML);
            $config->set("enabled", true);
            $config->set("plugin-id", $pluginId);
            $config->set("log_failed_requests", false);
            $config->set("log_sent_data", false);
            $config->set("log_response_status_text", false);

            $config->save();
        }

        $config = new Config($plugin->getDataFolder() . "/bStats/config.yml");
        $this->setEnabled($config->get("enabled", true));
        $this->setPluginId($config->get("plugin-id", null));
        $this->setLogFailedRequests($config->get("log_failed_requests", false));
        $this->setLogSentData($config->get("log_sent_data", false));
        $this->setLogResponseStatusText($config->get("log_response_status_text", false));

        $this->serverUUID = $plugin->getServer()->getServerUniqueId()->toString();
        $this->pluginName = $plugin->getDescription()->getName();
    }

    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    protected function setEnabled(bool $enabled): void
    {
        $this->enabled = $enabled;
    }

    public function getPluginId(): ?int
    {
        return $this->pluginId;
    }

    protected function setPluginId(?int $pluginId): void
    {
        $this->pluginId = $pluginId;
    }

    public function isLogFailedRequests(): bool
    {
        return $this->log_failed_requests;
    }

    protected function setLogFailedRequests(bool $log_failed_requests): void
    {
        $this->log_failed_requests = $log_failed_requests;
    }

    public function isLogSentData(): bool
    {
        return $this->log_sent_data;
    }

    protected function setLogSentData(bool $log_sent_data): void
    {
        $this->log_sent_data = $log_sent_data;
    }

    public function isLogResponseStatusText(): bool
    {
        return $this->log_response_status_text;
    }

    protected function setLogResponseStatusText(bool $log_response_status_text): void
    {
        $this->log_response_status_text = $log_response_status_text;
    }

    public function getServerUUID(): ?string
    {
        return $this->serverUUID;
    }

    protected function setServerUUID(?string $serverUUID): void
    {
        $this->serverUUID = $serverUUID;
    }

    public function getPluginName(): ?string
    {
        return $this->pluginName;
    }

    public function getMetricsVersion(): string
    {
        return $this->metricsVersion;
    }
}

