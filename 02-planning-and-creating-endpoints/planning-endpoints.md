# Planning Endpoints

## Controllers
* One controller for each type of resource.
* Everything should be a resource, and each resource needs a controller.
* Subresources can somtimes just be a method, but if it is a resources, that rules are flexible.

## Routes
利用 路由 来决定使用哪个 控制器，可以让 API 更加直观，例子：

| Action | Endpoint | Route |
| --- | --- | --- |
| Create | POST /users | Route::post('users', 'UsersController@create') |
| Read | GET /users/X | Route::post('users/{id}', 'UsersController@show') |
| List | GET /users | Route::post('users', 'UsersController@list') |
| Favorites | GET /users/x/favorites | Route::post('users/{id}/favorites', 'UsersController@favorites') |
| Checkins | GET /users/x/checkins | Route::post('users/{user_id}/checkins', 'CheckinsController@index') |

There are few things in here worth considering:
* Favorites 从 UsersController 中获得，因为 favorites 对于用户来说只是一种关联。
* Checkins 从 CheckinsController 中获得，因为 Checkins 是一种 Resources ，我们只需要传入 user_id 就可以获得资源的相关信息了。
* 尽量不要让相似的逻辑，出现在不一样的API中，这样会照成使用API的人困惑的。

## Methods
* 一个路由将对应一个控制器的方法。
* 使用简单的返回值例如 `return 'hello';` 来进行测试后，再继续完善方法。
