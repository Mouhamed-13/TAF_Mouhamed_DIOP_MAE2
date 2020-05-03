//java.lang
//System.out=>Ecran
//System.out=>Clavier
//Scanner(System.in)=>Scanner clavier pour lire les données tapées au clavier
/*System.out.println("Bonjour à Tous");
		System.out.println("Les etudiants de la GLRS et MAE");
		Scanner input=new Scanner(System.in);
		System.out.println("Veuillez saisir un prenom :");
		String prenom=input.next();
		System.out.println("Bonjour "+prenom);
		System.out.println("Veuillez saisir un entier:");
		int x=input.nextInt();*/
import java.util.Scanner;
public class Main{

	public static void main(String args[]){
	
	char operation;
	char choix;
	
	Scanner input=new Scanner(System.in);

	do{
	System.out.println("Entrer la valeur du longueur");
	Double longueur=input.nextDouble();

	System.out.println("Entrer la valeur de la largeur");
	Double largeur=input.nextDouble();
	
	System.out.println("Effectuez les traitements pour :");
	System.out.println("1_ Le Rectangle");
	System.out.println("2_ Le Carre");	
	operation = input.next().charAt(0);

	switch(operation) {
            case '1':
                ViewRectangle.afficheRec(longueur,largeur);
                break;
            case '2':
                ViewCarre.afficheCar(longueur);
                break;
            default:
		System.out.println("Choix inconnu !");
                break;
        }
	System.out.println("Voulez vous effectuer encore un traitement(o/n)");
	choix = input.next().charAt(0);
	}while(choix=='o');
	
	System.out.println("Au revoir");
			
		
}
}