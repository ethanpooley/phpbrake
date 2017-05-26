<?php

namespace Airbrake\Http;

/**
 * Class DefaultClient
 *
 * @package Airbrake
 */
class DefaultClient implements ClientInterface
{
    /**
     * @inheritdoc
     */
    public function send($url, $data, $options)
    {
        $defaultOptions = [
            'header' => "Content-type: application/json\r\n",
            'method' => 'POST',
            'content' => $data,
            'ignore_errors' => true,
        ];
        // Merge user-provided options with internal defaults, preferring the user-provided values.
        $options = ['http' => array_replace($defaultOptions, $options)];
        $context = stream_context_create($options);
        $body = file_get_contents($url, false, $context);
        $headers = (isset($http_response_header) ? $http_response_header : null);
        return ['headers' => $headers, 'data' => $body];
    }
}
