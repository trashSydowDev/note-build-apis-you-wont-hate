# Different Approaches To API Versioning

## URI
* https://api.example.com/v1/places
* https://api.example.com/1/places
* https://api.example.com/1.1/places

### Pros
* Incredibly simple for API developers
* Incredibly simple for API consumers
* Copy-and-pasteable URLs

### Cons
* Not technically RESTful
* Tricky to separate onto different servers
* Forces API consumers to do weird stuff to keep links up-to-date

## Hostname
* This dose not really solve any of the other problems.
* https://api-v1.example.com/places

### Pros
* Incredibly simple for API developers
* Incredibly simple for API consumers
* Copy-and-pasteable URLs
* Easy to use DNS to split versions over multiple servers

### Cons
* Not technically RESTful
* Forces API consumers to do weird stuff to keep links up-to-date

## Body and Query Params
```
POST /places HTTP/1.1
Host: api.example.com
Content-Type: application/json

{ "version" : "1.0" }
```

```
POST /places?version=1.0 HTTP/1.1
Host: api.example.com
```

### Pros
* Simple for API developers
* Simple for API consumers
* Keeps URLs the same when param is in the body
* Technically a bit more RESTful than putting version in the URI

### Cons
* Different content types require different params, and some (like CSV) just do not fit.
* Forces API consumers to do weird stuff to keep links up-to-date when the param is in the query string.

## Custom Request Header
```
GET /places HTTP/1.1
Host: api.example.com
BadApiVersion: 1.0
```

### Pros
* Simple for API consumers (if they know about headers).
* Keeps URLs the same.
* Technically a bit more RESTful than putting version in the URI.

### Cons
* Cache systems can get confused.
* API developers can get confused (if they do not know about headers).

## Content Negotiation
```
application/vnd.github[.version].param[+json]
```

### Pros
* Simple for API consumers (if they know about headers)
* Keeps URLs the same
* HATEOAS-friendly
* Cache-friendly
* Sturgeon-approved

### Cons
* API developers can get confused (if they do not know about headers)
* Versioning the WHOLE thing can confuse users (but this is the same with all previous approaches)

## Content Negotiation for Resources
```
Accept: application/vnd.github.user+json; version=4.0
```

### Pros
* HATEOAS-friendly
* Cache-friendly
* Keeps URLs the same
* Easier upgrades for API consumers
* Can be one code base or multiple

### Cons
* API consumers need to pay attention to versions
* Splitting across multiple code bases is not impossible, but it is hard
* Putting it in the same code base leads to accidental breakage, if transformers are not versioned
