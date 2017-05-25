<?php

namespace Airbrake\Http;

/**
 * Interface ClientInterface
 */
interface ClientInterface
{
    /**
     * Sends a request
     *
     * @param string $url    The endpoint to send the request to.
     * @param string $data   The body of the request as json encoded string
     * @param array $options HTTP options to be honored by the client
     *
     * @return array Raw response from the server.
     *
     * @throws \Airbrake\Exception
     */
    public function send($url, $data, $options);
}
