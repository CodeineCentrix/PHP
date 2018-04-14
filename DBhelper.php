<?php
/*   
When using this class specifically it is really important to note:
 * The class uses MSSQL Server as a database. 
 * Ensure that your php.ini contains the SQLSRV3.0 package in order to implement certain database methods such as connecting to the 
 * -> database and retrieving data.
 * As of SQLSRV3.0 prebuilt methods use the sqlsrv_connect syntax, that is sqlsrv_'method_name'
 *  */

class DBhelper{
private $server_address = "localhost"; //Use 127.0.0.1 or localhost if using your own machine for testing
private $database_name="Northwind"; //name of the database we would like to connect to
private $connection_object;
private $is_connected_to_DB = FALSE;

private function connectToDB(){
    $connection_params = array("Database" => $this->database_name);
    $this->connection_object =sqlsrv_connect($this->server_address,$connection_params);
   
   if ($this->connection_object) {
       $this->is_connected_to_DB = TRUE;
   }else{
       $this->is_connected_to_DB = FALSE;
       die(print_r("Connection Error",TRUE));
   }
}

public function runNonQuery(){
    
}

public static function run_simple_select() {
 $sql = "SELECT EmployeeID, LastName+' ' FirstName AS Name, Title"; 
$table = array(); 
 $this->connectToDB();
 if ($this->is_connected_to_DB) {
     $statement_object = sqlsrv_query($this->connection_object,$sql);
     if ($statement_object) {
       while ($row = sqlsrv_fetch_array($sql,SQLSRV_FETCH_NUMERIC)) {
          $table[] = $row;
       }
       return $table;
       }  
     }else{
         die(print_r("Query Failed",TRUE));
     }
 }
}

