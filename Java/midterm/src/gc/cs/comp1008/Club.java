package gc.cs.comp1008;

import java.time.Month;
import java.util.ArrayList;

/**
 * This class models the details of a club with memberships. A club object consists of members
 * that are modelled by the Membership class
 *
 * @author Anju Chawla Junghwan Yang
 * @version June 20 2016
 */
public class Club
{
   private final String clubName;

   //add an instance variable to hold the list of members in the club. These members are objects of type Membership
   private ArrayList<Membership> clubMember = new ArrayList();



 /**
  * This method returns arraylist clubmember
 * @return the clubMember
 */
	public ArrayList<Membership> getClubMember() {
		return clubMember;
	}
	
	/**
	 * This method sets clubmember arraylist
	 * @param clubMember the clubMember to set
	 */
	public void setClubMember(ArrayList<Membership> clubMember) {
		this.clubMember = clubMember;
	}

	/**
        * The constructor for objects of class Club
        * @name the name of the club
        */
   		//Complete the constructor body

   public Club(String name)
   {
       this.clubName = name;
       

   }

   /**
   This method returns the name of the club
   @return The name of the club
   */
   public String getClubName()
   {
   	return clubName;
   }

    /**
     * Add a new member to the club's list of members.
     * @param member the member to be given the membership for the club, cannot have the same member id as a previous member
     * @return true, if membership granted, else false
     */
     //Complete this method, it should 'use' the equals method of the Membership class
    public boolean join(Membership member)
    {
    	if(member != null){
    		if (clubMember == null) {
    			clubMember.add(member);
    			return true;
    		}
    		else {
	    		for(Membership mem : clubMember) {
	    			if (mem.equals(member)) {
	    				return false;
	    			}
	    			else continue;
	    		}
	    		clubMember.add(member);
	    		return true;
    		}
    	}
    	else return false;

    }

    /**
     * This method returns the number of members in the club
     * @return The number of members in the club.
     */
  //Complete this method

    public int numberOfMembers()
    {
    	return clubMember.size();
    }

    /**
     * This method returns the number of members who joined the club in the provided month and year
     * @param month the month that the membership was taken
     * @param the year the membership was taken
     * @return The number of members who joined the club in the provided month and year
     *
     */
    public int noOfMembersJoinedClub(Month month, int year)
    {	
    	ArrayList<Membership> joinedClub = new ArrayList();
    	for(Membership mem : clubMember) {
    		if (mem.getMonth().equals(month) && mem.getYear() == year) {
    			joinedClub.add(mem);
    		}
    		else continue;
    	}
    	return joinedClub.size();
    }

    /**
     * This method returns the list of members who joined the club in the provided month and year
     * @param month the month that the membership was taken
     * @param the year the membership was taken
     * @return The list of members who joined the club in the given month and year
     *
     */
    //Code this method
    public ArrayList MembersJoinedClub(Month month, int year)
    {
    	ArrayList<Membership> joinedClub = new ArrayList();
//    	System.out.println("Here is their name and id: ");
    	for(Membership mem : clubMember) {
    		if (mem.getMonth().equals(month) && mem.getYear() == year) {
    			joinedClub.add(mem);
//    			System.out.printf("%s	%s%n", mem.getMemberName(), mem.getMemberId());
    		}
    		else continue;
    	}
    	this.clubMember = joinedClub;
    	return this.clubMember;
    	
    }


   }//of Club

