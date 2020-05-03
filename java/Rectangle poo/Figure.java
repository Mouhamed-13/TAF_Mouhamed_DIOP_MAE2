
public abstract class Figure{

	//attributs
		//instance
		protected double longueur;
		//statique
		protected static String unite;




	//Methodes
	//instance
//Constructeur:une méthode qui porte le meme nom que la classe et n'a
//pas de type de retour4
	//Constructeur par défaut
	public Figure(){

	}
	//Getters et setters=>toujours methodes concretes,methodes instances ou
	//methodes classe
		//Getters et setters de longueur
			public double getLongueur(){
				return this.longueur;
			}
			public void setLongueur(double longueur){
				this.longueur=longueur;
			}
		//Getters et setters de unite
			public static String getUnite(){
				return unite;
			}
			public static void setUnite(String unite){
				Figure.unite=unite;
			}

	//metiers
	public abstract double demiPerimetre();
	public double perimetre(){
		return demiPerimetre()*2;
	}
	public abstract double surface();
	public abstract double diagonale();



	//statique



}