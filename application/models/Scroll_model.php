<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scroll_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function fetch_data($limit, $start) {
		$this->db->select("*");
		$this->db->from("post");
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		return $query;
	}
}