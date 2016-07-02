
package comp1008.ICA1;

import javax.swing.JOptionPane;

/**
 * This class TestEmployee defines demonstrating Employee's capabilities  
 * 
 * @author Junghwan Yang
 * @version June 2, 2016
 * 
 */

public class TestEmployee {
	public static void main(String[] args) {
		
		//create employee1 using default employee constructor 
		Employee employee1 = new Employee();
		
		//create employee2 using employee constructor with parameters ex) Johnson & $400.56 per month
		Employee employee2 = new Employee("Johnson", 400.56);
		
		//set employee1's name using dialogbox
		employee1.setName(JOptionPane.showInputDialog("What is the name of employee1?", "Type the name of employee1"));
		
		//set employee1's salary using dialogbox
		employee1.setMonthlySalary(Double.parseDouble(JOptionPane.showInputDialog("How much is employee1's monthly salary?", "Here is monthly salary of employee1")));
		
		//display employee1's information
		JOptionPane.showMessageDialog(null,"Employee1's information is \n " + employee1.toString());
		
		//display employee2's information
		JOptionPane.showMessageDialog(null,"Employee2's information is \n " + employee2.toString());
		
		//update employee1's salary 10% higher
		employee1.setMonthlySalary(employee1.getMonthlySalary() * 1.1);
		
		//display employee1's information using get methods
		JOptionPane.showMessageDialog(null,String.format("Employee1's name is %s\n Employee1's annual salary is $%.2f", employee1.getName(),(employee1.getMonthlySalary() *12)));
		
	} // of main method
	
}
