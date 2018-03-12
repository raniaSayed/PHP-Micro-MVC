<?php


/**
 * Users Model
 */
class Users extends Model
{

  public $id;
  public $name;
  public $email;
  protected $tableName ="users";
  protected $colsNames =["id","name","email"];

}
