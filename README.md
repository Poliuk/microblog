# Microposting

A minimal block theme for short-form, single-author feeds.

Microposting turns a WordPress site into a single-author, Twitter-style feed: short posts stacked in cards, a profile header, no sidebars, no clutter. It's a full block theme — every part is editable from the Site Editor.

![Microposting feed](screenshot.png)

## Requirements

- WordPress 6.7 or later
- PHP 7.2 or later

## Installation

### From a release zip

1. Download the latest [release zip](https://github.com/Poliuk/microposting/releases) (or zip this repository).
2. In WordPress, go to **Appearance → Themes → Add New → Upload Theme**.
3. Choose the zip, click **Install Now**, then **Activate**.

### Via git clone

```bash
cd wp-content/themes
git clone https://github.com/Poliuk/microposting.git
```

Then activate **Microposting** from **Appearance → Themes**.

### Via WP-CLI

```bash
wp theme install https://github.com/Poliuk/microposting/archive/refs/heads/main.zip --activate
```

## Setup

After activating:

1. Upload a **Site Logo** — this is the large round profile picture in the header. Set it in **Appearance → Editor → Patterns → Template Parts → Header** by clicking the logo placeholder, or in **Settings → General → Site Logo**.
2. (Optional) Set up a [Gravatar](https://gravatar.com) using the email on your WordPress user account — the small avatars next to each post in the feed use it.
3. Edit the profile bio, location and joined year in **Appearance → Editor → Patterns → Header profile bio** (or by editing `patterns/header-profile.php`).
4. Start posting. Short posts render as cards in the feed; longer posts work as full single-post pages.

## Customising

- **Colors, fonts, spacing:** **Appearance → Editor → Styles**.
- **Templates** (`index`, `single`, `archive`, `page`, `404`): **Appearance → Editor → Templates**, or edit the HTML files in `templates/`.
- **Header / footer / topbar:** **Appearance → Editor → Patterns → Template Parts**, or edit `parts/*.html`.
- **PHP behaviour** (avatar block override, pagination button wrapping, "Read More" link, etc.): see `functions.php`.

## License

GPL-3.0-or-later. See [LICENSE](LICENSE).
