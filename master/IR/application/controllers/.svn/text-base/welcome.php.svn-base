<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	private $data;
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		log_message('debug', 'this->setMessage()');
//		$this->setMessage();
	}
	
	public function index()
	{
//		log_message('debug', 'this->setMessage()');
		$this->query();
	}

	public function query()
	{
		$content = $this->load->view('query', '', true);
		$this->data = array(
			'baseURL'		=> base_url(), 
			'myAppCSS'	=>	base_url().'public/css/query.css',
			'myAppJS'	=>	base_url().'public/js/query.js',
			'content' => $content );
		$this->parser->parse('master',$this->data);			
	}	
	
	public function register()
	{
		$content = $this->load->view('register', '', true);
		$this->data = array(
			'baseURL'		=> base_url(), 
			'myAppCSS'	=>	base_url().'public/css/register.css',
			'myAppJS'	=>	base_url().'public/js/register.js',
			'content' => $content );
		$this->parser->parse('master',$this->data);			
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */