<?php

require("./library/DB.php");
require(config.php);

$db = new DB("jacketpages");

class Organization {
  public static function get($id) {
    try {
	$query = "SELECT orgId,name,description,logo_path FROM 'organizations' WHERE 'orgId' =:orgId";	
	$result = $db->fetchAll($query, array("orgId"=>$id));
	foreach($result as $value)
	{
	  $result->logo_path = "http:\/\/jacketpages.gatech.edu". $result->logo_path;
	}	
	echo json_encode($result);
        }
      echo '{"error" : "no organization with id: '.$id.'"}';
    } catch(Exception $e) {
      echo '{"error" : "Something broke :("}';
    }
  }
  public static function getAll() {
	try
	{
	$query = "SELECT orgId,name,description,logo_path FROM 'organizations'";
	$result = $ddb->fetchAll($query, array());
	echo json_encode($result);
    	foreach($result as $value)
	{
	  $result->logo_path = "http:\/\/jacketpages.gatech.edu". $result->logo_path;
	}	
	}
catch(Exception $e) {
      echo '{"error" : "Something broke :("}';
    }
} 
 public static function join($id) {
    echo "Joining organization with Id: $id";
  }
  
}


?>
