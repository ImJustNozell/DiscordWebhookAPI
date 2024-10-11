<?php

declare(strict_types=1);

namespace CortexPE\DiscordWebhookAPI\task;


use CortexPE\DiscordWebhookAPI\Message;
use CortexPE\DiscordWebhookAPI\Webhook;
use pocketmine\scheduler\AsyncTask;
use pocketmine\Server;

class DiscordWebhookSendTask extends AsyncTask
{
	protected $webhook;
	protected $message;

	public function __construct(Webhook $webhook, Message $message)
	{
		$this->webhook = igbinary_serialize($webhook);
		$this->message = igbinary_serialize($message);
	}

	public function onRun(): void
	{
		$webhook = igbinary_unserialize($this->webhook);
		$message = igbinary_unserialize($this->message);
		$ch = curl_init($webhook->getURL());
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($message));
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
		$this->setResult([curl_exec($ch), curl_getinfo($ch, CURLINFO_RESPONSE_CODE)]);
		curl_close($ch);
	}

	public function onCompletion(): void
	{
		$response = $this->getResult();
		if (!in_array($response[1], [200, 204])) {
			Server::getInstance()->getLogger()->error("[DiscordWebhookAPI] Got error ({$response[1]}): " . $response[0]);
		}
	}
}
