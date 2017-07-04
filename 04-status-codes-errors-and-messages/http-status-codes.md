# HTPP Status Codes
You want to let people know what is wrong using two simultaneous approaches:
* HTTP status codes
* Custom error codes and messages

## Status Codes
* 2xx is all about success
* 3xx is all about redirection
* 4xx is all about client errors
* 5xx is all about service errors

## Common Codes
* 200 - Generic everyting is OK.
* 201 - Created sometings OK.
* 202 - Accepted but is being processed async.
* 400 - Bad Request.(should really be for invalid syntax, but some folks use for validation)
* 401 - Unauthorized.(no current user and ther should be)
* 403 - The current user is forbidden from accessing this data.
* 404 - That URL is not a valid route, or the item resource does not exit.
* 405 - Method Not Allowed.
* 410 - Data has been deleted, deactivated, suspended, etc.
* 500 - Someting unexpected happended, and it is the APIs fault.
* 503 - API is not here right now, please try again later.

## Notes
Most 5xx issues will likely happen under odd architecture or server related issues.
