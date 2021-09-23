<?php

if (!function_exists('logError')) {
	function logError(\Exception $error, $params = []) {
		$message = $error->getMessage().PHP_EOL;
		$message .= 'File: '.$error->getFile().':'.$error->getLine().PHP_EOL;
		if (!empty($params)) {
			$message .= 'Parameters: '.json_encode($params).PHP_EOL;
		}
		$message .= str_repeat('-', 100);
		\Log::error($message);
	}
}

if (!function_exists('logApiRequest')) {
	function logApiRequest($uri, $params = []) {
		$debug_message = 'Api Request: '.$uri.PHP_EOL;
		if (!empty($params)) {
			$debug_message .= 'Parameters: '.json_encode($params).PHP_EOL;
		}
		$debug_message .= str_repeat('-', 100);
		\Log::debug($debug_message);
	}
}

if (!function_exists('logApiResponse')) {
	function logApiResponse($message) {
		$debug_message = 'Api Response: '. $message.PHP_EOL;
		$debug_message .= str_repeat('-', 100);
		\Log::debug($debug_message);
	}
}

if (!function_exists('logInfo')) {
	function logInfo($message) {
		$debug_message = $message . PHP_EOL;
		$debug_message .= str_repeat('-', 100);
		\Log::info($debug_message);
	}
}