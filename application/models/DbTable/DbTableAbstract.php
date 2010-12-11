<?php
/*
 * returns id of current table based on field and value
 * returns only the first row if more than one row is returned from query
 * @field -> field name of table
 * @value -> value of field (for where query)
 */
class App_Model_DbTable_DbTableAbstract extends Zend_Db_Table_Abstract{
	function getIdByField ( $field,$value){
		  $result=$this->fetchRow("$field= '$value' "); //order by id?
		  if($result==null)
			  return;
		  if(is_array($result))
			  return $result[0]->id;
		  return $result->id;
	}

/*
 * returns row of current table based on field and value
 * returns only the first row if more than one row is returned from query
 * @field -> field name of table
 * @value -> value of field (for where query)
 */
	function getByField ( $field,$value){
		  $result=$this->fetchRow("$field= '$value' "); //order by id?
		  if($result==null)
			  return;
		  if(is_array($result))
			  return $result[0];
		  return $result;
	}
}