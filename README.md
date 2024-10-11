#DiscordWebhookAPI

---

<div align="center" style="background-color:#ff5555; padding: 20px; border-radius: 10px;">

  <h1 style="color: white; font-size: 2.5em;">🎉 Join the BlockForDevs Discord Community! 🎉</h1>
  <p style="font-size: 1.8em; font-weight: bold;">
    <a href="https://discord.com/invite/NvxR2SCyQY" style="color: #ffffff; text-decoration: none; background-color: #7289da; padding: 10px 20px; border-radius: 5px; border: 2px solid #ffffff;">
      👉 Click Here to Join Now! 👈
    </a>
  </p>
</div>

---

<h1 align="center">
  DiscordWebhookAPI
  <img src="https://raw.githubusercontent.com/CortexPE/DiscordWebhookAPI/master/dwapi.png" height="64" width="64" align="left">
  &nbsp;
  <img src="https://poggit.pmmp.io/ci.shield/CortexPE/DiscordWebhookAPI/~">
</h1>

<div align="center">
  <p>A PocketMine-MP Virion to easily send messages via Discord Webhooks</p>
  <p>Una Virion para PocketMine-MP para enviar mensajes fácilmente mediante Discord Webhooks</p>
</div>

---

## 🎉 Installation / Instalación

Installation is easy. You may get a compiled `.phar` [here](https://poggit.pmmp.io/ci/CortexPE/DiscordWebhookAPI/~) or integrate the virion itself into your plugin.  
La instalación es fácil. Puedes obtener un `.phar` compilado [aquí](https://poggit.pmmp.io/ci/CortexPE/DiscordWebhookAPI/~) o integrar directamente el virion en tu plugin.

This virion is purely object-oriented. To use it, you'll need to import the `Webhook`, `Message`, and optionally, the `Embed` object (if needed).  
Esta API es completamente orientada a objetos. Para usarla, deberás importar los objetos `Webhook`, `Message`, y opcionalmente, `Embed` si es necesario.

---

## 🛠 Basic Usage / Uso básico

### Import the classes / Importar las clases

To use this API in your code, you'll need to import the following classes:  
Para usar esta API en tu código, necesitarás importar las siguientes clases:

```php
<?php
use CortexPE\DiscordWebhookAPI\Message;
use CortexPE\DiscordWebhookAPI\Webhook;
use CortexPE\DiscordWebhookAPI\Embed; // optional / opcional
```

### Construct a `Webhook` object / Crear un objeto `Webhook`

You'll need the Webhook URL. For more information on how to create Discord webhooks, [click here](https://support.discordapp.com/hc/en-us/articles/228383668-Intro-to-Webhooks).  
Necesitarás la URL del Webhook. Para más información sobre cómo crear webhooks en Discord, haz [clic aquí](https://support.discordapp.com/hc/en-us/articles/228383668-Intro-to-Webhooks).

```php
$webHook = new Webhook("YOUR WEBHOOK URL");
```

### Construct a `Message` object / Crear un objeto `Message`

You must create a new `Message` object for each message you want to send.  
Deberás crear un nuevo objeto `Message` para cada mensaje que desees enviar.

```php
$msg = new Message();
$msg->setUsername("USERNAME"); // optional / opcional
$msg->setAvatarURL("https://cortexpe.xyz/utils/kitsu.png"); // optional / opcional
$msg->setContent("INSERT TEXT HERE"); // optional. Max length 2000 characters / opcional. Máximo 2000 caracteres
```

### Send the message / Enviar el mensaje

Now you can send the message using the `send()` method. This will schedule an AsyncTask to avoid blocking the main thread.  
Ahora puedes enviar el mensaje usando el método `send()`. Esto programará una AsyncTask para evitar bloquear el hilo principal.

```php
$webHook->send($msg);
```

---

## 📦 Embeds

Before sending a message, you may want to add an embed. You can construct an `Embed` object and use `Message->addEmbed()` to include it.  
Antes de enviar un mensaje, quizá quieras agregar un embed. Puedes construir un objeto `Embed` y usar `Message->addEmbed()` para incluirlo.

```php
$embed = new Embed();
$embed->setTitle("Embed Title Here");
$embed->setDescription("A very awesome description / Una descripción muy genial");
```

You can also add a footer:  
También puedes añadir un pie de página:

```php
$embed->setFooter("Footer text / Texto del pie de página");
```

Finally, add the embed to the message:  
Finalmente, agrega el embed al mensaje:

```php
$msg->addEmbed($embed);
```

---

## Example Code / Código de ejemplo:

```php
$webHook = new Webhook("YOUR WEBHOOK URL");
$msg = new Message();
$msg->setUsername("USERNAME");
$msg->setAvatarURL("https://cortexpe.xyz/utils/kitsu.png");
$msg->setContent("INSERT TEXT HERE");

$embed = new Embed();
$embed->setTitle("EMBED 1");
$embed->setColor(0xFF0000);
$msg->addEmbed($embed);

$embed = new Embed();
$embed->setTitle("EMBED 2");
$embed->setColor(0x00FF00);
$embed->setAuthor("AUTHOR", "https://CortexPE.xyz", "https://cortexpe.xyz/utils/kitsu.png");
$embed->setDescription("Lorem ipsum dolor sit amet.");
$msg->addEmbed($embed);

$webHook->send($msg);
```

---

**This API was made with ❤️ by CortexPE updated by Nozell. Enjoy!~ :3**  
**Esta API fue hecha con ❤️ por CortexPE actualizado por Nozell. ¡Disfrútala!~ :3**
