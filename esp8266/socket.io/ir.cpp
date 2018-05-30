#include "ir.hpp"

Samsung::Samsung(){
  this->irsend = new IRsend(4); 
  this->irsend->begin();
}

void Samsung::power(){
  this->irsend->sendSAMSUNG(SamsungPower, SAMSUNG_BITS, 1);  // hex value, 16 bits, no repeat
}

void Samsung::volume(bool flag){
  if(flag)	
    this->irsend->sendSAMSUNG(SamsungUpVol, SAMSUNG_BITS, 1);  // hex value, 16 bits, no repeat
  else
  	this->irsend->sendSAMSUNG(SamsungDownVol, SAMSUNG_BITS, 1);  // hex value, 16 bits, no repeat
}

