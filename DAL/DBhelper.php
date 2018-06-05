<?php
/*   
When using this class specifically it is really important to note:
 * The class uses MSSQL Server as a database. 
 * Ensure that your php.ini contains the SQLSRV4.3 package in order to implement certain database methods such as connecting to the 
 * -> database and retrieving data.
 * As of SQLSRV3.0 prebuilt methods use the sqlsrv_connect syntax, that is sqlsrv_'method_name'
 *  */

class   DBhelper{
private static $server_address ="localhost"; //"10.103.137.7"; //Use 127.0.0.1 or localhost if using your own machine for testing
private static $database_name="Codecentrix"; //name of the database we would like to connect to
private static $connection_object;
public static $is_connected_to_DB = FALSE;
public static $count=0;

private static function connectToDB(){
//    "UID" => "codecentrix" ,
//    "PWD" => "password", 
    $connection_params = array(	
	
	"Database" => self::$database_name
	);
        self::$connection_object =sqlsrv_connect(self::$server_address,$connection_params);   
   if (self::$connection_object) {
       self::$is_connected_to_DB = TRUE;
   }else{
       self::$is_connected_to_DB = FALSE;
       die(print_r(sqlsrv_errors(),TRUE));
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
     self::connectToDB();
     self::KillErrorThread(self::$is_connected_to_DB);
     $call_procedure ="{ call $procedureName}";
     $statement = sqlsrv_query(self::$connection_object,$call_procedure);
     self::KillErrorThread($statement);
     $table = array();
     while ($row = sqlsrv_fetch_array($statement,SQLSRV_FETCH_NUMERIC)) {
         $table[] = $row;
     }
     sqlsrv_free_stmt($statement);
     sqlsrv_close(self::$connection_object);
     return $table; 
     //Method is done.
 } //End sp_SelectStatement
 
 public static function sp_SelectWithParams($procedureName = null,$parameters=null) {
    /* Gets a stored procedure including parameters 
     * Runs a Select statement and returns a table to the method calling it.
     */ 
    self::connectToDB();
     
    self::KillErrorThread(self::$is_connected_to_DB);
     $call_procedure ="{call $procedureName}";
     $statement = sqlsrv_query(self::$connection_object,$call_procedure,$parameters);
     self::KillErrorThread($statement);
     $table = array();
     while ($row = sqlsrv_fetch_array($statement,SQLSRV_FETCH_NUMERIC)) {
         self::$count++;
         $table[] = $row;
     }
     sqlsrv_free_stmt($statement);
     sqlsrv_close(self::$connection_object);
     return $table;
     //Method is done
 }//End sp_SelectWithParams
 
 public static function sp_NonQueryStatementsParams($procedureName,$parameters) {
     /* Gets a stored procedure including parameters 
      * Runs a none select such as INSERT, UPDATE... etc, and returns an  bool indicating success or failure.
      */
     self::connectToDB();
     self::KillErrorThread(self::$connection_object);
     $call_procedure = "{call $procedureName}";
     $result = sqlsrv_query(self::$connection_object,$call_procedure,$parameters);
     self::KillErrorThread($result);
     $affected_rows =sqlsrv_rows_affected($result);
     sqlsrv_free_stmt($result);
     sqlsrv_close(self::$connection_object);
     return $affected_rows> 0;
     //Method is done.
 }//End sp_NonQueeyStatementsParams
 
 static function KillErrorThread($isValid){
     /*
      * This method is purely to provide undescriptive error messages- can also be used to redirect to error pages.
      * but users shouldn't know what the errors are mapped to. 
      */
     self::$count++;
     if (!$isValid) {
         die(print_r(sqlsrv_errors(),TRUE));
     }
 }
 
}

