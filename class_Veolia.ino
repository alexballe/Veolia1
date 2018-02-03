#include "Veolia.h"
Veolia Pin(2,3);
int Led = 7;

void setup() 
{
  Serial.begin (9600);    //Fixation du débit de communication en nb de caractères par seconde (baud) pour la communication série.

//  Configuration des broches utilisées
//---------------------------------------------------------------------------------------
  pinMode(Led, OUTPUT);
  Pin.init();
//---------------------------------------------------------------------------------------
}

void loop() 
{  
  long Distance = Pin.mesureDistance(Pin.getTrigger(), Pin.getEcho());    //Recuperation de la Distance du Telemetre
  
  if(Distance >= 10)
  {
    digitalWrite(Led,HIGH);       //On allume la LED si la Distance est superieur ou égale à 10
  }
  else 
  {
    digitalWrite(Led,LOW);        //On éteint la LED si la Distance est inferieur à 10
  }
}
