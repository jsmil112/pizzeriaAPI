# PizzeriaAPI

A simple RESTful API for a mock pizza delivery company using the PHP framwork Laravel. The front-end of this project can be seen at [Pizzeria](https://github.com/jsmil112/pizzeria).

## Dependencies:

* PHP
* Laravel
* Composer

## To migrate the DB

```
php artisan migrate
```

## To seed the DB

```
php artisan db:seed
```

## To start server

    php artisan serve

## To run tests

    php artisan test

## Routes

- GET "/products" - retrieve all existing products.
- GET "/order/{orderId}"
- POST "/order" - post new order.
  - Body Data - {"data": {
    							name: string,
    							contact_number: string,
    							address: string,
    							subtotal: float,
    							shipping: float,
    							total: float,
    							items: [{
    								id: integer,
    								quantity: integer
    							}]
    					}}

## Notes

In the current version the products are imported by a seeder. 
