package gc.cs.comp1008;

import java.time.Month;
import java.util.ArrayList;
import java.util.Iterator;

/**
 * This class models the details of a club with memberships. A club object
 * consists of members that are modelled by the Membership class
 *
 * @author Anju Chawla Junghwan Yang
 * @version June 20 2016
 */
public class Club {
	private final String clubName;

	// add an instance variable to hold the list of members in the club. These
	// members are objects of type Membership
	private ArrayList<Membership> clubMember = new ArrayList();
	// private ArrayList<Membership> members;

	/**
	 * This method returns arraylist clubmember
	 * 
	 * @return the clubMember
	 */
	public ArrayList<Membership> getClubMember() {
		return clubMember;
		// members = new ArrayList<Membership>();
	}

	/**
	 * This method sets clubmember arraylist
	 * 
	 * @param clubMember
	 *            the clubMember to set
	 */
	public void setClubMember(ArrayList<Membership> clubMember) {
		this.clubMember = clubMember;
	}

	/**
	 * The constructor for objects of class Club
	 * 
	 * @name the name of the club
	 */
	// Complete the constructor body

	public Club(String name) {
		this.clubName = name;
	}

	/**
	 * This method returns the name of the club
	 * 
	 * @return The name of the club
	 */
	public String getClubName() {
		return clubName;
	}

	/**
	 * Add a new member to the club's list of members.
	 * 
	 * @param member
	 *            the member to be given the membership for the club, cannot
	 *            have the same member id as a previous member
	 * @return true, if membership granted, else false
	 */
	// Complete this method, it should 'use' the equals method of the Membership
	// class
	public boolean join(Membership member) {
		if (member != null) {
			if (!clubMember.contains(member)) {
				clubMember.add(member);
				return true;
			}
		}
		return false;
		// This way is not using equals;override in membership
		// if (clubMember == null) {
		// clubMember.add(member);
		// return true;
		// } else {
		// for (Membership mem : clubMember) {
		// if (mem.equals(member)) {
		// return false;
		// } else
		// continue;
		// }
		// clubMember.add(member);
		// return true;
		// }
		// } else
		// return false;

	}

	/**
	 * This method returns the number of members in the club
	 * 
	 * @return The number of members in the club.
	 */
	// Complete this method

	public int numberOfMembers() {
		return clubMember.size();
	}

	/**
	 * This method returns the number of members who joined the club in the
	 * provided month and year
	 * 
	 * @param month
	 *            the month that the membership was taken
	 * @param the
	 *            year the membership was taken
	 * @return The number of members who joined the club in the provided month
	 *         and year
	 *
	 */
	public int noOfMembersJoinedClub(Month month, int year) {
		// this way is making new list, but it doesn't have to do
		// ArrayList<Membership> joinedClub = new ArrayList();
		// for (Membership mem : clubMember) {
		// if (mem.getMonth().equals(month) && mem.getYear() == year) {
		// joinedClub.add(mem);
		// } else
		// continue;
		// }
		// return joinedClub.size();

		int count = 0;
		// for(int i = 0;i <= clubMember.size(); i++) {
		//
		// }
		for (Membership m : clubMember) {
			if (m.getYear() == year && m.getMonth().equals(month)) {
				count++;
			}
		}
		return count;
		// return membersJoinedClub(month, year).size();
	}

	/**
	 * This method returns the list of members who joined the club in the
	 * provided month and year
	 * 
	 * @param month
	 *            the month that the membership was taken
	 * @param the
	 *            year the membership was taken
	 * @return The list of members who joined the club in the given month and
	 *         year
	 *
	 */
	// Code this method
	public ArrayList<Membership> membersJoinedClub(Month month, int year) {
		ArrayList<Membership> joinedClub = new ArrayList<Membership>();
		for (Membership mem : clubMember) {
			if (mem.getMonth().equals(month) && mem.getYear() == year) {
				joinedClub.add(mem);
			}
		}
		return joinedClub;

	}

	/**
	 * This method removes the members who joined the club in the given month
	 * and year
	 * 
	 * @param month
	 *            the month that the membership was taken
	 * @param year
	 *            the year the membership was takedn
	 * @return the list of memberships that were revoked in the given month and
	 *         year
	 */
	public ArrayList<Membership> deletedMembers(Month month, int year) {
		ArrayList<Membership> deleted = new ArrayList<Membership>();
		Iterator<Membership> it = clubMember.iterator();
		Membership m;
		while (it.hasNext()) {
			m = it.next();
			if (m.getMonth().equals(month) && m.getYear() == year) {
				deleted.add(m);
				it.remove();
			}
		}
		//
		// for (Membership mem : clubMember) {
		// if (mem.getMonth().equals(month) && mem.getYear() == year) {
		// clubMember.remove(mem);
		// deleted.add(mem);
		// }
		// }
		return deleted;

	}
}// of Club
