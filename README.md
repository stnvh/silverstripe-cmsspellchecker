# Silverstripe CMS Spell Checker
[![Latest Stable Version](https://poser.pugx.org/stnvh/silverstripe-cmsspellchecker/v/stable.svg)](https://packagist.org/packages/stnvh/silverstripe-cmsspellchecker) [![License](https://poser.pugx.org/stnvh/silverstripe-cmsspellchecker/license.svg)](https://packagist.org/packages/stnvh/silverstripe-cmsspellchecker)

Add TinyMCE spell checker support [without having to edit core](http://doc.silverstripe.org/framework/en/topics/rich-text-editing/#integrating-a-spellchecker-for-tinymce). Uses the config API to set options.

Tested and working on versions 3.1 down to 2.4.

By Stan Hutcheon - [Bigfork Ltd](http://bigfork.co.uk)

## Installation:

### Composer:

```
composer require "stnvh/silverstripe-cmsspellchecker" "~1"
```

### Download:

Clone this repo into a folder called ```cmsspellchecker``` in your silverstripe installation folder.

### Usage:

This assumes you have *pspell* installed or the *aspell* binary installed on your webserver.

If you have the pspell module installed it should work straight away. 
If you have just the binary installed, then you'll need to add something like below to ```mysite/_config/config.yml```:

```yml
CMSSpellChecker:
  engine: 'PSpellShell'
  shell: '/usr/local/bin/aspell'
```

For pre Silverstripe 3.0, set config via method calls:

*mysite/_config.php*:
```php
CMSSpellChecker::set_engine('PSpellShell');
CMSSpellChecker::set_shell('/usr/local/bin/aspell');
```

### Options:

##### engine:

- PSpell (default)
- PSpellShell
- EnchantSpell

##### shell:

- (used with *PSpellShell*, specifies where *aspell* is located on the server, default ```/usr/bin/aspell```)

After installing via composer, you must */dev/build*