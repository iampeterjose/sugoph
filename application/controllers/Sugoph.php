<?php

class Sugoph extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('SugophModel', 'sm');
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
		
		date_default_timezone_set('Asia/Manila');
    }
    //----------views----------
    //login user view
    function login(){
		if(isset($_SESSION['username'])){
			echo "<script>window.location = 'home';</script>";
		}
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'trim|required',array('required'=>'Username is required!'));
        $this->form_validation->set_rules('password', 'Password', 'trim|required',array('required'=>'Password is required!'));

        if ($this->form_validation->run() == FALSE)
        {
            $ViewBag['title'] = 'SugoPh';
            //$ViewBag['home'] = 'home';

            $this->load->view('templates/header', $ViewBag);
            $this->load->view('pages/adminLogin');
            $this->load->view('templates/footer');

            $errors = validation_errors();
            // print_r($errors);
            // $this->output->set_output(json_encode(validation_errors()));
            if(!empty($errors)){
                $this->output->set_output(json_encode(
                    array(
                        'message' => $errors,
                        'code' => 0
                    )
                ));
            }            
        }
        else
        {
            $admin = array(
                'username'=>$username,
                'password'=>$password
            );
    
            $return = $this->sm->loginAdmin($admin);
    
            if(isset($return)){
                $_SESSION['username'] = $return['username'];
                $this->output->set_output(json_encode(
                    array(
                        'message' => 'Welcome Admin!',
                        'code' => 1
                    )
                ));
            }
            else{
                $this->output->set_output(json_encode(
                    array(
                        'message' => 'Invalid login!',
                        'code' => 0
                    )
                ));
            }
        }
    }

    //home or main view
    function home(){
		if(!isset($_SESSION['username'])){
			echo "<script>window.location = 'login';</script>";
		}
        $ViewBag['title'] = 'SugoPH';
		//$ViewBag['home'] = "home";
        $ViewBag['user'] = $this->sm->getAllUser();

        $this->load->view('templates/header', $ViewBag);
       // $this->load->view('pages/adminDashboard');
        $this->load->view('pages/home', $ViewBag);
        $this->load->view('templates/footer');
    }

    //management errand category view
    function errandCategory(){
		if(!isset($_SESSION['username'])){
			echo "<script>window.location = 'login';</script>";
		}
        $ViewBag['title'] = 'SugoPH';
		//$ViewBag['home'] = "home";
        $ViewBag['allErrand'] = $this->sm->getAllActiveErrandCategory();
        $ViewBag['documents'] = $this->sm->getErrandDocuments();

        $this->load->view('templates/header', $ViewBag);
        //$this->load->view('pages/adminDashboard');
        $this->load->view('pages/errandCategory2', $ViewBag);
        $this->load->view('templates/footer');
    }
	
	//management erunner applicant view
    function erunnerApplication(){
		if(!isset($_SESSION['username'])){
			echo "<script>window.location = 'login';</script>";
		}
        $ViewBag['title'] = 'SugoPH';
		//$ViewBag['home'] = "home";
        $ViewBag['applicant'] = $this->sm->getAllApplicant();

        $this->load->view('templates/header', $ViewBag);
        //$this->load->view('pages/adminDashboard');
        $this->load->view('pages/erunnerApplication', $ViewBag);
        $this->load->view('templates/footer');
    }

    //monitoring erunner applications view
    function monitoringErunnerApplication(){
		if(!isset($_SESSION['username'])){
			echo "<script>window.location = 'login';</script>";
		}
        $ViewBag['title'] = 'SugoPH';
		//$ViewBag['home'] = "home";
		$ViewBag['applicant'] = $this->sm->getAllApplicant();

        $this->load->view('templates/header', $ViewBag);
        //$this->load->view('pages/adminDashboard');
        $this->load->view('pages/monitoringErunnerApplication', $ViewBag);
        $this->load->view('templates/footer');
    }

    //monitoring users view
    function monitoringUser(){
		if(!isset($_SESSION['username'])){
			echo "<script>window.location = 'login';</script>";
		}
        $ViewBag['title'] = 'SugoPH';
		//$ViewBag['home'] = "home";
        $getAllUser = $this->sm->getAllUser();
		foreach($getAllUser as $allUser){
			if($allUser['status'] != 'pending') $data[] = $allUser;
		}
		$ViewBag['user'] = $data;

        $this->load->view('templates/header', $ViewBag);
        //$this->load->view('pages/adminDashboard');
        $this->load->view('pages/monitoringUser', $ViewBag);
        $this->load->view('templates/footer');
    }
	
	function monitoringUserErunner(){
		if(!isset($_SESSION['username'])){
			echo "<script>window.location = 'login';</script>";
		}
        $ViewBag['title'] = 'SugoPH';
		//$ViewBag['home'] = "home";
        $getAllUserErunner = $this->sm->getAllUserErunner();
		$data = array();
		foreach($getAllUserErunner as $allErunner){
			if($allErunner['status'] != 'pending') array_push($data, $allErunner);
		}
		$ViewBag['user'] = $data;

        $this->load->view('templates/header', $ViewBag);
        //$this->load->view('pages/adminDashboard');
        $this->load->view('pages/monitoringUserErunner', $ViewBag);
        $this->load->view('templates/footer');
    }
	
	function monitoringUserEseeker(){
		if(!isset($_SESSION['username'])){
			echo "<script>window.location = 'login';</script>";
		}
        $ViewBag['title'] = 'SugoPH';
		//$ViewBag['home'] = "home";
        $ViewBag['user'] = $this->sm->getAllUserEseeker();

        $this->load->view('templates/header', $ViewBag);
        //$this->load->view('pages/adminDashboard');
        $this->load->view('pages/monitoringUserEseeker', $ViewBag);
        $this->load->view('templates/footer');
    }
	
	function monitoringUserErrandLog(){
		if(!isset($_SESSION['username'])){
			echo "<script>window.location = 'login';</script>";
		}
        $ViewBag['title'] = 'SugoPH';
		//$ViewBag['home'] = "home";
        $ViewBag['logs'] = $this->sm->getUserLog();

        $this->load->view('templates/header', $ViewBag);
        //$this->load->view('pages/adminDashboard');
        $this->load->view('pages/monitoringUserErrandLog', $ViewBag);
        $this->load->view('templates/footer');
    }
	
	function monitoringUserAccountLog(){
		if(!isset($_SESSION['username'])){
			echo "<script>window.location = 'login';</script>";
		}
        $ViewBag['title'] = 'SugoPH';
		//$ViewBag['home'] = "home";
        $ViewBag['logs'] = $this->sm->getUserLog();

        $this->load->view('templates/header', $ViewBag);
        //$this->load->view('pages/adminDashboard');
        $this->load->view('pages/monitoringUserAccountLog', $ViewBag);
        $this->load->view('templates/footer');
    }
	
	function allActiveErunner(){
		
	}

    //reports erunner applications view
    function reportsErunnerApplication(){
		if(!isset($_SESSION['username'])){
			echo "<script>window.location = 'login';</script>";
		}
        $ViewBag['title'] = 'SugoPH';
		//$ViewBag['home'] = "home";
		$ViewBag['report'] = $this->sm->getReportAcceptedDenied();

        $this->load->view('templates/header', $ViewBag);
        //$this->load->view('pages/adminDashboard');
        $this->load->view('pages/reportsErunnerApplication', $ViewBag);
        $this->load->view('templates/footer');
    }

    //reports user view
    function reportsUser(){
		if(!isset($_SESSION['username'])){
			echo "<script>window.location = 'login';</script>";
		}
        $ViewBag['title'] = 'SugoPH';
		//$ViewBag['home'] = "home";
		$ViewBag['report'] = $this->sm->getReportSuspendedBanned();

        $this->load->view('templates/header', $ViewBag);
        //$this->load->view('pages/adminDashboard');
        $this->load->view('pages/reportsUser', $ViewBag);
        $this->load->view('templates/footer');
    }

    //reports my wallet view
    function reportsMyWallet(){
		if(!isset($_SESSION['username'])){
			echo "<script>window.location = 'login';</script>";
		}
        $ViewBag['title'] = 'SugoPH';
		$ViewBag['data'] = $this->sm->getWallet();
		//$ViewBag['home'] = "home";

        $this->load->view('templates/header', $ViewBag);
        //$this->load->view('pages/adminDashboard');
        $this->load->view('pages/reportsMyWallet', $ViewBag);
        $this->load->view('templates/footer');
    }
	
	function reportsDisbursement(){
		if(!isset($_SESSION['username'])){
			echo "<script>window.location = 'login';</script>";
		}
        $ViewBag['title'] = 'SugoPH';
		$getAllUserErunner = $this->sm->userDisbursement();
		foreach($getAllUserErunner as $allErunner){
			if($allErunner['status'] != 'pending' || $allErunner['status'] == 'banned') $data[] = $allErunner;
		}
		$ViewBag['user'] = $data;

        $this->load->view('templates/header', $ViewBag);
        //$this->load->view('pages/adminDashboard');
        $this->load->view('pages/reportsDisbursement', $ViewBag);
        $this->load->view('templates/footer');
    }

    //----------functions----------
    //management module
    //get all erunner applicants
    function getAllApplicant(){
        $keyword = $this->input->post('keyword');

        $return = $this->sm->getAllApplicant();
        if(isset($return)){
            $this->output->set_output(json_encode(array('message'=>$return)));
        }
        else{
            $this->output->set_output(json_encode(
                array(
                    'message' => 'error!',
                    'code' => 1
                )
            ));
        }
    }

    //get erunner applicant by id
    function getApplicantByUsername($username){
        $return = $this->sm->getApplicantByUsername($username);
        if(isset($return)){
            $this->output->set_output(json_encode(array('message'=>$return)));
        }
        else{
            $this->output->set_output(json_encode(
                array(
                    'message' => 'error!',
                    'code' => 1
                )
            ));
        }
    }

    //get erunner applicants by keyword or search
    function getApplicantByKeyword(){
        $keyword = $this->input->post('keyword');

        $return = $this->sm->getApplicantByKeyword($keyword);

        $ViewBag['title'] = 'Management - eRunner Applications';
        $ViewBag['applicant'] = $return;
        
        $this->load->view('templates/header', $ViewBag);
        $this->load->view('pages/adminDashboard');
        $this->load->view('pages/erunnerApplication', $ViewBag);
        $this->load->view('templates/footer');
        // exit();
        // if(isset($return)){
        //     $this->output->set_output(json_encode(
        //         array(
        //             'message' => $return,
        //             'code' => 1
        //         )
        //     ));
        // }
        // else{
        //     $this->output->set_output(json_encode(
        //         array(
        //             'message' => 'error!',
        //             'code' => 1
        //         )
        //     ));
        // }
    }
	
	function getAllApplicantByKeyword(){
        $keyword = $this->input->post('keyword');

        $return = $this->sm->getAllApplicantByKeyword($keyword);

        $ViewBag['title'] = 'Monitoring - Users';
        $ViewBag['user'] = $return;
        
        $this->load->view('templates/header', $ViewBag);
        $this->load->view('pages/adminDashboard');
        $this->load->view('pages/monitoringUser', $ViewBag);
        $this->load->view('templates/footer');
	}

    //accept erunner applicant
    function acceptErunner($username){
		$reportData = array(
				'action'=>'activated',
				'to'=>$username,
				'from'=>'admin',
				'date'=>date('Y-m-d H:i:s'),
				'duration'=>'N/A'
			);
		
		$update = array('status'=>'active', 'date_registered'=>date('Y-m-d H:i:s'));
        $return = $this->sm->acceptErunner($username, $update);
        if(isset($return)){
			$report = $this->sm->addReport($reportData);
            $this->output->set_output(json_encode(
                array(
                    'message' => 'success!',
                    'code' => 1
                )
            ));
        }
        else{
            $this->output->set_output(json_encode(
                array(
                    'message' => 'error!',
                    'code' => 0
                )
            ));
        }
    }

    //deny erunner applicant
    function denyErunner($username){
		$reportData = array(
				'action'=>'denied',
				'to'=>$username,
				'from'=>'admin',
				'date'=>date('Y-m-d H:i:s'),
				'duration'=>'N/A'
			);
		$update = array('status'=>'denied', 'date_registered'=>date('Y-m-d H:i:s'));
        $return = $this->sm->denyErunner($username, $update);
        if(isset($return)){
			$report = $this->sm->addReport($reportData);
            $this->output->set_output(json_encode(
                array(
                    'message' => 'success!',
                    'code' => 1
                )
            ));
        }
        else{
            $this->output->set_output(json_encode(
                array(
                    'message' => 'error!',
                    'code' => 0
                )
            ));
        }
    }
	
	function reactivateUser($username){
		$reportData = array(
				'action'=>'reactivated',
				'to'=>$username,
				'from'=>'admin',
				'date'=>date('Y-m-d H:i:s'),
				'duration'=>'N/A'
			);
		
        $return = $this->sm->reactivateUser($username);
        if(isset($return)){
			$report = $this->sm->addReport($reportData);
            $this->output->set_output(json_encode(
                array(
                    'message' => 'success!',
                    'code' => 1
                )
            ));
        }
        else{
            $this->output->set_output(json_encode(
                array(
                    'message' => 'error!',
                    'code' => 0
                )
            ));
        }
    }
	
	function suspendUser($username){
		$fromdate = date('Y-m-d H:i:s');
		$addtime = strtotime($fromdate) + 259200;
		$todate = date('Y-m-d H:i:s', $addtime);
		
		$reportData = array(
				'action'=>'suspended',
				'to'=>$username,
				'from'=>'admin',
				'date'=>date('Y-m-d H:i:s'),
				'duration'=>$todate
			);
		
        $return = $this->sm->suspendUser($username);
        if(isset($return)){
			$report = $this->sm->addReport($reportData);
            $this->output->set_output(json_encode(
                array(
                    'message' => 'success!',
                    'code' => 1
                )
            ));
        }
        else{
            $this->output->set_output(json_encode(
                array(
                    'message' => 'error!',
                    'code' => 0
                )
            ));
        }
    }
	
	function banUser($username){
		$reportData = array(
				'action'=>'banned',
				'to'=>$username,
				'from'=>'admin',
				'date'=>date('Y-m-d H:i:s'),
				'duration'=>'N/A'
			);
		
        $return = $this->sm->banUser($username);
        if(isset($return)){
			$report = $this->sm->addReport($reportData);
            $this->output->set_output(json_encode(
                array(
                    'message' => 'success!',
                    'code' => 1
                )
            ));
        }
        else{
            $this->output->set_output(json_encode(
                array(
                    'message' => 'error!',
                    'code' => 0
                )
            ));
        }
    }
	
	function payUserErunner($username){
		$getUserWallet = $this->sm->getUserWallet($username);
		if($getUserWallet['earning'] == '0'){
			$this->output->set_output(json_encode(
                array(
                    'message' => 'user has Php 0.00 earning!',
                    'code' => 0
                )
            ));
		}else{
			$data = array(
					'erunner_username'=>$username,
					'amount'=>$getUserWallet['earning'],
					'date_released'=>date('Y-m-d H:i:s'),
				);
				
			$logData = array(
					'username'=>$username,
					'description'=>$username.' has been paid Php '.$getUserWallet['earning'].'.00',
					'date'=>date('Y-m-d H:i:s'),
					'activity_type'=>'payment'
			);
			
			$return = $this->sm->payErunner($data);
			if(isset($return)){
				$userLog = $this->sm->addUserLog($logData);
				$report = $this->sm->updateUserWallet($username, '0');
				//$report = $this->sm->addReport($data);
				$this->output->set_output(json_encode(
					array(
						'message' => 'success!',
						'code' => 1
					)
				));
			}
			else{
				$this->output->set_output(json_encode(
					array(
						'message' => 'error!',
						'code' => 0
					)
				));
			}
		}
    }

    //add errand category
    function addErrandCategory(){
        $errandName = $this->input->post('errandName');
        $errandDescription = $this->input->post('errandDescription');
        $errandFee = $this->input->post('errandFee');
        $errandRate = $this->input->post('errandRate');

        $this->load->library('form_validation');
        $this->form_validation->set_rules('errandName', 'Errand Name', 'trim|required',
            array(
                'required'=>'Errand Name is required!'
        ));
        $this->form_validation->set_rules('errandDescription', 'Errand Description', 'trim|required',
            array(
                'required'=>'Errand Name is required!'
        ));
        $this->form_validation->set_rules('errandFee', 'Errand Fee', 'trim|required|numeric',
            array(
                'required'=>'Errand Fee is required!',
                'numeric'=>'Errand Fee is must only be numbers!'
        ));
		$this->form_validation->set_rules('errandRate', 'Errand Rate', 'trim|required|numeric',
            array(
                'required'=>'Errand Rate is required!',
                'numeric'=>'Errand Rate is must only be numbers!'
        ));
        
        if ($this->form_validation->run() == FALSE)
        {
            /* $ViewBag['title'] = 'Administrator - Errand Category';
			$ViewBag['allErrand'] = $this->sm->getAllActiveErrandCategory();

            $this->load->view('templates/header', $ViewBag);
            $this->load->view('pages/adminDashboard');
            $this->load->view('pages/errandCategory');
            $this->load->view('templates/footer'); */

            $errors = validation_errors();
            // print_r($errors);
            // $this->output->set_output(json_encode(validation_errors()));
            if(!empty($errors)){
                $this->output->set_output(json_encode(
                    array(
                        'message' => $errors,
                        'code' => 0
                    )
                ));
            }           
        }
        else
        {
            $errandData = array(
                'errand_name'=>$errandName,
                'description'=>$errandDescription,
                'booking_fee'=>$errandFee,
				'rate_per_hour'=>$errandRate
            );
            $return = $this->sm->addErrandCategory($errandData);
            if(isset($return)){
                $this->output->set_output(json_encode(
                    array(
                        'message' => 'Successfully added errand!',
                        'code' => 1
                    )
                ));
            }
            else{
                $this->output->set_output(json_encode(
                    array(
                        'message' => 'Failed to add errand!',
                        'code' => 0
                    )
                ));
            }
        }
    }
	
	//get errand options
	function getErrandOptionByErrandCategory($id){
		$return = $this->sm->getErrandOptionByErrandCategory($id);
        if(isset($return)){
            $this->output->set_output(json_encode(
                array(
                    'message' => $return,
                    'code' => 1
                )
            ));
        }
        else{
            $this->output->set_output(json_encode(
                array(
                    'message' => 'Failed to add option!',
                    'code' => 0
                )
            ));
        }
	}
	
	function getErrandCategoryById($id){
		$return = $this->sm->getErrandCategoryById($id);
        if(isset($return)){
            $this->output->set_output(json_encode(
                array(
                    'message' => $return['errand_name'],
                    'code' => 1
                )
            ));
        }
        else{
            $this->output->set_output(json_encode(
                array(
                    'message' => 'Failed to add option!',
                    'code' => 0
                )
            ));
        }
	}
	
	//add errand options
	function addErrandOption(){
		
		$this->load->library('form_validation');
        $this->form_validation->set_rules('errandName', 'Errand Name', 'trim|required',
            array(
                'required'=>'Errand Name is required!'
        ));
        $this->form_validation->set_rules('errandDescription', 'Errand Description', 'trim|required',
            array(
                'required'=>'Errand Name is required!'
        ));
        $this->form_validation->set_rules('errandFee', 'Errand Fee', 'trim|required|numeric',
            array(
                'required'=>'Errand Fee is required!',
                'numeric'=>'Errand Fee is must only be numbers!'
        ));
		$this->form_validation->set_rules('errandRate', 'Errand Rate', 'trim|required|numeric',
            array(
                'required'=>'Errand Rate is required!',
                'numeric'=>'Errand Rate is must only be numbers!'
        ));
		
		if ($this->form_validation->run() == FALSE)
        {
			$errors = validation_errors();
			$this->output->set_output(json_encode(
                array(
                    'message' => $errors,
                    'code' => 0
                )
            ));
		}
		else{
			$data = array(
				'option_name'=>$this->input->post('errandName'),
				'option_description'=>$this->input->post('errandDescription'),
				'booking_fee'=>$this->input->post('errandFee'),
				'rate_per_hour'=>$this->input->post('errandRate'),
				'errand_category_id'=>$this->input->post('errandCategoryId')
			);
			$return = $this->sm->addErrandOption($data);
			if(isset($return)){
				$getAllErunner = $this->sm->getAllUserErunner();
				foreach($getAllErunner as $runner){
					$data = array(
						'erunner_username'=>$runner['username'],
						'option_id'=>$return,
						'status'=>'unoffered'
						);
					$addOptionToErunner = $this->sm->addOptionToErunner($data);
				}
				$this->output->set_output(json_encode(
					array(
						'message' => 'Successfully added option!',
						'code' => 1
					)
				));
			}
			else{
				$this->output->set_output(json_encode(
					array(
						'message' => 'Failed to add option!',
						'code' => 0
					)
				));
			}
		}
	}

    //remove errand category
    function removeErrandCategory($id){
        $return = $this->sm->removeErrandCategory($id);
        if(isset($return)){
            $this->output->set_output(json_encode(
                array(
                    'message' => 'success!',
                    'code' => 1
                )
            ));
        }
        else{
            $this->output->set_output(json_encode(
                array(
                    'message' => 'error!',
                    'code' => 0
                )
            ));
        }
    }
	
	function getAllUser(){
		$return = $this->sm->getAllUser();
		if(isset($return)){
            $this->output->set_output(json_encode(
                array(
                    'message' => $return,
                    'code' => 1
                )
            ));
        }
        else{
            $this->output->set_output(json_encode(
                array(
                    'message' => 'error!',
                    'code' => 0
                )
            ));
        }
	}

    //logout user
    function logout(){
        
        session_destroy();
        $this->session->sess_destroy();
        header("location:login");
    }

}

?>