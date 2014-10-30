<?php

define('SPELLCHECK_DIR', basename(dirname(__FILE__)));

$rules = Config::inst()->get('Director', 'rules');
$admin = array_search('AdminRootController', $rules);

HtmlEditorConfig::get('cms')->setOption('browser_spellcheck', 'false');
HtmlEditorConfig::get('cms')->enablePlugins('spellchecker');

HtmlEditorConfig::get('cms')->setOption(
    'spellchecker_rpc_url',
    $admin . '/pages/spellcheck'
);
