Starter Bootstrap Dokuwiki Template
======

[Bootstrap](http://twitter.github.io/bootstrap/) [Dokuwiki](https://www.dokuwiki.org/dokuwiki) template
based on the [starter template](https://www.dokuwiki.org/template:starter).

[Demo](http://dokuwiki.camlittle.com)

This template is designed to be responsive on all modern devices, accessible,
and good looking. It aims to replace most of the default Dokuwiki styling with
equivalents from available Bootstrap styles.

Created by [Cameron Little](http://camlittle.com) for [WWU ResTek](http://restek.wwu.edu).

Features
----

  * Insert table toolbar button.
  * Viewing, editing, and detail pages styled with bootstrap.
  * Auto generating wiki sidebar (use "automatic" in sidebar configurationt).
  * Collapsible sidebar bootstrap menu.
  * Collapsible table of contents.
  * Bootstrappy support for acronyms, quicksearch, and more.
  * [Sorttable](http://www.kryogenix.org/code/browser/sorttable/) built in.
  * Built in layout configuration.
  * Image/Logo support in navigation/header.

Logo Support
----

The theme looks for a ``brand.png`` or ``brand.jpg`` file in the root of the
dokuwiki install and displays it if found. You can override this in the
``header_img`` template setting. The template settings contain fields for
setting the vertical padding and height of the logo image. By default, the
theme displays both the logo and title of the wiki. The ``header_title`` option
can be used to display only the logo.

Javascript
----

Since dokuwiki (Rincewind) uses jQuery 1.6 and bootstrap uses jQuery 1.9, this
theme has to use both. ``jQuery`` should be used instead of ``$`` when
referencing jQuery 1.6 and ``jQNew`` should be used when referencing 1.9. This
is enabled using ``$.noConflict(true)``.

CSS
----

The css for this file is included, but to really hack and change it, you'll want
to check out how it's generated.

I've [forked bootstrap](https://github.com/apexskier/bootstrap/tree/starterbootstrap)
in order to more efficiently integrate bootstrap with dokuwiki. Unfortunately,
dokuwiki's support for modifying html in templates is very poor, so I can't add
the proper css classes where I want them. Instead, I've added the proper
selectors directly into bootstrap's less. For most stuff, see the
[`less/dokuwiki`](https://github.com/apexskier/bootstrap/tree/starterbootstrap/less/dokuwiki)
folder. For everything, [compare my branch to the main
repo](https://github.com/apexskier/bootstrap/compare/starterbootstrap).

If you do decide to work on the less, you can still run grunt, and should still
be able to build everything. The Gruntfile has been modified to build into
starterbootstrap's js and css directories and use jQNew.

Examples
--------

The following list contains sites using this template or a fork of it. Raise an issue or
contact me if you'd like to be added to this list.

  * http://piratebox.cc/start
  * http://www.tributieimposte.it/portaleiuc
  * http://elgitar.com/
  * http://www.animint.net/
