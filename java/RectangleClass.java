/**
 * Rectangle
 */
public class RectangleClass {

    private Double Longueur;
    private Double Largeur;

   /* public RectangleClass(Double L,Double l) {

        this.Longueur=L;
        this.Largeur=l;
    }*/

    public Double getLongueur() {
        return Longueur;
      }
      public Double getLargeur() {
        return Largeur;
      }

      public void setLongueur(Double newName) {
        this.Longueur = newName;
      }

      public void setLargeur(Double newName) {
        this.Largeur = newName;
      }

    public Double demi_perimetre() {
        
        return this.Longueur+this.Largeur;
    }

    public Double perimetre() {
        
        return demi_perimetre()*2;
    }

    public Double surface() {
        
        return this.Longueur*this.Largeur;
    }

    private int pow(Double longueur2, int i) {
        return 0;
        }

    public Double diagonale() {
        
        return Math.sqrt(Math.pow(this.Longueur,2)+Math.pow(this.Largeur,2));
    }

    

	public void afficher() {

        if (this.Longueur>0 && this.Largeur>0 && this.Longueur>this.Largeur) 
        {
        System.out.println("Le demi-perimetre du rectangle est: "+ this.demi_perimetre());
        System.out.println("Le perimetre du rectangle est: "+ this.perimetre());
        System.out.println("La surface du rectangle est: "+ this.surface());
        System.out.println("La diagonale du rectangle est: "+ this.diagonale());
        } 
        else {
            System.out.print("Il y a une erreur de saisie !");
        }
        
    }

    
}