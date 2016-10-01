#Interactive Map #


The Firebird framework is designed to help municipal fire departments:</br>
1. <a href="https://github.com/DSSG-Firebird/property-joins">Discover new properties for inspection</a><br>
2. <a href="https://github.com/DSSG-Firebird/risk-model">Predict fire risk for properties and assign them a risk score
</a><br>
3. <a href="https://github.com/DSSG-Firebird/interactive-map">Visualize property inspections on an interactive map
</a><br>

More information on the Firebird project can be found <a href="http://www.firebird.gatech.edu">here</a>.

This repository has scripts to help you build an interactive map, using Mapbox and D3, to visualize the property inspections and fires.

======

### The AFRD_Map folder is the main website folder. 
* This is what you should upload to your website directory.


#### Files included in this folder:
* index.html - This is the main map page, including the HTML, CSS, and Javascript to run the map.
* <a href="https://github.com/DSSG-Firebird/interactive-map/blob/master/Main%20Map%20Files/README_index.md">README_index.md</a> - Explains how to use the index.html file
* SQL_query.php - This php file queries your SQL database to pull in information about the properties.
* <a href="https://github.com/DSSG-Firebird/interactive-map/blob/master/Main%20Map%20Files/README_SQLquery.md">README_SQLquery.md</a> - Explains how to use the SQL_query.php file
* NPU.json - This is the json file for the NPU overlays.
* Battalions.json - This is the json file for the Battalion overlays.
* council_districts.json - This is the json file for the Council District overlays.
* css Folder - This folder contains all of the external stylesheets for imported UI widgets like the DateRange Slider (iThing.css), and the Dropdown menu (chosen.css).
* js Folder - This folder contains all of the Javascript and JQuery external scripts needed to run the map. This includes d3.js (for the d3 functionality), jQDateRangeSlider, moment.js (for date/time conversion functions), chosen.jquery.js (for the dropdown menu), and others. 

________________________________________________________________


### The Misc Map folder contains miscellaneous map files

#### Files included in this folder:
* <a href="https://github.com/DSSG-Firebird/interactive-map/blob/master/Misc.%20Map%20Files/README_UpdatingMapData.md">READMEUpdatingMapData.md</a> - Explains how to create the back-end SQL server to host the map data on your server, and how to update that data to keep the map useful in the longer term.
* dropdownWriter.py - This Python script allows you to automatically create new dropdown menu lists, without typing out 100+ entries. Use this if you want to use the Property_list_long with all 190 FSAF types. 
* <a href="https://github.com/DSSG-Firebird/interactive-map/blob/master/Misc.%20Map%20Files/README_dropdownWriter.md">READMEdropdownWriter.md</a> - Explains how to use the dropdownWriter.py file
* AFRD_SQL.csv - This should be imported to your SQL server, into a table called “Fire_Incidents” [so the SQL_query.php file can access it].
* AFRD_SQL_Columns  - This explains what each of the AFRD_SQL columns are.
* Property_list_short.csv - This should be imported to your SQL server, into a table called “Current_And_Potential_Inspections” [so the SQL_query.php file can access it].
	* __NOTE:__ This file is NOT in this folder, but you can generate your own version from your own data with the code in the property-joins Github repo. 



<br><br><br><br>
##### written by Michael Madaio, with Xiang Cheng, Oliver Haimson, and Wenwen Zhang <br>on behalf of Data Science for Social Good, Atlanta<br> for Atlanta Fire Rescue Department
