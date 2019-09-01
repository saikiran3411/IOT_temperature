<?php
class User {
	private $dbHost     = "localhost";
    private $dbUsername = "suvebi";
    private $dbPassword = "database@0711";
    private $dbName     = "SuVeBi";
    private $tempTbl    = "temp";

	function __construct(){
        if(!isset($this->db)){
            // Connect to the database
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if($conn->connect_error){
                die("Failed to connect with MySQL: " . $conn->connect_error);
            }else{
                $this->db = $conn;
            }
        }
    }

    function check($mac){
    	$upload = "SELECT * FROM ".$this->tempTbl." WHERE MAC_id = '".$mac."'";
    	$data = $this->db->query($upload);
    	$check = $data->num_rows;
    	return $check;
    }

    function insert($mac, $temp){
    	$select = "SELECT * FROM".$this->tempTbl;
    	$result = $this->db->query($select);
    	$check = $result->num_rows;
    	$room = $check+1;
    	$upload = "INSERT INTO ".$this->tempTbl." SET MAC_id = '".$mac."', room = '".$room."', temp = '".$temp."'";
    	$this->db->query($upload);
    	return;
    }

    function update($mac, $temp){
    	$update = "UPDATE ".$this->tempTbl." SET temp = '".$temp."', WHERE MAC_id = '".$mac."'";
    	$this->db->query($update);
    	return;
    }

    function view(){
        $view = "SELECT * FROM ".$this->tempTbl." ORDER BY room ASC";
        $data = $this->db->query($view);
        return $data;
    }
 }
?>