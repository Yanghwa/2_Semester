package comp1008.ICA1;

/**
 * This class Employee defines the name and monthly salary of the employee and its functionality
 * 
 * @author Junghwan Yang
 * @version June 2, 2016
 * 
 */
public class Employee {
	// instance variables
	private String name; //the name of an employee
	private double monthlySalary ; // the salary of month for employee
	
	/**
	 * This constructor create an Employee object without parameters
	 * 
	 */
	public Employee() {
		
	} //of constructor without any parameter

	/**
	 * This constructor create an Employee object of the name, the monthly salary of the employee 
	 * 
	 * @param name
	 *            to set the name of the employee
	 * @param monthlySalary
	 *            to set the monthly salary of the employee
	 * 
	 */
	public Employee(String name, double monthlySalary ) {
		setName(name);
		setMonthlySalary(monthlySalary);
	} //of constructor

	/**
	 * This method returns the name of the employee
	 * @return the name
	 */
	public String getName() {
		return name;
	} //of getName

	/**
	 * This method sets the name of the employee
	 * @param name the name of the employee
	 */
	public void setName(String name) {
		this.name = name;
	} //of setName

	/**
	 * This method returns the monthly salary of the employee
	 * @return the monthly salary of the employee
	 */
	public double getMonthlySalary () {
		return monthlySalary ;
	} // of getSalary

	/**
	 * This method sets the monthly salary of the employee
	 * @param monthlySalary the monthly salary of the employee
	 */
	public void setMonthlySalary (double monthlySalary ) {
		if (monthlySalary  > 0) {
			this.monthlySalary  = monthlySalary ;
		}
	} //of setSalary
	
	@Override
	//information about annual salary and name of the employee 
	public String toString() {
		String information = String.format(
				" %10s %-10s%n %10s %-10.2f%n ", "Name:",getName(), "Salary(Annualy): $", (getMonthlySalary ()*12));
		return information;
	} //of toString(override)
	
	
}
