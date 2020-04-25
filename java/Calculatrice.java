import java.util.Scanner;

public class Calculatrice{
    public static void main(String[] args) 
    {
        double num1;
        double num2;
        char operation;


        Scanner input = new Scanner(System.in);

        System.out.println("please enter the first number");
        num1 = input.nextDouble();

        System.out.println("please enter the second number");
        num2 = input.nextDouble();

        Scanner op = new Scanner(System.in);

        System.out.println("Please enter operation");
        operation = op.next().charAt(0);

        double result=0;

        switch (operation) {
            case '+':
                result=num1 + num2;
                break;
            case '-':
                result=num1-num2;
                break;
            case '*':
                result=num1*num2;
                break;
            case '/':
                if (num2 != 0) {
                    result=num1 / num2;
                } 
            
                break;
        
            default:
                break;
        }
            if (operation=='/' && num2==0) {
                System.out.println("Dvision Impossible !");   
            } else {
                System.out.println("Le resultat est: "+num1+" "+operation+" "+num2+" = "+result);
            }
            
        
        
    }

}