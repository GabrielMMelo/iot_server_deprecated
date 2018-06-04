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
  int data_id = root["data"]["id"]; 
  
  if(data_id == _ID){
    String data_type = root["data"]["type"];
    if(data_type == "tv"){
      String data_value = root["data"]["value"];
      
      if (data_value == "power") tv->power();
    
      else if(data_value == "volume"){ 
          if(root["data"]["value_2"] == "1") tv->volume(true);
          else tv->volume(false);
      }
  
      else if (data_value == "up") tv->up();
      else if (data_value == "down") tv->down();
      else if (data_value == "right") tv->right();
      else if (data_value == "left") tv->left();
      else if (data_value == "select") tv->select();
      else if (data_value == "source") tv->source();
  
      else if(data_value == "channel"){ 
          if(root["data"]["value_2"] == "1") tv->channel(true);
          else tv->channel(false);
      }
      delayMicroseconds(50);
    }
  }
  else{
    DEBUG.println("it's not for me...");
  }
  delay(1000);
  sendToServer();
}

void sendToServer(){
  String message = "{\"id\":";
  message.concat(_ID);
  message.concat(",\"status\":");
  message.concat(digitalRead(B1));
  message.concat("}");
  const char *message_complete = message.c_str();
  webSocket.emit("esp-channel", message_complete);
}

void interrupt(){
  sendToServer();
}

void setup() {
    pinMode(B1, OUTPUT);
    digitalWrite(B1, LOW);
    attachInterrupt(digitalPinToInterrupt(B1), interrupt, CHANGE);
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
