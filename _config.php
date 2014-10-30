<?php

define('SPELLCHECK_DIR', basename(dirname(__FILE__)));

$admin = '/admin';
$url = '/pages/spellcheck';

if(!class_exists('Config')) {
	// pre 3.0 :(
	define('SPELLCHECK_POST_SS3', true);
	Object::add_extension('CMSMain', 'CMSSpellChecker');
	$url = '/spellcheck';
} else {
	$rules = Config::inst()->get('Director', 'rules');
	$admin = array_search('AdminRootController', $rules);
}

HtmlEditorConfig::get('cms')->setOption('browser_spellcheck', 'false');
HtmlEditorConfig::get('cms')->enablePlugins('spellchecker');

HtmlEditorConfig::get('cms')->setOption(
    'spellchecker_rpc_url',
    $admin . $url
);
