import java.util.Scanner;

public class Rectangle {
    public static void main(String[] args) {
        
        Scanner input=new Scanner(System.in);
        RectangleClass rectangle1=new RectangleClass();

        System.out.println("Saisissez la longueur :");
        Double longueur=input.nextDouble();

        System.out.println("Saisissez la largeur :");
        Double largeur=input.nextDouble();

        rectangle1.setLongueur(longueur);
        rectangle1.setLargeur(largeur);

        rectangle1.afficher();
        
        
    }

}