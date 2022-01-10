<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Assignment

This project performs basic CRUD operations using Laravel 8. 

### Tech Stack Used

- PHP 7.4.9
- Laravel 8
- JavaScript
- Bootstrap
- MySQL

### To run the application

- Change the .env according to local variables (DB NAME, USER & PORT)
- Create database `unity_payments`
- Run `php artisan migrate` to crate tables
- Run `php artisan serve` to run the app on the browser. Alternatively you use WAMP or Linux Server

### Below are the snapshot of the application

## Users Page 

In this page, you can create user, edit user data and delete the user

![image](https://user-images.githubusercontent.com/36239404/148715937-b61d6f31-134e-4b7c-b035-6311ca2d5a52.png)

### Add User

When you click submit, new user gets added into database and you get confirmation image that new user has been added


![image](https://user-images.githubusercontent.com/36239404/148716081-32a9b22b-dfe8-4986-a182-d30debd79021.png)

![image](https://user-images.githubusercontent.com/36239404/148716156-1fc14036-a6f9-4897-865b-f9f4d4ba7dfa.png)

> **Validation** :
> If the Id or Name column is left empty, system doesn't insert the data and return error message

![image](https://user-images.githubusercontent.com/36239404/148716275-fcb343db-605a-4a12-96c4-4b0004f42061.png)

### Edit User

Editing user updates the database record and return confirmation message when after update

![image](https://user-images.githubusercontent.com/36239404/148716392-073442b8-997d-4062-9ebc-03598299095b.png)

![image](https://user-images.githubusercontent.com/36239404/148716411-6b04289c-1ca7-4f99-a80b-237db155367d.png)

### Delete User

Deleting user delete the database record and return confirmation message after deletion. Also it updates the page with live data.

![image](https://user-images.githubusercontent.com/36239404/148716486-4d27e2ad-487d-40c3-92c7-3274bf6d94bf.png)

![image](https://user-images.githubusercontent.com/36239404/148716504-8a88ae18-851e-4600-a918-b7b960e8271a.png)



## Company Page

This page operates exactly same CRUD operation as Users Page with one additional feature. 

- You can add users to the company

![image](https://user-images.githubusercontent.com/36239404/148716567-27066b8c-5ab2-4503-8941-f2233fa34fc6.png)

![image](https://user-images.githubusercontent.com/36239404/148716711-5b651735-fe41-4c32-8550-3cf599598951.png)

- Multiple users can be attached to same company

![image](https://user-images.githubusercontent.com/36239404/148716771-90de61d6-f15c-46ab-a7ae-2d7e997dfa73.png)








