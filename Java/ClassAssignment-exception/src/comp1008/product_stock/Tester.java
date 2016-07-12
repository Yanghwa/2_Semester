package comp1008.product_stock;

public class Tester {

	public static void main(String[] args) throws Exception
	
	{
		Product p ;
		boolean sold;
		
		try
		{
			//quantity < 0-should throw an exception
		
			p = new Product("1","P1",10,-5,5,12.25f);
			System.out.println(p);
		}
		catch(MyException e)
		{
			System.out.print("1: ");
			System.out.println(e.getMessage());
		}
		
		try
		{
			//quantity > maximum quantity-should throw an exception
			p = new Product("2","P1",10,15,5,12.25f);
			System.out.println(p);
		}
		catch(MyException e)
		{
			System.out.print("2: ");
			System.out.println(e.getMessage());
		}
		
		try
		{
			//maximum quantity  = 0-should throw an exception
			p = new Product("3","P1",0 ,15,26,12.25f);
			System.out.println(p);
		}
		catch(MyException e)
		{
			System.out.print("3: ");
			System.out.println(e.getMessage());
		}
		
		try
		{
			// reorder level = -10 should throw an exception
			p = new Product("4","P1",20 ,15, -10 ,12.25f);
			System.out.println(p);
		}
		catch(MyException e)
		{
			System.out.print("4: ");
			System.out.println(e.getMessage());
		}
		
		try
		{
			//reorder level > maximum quantity - should throw an exception
			p = new Product("5","P1",15,10,16,12.25f);			
			System.out.println(p);
		
						
		}
		catch(MyException e)
		{
			System.out.print("5: ");
			System.out.println(e.getMessage());
		}
		
		
		try
		{
			//quantity  < reorder level - should say that needs reordering; no exception thrown
			p = new Product("7","P1",20 ,5,10 ,10f);
			System.out.println("------------------------------------------------------------------");
			System.out.println(p);
			System.out.println("------------------------------------------------------------------");
			//let's restock
			//p.restock(10); //should throw and exception since quantity will become > maximum quantity
			//p.restock(-1); //should throw and exception since restock amount < 0
			p.restock(6);
			System.out.println("------------------------------------------------------------------");
			System.out.println(p);
			System.out.println("------------------------------------------------------------------");
			//sell product
			System.out.println("Selling one unit of product");
			p.sellProduct(); // sell one of product
			
			System.out.println("------------------------------------------------------------------");
			System.out.println(p);
			System.out.println("------------------------------------------------------------------");
			
			System.out.println("Selling 12 units of product - won't happen since not enough in stock.");
			//p.sellProduct(12); //not enough in stock; should throw an exception			
			
			System.out.println("Selling 5 units of product");
			p.sellProduct(5); //not enough in stock
			
			System.out.println("------------------------------------------------------------------");
			System.out.println(p);
			System.out.println("------------------------------------------------------------------");
			
			//sold = p.sellProduct(-2);  //should throw an exception
			//try to set invalid values using set methods - right now 10 in stock; maximum quantity is 20 and reorder level is 10
			//p.setMaximumQuantity(5);//should throw an exception since maximum quantity will become < quantity
			//p.setReorderLevel(22); //should throw an exception since reorder level will become > maximum quantity
			//p.setQuantity(25);//should throw an exception since quantity will become > maximum quantity 
			
			//let us restock P1 so that it does not need reordering
			
			p.restock(7);
			System.out.println("------------------------------------------------------------------");
			System.out.println(p);
			System.out.println("------------------------------------------------------------------");
			
			
		}
		catch(MyException e)
		{
			System.out.print("7:");
			System.out.println(e.getMessage());
		}
		
		
	
	}//of main

}//of Tester
