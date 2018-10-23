#include <Arduino.h>

#include <ESP8266WiFi.h>
#include <ESP8266WiFiMulti.h>
#include <ESP8266HTTPClient.h>

#include <SocketIoClient.h>
#include <ArduinoJson.h>

#include "ir.hpp"

// ESP8266 ID
#define _ID 1

#define DEBUG Serial

// Your Wi-Fi network credentials
#define SSID "Dougras"
#define PWD "eusouodougrasvocenaoehodougras"
