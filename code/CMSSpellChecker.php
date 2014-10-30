<?php

class CMSSpellChecker extends LeftAndMainExtension {

	private static $allowed_actions = array(
		'spellcheck'
	);

	public function spellcheck(SS_HTTPRequest $request) {
		$this->owner->request->addHeader('Content-Type', 'text/plain');
		$this->owner->request->addHeader('Content-Encoding', 'UTF-8');
		$this->owner->request->addHeader('Expires', 'Mon, 26 Jul 1007 05:00:00 GMT');
		$this->owner->request->addHeader('Last-Modified', SS_DateTime::now()->Format('D, d M Y H:i:s') . ' GMT');
		$this->owner->request->addHeader('Cache-Control', 'no-store, no-cache, must-revalidate');
		$this->owner->request->addHeader('Cache-Control', 'post-check=0, pre-check=0');
		$this->owner->request->addHeader('Pragma', 'no-cache');

		$config['general.engine'] = Config::inst()->get('CMSSpellChecker', 'engine') ?: 'PSpell';

		$config['PSpell.mode'] = PSPELL_FAST;
		$config['PSpell.spelling'] = '';
		$config['PSpell.jargon'] = '';
		$config['PSpell.encoding'] = '';

		$config['PSpellShell.mode'] = PSPELL_FAST;
		$config['PSpellShell.aspell'] = Config::inst()->get('CMSSpellChecker', 'shell') ?: '/usr/bin/aspell';
		$config['PSpellShell.tmp'] = '/tmp';

		$output = array(
			'id' => null,
			'result' => null,
			'error' => null
		);

		$raw = $request->requestVar('json_data') ?: '';

		if(!$raw) {
			$raw = '' . file_get_contents('php://input');
		}

		if(!$raw) {
			$output['error'] = array(
				'errstr' => 'Could not get raw post data',
				'errfile' => '',
				'errline' => null,
				'errcontext' => '',
				'level' => 'FATAL'
			);
			echo json_encode($output);
			exit;
		}

		$input = json_decode($raw, true);

		if(isset($config['general.engine'])) {
			$spellchecker = new $config['general.engine']($config);
			$result = call_user_func_array(array($spellchecker, $input['method']), $input['params']);
		}

		$output['id'] = $input->id;
		$output['result'] = $result;

		echo json_encode($output);
	}

}
