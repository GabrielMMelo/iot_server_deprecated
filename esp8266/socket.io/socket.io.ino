#include "config.hpp"

#define B1 5

ESP8266WiFiMulti WiFiMulti;
SocketIoClient webSocket; 

Samsung* tv = new Samsung();

void event(const char * payload, size_t length) { 
  const size_t bufferSize = JSON_ARRAY_SIZE(1) + JSON_OBJECT_SIZE(1) + JSON_OBJECT_SIZE(2) + 30;
  DynamicJsonBuffer jsonBuffer(bufferSize);
  const char* json = payload;
  JsonObject& root = jsonBuffer.parseObject(json);
  int data0_id = root["data"]["id"]; // 1
  
  if(data0_id == _ID){
    digitalWrite(B1, !digitalRead(B1));
    DEBUG.println(digitalRead(B1));
    //tv->power();
    tv->volume(true);
    delayMicroseconds(50);
  }
  else{
    DEBUG.println("it's not for me...");
  }
}

void setup() {
    pinMode(B1, OUTPUT);
    digitalWrite(B1, LOW);
    
    DEBUG.begin(115200);

    DEBUG.setDebugOutput(true);

    DEBUG.println();
    DEBUG.println();
    DEBUG.println();

    for(uint8_t t = 4; t > 0; t--) {
      DEBUG.printf("[SETUP] BOOT WAIT %d...\n", t);
      DEBUG.flush();
      delay(1000);
    }

    WiFiMulti.addAP(SSID, PWD);

    while(WiFiMulti.run() != WL_CONNECTED) {
      delay(100);
    }

    webSocket.on("button-channel:App\\\\Events\\\\Button", event);
    webSocket.begin("192.168.0.109", 3000, "/socket.io/?transport=websocket");
}

void loop() {
    webSocket.loop();
}
