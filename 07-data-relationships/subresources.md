## Subresources
* Try to avoid going over HTTO too many times by shoving as much data as possible into one request.
* But!!!!! If you call the `/places` endpoint you automatically get `checkins`, `cuttent_opps`, `merchants` and `images`. Unfortunately, shoving all of the information into the response means waiting for huge file downloads full or irrelevant data! Even with GZIP compression enabled on the web server.
* So!!!!!!!!!!!!!! An API needs the flexibility, and making subresources the only way to load related data is restrictive for the API consumer.

## Method
### Foregin Key Arrays
To use the `JSON-API` is bad!!!!!!!!!!!!!!!!!!!! If you want to get a post and comments, you need set 1 + 2 HTTP requests.
```
{
    "post": {
        "id": 1,
        "title": "Ahhhh",
        "_links": { "comments": [1, 2] }
    }
}
```

### Compound Documents(aka Sideloading)
```
{
    "posts": [
        { "id": 1, "_links": { "comments": [1, 2] } },
        { "id": 2, "_links": { "comments": [3] } }
    ],
    "_linked": {
        "comments": [
            {"id": 1, content: "hello world" },
            {"id": 2, content: "hello php"},
            {"id": 3, content: "hello python"},
        ]
    }
}
```

### Embedded Documents (asa Nesting)
* url: `/places?include=checkins,merchant`.
* it will loading data.
```
{
    "data": [
        { "id": 2, "checkins": [], "merchant": [] },
        { "id": 1, "checkins": [], "merchant": [] },
    ]
}
```

## Embedding with Fractal
* Code [Gate](./user-transformer-using-fractal.php)

```php
// Old Use
$requestedEmbeds = $request->get('include');
$possibleRelationships = ['checkins' => 'checkin'];

$eagerLoad = array_intersect($possibleRelationships, requestedEmbeds);
$books = Book::with($eagerLoad)->get();

// New Use
public function __construct(Manager $fractal)
{
    $this->fractal = $fractal;
    if(Input::get('include')) {
        $this->fractal->parseIncludes(Input::get('include'));
    }
}
```
