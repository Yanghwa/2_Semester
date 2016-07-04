package gc.cs.comp1008;

/**
 * This class tests the Club and Membership classes
 * @author Anju Chawla Junghwan Yang
 * @version June 20 2016
 */
import java.time.Month;
import java.time.YearMonth;
import java.util.ArrayList;

public class Tester {

	public static void main(String[] args) {

		Membership m1 = new Membership("1", "Anju Chawla", YearMonth.parse("2007-08"));
		Membership m2 = new Membership("2", "Jaret Wright", YearMonth.of(2010, 1));
		Membership m3 = new Membership("3", "Ross Bigelow", YearMonth.of(2010, Month.MARCH));
		Membership m4 = new Membership("3", "Scott McCrindle", YearMonth.of(2008, Month.SEPTEMBER));
		Membership m5 = new Membership("4", "Rich Freeman", YearMonth.parse("2010-03"));

		Club instructorClub = new Club("Instructors");

		joinTheClub(instructorClub, m1);
		joinTheClub(instructorClub, m2);
		joinTheClub(instructorClub, m3);
		joinTheClub(instructorClub, m4);
		joinTheClub(instructorClub, m1);
		joinTheClub(instructorClub, m5);

		System.out.println("------------------------------------------------------------------------------------");

		// 1) complete this statement to print the club name and the number of
		// members in it
		System.out.printf("Total Numbers of members in the %s club: %d%n", instructorClub.getClubName(),
				instructorClub.numberOfMembers());
		System.out.println("------------------------------------------------------------------------------------");

		// 2) complete this statement to print the number of members who joined
		// the club in March of 2010
		System.out.printf("Number of members who joined in March, 2010: %d%n",
				instructorClub.noOfMembersJoinedClub(Month.MARCH, 2010));

		// 3) now call the method membersJoinedClub to get the list of the
		// members who joined the club in March of 2010
		ArrayList<Membership> a = instructorClub.membersJoinedClub(Month.MARCH, 2010);

		// 4) call the helper method displayMembers to display this list of
		// members
		displayMembers(a);

		System.out.println("------------------------------------------------------------------------------------");

		// 5a) complete this statement to print the number of members who joined
		// the club in May of 2010
		System.out.printf("Number of members who joined in May, 2010: %d%n",
				instructorClub.noOfMembersJoinedClub(Month.MAY, 2010));
		// 5b) now call the method membersJoinedClub to get the list of the
		// members who joined the club in May of 2010
		a = instructorClub.membersJoinedClub(Month.MAY, 2010);
		// 6) call the helper method displayMembers to display this list of
		// members
		displayMembers(a);
		System.out.println("------------------------------------------------------------------------------------");
		a = instructorClub.deletedMembers(Month.MARCH, 2010);
		System.out.println("These members are leaving the club");
		displayMembers(a);

	}// of main()

	/*
	 * 7) Create a helper method that takes a list of members as an argument.It
	 * displays the name and id of each member by calling the methods of the
	 * Membership class DISPLAY ONLY IF THE LIST IS NOT EMPTY - display an
	 * appropriate heading like "Here is their name and id: " followed by the
	 * name and id of each member, one member per line, the two values separated
	 * by a tab or comma IF THE LIST IS EMPTY - there in no output
	 */
	public static void displayMembers(ArrayList<Membership> a) {

		if (a.size() > 0) {
			System.out.println("Here is their name and id: ");
			for (Membership m : a) {
				System.out.printf("%s\t%s%n", m.getMemberName(), m.getMemberId());
			}
		}
	}
	// Code this method

	/**
	 * This helper method lets a member with a unique id join the club, else
	 * denies the membership
	 * 
	 * @param c
	 *            the club whose membership is being sought
	 * @param m
	 *            the member who wants to join the club
	 */
	private static void joinTheClub(Club c, Membership m) {

		if (c.join(m)) {
			System.out.printf("Membership Given to %s(%s)%n", m.getMemberName(), m.getMemberId());
		} else {
			System.out.printf("Membership Denied to %s(%s)%n", m.getMemberName(), m.getMemberId());
		}
	}// of joinTheClub

}// of Tester
