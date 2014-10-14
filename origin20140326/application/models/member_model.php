<?php
class Member_model extends CI_Model {

	public function __construct()
	{
	}
	
	function get_member($args = FALSE)
	{
	}	
	function get_memberbySQL($args)
	{
	}
	
	function set_member($args = FALSE)
	{
		$this->db->set($args);
		$this->db->insert('member');
	}
	

}
