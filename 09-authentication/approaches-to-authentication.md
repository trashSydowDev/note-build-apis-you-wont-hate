# Different Approaches to Authentication

## Basic Authentication
* use username/password approach.

### Pros
* Easy to implement.
* Easy to understand.
* Works in the browser and any other HTTP client.

### Cons
* Is ludicrously insecure over HTTP.
* Is fairly insecure over HTTPS.
* Passwords can be stored by the browser, meaning a honeypot of user data is sitting around waiting to be gobbled up.
* !!! `Authorization: Basic QWxhZGRpbjpvcGVuIHNlc2FtZQ==` !!!

## Digest Authentication
Digest is an approach to authentication similar to Basic, but is designed to improve on the security concerns. Use `MD5` unlike Base64-based.

### Pros
* Password in not transmitted in plain text.
* The use of `nonce` helps negate rainbow table attacks.
* Generally speaking, more secure than basic auth.
* Easier to implement than some approaches.

### Cons
* Harder than basic auth to implement well. ()
* Easy to implement badly. (不容易实施好)
* Still insecure over HTTP.
* Just like basic auth, passwords can still be stored by the browser.
* Uses MD5.

## OAuth 1.0a
### Pros
### Cons

## OAuth 2.0
### Pros
### Cons
