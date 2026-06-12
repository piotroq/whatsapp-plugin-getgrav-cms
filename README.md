# WhatsApp plugin GetGrav CMS

```markdown
# Grav WhatsApp Button Plugin

Lekki, w pełni konfigurowalny plugin dla **Grav CMS**, który dodaje responsywny, pływający przycisk WhatsApp w prawym dolnym rogu strony.

[![Grav Version](https://img.shields.io/badge/Grav-1.7+-blue.svg)](https://getgrav.org)
[![PHP Version](https://img.shields.io/badge/PHP-7.4%2B-green.svg)](https://php.net)
[![License](https://img.shields.io/badge/License-MIT-yellow.svg)](LICENSE)

## 🚀 Funkcje

- **Automatyczne wstrzykiwanie**: Kod HTML i CSS jest automatycznie dodawany przed tagiem `</body>`.
- **Responsywność**: Dostosowane wymiary i pozycjonowanie dla urządzeń mobilnych (`max-width: 768px`) i desktopu.
- **Bezpieczne URL-encoding**: Domyślna wiadomość jest automatycznie kodowana (`urlencode`) dla poprawnej obsługi spacji i znaków specjalnych w linku `wa.me`.
- **Zero zależności**: Czysty CSS i SVG, bez zewnętrznych bibliotek JavaScript.
- **Panel Admina**: Pełna obsługa konfiguracji przez Grav Admin Plugin.

## 📦 Instalacja

### Opcja 1: Grav Package Manager (GPM) – Zalecana
```bash
bin/gpm install whatsapp-button
```

### Opcja 2: Manualna (Git)

```bash
cd user/plugins
git clone https://github.com/pbmediaonline/grav-plugin-whatsapp-button.git whatsapp-button
```

### Opcja 3: Manualna (ZIP)

1. Pobierz archiwum ZIP z repozytorium.
2. Rozpakuj do folderu `user/plugins/whatsapp-button`.
3. Upewnij się, że folder nazywa się dokładnie `whatsapp-button`.

## ⚙️ Konfiguracja

Plugin można skonfigurować w panelu admina Grav lub edytując plik `user/config/plugins/whatsapp-button.yaml`.

```yaml
enabled: true
phone_number: "48123456789" # Tylko cyfry z kierunkowym kraju, bez znaku "+"
default_message: "Cześć, mam pytanie dotyczące oferty na stronie."
```

| Pole              | Typ      | Opis                                                                     |
| ----------------- | -------- | ------------------------------------------------------------------------ |
| `enabled`         | `toggle` | Włącza/wyłącza wyświetlanie przycisku na froncie.                        |
| `phone_number`    | `text`   | Numer telefonu w formacie międzynarodowym (np. `48123456789`). Wymagany. |
| `default_message` | `text`   | Wstępnie wypełniona treść wiadomości w aplikacji WhatsApp.               |

## 📂 Struktura plików

```text
user/plugins/whatsapp-button/
├── assets/
│   └── css/
│       └── whatsapp-button.css   # Style przycisku (responsywne, hover effects)
├── templates/
│   └── partials/
│       └── whatsapp-button.html.twig # Szablon HTML przycisku z ikoną SVG
├── blueprints.yaml               # Definicja pól konfiguracji w panelu Admin
├── whatsapp-button.php           # Główna klasa pluginu (hooki Grav)
├── whatsapp-button.yaml          # Domyślna konfiguracja
└── README.md                     # Ten plik
```

## 🛠️ Rozwój i Modyfikacje

Aby zmodyfikować wygląd przycisku, nadpisz style w motywie lub edytuj `assets/css/whatsapp-button.css`.  
Aby zmienić ikonę lub strukturę HTML, edytuj `templates/partials/whatsapp-button.html.twig`.

## 👤 Autor

**PB MEDIA Studio**  

- 🌐 [https://pbmediaonline.pl](https://pbmediaonline.pl)  
- ✉️ biuro@pbmediaonline.pl  

## 📄 Licencja

Ten projekt jest udostępniany na licencji MIT. Zobacz plik [LICENSE](LICENSE) po szczegóły.
```
