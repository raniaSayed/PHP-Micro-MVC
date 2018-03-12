<?php


/**
 * Basic Model Class
 */
class Model
{
  protected $tableName;
  protected $colsNames;

  /**
	*	dynamic insert can be used by any table
	*	@param $variableList is a variable list of any size ex(x1,x2,x3,...)
	**/
	public function insert(){
    //get db connection
    global $conn;


		foreach ($colsNames as $key => $value) {
			$keys[] = $key;
			$values[] = "'".$$key."'";
		}

		$query = sprintf(
                      "insert into ".$this->tableName." (%s) values (%s);"
                      ,implode(',',$keys),implode(',',$values)
                    );

		echo "query : ".$query."<br>";

		if(! $result_set = $this->prepareStmt($query)){
			echo $this->conn->connect_error;
					echo " msh tmam";

			return false;
		}
		//$stmt->close();
		return true;
	}

  public function prepareStmt($query){
      if(! $stmt = $this->conn->prepare($query) ){
          echo "Prepare failed: (" . $this->conn->errno . ") " . $this->conn->error;
        return false;
      }
      $id=NULL;
      if(! $stmt->execute()){
          echo "Prepare failed: (" . $this->conn->errno . ") " . $this->conn->error;
      }
      $result = $stmt->get_result();

      $stmt->close();
      return  $result;
  }

}
