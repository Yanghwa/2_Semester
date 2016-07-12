package comp1008.product_stock;

/**
 * This class Product defines/models the details of a product.
 *
 * @author 	Anju Chawla, Junghwan Yang
 * @version July 11, 2016
 */
public class Product {

	// instance variables
	private String id;				// a unique identifying number for the product
	private String name; 			// the name of the product, may not be unique
	private int quantity; 			// the quantity of the product in stock
	private float price;			// the price of the product
	private int maximumQuantity;	//the maximum quantity of the product that can be stocked
	private int reorderLevel; 		//the minimum value at which the product must be reordered
	private boolean reorder;		//the variable that will be set to true if the the product needs reordering, false otherwise



	/**
	 * Constructor to create objects of class Product
	 *
	 * @param id to set the product's identifying number
	 * @param name to set the name of the product
	 * @param quantity to set the product's initial quantity
	 * @param price to set the price of the product
	 * @param maximumQuantity to set the maximum quantity of the product that can be stocked
	 * @param reorderLever to set the minimum value at which the product must be reordered
	 */

	public Product(String id, String name, int maximumQuantity, int quantity, int reorderLevel, float price) throws MyException {
		setId(id);
		setName(name);
		setPrice(price);

		setMaximumQuantity(maximumQuantity);
		setQuantity(quantity);
		setReorderLevel(reorderLevel);
		
		
		setReorder();
	}


	/**
	 * This method sets the id of the product
	 *
	 * @param id the identifying number of the product
	 */
	private void setId(String id) {

		this.id = id;
	}

	/**
	 * This method returns the identifying number of the product
	 *
	 * @return the identifying number of the product
	 */
	public String getId() {
		return this.id;
	}

	/**
	 * This method sets the name of the product
	 *
	 * @param id the identifying number of the product
	 */
	private void setName(String name) {
		this.name = name;
	}

	/**
	 * This method returns the name of the product
	 *
	 * @return the name of the product
	 */
	public String getName() {
		return this.name;
	}

	/**
	 * This method sets/changes the quantity of the product
	 *
	 * @param quantity to set the quantity of the product
	 * @throws MyException if quantity <= 0
	 */

	public void setQuantity(int quantity) throws  MyException {

		if (quantity < 0)
			throw new MyException("Quantity of the product needs to be >= 0, cannot be negative.");
		else if (quantity > maximumQuantity) {
			throw new MyException("Quantity needs to be <= Maximum Quantity of the product.");
		}
		else {
			this.quantity = quantity;
		}


	}

	/**
	 * This method returns the quantity of the product
	 *
	 * @return the quantity of the product in stock
	 */
	public int getQuantity() {
		return this.quantity;
	}



	/**
	 * This method sets the price of the product
	 *
	 * @param price to set/change the price of the product
	 *
	 * @throws MyException if price <= 0
	 */

	public void setPrice(float price) throws MyException{

		if (price <= 0)
			throw new MyException("Price of the product needs to be > 0, cannot be zero or negative.");

		else
			this.price = price;

	}

	/**
	 * This method returns the price of the product
	 *
	 * @return the price of the product
	 */
	public float getPrice() {
		return price;
	}


	/**
	 * This method sets the maximumQuantity of the product
	 *
	 * @param maximumQuantity to set/change the maximumQuantity of the product
	 *
	 * @throws MyException if maximumQuantity <= 0
	 */
	public void setMaximumQuantity(int maximumQuantity) throws MyException {
		if(maximumQuantity <= 0 ) {
			throw new MyException("Maximum Quantity of the product needs to be > 0, cannot be zero or negative.");
		}
		else this.maximumQuantity = maximumQuantity;



	}
	/**
	 * This method returns the maximumQuantity of the product
	 *
	 * @return the maximumQuantity of the product
	 */
	public int getMaximumQuantity() {
		return this.maximumQuantity;
	}



	/**
	 * This method sets the reorderLevel of the product
	 *
	 * @param reorderLevel to set/change the reorderLevel of the product
	 *
	 * @throws MyException if reorderLevel <= 0 or maximumQuantity
	 */
	public void setReorderLevel(int reorderLevel) throws MyException {
		if(reorderLevel <=0) {
			throw new MyException("Reorder Level of the product needs to be >= 0, cannot be zero or negative.");
		}
		if (getMaximumQuantity() <= reorderLevel) {
			throw new MyException("Reorder Level of the product needs to be less than the Maximum Quantity of the product.");
		}
		else this.reorderLevel = reorderLevel;


	}

	/**
	 * This method returns the reorderLevel of the product
	 *
	 * @return the reorderLevel of the product
	 */
	public int getReorderLevel() {
		return this.reorderLevel;
	}


	/**
	 * This method sets the reorderLevel of the product
	 *
	 * @reorder if reorderLevel >= quantity, reorder set true and if reorderLevel < quantity, reorder set false
	 */
	
	private void setReorder() {
		int reor = getReorderLevel();
		int qty = getQuantity();
		if (reor <= qty ) {
			this.reorder = false;
		}
		else {
			this.reorder = true;
		}
	}

	public boolean getReorder() {
		return this.reorder;
		
	}




	/**
     * This method returns a description of the product
     * @return The description including id, name, quantity and price of the product
     */

    @Override
    public String toString()
    {
        String info ="";

        info= String.format("%s: There are/is %d of %s in stock, priced at $%.2f each. %n",  getId(), getQuantity(),getName(),getPrice());
        info += String.format("It has to be ordered when it gets %d or below but cannot be stocked beyond %d.%n", getReorderLevel(),getMaximumQuantity());
        info += String.format("Needs Reordering: %s%n", (getReorder()? "Yes": "No"));

        return info;
    }
    /**
	 * This method re-stocks the product with the given amount
	 *
	 * @param amount  the number of items of a product to be added to the stock
	 * @throws MyException if amount <= 0
	 */

	public void restock(int amount) throws MyException
	{
		if(amount <= 0)
			throw new MyException("Amount to be stocked cannot be <= 0");


		else {
			setQuantity(getQuantity() + amount);
			
		}
		setReorder();
	}

	/**
	 * This method sells a product
	 *
	 * @throws MyException if there is no product in stock
	 */

	public void sellProduct() throws MyException
	{
		if(getQuantity() == 0)
			throw new MyException("Product not in stock, cannot sell");

		else {
			setQuantity(getQuantity() - 1);
		}
		setReorder();
	}

	/**
	 * This method sells some items of the product
	 *
	 * @param amount the number of items of a product to be sold
	 * @throws MyException if amount to be sold is <= 0 or not enough of product in stock to sell
	 */

	public void sellProduct(int amount) throws MyException
	{
		if(amount <= 0)
			throw new MyException("Amount to be sold cannot be negative or 0");
		else if(getQuantity() < amount)
			throw new MyException("Not enough of items of Product in stock to sell.");

		else {
			setQuantity(getQuantity() - amount);
		}
		setReorder();

	}

	/**
	 * This method overrides the equals method of the object class
	 * @param obj  the reference object of type Product with which to compare.
	 * @return true if the id's of the two products is equal, false otherwise
	 */
	@Override
	public boolean equals(Object obj)
	{
		if (obj != null && this.getClass() == obj.getClass()){
			Product p = (Product)obj;
			return this.getId().equalsIgnoreCase(p.getId());
		}

		return false;

	}
}// of Product
