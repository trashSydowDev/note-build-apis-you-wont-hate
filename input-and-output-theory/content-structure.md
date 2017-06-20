# Content Structure

## JSON-API
* There is one recommended format on [JSON-API](http://jsonapi.org/)

### Pros
* Consistent response - It always has the same structure.

### Cons
* Some RESTful/Data utilities freak about having single responses in an array.
* Potentially confusing to humans.

## Twitter-style
* Ask for one user get one user:
```
{
    "name": "Xiaoer",
    "id": "10002"
}
```
* Ask for a collection of things, get a collection of things.
```
[
    {
        "name": "Xiaoer",
        "id": "10002"
    },
    {
        "name": "Xiaosi",
        "id": "10003"
    }
]
```

### Pros
* Minimalistic response.
* Almost every framework/utility can comprehend it.

### Cons
* No space for pagination or other metadata.

## Facebook-style
* Ask for one user get one user:
```
{
    "name": "Xiaoer",
    "id": "10002"
}
```

* Ask for a collection of things, get a collection of things.
```
{
    "data": [
        {
            "name": "Xiaoer",
            "id": "10002"
        },
        {
            "name": "Xiaosi",
            "id": "10003"
        }
    ]
}
```

### Pros
* Space for pagination and other metadata in collection.
* Simplisic response even with the extra namespace.

### Cons
* Single items still can only have metadata by embedding it in the item resource.

## Much Namespace, Nice Output
Namespace the resource:

```
{
    "data": {
        "name": "Xiaoer",
        "id": "10002"
    }
}
```

Namespace the collection:

```
{
    "data": [
        {
            "name": "Xiaoer",
            "id": "10002"
        },
        {
            "name": "Xiaosi",
            "id": "10004"
        }
    ]
}
```

Some folks will suggest that you should change "data" to "users", but when you start to nest you data,you want to keep that special name for the name of the relationship:

```
{
    "data": {
        "name": "Xiaoer",
        "id": "10002",
        "comments": {
            "data": [
                {
                    "id": 10002,
                    "text": "Sorry I said those inappropriate things."
                }
            ]
        }
    }
}
```
