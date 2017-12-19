/**

not used

**/

-take a day off - turn of scheduling - pick a date
-Doctor won’t be available if not valid-users or isUpForScheduling is false-doctors table
-Algorithm for scheduling :
Check  –
   1. In appointment table if
        doctor !=exist
                    {
                   2. Take current time;
                     3.   Check if doctor is available on the currentday and it's not a off day (off day table),
                              4.  if true-Check if current time+1 hour is inside available time for that day.
                                        5. if true-setSchedule-current time+1hr(set)- seiral-1

                               6. if false-check if current day+1 is available day and not a off day
                                        7.if true-setSchedule-starting time of that day
                                        8.if false-keep repeating 6(set)
                    }

   9. if doctor exist & no upcoming appoinments -repaet 15 for only booked appointments
            10. follow procedure 2 to 8(set)


   10. if doctor exist $ upcoming appointments exist and not booked exist with the same patient category and patient doesn't have any upcoming
        appointment with th doctor then-


            11. then-
                12.find all upcoming appointments which are not booked with same patient category and take the first one(set)


   13. if doctor exist $ upcoming appointments exist and not booked doesn't exist exist and patient doesn't have any upcoming
appointment with th doctor -

            14.- then
                15.take the last booked appointment and upcoming appointment-and check if it's ending time+10min is inside avilable time of that day-
                        16. if avilable- schedule appointment with the ending time+10 as the scheduling time
                        and add 1 to the last person's serial number to set the serial of that day(set)

                        17. if not avilable-
                                18. if false-check if last upcooming and booked persons appoinment ending time + 1 day is available
                                day and not a off day
                                19. if true-setSchedule-starting time of that day(set)-serial-1
                                20. if false-keep repeating 8(set)
