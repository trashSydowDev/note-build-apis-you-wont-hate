# Supporting Formats

## No Form Data
* $_GET contains query string content regardless of the HTTP method.
* $_POST contains the values of the `HTTP Body` if it was in the right format, and the `Content-Type` header is `application/x-www-form-urlencoded`.
* An HTTP POST item could still have a query string, and that would still be in `$_GET`. (Some PHP frameworks kill of $_GET data in an HTTP POST request)
* `Content-Type` equal `application/json` is clean. and `application/x-www-form-urlencoded` makes me upset and angry, can clever by mixing JSON with from data.
* everything in `application/x-www-form-urlencoded` is a string, you can use 1 or 0, because bar=true would be string("true").

## JSON and XML
* In XML, everything is considered a stirng, meaning integers, booleans, and nulls can be confused.

## Content Structure
