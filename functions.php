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
// set_error_handler("database_notfound_error");
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
    /* prepare the sql */
    $string_elements = array();
    $numeric_elements = array();
    foreach($elements as $key=>$element):
        if(is_numeric($element)):
            $numeric_elements[$key] = $element;
        else:
            $string_elements[$key] = "'".$element."'";
        endif;
    endforeach;
    
    $columns = ''; 
    
    if(count($string_elements)> 0 && count($numeric_elements)> 0):

        $columns .= implode(", ",array_keys($string_elements));
        $columns .= ",".implode(", ",array_keys($numeric_elements));
        $values = implode(", ",array_values($string_elements)).", ".implode(", ",array_values($numeric_elements));

    elseif(count($string_elements)> 0):

        $columns = implode(",",array_keys($string_elements));
        $values = implode(",",array_values($string_elements));

    elseif(count($numeric_elements)> 0):

        $columns = implode(",",array_keys($numeric_elements));
        $values = implode(",",array_values($numeric_elements));

    endif;

    $sql = "INSERT INTO ".$table."(".$columns.") VALUES(".$values.")";
    /* execute statement */
    $is_inserted = mysqli_query($app_db,$sql);
    /* test if inserted */
    if($is_inserted):
        return true;
    endif;

    return false;
}
/* INSERT IN DATABASE END*/

/* SELECT FROM DATABASE START*/
function db_select($table,$where=null,$limit=null){
    global $app_db;
    $table_data = array();
    $query = "SELECT * FROM ".$table;

    if(isset($limit) && !empty($limit) ){
        $query .= " LIMIT ".$limit;
    }

    if(isset($where) && !empty($where) ){
        $query .= " WHERE ".$where;
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

/* UPDATE TABLE IN DATABASE START */
function db_update_row($table,$elements,$where){//elements keys should be as the same as in database
    global $app_db;
    $query = "UPDATE ".$table." SET ";
    // asseign each column in data base a new value start
    $sets = array();
    foreach($elements as $key => $value):
        array_push($sets,$key."= '".$value."'");
    endforeach;
    //concatenate each column = value with ","
    $query .= implode(", ",$sets);
    //where testing 
    if(isset($where)):
        if(strpos(strtolower($where),"where")!==false)
        $query .= $where;
        else 
        $query .= "WHERE ".$where;
        // execute the query 
        $is_updated = mysqli_query($app_db,$query);
        
        if($is_updated) return true;
        else return false;
    endif;
    return false;
}
/* UPDATE TABLE IN DATABASE END */

/* DELETE FROM DATABASE START */
function db_delete_row($table,$id){
    global $app_db;
    $query = "DELETE FROM ".$table." WHERE id = ".$id;
    // var_dump($query);
     $is_deleted = mysqli_query($app_db,$query);
     if($is_deleted) return true;
     return false;
}
/* DELETE FROM DATABASE END */

/* COUNT A TABLE FROM DATABASE START */
function db_count($table){
    $count = 0;
    if(isset($table)):
        global $app_db;
        $query = "SELECT count(*)  FROM ".$table;
        $result = mysqli_query($app_db,$query);
        
        if(mysqli_num_rows($result) > 0){
            $rows = mysqli_fetch_array($result);
            $count = $rows[0];
        }    
    endif;
    return $count;
}
/* COUNT A TABLE FROM DATABASE END */

/* PAGINATE DATA START*/
function get_pagination($table,$elements_per_page=5,$page=1,$print_pagination=true){
    if(isset($table)):
        /* How much rows in $table */
        $element_count = db_count($table);
        $pages_count = round($element_count / $elements_per_page);

        /* Pagination Logic */
        if(!$print_pagination):
            /* CALCULATE OFFSET OF ROWS IN TABLE $table */
            $limit_offset = (($page-1) * $elements_per_page);

            $mysql_limit = $limit_offset.",".$elements_per_page;
            return $mysql_limit;
        else:
            /* get current page */
            $current_page = isset($_GET["page"])?((int)$_GET["page"]) : 1;
            /* PRINT PAGINATION */
            $html = "";
            $html .= '<nav aria-label="Page navigation ">';
            $html .=    '<ul class="pagination pagination-sm justify-content-end">';
            /* Previous Button */
            $previous_disable = ($current_page == 1) ? " disabled " : "";
            $html .= '<li class="page-item '.$previous_disable.'">';
            $html .=  '<a class="page-link" href="'.get_pagination_uri($current_page-1).'">                         Précédent
                        </a>';
            $html .= '</li>';
            /* LOOP through pages links */
            $active = "";
            for($i = 1;$i<= $pages_count;$i++):
                /* active page start */
                if($current_page == $i):
                    $active = "active";
                else:
                    $active ="";
                endif;
                /* active page end */

                /* Pages Buttons */
                $html.='<li class="page-item '.$active.'">
                             <a class="page-link" href="'.get_pagination_uri($i).'">'.$i.'</a>
                        </li>';
               
            endfor;
            /* NEXT Buttons */
            $next_disable = ($current_page == $pages_count) ? " disabled " : ""; 
            $html .= '<li class="page-item '.$next_disable.'">';
            $html .=  '<a class="page-link" href="'.get_pagination_uri($current_page+1).'">                         Suivant
                        </a>';
            $html .= '</li>';

            $html .=     '</ul>';
            $html .= '</nav>';
            echo $html;
        endif;
        
    endif;
}
    /* get_pagination_url */
function get_pagination_uri($page_num){
    /* if url has 'page' in parameters */
    if(isset($_GET['page'])):        
        /* get current page name *.php */
        $current_page = $_SERVER['PHP_SELF'];
        /* get all GET query */
        $query = $_GET;
        // replace parameter(s)
        $query['page'] = $page_num;
        // rebuild url
        $query_result = http_build_query($query);

        return ($current_page."?".$query_result);
    /* if url dosen't have 'page' in parameters */
    else:
        $page_uri_parameter = "";
        $page_uri = $_SERVER['REQUEST_URI'];

        if(strpos($page_uri,'=')!=false):
            $page_uri_parameter = "&page=";
        else:
            $page_uri_parameter = "?page=";
        endif;
        $page_uri_parameter .= $page_num;
        $page_uri .= $page_uri_parameter;

        return $page_uri;
    endif;
}
/* PAGINATE DATA END*/

/* GET CURRENT PAGE START */
function get_current_page(){
    $current_path = $_SERVER['PHP_SELF'];
    $current_page = substr($current_path,1,(strpos($current_path,".")-1));
    return $current_page;
}
/*  GET CURRENT PAGE START  */

/* DASHBOARD ALERT FUNCTION START*/
function dashboard_alert($alert_type='Information',$alert_color='info',$message){
    $html = "";
    $html .= "<div class='alert alert-".$alert_color." alert-dismissible fade show mb-0 rounded-0' role='alert'>";
    $html .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
    $html .='<span aria-hidden="true">×</span>';
    $html .= '</button>';
    $html .=' <i class="fa fa-info mx-2"></i>';
    $html .= ' <strong>'.$alert_type.': </strong>';
    $html .= isset($message) & !empty($message)?$message:'';
    $html .= '</div>';

    return $html;
}

    /* Get lawyer data */
function get_lawyer_data($id){
    $table = "avocat";
    $where = "id = ".$id;
    $lawyer_data = db_select($table,$where);

    return $lawyer_data[0];
}
    /* Get Lawyer Specialites */
function get_lawyer_specialties($id){
    $table = "avocat_specialite a_s, specialite s";
    $where = "s.id = a_s.id_specialite AND a_s.id_avocat = ".$id;
    $lawyer_specialites = db_select($table,$where);

    $specialites = array();
    foreach($lawyer_specialites as $specialite):
        array_push($specialites,$specialite["specialite_name"]);
    endforeach;

    return $specialites;
}
/* DASHBOARD ALERT FUNCTION END*/
?>