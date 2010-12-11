<?php
/*
 * returns id of current table based on field and value
 * returns only the first row if more than one row is returned from query
 * @field -> field name of table
 * @value -> where field = value
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
}