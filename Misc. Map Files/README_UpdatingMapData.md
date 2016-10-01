# Updating Map Data #

The Firebird framework is designed to help municipal fire departments:</br>
1. <a href="https://github.com/DSSG-Firebird/property-joins">Discover new properties for inspection</a><br>
2. <a href="https://github.com/DSSG-Firebird/risk-model">Predict fire risk for properties and assign them a risk score
</a><br>
3. <a href="https://github.com/DSSG-Firebird/interactive-map">Visualize property inspections on an interactive map
</a><br>

More information on the Firebird project can be found <a href="http://www.firebird.gatech.edu">here</a>.

======




Your inspection map will display fires, current inspections, and potential inspections from the properties in your database, which you created using the property-joins and risk-model repositories (Steps 1 and 2 above, respectively).
<br><br>However, as soon as there is a new fire or new inspection, that list will become outdated. Therefore, we have set up a pipeline for the map to be updated as new information comes in.

======

##Input
First, a bit about how the map “takes in” data.

* In its current state, the site is hosted on the Georgia Tech server, which also provides us space to host a database as well. 
* We are using a SQL server that holds two tables of data - one for the Current and Potential Inspections (from Property_list_short.csv), and the other for Fire Incidents (from AFRD_SQL.csv). 
* The Javascript code in our Map (index.html) runs a function that uses a PHP file (SQL_query.php) to query the SQL server.
* This query returns a result in the form of a JSON, which is then used in the main Map script to display the points on the map. 


## Setup
To set up the data back-end to work on your server, follow these steps.
<br>
 1. Create an SQL database. You should be able to create one on your server.
* Change the $database variable in the SQL_query.php file to match that name.
 2. Create two tables in that database. One will hold the Current_And_Potential_Inspections, and should have 40 columns. The other will hold the Fire_Incidents, and should have 10 columns. These are the number of columns in the two CSV files you will be importing into them. 
* Label them with the names indicated above, with underscores. If you decide to change them, change the queries in the SQL_query.php file as well. 
* Also, if you decide to change the number of columns in the CSV source files, be sure to change the columns in the SQL server as well. 
* See attached Figure 1 for a list of the names and “types” of values for each of those columns. 
 3. Click Import and import the appropriate CSV files into the appropriate tables. Be sure to skip the first line so you do not import the headers into the table.
 4. Open the map website!


## Updating
To update the map with new data:

1.	Go to the table in the database that you want to update. 
2. Click on Operations (if you’re using PHPmyAdmin for database management). 
3. Click on “Empty the table”, or TRUNCATE to delete the entire CSV from the table. (Be sure you actually want to do this.)
4. Import your updated CSV, being sure to skip the first line for headers.
5. Refresh your Map site!
