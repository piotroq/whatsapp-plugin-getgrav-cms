<?php
namespace Grav\Plugin;

use Grav\Common\Plugin;

class WhatsappButtonPlugin extends Plugin
{
  public static function getSubscribedEvents()
  {
    return [
      'onPluginsInitialized' => ['onPluginsInitialized', 0]
    ];
  }

  public function onPluginsInitialized()
  {
    // Wyłączamy działanie pluginu w panelu admina
    if ($this->isAdmin()) {
      return;
    }

    // Subskrybujemy kolejne hooki tylko jeśli plugin jest włączony na froncie
    $this->enable([
      'onTwigTemplatePaths' => ['onTwigTemplatePaths', 0],
      'onTwigSiteVariables' => ['onTwigSiteVariables', 0],
      'onOutputGenerated'   => ['onOutputGenerated', 0]
    ]);
  }

  // Rejestrujemy ścieżkę do naszych szablonów Twig
  public function onTwigTemplatePaths()
  {
    $this->grav['twig']->twig_paths[] = __DIR__ . '/templates';
  }

  // Dodajemy plik CSS do menedżera zasobów (Asset Manager)
  public function onTwigSiteVariables()
  {
    $this->grav['assets']->addCss('plugin://whatsapp-button/assets/css/whatsapp-button.css');
  }

  // Wstrzykujemy wygenerowany HTML przycisku prosto do body
  public function onOutputGenerated()
  {
    $content = $this->grav->output;
    $twig = $this->grav['twig'];

    // Pobieramy dane z konfiguracji (z fallbackiem)
    $phoneNumber = $this->config->get('plugins.whatsapp-button.phone_number', '');
    $defaultMessage = $this->config->get('plugins.whatsapp-button.default_message', '');

    // Generujemy HTML z naszego pliku Twig
    $template_html = $twig->processTemplate('partials/whatsapp-button.html.twig', [
      'wa_phone' => $phoneNumber,
      'wa_message' => urlencode($defaultMessage) // URL encode dla spacji i znaków specjalnych
    ]);

    // Znajdujemy zamykający tag body i podmieniamy go, wrzucając nasz przycisk tuż przed nim
    $this->grav->output = str_replace('</body>', $template_html . "\n</body>", $content);
  }
}
