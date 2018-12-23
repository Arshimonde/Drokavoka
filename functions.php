<?php
/* ERROR HANDLING START*/
function database_notfound_error($errno, $errstr,$error_file,$error_line,$error_context) {
    if(strpos($errstr,"mysqli_connect()")==false):
        die(file_get_contents("templates/no-database.html"));
    else:
        echo $errstr;
        die();
    endif;
}
set_error_handler("database_notfound_error");
/* ERROR HANDLING END*/

/* INIT DATABASE GLOBALLY START */
    /* read configuration file */
$app_config_json = file_get_contents("app-config.json");
$app_config_array = json_decode($app_config_json);

$server_name = $app_config_array->server_name;
$db_name = $app_config_array->database_name;
$db_user = $app_config_array->database_user;
$db_password = $app_config_array->database_password;
    /* connect to database */
$app_db = mysqli_connect($server_name,$db_user,$db_password,$db_name);
/* INIT DATABASE GLOBALLY END */

/* INSERT IN DATABASE START*/
function db_insert($table,$elements){
    global $app_db;
    switch($table){
        /* insert une specialite in database */
        case "specialite":{
            $stmt = mysqli_stmt_init($app_db);
            mysqli_stmt_prepare($stmt,"INSERT INTO specialite(specialite_name,specialite_desc) VALUES(?,?)");
            mysqli_stmt_bind_param($stmt,"ss",$elements["specialite_name"],$elements["specialite_desc"]);
            $is_inserted = mysqli_stmt_execute($stmt);

            if($is_inserted):
                return true;
            endif;

            mysqli_stmt_close($stmt);
            break;
        }
        default:break;
    }
    return false;
}
/* INSERT IN DATABASE END*/

/* SELECT FROM DATABASE START*/
function db_select_all($table,$limit=null){
    global $app_db;
    $table_data = array();
    $query = "SELECT * FROM ".$table;

    if(isset($limit) && !empty($limit) && is_numeric($limit)){
        $query .= " LIMIT ".$limit;
    }
    
    $result = mysqli_query($app_db, $query );
    
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            array_push($table_data,$row);
        }
    }
    
    return $table_data;
}
/* SELECT FROM DATABASE END*/
?>