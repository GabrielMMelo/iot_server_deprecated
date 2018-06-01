#include "ir.hpp"

Samsung::Samsung(){
  this->irsend = new IRsend(4); 
  this->irsend->begin();
}

void Samsung::power(){
  this->irsend->sendSAMSUNG(SamsungPower, SAMSUNG_BITS, 1);  // hex value, 16 bits, no repeat
}

void Samsung::source(){
  this->irsend->sendSAMSUNG(SamsungSource, SAMSUNG_BITS, 1);  // hex value, 16 bits, no repeat
}

void Samsung::select(){
  this->irsend->sendSAMSUNG(SamsungSelect, SAMSUNG_BITS, 1);  // hex value, 16 bits, no repeat
}

void Samsung::left(){
  this->irsend->sendSAMSUNG(SamsungLeft, SAMSUNG_BITS, 1);  // hex value, 16 bits, no repeat
}

void Samsung::right(){
  this->irsend->sendSAMSUNG(SamsungRight, SAMSUNG_BITS, 1);  // hex value, 16 bits, no repeat
}

void Samsung::up(){
  this->irsend->sendSAMSUNG(SamsungUp, SAMSUNG_BITS, 1);  // hex value, 16 bits, no repeat
}

void Samsung::down(){
  this->irsend->sendSAMSUNG(SamsungDown, SAMSUNG_BITS, 1);  // hex value, 16 bits, no repeat
}

void Samsung::volume(bool flag){
  if(flag)	
    this->irsend->sendSAMSUNG(SamsungUpVol, SAMSUNG_BITS, 1);  // hex value, 16 bits, no repeat
  else
  	this->irsend->sendSAMSUNG(SamsungDownVol, SAMSUNG_BITS, 1);  // hex value, 16 bits, no repeat
}

void Samsung::channel(bool flag){
  if(flag)	
    this->irsend->sendSAMSUNG(SamsungUpCh, SAMSUNG_BITS, 1);  // hex value, 16 bits, no repeat
  else
  	this->irsend->sendSAMSUNG(SamsungDownCh, SAMSUNG_BITS, 1);  // hex value, 16 bits, no repeat
}
