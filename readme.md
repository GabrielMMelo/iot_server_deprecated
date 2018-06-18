<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## What's the project?

It's a modular home automation plataform that uses an web server to provide an user interface and establish web-socket connections with ESP8266 modules. Through the plataform, you can control IR TVs, lights and other on/off devices.

## Techonologies used

- [Laravel 5.6](https://laravel.com/);
- [Socket.io](https://socket.io/);
- [ESP8266-12E](https://www.espressif.com/en/products/hardware/esp8266ex/overview);
- [ArduinoJson]();
- Apache2;
- Raspberry pi 3 B as a server;
- IR communication.

## How to use

Before use, you need to properly install all Laravel requirements:


1.    PHP >= 7.1.3
2.    OpenSSL PHP Extension
3.    PDO PHP Extension
4.    Mbstring PHP Extension
5.    Tokenizer PHP Extension
6.    XML PHP Extension
7.    Ctype PHP Extension
8.    JSON PHP Extension

After that you must clone our repo and then make sure that your favorite web server (we used apache2) is running and looking at our cloned repo in your machine.

### Creating a new module

For easily create new modules and delete them to your home automation, we created artisan commands that do all changes automatically.

```
php artisan  make:module [options] [--] <type> [<id>] [<local>] [<owner>]
```

For example, if you need to add a new Samsung tv module on your room using an ESP8266 with id = 3:

```
php artisan  make:module tv 3 Your_Room
``` 

Doing that, your web application create a new interface to interact with new module. Now is just add the corresponding id in your ESP8226 code like that:

```c++
// config.h file
#include <Arduino.h>

#include <ESP8266WiFi.h>
#include <ESP8266WiFiMulti.h>
#include <ESP8266HTTPClient.h>

#include <SocketIoClient.h>
#include <ArduinoJson.h>

#include "ir.hpp"

#define _ID 3

#define DEBUG Serial

#define SSID "yourSSID"

#define PWD "yourPassword"
```

Your home automation plataform is working now!

