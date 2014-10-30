# Silverstripe CMS Spell Checker
[![Latest Stable Version](https://poser.pugx.org/stnvh/silverstripe-cmsspellchecker/v/stable.svg)](https://packagist.org/packages/stnvh/silverstripe-cmsspellchecker) [![License](https://poser.pugx.org/stnvh/silverstripe-cmsspellchecker/license.svg)](https://packagist.org/packages/stnvh/silverstripe-cmsspellchecker)

Add TinyMCE spell checker support [without having to edit core](http://doc.silverstripe.org/framework/en/topics/rich-text-editing/#integrating-a-spellchecker-for-tinymce). Uses the config API to set options.

By Stan Hutcheon - [Bigfork Ltd](http://bigfork.co.uk)

## Installation:

### Composer:

```
composer require "stnvh/silverstripe-cmsspellchecker" "1.*"
```

### Download:

Clone this repo into a folder called ```spellchecker``` in your silverstripe installation folder.

### Usage:

This assumes you have **pspell** installed, either the binary (*aspell*), PHP module or both.

If you have the pspell PHP module installed it should work straight away. If not you may need to change your server config, or add some options in your ```mysite/_config/config.yml```

example in config.yml:
```yml
CMSSpellChecker:
  engine: 'PSpellShell'
  shell: '/usr/local/bin/aspell'

```

### Options:

##### engine:

- PSpell (default)
- PSpellShell
- EnchantSpell

##### shell:

- (used with *PSpellShell*, specifies where *aspell* is located on the server, default ```/usr/bin/aspell```)

After installing via composer, you must */dev/build*