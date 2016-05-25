<?php



// Connect to SQL database - Talk to your IT specialist to replace these with the correct ones for your department:

    $username = "generic"; 
    $password = "generic1234";   
    $host = "127.0.0.1";
    $database="--insert-database-name--";
    
    $server = mysql_connect($host, $username, $password);
    $connection = mysql_select_db($database, $server);



 // Build the SQL query - if you want to select different columns from the data, this is where you would change the query. Be sure to change these elements everywhere else, though, too.
    $potential_query = "
    SELECT `name`, `address`, `in_fsaf_yn`, `occup_type`, `new_prop_type`, `liq_id`, `inspection_date`, `risk_rating`, `risk_category`, `newx`, `newy`, `NPU`, `BATTALION`, `DISTRICT` FROM `Current_And_Potential_Inspections` WHERE `ATLANTA` != 0 AND `in_fsaf_yn` = 0 
    ";

      $fire_query = "
    SELECT `in_fsaf_yn`, `location`, `Property_u`, `Incident_d`, `Lat_y`, `Long_x`, `NPU`, `District`, `Battalion`  FROM `Fire_Incidents`
    ";

     $inspection_query = "
    SELECT `name`, `address`, `in_fsaf_yn`, `occup_type`, `new_prop_type`, `liq_id`, `inspection_date`, `risk_rating`, `risk_category`, `newx`, `newy`, `NPU`, `BATTALION`, `DISTRICT` FROM `Current_And_Potential_Inspections` WHERE `ATLANTA` != 0 AND `in_fsaf_yn` = 1 
    ";



// Actually query the database. If it doesn't work, return an error

    $query = mysql_query($potential_query);


    if ( ! $query ) {
        echo mysql_error();
        die;
    }



    $query2 = mysql_query($fire_query);


    if ( ! $query2 ) {
        echo mysql_error();
        die;
    }


    $query3 = mysql_query($inspection_query);


    if ( ! $query3 ) {
        echo mysql_error();
        die;
    }
    
   

// Build the JSON for the Inspections and Potentials

     $geojson = array(
    	'type' 	=> 'FeatureCollection',
    	'features'  => array()
	);


// The order of the next 3 while loops (for query, query2, and query3), determines the order in which they get added to the JSON file, which determines the order they get drawn in. 
     // The first one (query.. or, the Potentials) will get drawn first, and thus, appear underneath of the other 2 dot layers. 

while($row = mysql_fetch_assoc($query)) {

        $newx = (float) $row['newx'];   // Convert coordinates from strings (in SQL) to floats (so the map can read them).
        $newy = (float) $row['newy'];
        

        $feature = array(
            'type' => 'Feature', 
            'properties' => array(
                'name' => $row['name'],
                'address' => $row['address'],
                'in_fsaf_yn'=> $row['in_fsaf_yn'],
                'occup_type'=> $row['occup_type'],
                'new_prop_type'=> $row['new_prop_type'],                
                'liq_id'=> $row['liq_id'],
                'inspection_date' => $row['inspection_date'],
                'risk_rating' => $row['risk_rating'],
                'risk_category'=> $row['risk_category'],
                'NPU'=> $row['NPU'],
                'BATTALION'=> $row['BATTALION'],
                'DISTRICT'=> $row['DISTRICT'],
            ),
            'geometry' => array(
                'type' => 'Point',
                'coordinates' => array($newx, $newy)
                ),
            )
        ;
        array_push($geojson['features'], $feature);   // Push that array out to $geojson
    };



    while($row = mysql_fetch_assoc($query2)) {

     $Long_x = (float) $row['Long_x'];   
        $Lat_y = (float) $row['Lat_y'];


        $feature = array(
            'type' => 'Feature', 
            'properties' => array(
                'in_fsaf_yn' => $row['in_fsaf_yn'],
                'location' => $row['location'],
                'Property_u' => $row['Property_u'],
                'Incident_d' => $row['Incident_d'],                
                'NPU' => $row['NPU'],
                'Battalion' => $row['Battalion'],
                'District'=> $row['District'],
            ),
          'geometry' => array(
            'type' => 'Point',
            'coordinates' => array($Long_x, $Lat_y)
                ),
            );
        array_push($geojson['features'], $feature);
    };


while($row = mysql_fetch_assoc($query3)) {

        $newx = (float) $row['newx'];   // Convert coordinates from strings (in SQL) to floats (so the map can read them).
        $newy = (float) $row['newy'];
        

        $feature = array(
            'type' => 'Feature', 
            'properties' => array(
                'name' => $row['name'],
                'address' => $row['address'],
                'in_fsaf_yn'=> $row['in_fsaf_yn'],
                'occup_type'=> $row['occup_type'],
                'new_prop_type'=> $row['new_prop_type'],                
                'liq_id'=> $row['liq_id'],
                'inspection_date' => $row['inspection_date'],
                'risk_rating' => $row['risk_rating'],
                'risk_category'=> $row['risk_category'],
                'NPU'=> $row['NPU'],
                'BATTALION'=> $row['BATTALION'],
                'DISTRICT'=> $row['DISTRICT'],
            ),
            'geometry' => array(
                'type' => 'Point',
                'coordinates' => array($newx, $newy)
                ),
            )
        ;
        array_push($geojson['features'], $feature);   // Push that array out to $geojson
    };
    






    mysql_close($server);

    echo json_encode($geojson);
?>



