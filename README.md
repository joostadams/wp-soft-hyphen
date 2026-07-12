# WP Soft Hyphen

Adds a **soft hyphen (`&shy;`)** button to the Gutenberg formatting toolbar, so you can control word breaks directly in the editor — no switching to the HTML view.

A soft hyphen is invisible unless the browser needs to break the word at that position, where it renders as a regular hyphen. Perfect for long Dutch compound words in narrow columns and headings.

## Usage

1. Select text in any RichText-based block (paragraph, heading, button, …).
2. Place the caret where the word may break.
3. Open the toolbar **⌄ (more)** dropdown and choose **Soft hyphen**, or press <kbd>Ctrl</kbd>/<kbd>Cmd</kbd>+<kbd>Shift</kbd>+<kbd>-</kbd>.

The character is saved as a real U+00AD character in the post content, which is equivalent to `&shy;` in HTML.

## Installation

1. Download the latest release zip.
2. Upload via **Plugins → Add New → Upload Plugin**.
3. Activate. Done — no settings.

## Automatic updates

The plugin ships with [plugin-update-checker](https://github.com/YahnisElsts/plugin-update-checker). Every WordPress installation running this plugin checks this GitHub repository for new **releases** and offers the update on the normal Plugins screen.

Release checklist for maintainers:

1. Bump `Version` in `wp-soft-hyphen.php` (and `WP_SOFT_HYPHEN_VERSION`).
2. Commit, tag `vX.Y.Z`, push.
3. Create a GitHub release for the tag and attach `wp-soft-hyphen.zip` (the plugin folder, zipped) as a release asset.

## Requirements

- WordPress 6.0+
- PHP 7.4+

## License

GPL-2.0-or-later.
