public class ViewRectangle {

	public static void afficheRec(double longueur,double largeur){
	Rectangle rectangle1=new Rectangle(longueur,largeur);

	rectangle1.setLongueur(longueur);
        rectangle1.setLargeur(largeur);

	System.out.println("Le demi-perimetre est :"+rectangle1.demiPerimetre());
	System.out.println("Le perimetre est :"+rectangle1.perimetre());
	System.out.println("La surface est :"+rectangle1.surface());
	System.out.println("La diagonale est :"+rectangle1.diagonale());


	}


}