<?php

/**
 *  Database Class
 */
class Database
{
  public $conn;

  public function __construct()
  {
  		$this->conn = new \mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
  		if (! $this->conn ) {
  			echo "connection error";
  		}
  	}
}

 ?>
