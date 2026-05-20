=== Microposting ===

Contributors: poliuk
Tags: full-site-editing, block-patterns, block-styles, wide-blocks
Requires at least: 6.7
Tested up to: 6.9
Requires PHP: 7.2
Stable tag: 1.0.0
License: GNU General Public License v3.0 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html

A minimal block theme for short-form, single-author feeds.

== Description ==

Microposting turns a WordPress site into a single-author, Twitter-style feed: short posts stacked in cards, a profile header, no sidebars, no clutter. It's a full block theme — every part is editable from the Site Editor.

Features:

* Full Site Editing block theme
* Single-author feed layout with profile header
* Card-style post list for short-form writing
* Single post / page / archive / search / 404 templates included
* Self-hosted Inter and Cardo fonts (no remote requests)
* Translation-ready

== Frequently Asked Questions ==

= How do I set the large profile picture in the header? =

It uses the Site Logo. Go to Appearance → Editor → Patterns → Template Parts → Header and click the logo placeholder to upload an image, or set one via Settings → General → Site Logo.

= How do I set the small avatar next to each post in the feed? =

Those use the post author's Gravatar. Sign in at gravatar.com with the same email address as your WordPress user account and upload an image there.

= How do I edit the profile bio in the header? =

Open Appearance → Editor → Patterns → Header profile bio, or edit `patterns/header-profile.php` directly.

= Where do I customise colors and typography? =

Appearance → Editor → Styles, or edit `theme.json`.

== Changelog ==

= 1.0.0 =

* Initial release.

== Resources ==

* Inter font — Copyright 2016 The Inter Project Authors (https://github.com/rsms/inter), licensed under SIL Open Font License 1.1, https://opensource.org/licenses/OFL-1.1
* Cardo font — Copyright 2017 David J. Perry (https://scholarsfonts.net/cardofnt.html), licensed under SIL Open Font License 1.1, https://opensource.org/licenses/OFL-1.1
* assets/verified_badge.svg — Public domain. The mark consists only of simple geometric shapes that do not meet the threshold of originality required for copyright protection.
* screenshot.png — Self-created, licensed under GPL-3.0-or-later, same as the theme.

== Privacy ==

This theme does not collect, store, or transmit any user data. Avatars are fetched from gravatar.com when the post author has a Gravatar account associated with their email address — this is core WordPress behaviour and can be disabled via Settings → Discussion → "Show Avatars".
