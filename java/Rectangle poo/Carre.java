public class Carre extends Figure{


            //Constructeur => methode instance concrete
              public  Carre(double longueur){
                      
                          this.longueur=longueur;
                        
                       
              }
               
              //metiers=>UC
              //Redefinition
                public double demiPerimetre(){
                     return this.longueur *2;
                }
               
                public double surface(){
                  return this.longueur * this.longueur;
                }
                public double diagonale(){
                  return Math.sqrt(Math.pow(this.longueur,2)+Math.pow(this.longueur,2));
                }
              }