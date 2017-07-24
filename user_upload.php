<?php
define('ROOT', "C:\\xampp\\htdocs\\user_upload");

$read = new Get_scripts_options();
//$read->readC();
$cli_options = $read->read_in_scripts_args();
//var_dump($cli_options);
$data = $read->readCSV($cli_options);
$process = new Process_and_SQL_insert();
$parms = $process->process_csv_row($data);
//$o_options = $read->readCSV($cli_options);
//var_dump $data;

exit(); // testing
// get input csv // reqs the in_options (class Get - $options)
//$data = readCSV(); // need the get which csv file
//process data($data);
//insert SQL

// Process the scripts args


//^^^^^^^^^^^^^^^^^^^^^^^^
// *** create table -- option
// if this is the first time you run the script you must enter option --create_table, table is required to be able to run the script. I assume you need the table to be created. - just need the sql create table
// check which funct to get the $options values from ???
//if (options['create_table'] == TRUE){ // to be uncomment **
//    // dont do SQL insert
//    //*** run sql file // Need to create SQL **
//    echo "Table created.\n";
//    exit(); // No further processing required
//else{
//    // required??
//    }
//}
//$data = readCSV();     // **
//  Initially commented out
// $process = new Process_and_SQL_insert($data);
// $process->process_csv_row;
//process_csv_row($data);
// if option is create_table
// do that and exit - run SQL create table
//^^^^^^^^^^^^^^^^^^^^^^^^
//process_csv_row($data); // ** to be remove once have setup the exits for certain options like --dry_run
//^^^^^^^^^^^^^^^^^^^^^^^^
// comment out first
// *** For SQL insert
//if (($options['dry_run'] == TRUE ) && ($options['file']  ==  TRUE )
//          { // to be uncomment **
//    process_csv_row();
//} else {
//       // dont do SQL insert
//      echo "dry_run and file must be provided\n";
//        echo "Incorrect options provided! Please check\n";
//        exit();
//  }
//^^^^^^^^^^^^^^^^^^^^^^^^
// ***For SQL insert
//process_csv_row(); // ** don't get here if there's error from above
//--

//$csvFile = 'users.csv';
//$csv = readCSV($csvFile);

// **For testing
//var_dump($csv);

// ***For SQL insert
//process_csv_row($csv);

// loop through each element in the $argv array
// need a class - $options,
// methods
//------------------------
class Get_scripts_options
{
    public $options;
    public $file_handle;
    public $line_of_text;

//    public function __construct()
//    {
//    }
    // remove
    function read_in_scripts_args()
    {
        /** read scripts args from the command line **/
        /*** Note: except for the arg run_dry, all args typed in must have a supplied corresponding value, for example, cannot leave --file with out a value (correct way is --file="users.csv" )  ***/
        //
        /* Testing - without using cli
        */
//-------------------------------------
        $this->options['file'] = 'users.csv';
        $this->options['create_table'] = 'user';
        $this->options['dry_run'] = '';
        return $this->options;
    }
//} // Class
    // **** to be uncommented *************8
//        $shortopts  = "";
//        $shortopts .= "f:";  // Required value
//        $shortopts .= "v::"; // Optional value
//        $shortopts .= "abc"; // These options do not accept values
//
//        $longopts  = array(
//            "file::",           // Optional value
//            "create_table::",   // Optional value
//            "dry_run",          // No value
//        );
//
//         $this->options = getopt($shortopts, $longopts);
//        return $this->options;
//    }
//}
//    return;
//}
//    return echo "\nread_in_scripts_args\n";
//}
//        return;
// **   process_scripts_args($options);

    // ** Testing
//        //retrieve_script_options($options);
//    return; // **
//    var_dump($cmd_line_options); // for testing
//    return exit();
//    return exit();
//    }
//}
// ----------------------
    function readCSV($cmd_options)
    {
//
//        $csvFile = get_input_csv(); // function not defined
        $csvFile = $this->options = $cmd_options['file'];
//        echo $this->options;
        if ($csvFile == TRUE) {
//        if (isset($this->options['file']) {
            $file_handle = fopen($csvFile, 'r');
        }
        while (!feof($file_handle)) {
            $line_of_text[] = fgetcsv($file_handle, 1024);
        }
        fclose($file_handle);
        return $line_of_text;
    }

//    function get_input_csv()
//    {

        // if csv file is given then use it -- check again --
        // does it mean to replace with existing .csv ???****
//        $in_options = $read->read_in_scripts_args();
//        if ($in_options['file'] == FALSE) {
//            $incsv = 'users.csv';
//        } else {
//            $incsv = $in_options['file'];
//        }
//        return $incsv;
//    }
}
// ----------------------
// ----------------------
//    function retrieve_script_options($options){

//    function retrieve_script_options(){
//        // testing - tb uncomment
//        //options = read_in_scripts_args();
//        return this.$options; // check if it returns with the need for getting NEW object
//    }
//}
// -------------------------
Class Process_and_SQL_insert {
    public $input_data;
    public $in_params;


    public function __constructS(){
        $this->input_data = $data;
    }
    function process_csv_row($in_data){

    //    $a=0;
        $this->input_data = $in_data;
        // start with for i=1 - first i file header
        for ($a = 1; $a = count($this->input_data); $a++) {
       //  Read each row
        // validate_fields()
        /*** HERE we need to write back to the $csv array when we validated -- new function validate_each_row_in_csvarray() -- NO need
//         */
//        //
//        //validate_each_row_in_csvarray($data_arr);
//       // pass the index $a and the data array
//        $params['a'] = $a;
//        $params['data_arr'] = $this->input_data;
        return ($a,$this->input_data); // for testing
//        return $this->params;
//       sql_insert_row($a, $data_arr);
        }
    }
    function sql_insert_row($a,$data) {
    include ROOT. '/sqlconnect.php';

//    $a = $params['a']; // do these need to be defined in the class ??
        $this->in_params = $i_params;

//    $insert_data = $params['data_arr'];
//    $a = $idx;
//    $i_array = $csvrow;

    $sql = 'INSERT INTO user_upload
                VALUES (?, ?, ?)';

    $result = $conn->prepare($sql);
    //is -- i -integer, s - string
    $result->bind_param('sss',$insert_data[$this->in_params['a'][0],$this->in_params['a'][1],
$this->in_params['a'][2]);
    $result->execute();
    return;
    }
}

    //function get_input_csv(){
//
//    // if csv file is given then use it -- check again --
//    // does it mean to replace with existing .csv ???****
//    $in_options = $read->read_in_scripts_args();
//    if ($in_options['file'] == FALSE) {
//        $incsv = 'users.csv';
//    }else{
//            $incsv = $in_options['file'];
//        }
//    return $incsv;
//}
//    public function process_csv_row($this->$data){
//
//    }
//    public function sql_insert_row($idx, $csvrow) {
//    }
//}
//---------------------


//function retrieve_cmd_line_options(){
//
//    $cmd_l_options = read_in_scripts_args();
//    return $cmd_l_options;
//}

//    function readC(){
//        echo "InreadC - class       Get_scripts_options\n";
//    }
//function readCSV()
//}
//-----------------
//function readCSV()
//{
//    $csvFile = get_input_csv(); // function not defined
//
//    if($csvFile == TRUE){
//        $file_handle = fopen($csvFile, 'r');
//    }
//    while (!feof($file_handle)) {
//        $line_of_text[] = fgetcsv($file_handle, 1024);
//    }
//    fclose($file_handle);
//    return $line_of_text;
//}
//-----------------
//file - run with the file given
//create_table - if table need to be created
//dry_run - don't insert
//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
//--  check this logic again ....
// uncommented at first ^^^^*
//function get_input_options('file','create_file','dry_run'){
//    if ('file'){
//        get_input_csv();
//    }elseif ('create_file'){
//
//    }elseif ('dry_run'){
//
//    }
//}
//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
// ** Don't need?
// retrieve_script_options($options)  // **
//function get_input_options(){
//
//    // Set path to CSV file
//    // if file is given then use it
//     $in_options = get_input_options($i_options);
//    return $i_options;
//}
//-----------------
//function get_input_csv(){
//
//    // if csv file is given then use it -- check again --
//    // does it mean to replace with existing .csv ???****
//    $in_options = $read->read_in_scripts_args();
//    if ($in_options['file'] == FALSE) {
//        $incsv = 'users.csv';
//    }else{
//            $incsv = $in_options['file'];
//        }
//    return $incsv;
//}
//---------------------------

// Set path to CSV file
//$csvFile = 'users.csv'; // delete

//$csv = readCSV($csvFile); // delete

// need to check if we should run this not dry_run
//-------------------------

//-------------------------

//function validate_each_row_in_csvarray($data);
// $params['a'] = $a;
// $params['data_arr'] = $data_arr;
// return $params;
//function sql_insert_row($idx, $csvrow) {
//------------------------------
//
//------------------------------



