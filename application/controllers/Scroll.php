<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scroll extends CI_Controller {

	public function index() {
		$this->load->view('welcome_message');
	}

	public function fetch() {
		$output = '';
		$this->load->model('scroll_model');
		$data = $this->scroll_model->fetch_data($this->input->post('limit'), $this->input->post('start'));

		if($data->num_rows() > 0) {
			foreach($data->result() as $row) {
				$output .= '
				<div class="post-data">
					<h3 class="text-danger">'.$row->post_title.'</h3>
					<p>'.$row->post_description.'</p>
				</div>
				';
			}
		}
		echo $output;
	}
}
