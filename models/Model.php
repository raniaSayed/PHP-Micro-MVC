<?php


/**
 * Basic Model Class
 */
class Model
{
  protected $tableName;
  protected $colsNames;

  /**
	*	dynamic insert can be used by any Model
	**/
	public function insert(){
    //get db connection
    global $conn;

    //prepare model coloumn names and it's values
		foreach ($this->colsNames as  $value) {
			$keys[] = $value;
			$values[] = "'".$this->$value."'";
		}


		$query = sprintf(
                      "insert into ".$this->tableName." (%s) values (%s);"
                      ,implode(',',$keys),implode(',',$values)
                    );

		// if(! $result_set = $this->prepareStmt($query)){
		// 	echo $conn->connect_error;
		// 	return false;
		// }
		//$stmt->close();
    $this->prepareStmt($query);
		return true;
	}

  public function prepareStmt($query){
    global $conn;
      if(! $stmt = $conn->prepare($query) ){
          echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
        return false;
      }
      $id=NULL;
      if(! $stmt->execute()){
          echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
      }
      $result = $stmt->get_result();

      $stmt->close();
      return  $result;
  }

}
