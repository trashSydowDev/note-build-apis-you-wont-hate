# Error Codes and Error Message
* Error codes are usually strings or integers that act as a unique index.
* Error codes a lot like HTTP status codes, but these errors are about application specific things.
* Error message provided in the HTTP response to include more information.

## X
```
{
    "error": {
        "type": "OAuthException",
        "message": "Session has expired at unxit time...."
    }
}
```

## Facebook
```
{
    "error": {
        "type": "OAuthException",
        "code": "ERR-01234",
        "message": "Session has expired at unxit time....",
        "href": "http://example.com/docs/errors/#ERR-01234"
    }
}
```
