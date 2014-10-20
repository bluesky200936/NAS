<?php
require(APPPATH.'/libraries/REST_Controller.php');

class Rest_auth extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();
	}
	
    function cors_headers() //Cross-origin resource sharing
    {
	header('Access-Control-Allow-Origin: *');
//	header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Max-Age: 1000');
        header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
    }

    function teacher_options()
    {
		log_message('debug','teacher_options');
		$this->cors_headers();
		$this->response($_SERVER['HTTP_ORIGIN']);
    }

    function teacher_post()
    {		
		$this->cors_headers();
		log_message('debug','start to login in teacher account');
		$this->benchmark->mark('teacher_auth_start');
		$auth='';
		include_once("curl_php.php");
		$name   = $this->input->post('user_id');
		$password   = $this->input->post('password');
		$url = "https://search.kh.usc.edu.tw/TerSystem/Process.asp";
		$post_data = "user_id=$name&password=$password";
		$response = post_https($url, $post_data,$headers,$http_status);
		$this->benchmark->mark('teacher_auth_stop');
		log_message('debug',"Teacher login time is ($url): " . $this->benchmark->elapsed_time('teacher_auth_start', 'teacher_auth_stop'));
		if( $response !=NULL && $http_status=='302') //檢查是否通過認證
		{
			$pos = strpos(RequestSplite($response,'Location'), 'rdurl');
			if ($pos !== false) {
				$auth='success';
			} else {
				$auth='false';
			}
		}		
		if($auth=='')
		  $data = array('success' => false, 'auth' => false);
		else
		  $data = array('success' => true, 'auth' => $auth);
//		 log_message('debug',json_encode($data));
		$this->response($data);
    }

    function student_options()
    {
		$this->cors_headers();
		$this->response($_SERVER['HTTP_ORIGIN']);
    }

    function student_post()
    {		
		$this->cors_headers();
		log_message('debug','start to login in student account');
		$this->benchmark->mark('student_auth_start');
		$auth='';
		include_once("curl_php.php");
		$name   = $this->input->post('user_id');
		$password   = $this->input->post('password');
		$url = "https://search.kh.usc.edu.tw/km1/psw.asp";
		$post_data = "STUID=$name&PSWPASWRD=$password";
		$response = post_https($url, $post_data,$headers,$http_status);
		$this->benchmark->mark('student_auth_stop');
		debug($http_status);
		log_message('debug',"student login time is($url): " . $this->benchmark->elapsed_time('student_auth_start', 'student_auth_stop'));
		//debug($response);
		if( $response !=NULL) //檢查是否通過認證
		{
			if($http_status!='302') 
				$auth='false';
			else {
				$auth='success';
			}
		}		
		if($auth=='')
		  $data = array('success' => false, 'auth' => false);
		else
		  $data = array('success' => true, 'auth' => $auth);
//		 log_message('debug',json_encode($data));
		$this->response($data);
    }

    function employer_options()
    {
		$this->cors_headers();
		$this->response($_SERVER['HTTP_ORIGIN']);
    }

    function employer_post()
    {		
		$this->cors_headers();
		$this->load->model('code_model');
		$auth='';
		$code   = $this->input->post('password');
		$response = $this->code_model->get_code($code);
		log_message('debug',$response->row()->stu_id);
		if( $response->num_rows()> 0) //已經有資料筆數
			$data = array('success' => true, 'auth' => 'success', 'id' => $response->row()->stu_id);
		else
			$data = array('success' => true, 'auth' => false);

//		 log_message('debug',json_encode($data));
		$this->response($data);
    }	
	
}
?>
