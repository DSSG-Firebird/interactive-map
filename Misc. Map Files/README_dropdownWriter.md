# Writing the Items in the Dropdown Menu #

The Firebird framework is designed to help municipal fire departments:</br>
1. <a href="https://github.com/DSSG-Firebird/property-joins">Discover new properties for inspection</a><br>
2. <a href="https://github.com/DSSG-Firebird/risk-model">Predict fire risk for properties and assign them a risk score
</a><br>
3. <a href="https://github.com/DSSG-Firebird/interactive-map">Visualize property inspections on an interactive map
</a><br>

More information on the Firebird project can be found <a href="http://www.firebird.gatech.edu">here</a>.

======

## What
Currently, the dropdownWriter.py file takes in a list of property types and converts them into an HTML list to be used for the dropdown menus on the map. 
<br>Because each of those lists contains upwards of 100+ property types, it would have been quite tedious to type them out individually.

We have a csv with all of the property types used throughout the lists. This includes the AFRD Fire Incident Property Usage types (Property_u), the FSAF Occupancy types (occup_type), the Business License SIC types (b_sic_desc), and the Google Place types (google_type). 

There is no need to run this script, UNLESS you plan on adding new property types to the dropdown menu. 
<br><br>Why would you want to do that?
	
1.	If there are fires that occur in a Property Usage type that isn’t in the dropdown menu.
2.	If there are new Inspections that are classified in an FSAF Occupancy type not included.
3.	If there are new potential inspections with SIC codes not included in the dropdown.
 * That is, if you change the map from using the Property_list_short to using Property_list_long, there will definitely be new SIC codes used, and you will not be able to filter them on the map with the dropdown, unless they are included in the menu. 

### How
1. Be sure the change the .csv to the name of the file you are reading from. The default is set to Classification_types.csv, from the Property list folder. 

2. Change the index of the column (row[X]) to be whichever column you want to include. Remember that Python indices start at 0. 

3. Then, copy all of the options in the output.html file, and paste them into the index.html to replace the dropdown options you want to replace.




<br><br><br><br>
##### written by Michael Madaio, with Xiang Cheng, Oliver Haimson and Wenwen Zhang <br>on behalf of Data Science for Social Good, Atlanta<br> for Atlanta Fire Rescue Department
