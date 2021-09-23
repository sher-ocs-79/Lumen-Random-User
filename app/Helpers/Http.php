<?php

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\Middleware;

if (!function_exists('HttpClient')) {
	function HttpClient($url, $data, $options = array())
	{
		$params = [];
		$headers = ['Content-Type' => 'application/json'];
		if (!empty($options['headers'])) {
			$headers = array_merge($headers, $options['headers']);
		}
		$method = !empty($options['method']) ? $options['method'] : 'GET';
		if ($method == 'POST') {
			$payload_format = isset($options['json_payload']) ? 'json' : 'form_params';
			$params[$payload_format] = $data;
		} else {
			$url .= '?' . http_build_query($data);
		}
		$client_params = ['headers' => $headers];
		$tapMiddleware = Middleware::tap(function ($request) use($url) {
			$message = $url.PHP_EOL;
			$message .= $request->getHeaderLine('Content-Type').PHP_EOL;
			$message .= $request->getBody();
			logApiRequest($message);
		});
		$handler = new CurlHandler();
		$stack = HandlerStack::create($handler);
		$params['handler'] = $tapMiddleware($stack);
		$client_params['handler'] = $stack;
		try {
			$client = new Client($client_params);
			$response = $client->request($method, $url, $params);
			$content = $response->getBody()->getContents();
			logApiResponse($content);
		} catch (Exception $error) {
			logError($error, array_merge($data,['headers' => $headers]));
			$content = '';
		}
		return json_decode($content);
	}
}