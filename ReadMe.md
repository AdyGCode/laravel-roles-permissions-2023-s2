Tutorial Link

https://hdtuto.com/article/-laravel-10-spatie-user-roles-and-permissions-tutorial

```shell
php artisan make:model Product -ars
php artisan make:controller RoleController --resource
php artisan make:controller UserController --resource
```
### For many to many demo
```shell
php artisan make:model Order -ars
php artisan make:model OrderProduct -ars --pivot

```

If you have not used the `--pivot` argument, then you are able to modify the model to suit. 

The example below is the OrderProduct model with the required Pivot Information:

```php
use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderProduct extends Pivot
```

Check the code for Orders etc. The seeders have been split into separate steps.

The Order-Product seeder relies on knowing the order id and product id!

```shell
php artisan migrate:fresh --seed --step
```
