# HATEOAS

## Content Negotiation

### Bad
```
/statuses/show.json?id=210462857140252672
/statuses/show.xml?id=210462857140252672
```
### Good
Use Accept header to set content.
```
GET /places HTTP/1.1
Host: localhost:8000
Accept: application/json
```

## Hypermedia controls
```
return [
    'links' => [
        [ 'rel' => 'self', 'uri' => '/places/'.$place->id ],
        [ 'rel' => 'place.checkins', 'uri' => '/places/'.$place->id.'/checkins' ],
        [ 'rel' => 'place.image', 'uri' => '/places/'.$place->id.'/image' ],
    ]
]
```

### OPTIONS
#### Request
```
OPTIONS /places/2/checkins HTTP/1.1
Host: localhost:8000
```

#### Response
```
HTTP/1.1 200 OK
Host: localhost:8000
Connection: close
Allow: GET,HEAD,POST
```
