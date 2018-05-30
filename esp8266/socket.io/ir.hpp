#include <IRremoteESP8266.h>
#include <IRsend.h>

#define SamsungPower        0xE0E040BF  

class Samsung {

public:
	void power();
	void volume(bool flag);
	Samsung();
};
