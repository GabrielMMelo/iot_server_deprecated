
# IoT Server

## What's the project?

It's a modular home automation plataform that uses an web server to provide an user interface and establish web-socket connections with ESP8266 modules. Through the plataform, you can control IR TVs, lights and other on/off devices.

## Techonologies used

- [Laravel 5.6](https://laravel.com/);
- [Socket.io](https://socket.io/);
- [ESP8266-12E](https://www.espressif.com/en/products/hardware/esp8266ex/overview);
- [ArduinoJson](https://arduinojson.org/);
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

You can follow my [laravel getting started tutorial](https://github.com/GabrielMMelo/iot_server/blob/esp8266/resources/docs/pdf/Laravel.pdf) (PORTUGUESE LANGUAGE).

After that, you must clone our repo and then make sure that your favorite web server (we used apache2) is running and looking at our cloned repo in your machine.

### Creating a new module

For easily create new modules or delete them to your home automation, we created artisan commands that do all changes automatically. The command below must be executed in project root directory.

```
php artisan  make:module [options] [--] <type> [<id>] [<local>] [<owner>]
```

For example, if you need to add a new Samsung tv module on your room using an ESP8266 with id = 3:

```
php artisan  make:module tv 3 Your_Room
``` 

![alt text](https://github.com/GabrielMMelo/iot_server/blob/esp8266/resources/docs/img/new_tv.png "New tv module created")

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

#define _ID 3 // <- change for the same created module id

#define DEBUG Serial

#define SSID "yourSSID"

#define PWD "yourPassword"
```

Your home automation module is working now!

### Deleting a new module

If you want to delete a node module, then you must specify it count. The module count is showed below:

![alt text](https://github.com/GabrielMMelo/iot_server/blob/esp8266/resources/docs/img/module_counter.png "Module counter")

So, to delete a node module with count = 2, do it:

```
 php artisan make:module node -C 2 -D
```

