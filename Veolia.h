class Veolia 
{
  private:
  //  Capteur de distance
  //---------------------------------------------------------------------------------------
    int trigPin;    //Trig
    int echoPin;    //Echo
  //---------------------------------------------------------------------------------------
  public:
    
    Veolia(int trigger, int echo);    //Constructeur
    void init();                      //Initialisation des pins

  //  Capteur de distance
  //---------------------------------------------------------------------------------------
    int getTrigger();
    int getEcho();
    long mesureDistance(int trigger, int echo);
  //---------------------------------------------------------------------------------------
};
