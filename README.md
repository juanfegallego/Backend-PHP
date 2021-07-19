<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

<a name="top"></a>

<h1>Chat  videogames App - Backend</h1>

🧐 [About](#id1)   

💻 [Technologys](#id2)

:clipboard: [Instructions](#id3)

⚙️ [Endpoints](#id5)





---

<a name="id1"></a>
## **About**

This is the backend for a chat aplication.

This project is part of the Full Stack Developer Bootcamp taught by [GeeksHubs Academy](https://bootcamp.geekshubsacademy.com/).

---
**Working time on the project**
**Start Date:** 05/ july /2021
**Deadline:** 19/ july / 2021

**Made by:**

* [Juan Felipe Porras Gallego](https://github.com/juanfegallego)

---

<a name="id2"></a>

## **Technologies**

These are the technologies with which we have worked in this project:
<img src="https://upload.wikimedia.org/wikipedia/commons/2/27/PHP-logo.svg" alt="PHP" width="50"/> <img src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Laravel.svg" alt="Laravel" width="30"/><img src="https://iconape.com/wp-content/files/ja/89479/png/postman.png" alt="Postman" width="35"/>  <img src="https://miro.medium.com/max/650/1*zzvdRmHGGXONZpuQ2FeqsQ.png" alt="Git" width="35"/> <img src="https://logos-marcas.com/wp-content/uploads/2020/11/GitHub-Logo-650x366.png" alt="GitHub" width="55"/> <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/DBeaver_logo.svg" alt="DBeaver" width="50" /> <img src="https://www.logo.wine/a/logo/MySQL/MySQL-Logo.wine.svg" alt="Mysql" width="60"/> <img src="https://getcomposer.org/img/logo-composer-transparent2.png" alt="composer" width="45"/> <img src="https://www.nicepng.com/png/full/223-2233246_heroku-logo-salesforce-heroku.png" alt="heroku" width="40"/>




<a name="id3"></a>
***
## **Instructions**
<details>

<summary>Click to expand</summary>

<br>

- <b>To install all dependencies</b>
```
    $ composer install
```
</details> 

<a name="id4"></a>
## [Backend development](https://github.com/juanfegallego/Backend-PHP)




The project consists of the development of a chat in which players can talk about their favorite video games and share opinions.

The database that I have used is worked with DBeaver and later deployed in heroku

The frontend has these sections:

<a name="id5"></a>
## **Endpoints**
<details>

<summary>Click to expand</summary>


<br>

<b>USER</B>


Register

    POST /api/register 
Login

    POST /api/login --> Login a created user and returns a token

Show All Users (ONLY ADMIN)

    POST /api/users/all

<b>GAMES</B>

Create Game

     POST /api/game

Find game by ID

    GET /api/game/{ID}

Show all games

    GET /api/game


<b>COMMENT</B>

Create comment

    POST /api/comment 

<b>PartyUser</B>

Join the party

    POST api/partyUser/entry

<b>Models Relation</B>

<img src="resources/img/diagrama.png" alt="diagrama"/>

</details>






<a name="id5"></a>

<a name="id6"></a>


***
[:top:](#top)