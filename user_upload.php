<?php
/**
 * Created by PhpStorm.
 * User: Kathie
 * Date: 19/07/2017
 * Time: 2:59 PM
 */
define('ROOT', "C:\\xampp\\htdocs\\user_upload");
//include ROOT. '/sqlconnect.php';
function readCSV($csvFile)
{
    $file_handle = fopen($csvFile, 'r');
    while (!feof($file_handle)) {
        $line_of_text[] = fgetcsv($file_handle, 1024);
    }
    fclose($file_handle);
    return $line_of_text;
}


// Set path to CSV file
$csvFile = 'users.csv';

$csv = readCSV($csvFile);

function process_csv_row($csv){
    //$a=0;
    $data_arr = $csv;
    for ($a = 0; $a < count($data_arr); $a++) {
       //  Process each row
        // validate_fields()
        /*** HERE we need to write back to the $csv array when we validated -- new function validate_each_row_in_csvarray()
         */
        //
        //validate_each_row_in_csvarray($data_arr);
       // pass the index $a and the data array
       sql_insert_row($a, $data_arr);
    }
}

process_csv_row($csv);
//function validate_each_row_in_csvarray($data);
function sql_insert_row($idx, $csvrow) {
    include ROOT. '/sqlconnect.php';

    $a = $idx;
    $i_array = $csvrow;

    $sql = 'INSERT INTO user_upload
                VALUES (?, ?, ?)';

    $result = $conn->prepare($sql);
    //is -- i -integer, s - string
    $result->bind_param('sss',$i_array[$a][0],$i_array[$a][1], $i_array[$a][2]);
    $result->execute();
    return;
}



