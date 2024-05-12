# **AuthUser**
-------------------
AuthUser is flexible authorization system for Laravel, It checks the `route` permission to access a certain portion of the site or application. To add Permissions `User-based`, `Role-based`, `Conditionally`. It uses `authority.checkpost` middleware for filter permission of current accessing route, Under this middleware checked every permission of the user login.


## **Installation**
Require this package in your `composer.json` or install it by running:

```bash
    composer require journeycx/authuser
```

Now, insert this line into your `config/app.php` under the `provider` array.

```bash
    journeycx\AuthUser\AuthUser::class
```

Now, run this command after that `config/authuser.php` and `app/Http/Middleware/AuthUserCheckpostMiddleware.php` files are publish. 

```bash
    php artisan vendor:publish  --tag="authuser"
```

Now, insert this line into your `app/Http/Kernel.php` under the `$routeMiddleware` array.

```php
    'authority.checkpost'  => \App\Http\Middleware\AuthUserCheckpostMiddleware::class
```
Use `authority.checkpost` middleware for handle permission base routes.

```php  
    Route::group(['middleware' => 'authority.checkpost'], function () {
        // Place all those routes here which needs authentication and authorization.
    });
```
Now, the basic setup is ready you need to configure rules of permissions using `config/authuser`.

##  **Configuration**

The structure of permissions given below, but it's highly recommended to read more on [docs](https://journeycx.github.io/AuthUser/Sample_Structure)`.
```php

    [
        'allow' => ['*'], // Allowed permission to user. Priority is less than deny.
        'deny'  => ['temp1'], // Deny permission to user. Priority is higher than allow.
    ]

    canAccess('temp1');
    // false 
```



## **Usage - Helpers**

* **<h5>canAccess($accessId = null);</h5>**
Check the access, By default it check current route and return response in **boolean** value.
```php
    canAccess('temp1');
    // true or false
```

* **<h5>canPublicAccess($accessId = null); - <small>`Authentication not required`</small> </h5>**
Check the public access, By default it check current route and return response in **boolean** value.

```php
    canPublicAccess();
    // true or false
```

## **Usage - Facade**

* **<h5>AuthUser::check($accessId = null, $requestForUserId = null)</h5>**
Check the access of `$accessId`, By default it check current route and return response in **boolean** value, And it can check access of perticular user by passing user id `($requestForUserId)` parameter.
```php
    AuthUser::check('temp1');
    // true or false
```


* **<h5>AuthUser::isPublicAccess($accessId = null); - <small>`Authentication not required`</small></h5>**
Check the access of `$accessId`, By default it check current route and return response in **boolean** value.
```php
    AuthUser::isPublicAccess('temp1');
    // true or false
```


## **Usage - Directives**

* **<h5>@canAccess($accessId = null);</h5>**
Check the access, By default it check current route and return response in **boolean** value.
```php
    @canAccess()
       // your logic here.
    @endAccess;
```


* **<h5>@canPublicAccess($accessId = null); - <small>`Authentication not required`</small></h5>**
Check the public access, By default it check current route and return response in **boolean** value.
```php
    @canPublicAccess()
       // your logic here.
    @endAccess;
```

