public class ViewCarre {

	public static void afficheCar(double longueur){
	Carre carre1=new Carre(longueur);


	System.out.println("Le demi-perimetre est :"+carre1.demiPerimetre());
	System.out.println("Le perimetre est :"+carre1.perimetre());
	System.out.println("La surface est :"+carre1.surface());
	System.out.println("La diagonale est :"+carre1.diagonale());


	}


}