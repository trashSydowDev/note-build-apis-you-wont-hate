<?php

function respondWithArray(array $array, array $header = [])
{
    $mimeParts = (array) explode(';', Input::server('HTTP_ACCEPT'));
    $mimeType  = strtolower($mimeParts[0]);

    switch ($mimeType) {
        case 'application/json':
            $contentType = 'application/json';
            $content = json_encode($array);
            break;

        case 'application/x-yaml':
            $contentType = 'application/x-yaml';
            $dumper = new YamlDumper();
            $content = $dumper->dump($array, 2);
            break;

        default:
            $contentType = 'application/json';
            $content = json_encode([
                'error' => [
                    'code' => static::CODE_INVALID_MIME_TYPE,
                    'http_code' => 406,
                    'message' => sprintf('Content of type %s is not supported.', $mimeType);
                ]
            ]);
            break;
    }

    $response = Response::make($content, $this->statusCode, $headers);
    $response->header('Content-Type', $contentType);

    return $response;
}
