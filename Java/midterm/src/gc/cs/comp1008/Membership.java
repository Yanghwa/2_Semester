package gc.cs.comp1008;

import java.time.Month;
import java.time.YearMonth;

/**
 * This class defines the membership details and its associated methods for a person/member 
 *
 * @author Anju Chawla Junghwan Yang
 * @version June 20 2016
 */
public class Membership
{
 	private String memberId;						//the unique identification number of the member
    private String memberName;                      // the name of the member
    private YearMonth  membershipTaken;				//the month and year the membership was taken
   
    
    /**
     * Constructor to create an object of the membership class
     * 
     * @param id the unique id of the member
     * @param name the name of the member
     * @param join the year and month in which membership was taken
     */
    
    //Call the relevant set methods to complete the code of the constructor
    public Membership(String id, String name, YearMonth joinedIn)
       
    {
    	super();
    	setMemberId(id);
    	setMemberName(name);
    	setMembershipTaken(joinedIn);
      
    }
    
    /**
     * This method sets the unique identification number of the member
     * @param id the unique id of the member
     */

    public void setMemberId(String id)
    {
    	memberId = id;
    }
    /**
     * This method sets the name of the member
     * @param name The name of the member
     */
    public void setMemberName(String name)
    {
        this.memberName = name;
    }

    /**
     * This method sets the year and month in which the member took the membership
     * @param joinedIn the year and month the membership was taken
     * 
     */
    public void setMembershipTaken(YearMonth joinedIn)
       
    {
         this.membershipTaken = joinedIn;
    }
    
    /**
     * This method returns the unique identification number of the member
     * @return the unique identification number of the member
     */
    public String getMemberId()
    {
        return memberId;
    }
    
    /**
     * This method returns the name of the member
     * @return the name of the member
     */
    
    public String getMemberName()
    {
        return memberName;
    }

    /**
     * This method returns the  month name in which the member took the membership
     * @return the month name in which the member took the membership
     */
    //Complete this method
    
    public Month getMonth()
    {
    	return membershipTaken.getMonth(); 
    }

    /**
     * This method returns the year in which the member took the membership
     * @return the year in which the member took the membership
     */
    //Complete this method
    public int getYear()
    {
        return membershipTaken.getYear();
    }

    /**
     * This method returns the membership details
     * @return the membership details of a member
     */
    public String toString()
    {
        return String.format("%s (%s) joined in the month %s of %d%n",  getMemberName(), getMemberId(), getMonth(), getYear());
    }
    
    /**
     * This method overrides the equals method of the Object class
     * @param member the membership object that needs to be compared with
     * @return true, if the two membership objects have the same member id's, false otherwise 
     */
    //Code this method
    @Override
    public boolean equals(Object o) {
    	Membership target = (Membership) o;
    	if (this.getMemberId().equals(target.getMemberId())) {
    		return true;
    	}
    	else return false;
    }
   
}

