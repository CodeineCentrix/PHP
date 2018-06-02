<?php
/*   
When using this class specifically it is really important to note:
 * The class uses MSSQL Server as a database. 
 * Ensure that your php.ini contains the SQLSRV4.3 package in order to implement certain database methods such as connecting to the 
 * -> database and retrieving data.
 * As of SQLSRV3.0 prebuilt methods use the sqlsrv_connect syntax, that is sqlsrv_'method_name'
 *  */

class  DBhelper{
private $server_address = "localhost"; //Use 127.0.0.1 or localhost if using your own machine for testing
private $database_name="HaichDB"; //name of the database we would like to connect to
private $connection_object;
public $is_connected_to_DB = FALSE;
public $count=0;

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

/*    *****Dear fellow Group Member*****
 *  These methods is designed to be dynamic and doesn't tie itself to one purpose. 
 *  it's a tiered layer(Final layer communicating with DB), meaning the layers before this should provide values in the form of parameters to the method.
 *  if you ever find the need to modify this class -> you're using it wrong!!And will damage the entire system
 */
 
 public static function sp_SelectStatement($procedureName = null) {
     /* Gets a stored procedure to run with no parameters for the stored procedure
      * Runs Selects statements and returns a table to the method calling it.
      */
     $this->connectToDB();
     $this->KillErrorThread($this->is_connected_to_DB);
     $call_procedure ="{ call $procedureName}";
     $statement = sqlsrv_query($this->connection_object,$call_procedure);
     $this->KillErrorThread($statement);
     $table = array();
     while ($row = sqlsrv_fetch_array($statement,SQLSRV_FETCH_NUMERIC)) {
         $table[] = $row;
     }
     sqlsrv_free_stmt($statement);
     sqlsrv_close($this->connection_object);
     return $table; 
     //Method is done.
 } //End sp_SelectStatement
 
 public static function sp_SelectWithParams($procedureName = null,$parameters=null) {
    /* Gets a stored procedure including parameters 
     * Runs a Select statement and returns a table to the method calling it.
     */ 
      $this->connectToDB();
     $this->KillErrorThread($this->is_connected_to_DB);
     $call_procedure ="{ $procedureName}";
     $statement = sqlsrv_query($this->connection_object,$call_procedure,$parameters);
     $this->KillErrorThread($statement);
     $table = array();
     while ($row = sqlsrv_fetch_array($statement,SQLSRV_FETCH_NUMERIC)) {
         $this->count++;
         $table[] = $row;
     }
     sqlsrv_free_stmt($statement);
     sqlsrv_close($this->connection_object);
     return $table;
     //Method is done
 }//End sp_SelectWithParams
 
 public static function sp_NonQueryStatementsParams($procedureName,$parameters) {
     /* Gets a stored procedure including parameters 
      * Runs a none select such as INSERT, UPDATE... etc, and returns an  bool indicating success or failure.
      */
     $this->connectToDB();
     $this->KillErrorThread($this->connection_object);
     $call_procedure = "{call $procedureName}";
     $result = sqlsrv_query($this->connection_object,$call_procedure,$parameters);
     $this->KillErrorThread($result);
     $affected_rows =sqlsrv_rows_affected($result);
     sqlsrv_free_stmt($result);
     sqlsrv_close($this->connection_object);
     return $affected_rows> 0;
     //Method is done.
 }//End sp_NonQueeyStatementsParams
 
 function KillErrorThread($isValid){
     /*
      * This method is purely to provide undescriptive error messages- can also be used to redirect to error pages.
      * but users shouldn't know what the errors are mapped to. 
      */
     $this->count++;
     if (!$isValid) {
         die(print_r("Error occured, Sorry!".$this->count,TRUE));
     }
 }
 
}

