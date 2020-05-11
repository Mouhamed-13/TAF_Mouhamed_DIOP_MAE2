//java.lang
//System.out =>Ecran
//System.in =>Clavier
import java.util.Scanner;
public class Main {
        //Declaration de variables => portée de classe
       public static void main(String args[]){
               /*
                System.out.println("Bonjour à Tous"); 
               System.out.println("les etudiants de la GLRS et MAE "); 
               //Scanner clavier pour lire les données tapeés au clavier
               Scanner clavier=new Scanner(System.in);
               System.out.println("Veuillez saisir un Mot");
               //Lire une donnée de type chaine 
               String prenom=clavier.next();
               System.out.println("Bonjour "+prenom); 
               
               //type primitifs ou de données  => int ,    float, double, char,      boolean 
               //classes wappers ou Enveloppes => Integer, Float, Double, Character, Boolean
               
               System.out.println("Veuillez saisir un entier");
               int x=clavier.nextInt();
               System.out.println("Le nombre est "+x); 
          
             // Figure f=new Figure(); impossible car //Figure est classe Abstraite

                Carre c=new Carre();
                c.setLongueur(12);
                System.out.println("La Longueur est "+                     c.getLongueur());
                 //Surcharge
                Carre c1=new Carre(15);
                System.out.println("La Longueur est "+                     c1.getLongueur());
                 System.out.println("Le Demi Perimetre est "+                     c1.demiPerimetre());
                 System.out.println("Le Perimetre est "+                     c1.perimetre());
            System.out.println("La Surface est "+                     c1.surface());
            System.out.println("La Diagonale est "+                     c1.diagonale());
   */
		int choix;
		int nbreCar;
		int nbreRec;
		int i=0;
		int j=0;
		double[] carreTab;
		double[][] recTab;
		Carre carre=new Carre();
		Rectangle rectangle=new Rectangle();
		double longueur;
		Scanner clavier=new Scanner(System.in);
		System.out.println("Donner le nombre de Carre que vous voulez inserer :");
		nbreCar=clavier.nextInt();
		System.out.println("Donner le nombre de Rectangle que vous voulez creer :");
		nbreRec=clavier.nextInt();
		carreTab=new double[nbreCar];
		recTab=new double[nbreRec][2];
		do{
              System.out.println("1- Ajout Carre");
              System.out.println("2- Lister Carre");
              System.out.println("3- Ajout Rectangle");
              System.out.println("4- Lister Rectangle");
              System.out.println("5- Quitter");
              System.out.println("Faites votre choix");
              choix=clavier.nextInt();
           switch(choix){
            case 1:
		try{
              System.out.println("Veuillez saisir la Longueur");
                   longueur=clavier.nextDouble();
                   carre.setLongueur(longueur);
		   carreTab [i]=longueur;
		   i++;
	           System.out.println("");
		   
		}catch(Exception e){
			System.out.println("Le nombre de carre voulu est atteint");
		}
		
             break;
            case 2:
		
		for(double val : carreTab){
			System.out.println(val);
			carre.setLongueur(val);
			System.out.println("Le Demi Perimetre est "+carre.demiPerimetre());
                 	System.out.println("Le Perimetre est "+carre.perimetre());
            		System.out.println("La Surface est "+carre.surface());
            		System.out.println("La Diagonale est "+carre.diagonale());
			System.out.println("=============================================");
		}
		
		
                 
             break;
	     case 3:
		try{
                System.out.println("Veuillez saisir la Longueur");
		   longueur=clavier.nextDouble();
		System.out.println("Veuillez saisir la Largeur");
		   double largeur=clavier.nextDouble();
     		   rectangle.setLargeur(largeur);
                   rectangle.setLongueur(longueur);
		   recTab [i][j]=longueur;
		   recTab [i][j+1]=largeur;
		   i++;
		   System.out.println("");
		}catch(Exception e){
			System.out.println("Le nombre de rectangle voulu est atteint");
			System.out.println();
		}
             break;
            case 4:
                 for (int k = 0;k < recTab.length; k++) {
         		for (j = 0;j < recTab[k].length;j++) {
           		System.out.println(recTab[k][j] + " ");
			
         		}
			rectangle.setLargeur(recTab[k][0]);
                   	rectangle.setLongueur(recTab[k][1]);
			System.out.println("Le Demi Perimetre est "+rectangle.demiPerimetre());
                 	System.out.println("Le Perimetre est "+rectangle.perimetre());
            		System.out.println("La Surface est "+rectangle.surface());
            		System.out.println("La Diagonale est "+rectangle.diagonale());
			System.out.println("=============================================");
        		 System.out.println();
			}
             break;
	     case 5:
		   System.out.print("Au revoir !!!");
		   break;
	     default:
		System.out.println("Choix Erroné !");
		break;
           }

     } while(choix!=5);
          
       }

}

/*Portée block
 {
    int var1=2;
    {
       int var2;
      //Possible
       int s=var1+var2;
    }
      //Impossible
       int s=var1+var2;//var2 n'existe pas dans ce bloc
 }
*/


