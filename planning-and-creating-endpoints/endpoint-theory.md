# Planning And Creating Endpoints
## GET Resources
* GET `/resources` - Some paginated list of stuff, in some logical default order, for that specific data.
* GET `/resources/x` - Just entity x. That can be an ID, hash, slug, username, etc., as long as it's unique to one "resource".
* GET `/resources/X,Y,Z`- The client wants muliple things, so give them multiple things.

## GET Subresources
* GET `/places/X/checkins` - Find all the checkins for a specific place.
* GET `/users/X/checkins` - Find all the checkins for a specific user.
* GET `/users/X/checkins` - Find a specific checkin for a specific user.

## Auto-Increment is the Devil
* Instead a unique identifier is often a good idea. A universal unique identifier (UUID) seems like a logical thing to do.

## DELETE Resources
* DELETE `/places/X` - Delete a single place.
* DELETE `/places/X,Y,Z` - Delete a bunch of places.
* DELETE `/places` - This is a potentially dangerous endpoint that could be skipped, as it should delete all places.
* DELETE `/places/X/image` - Delete the image for a place
* DELETE `/places/X/images` - If you chose to have multiple images this would remove all of them.

## POST and PUT
* 语义上 POST => 创建、PUT => 更新
* 幂等上 POST => 不幂等、PUT => 幂等
* 本质上二者都可以创建资源

## Plural, Singular or Both?
* If you only use Singular, that make the user confusing.
* If you use Plural and Singular，that create expceptions like `/opportunity/1` and `/opportunities`.

* Pick plural for everything as it is the most obvious:
    * `/places` - If I run a GET on that, I will get a colletion of places.
    * `/places/45` - Pretty sure I am just talking about place 45.
    * `/places/45,28` - Ahh, places 45 and 28, got it.
    * `/places/45/checkins/91` - Subresources using plural.

## Verb or Noun?
Bad:
```
POST /SendUserMessage HTTP/1.1
Host: example.com
Content-Type: application/x-www-form-urlencoded

id=5&message=Hello!
```

Good:
```
POST /users/5/send-message HTTP/1.1
Host: example.com
Content-Type: application/json

{ "message" : "Hello!" }
```

Perfect:
```
POST /users/5/messages HTTP/1.1
Host: example.com
Content-Type: application/json

{ "message" : "Hello!" }
```

Perfect:
```
POST /messages HTTP/1.1
Host: example.com
Content-Type: application/json

[
    {
        "user": { "id" : 10 },
        "message" : "Hello!"
    },
    {
        "user" : { "username" : "philsturgeon" },
        "message" : "Hello!"
    }
]
```
