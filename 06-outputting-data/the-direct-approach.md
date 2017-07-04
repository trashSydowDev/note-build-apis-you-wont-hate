# The Direct Approach

## Intorduction
* Assuming you have written tests for these endpoints before they exist.

```
// list of places
{
    "data": [
        { "id": 2, "name": "Videology" },
        { "id": 3, "name": "Barcade" }
    ]
}

// One place
{
    "data": { "id": 2, "name": "Videology" }
}
```

## Comparison

### One
* Code see [Gate](./dangerously-bad-example-of-passing-data-from-the-database-directly-as-output.php)
* Performance: If you have a thousand records in that table (Boom).
* Display: PHP's popular SQL extensions all typy cast all data coming out of a query as string.
    * Mysql "boolean" field will display "1" or "0".
    * PostgreSQL "boolean" field will display "f" or "t".
* Security: Sometime you want to hidden option to hide specific fields (password, etc.).
* Stability: If you change the name of a database field, and etc. (比如你修改了 name 为 username, 这样会导致他人也需要修改。又或者使用了不同的数据库，将有可能会造成返回值的改变。)

### Two
* Code see [Gate](./laborious-example-of-type-casting-and-formatting-data-for-output.php)
* The type casting of various fields turn numeric strings into integers, coordinates into floats, and so on.
* But this is icky.

### Three
* Code see [Gate](./considerably-better-approach-to-formatting-data-for-output.php)
* You could move all of these transform methods to a new class or shove them in the `ApiController`, but that would just be odd.

### Four
* You can use [fractal](http://fractal.thephpleague.com/).
* You can google the keys "data marshaling" or "serialization".
