import java.lang.Math;
public class Rectangle extends Figure{
     
           //Attributs Instances
            private double largeur; 
          //Attributs classe ou Attributs static

            //Constructeur => methode instance concrete
              public Rectangle(double longueur,double largeur){
                        
                          this.longueur=longueur;
                        
                       
                          this.largeur=largeur;
                        
              }
	      public Rectangle(){
                        
                        
              }
               
              //Getters  methodes instances concretes
           
              public double getLargeur(){
                return this.largeur;
             }
             //setters  methodes instances concretes
              public void setLargeur(double largeur){
                 this.largeur=largeur;
              }
             
              //Getters Setters  methodes static concretes
            

              //metiers=>UC
              //Redefinition
		@Override
                public double demiPerimetre(){
                     return this.longueur + this.largeur;
                }
              	@Override
                public double surface(){
                  return this.longueur * this.largeur;
                }
		@Override
                public double diagonale(){
                  return Math.sqrt(Math.pow(this.longueur,2)+Math.pow(this.largeur,2));
                }
              
  }