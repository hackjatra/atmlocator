<?php
class APP_Model_Variable extends Zend_Db_Table_Abstract
{
	protected $_name = 'variables';
	
	public function getValue($name)
	{
		$select = $this->select()->where('name = ?', $name);
		$result = $this->fetchRow($select);
		return $result['value'];
	}
	
	public function getAllValue()
	{
		$select = $this->select();
		return $this->fetchAll($select);
	}
	public function getValueById($id) 
	{
		$query = $this->select()->where('id = ?',$id);
		return $this->fetchRow($query);
	}
	
	/*public function isExist()
	{
		$select = $this->
	}
	*/
}