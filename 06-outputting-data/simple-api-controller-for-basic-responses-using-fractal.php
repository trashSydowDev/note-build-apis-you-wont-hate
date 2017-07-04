<?php

use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\Manager;
use Illuminate\Routing\Controller;

class ApiController extends Controller
{
    protected $statusCode = 200;
    public function __construct(Manager $fractal)
    {
        $this->fractal = $fractal;
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    protected function respondWithItem($item, $callback)
    {
        $resource = new Item($item, $callback);
        $rootScope = $this->fractal->createData($resource);
        return $this->respondWithArray($rootScope->toArray());
    }

    protected function respondWithCollection($collection, $callback)
    {
        $resource = new Collection($collection, $callback);
        $rootScope = $this->fractal->createData($resource);
        return $this->respondWithArray($rootScope->toArray());
    }

    protected function respondWithArray(array $array, array $headers = [])
    {
        return Response::json($array, $this->statusCode, $headers);
    }


    // Outputting Errors
    const CODE_WRONG_ARGS = 'GEN-FUBARGS';     // 400
    const CODE_NOT_FOUND  = 'GEN-LIKETHEWIND'; // 404
    const CODE_INTERNAL_ERROR = 'GEN-AAAGGH';  // 500
    const CODE_UNAUTHORIZED = 'GEN-MAYBGTFO';  // 401 Get The Fuck Out
    const CODE_FORBIDDEN = 'GEN-GTFO';         // 403 Get The Fuck Out

    protected function respondWithError($message, $errorCode)
    {
        if ($this->statusCode === 200) {
            trigger_error(
                "You better have a really good reson for erroring on a 200...",
                E_USER_WARNING
            );
        }

        return $this->respondWithArray([
            'error' => [
                'code' => $errorCode,
                'http_code' => $this->statusCode,
                'message' => $message
            ]
        ]);
    }

    public function errorForbidden($message = 'Forbidden')
    {
        return $this->setStatusCode(403)
            ->respondWithError($message, self::CODE_FORBIDDEN);
    }

    public function errorInternalError($message = 'Internal Error')
    {
        return $this->setStatusCode(500)
            ->respondWithError($message, self::CODE_INTERNAL_ERROR);
    }

    public function errorNotFound($message = 'Resource Not Founds')
    {
        return $this->setStatusCode(404)
            ->respondWithError($message, self::CODE_NOT_FOUND);
    }

    public function errorUnauthorized($message = 'Unauthorized')
    {
        return $this->setStatusCode(401)
            ->respondWithError($message, self::CODE_UNAUTHORIZED);
    }

    public function errorWrongArgs($message = 'Wrong Arguments')
    {
        return $this->setStatusCode(400)
            ->respondWithError($message, self::CODE_WRONG_ARGS);
    }
}
