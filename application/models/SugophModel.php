<?php 

class SugophModel extends CI_Model{
    
    //login admin
    function loginAdmin($admin){
        $query = $this->db->get_where('admin', $admin);
        return $query->row_array();
    }

    //add errand category
    function addErrandCategory($errandData){
        $query = $this->db->insert('errand_category', $errandData);
        return $this->db->insert_id();
    }

    //get all erunner applicants
    function getAllApplicant(){
        $this->db->order_by('lastname');
        $query = $this->db->get_where('user', array('type'=>'erunner', 'status'=>'pending'));
        return $query->result_array();
    }

    //get erunner applicant by id
    function getApplicantByUsername($username){
        $query = $this->db->get_where('user', array('username' => $username));
        return $query->result_array();
    }

    //get erunner applicants by keyword or search
    function getApplicantByKeyword($keyword){
        $sql = 'SELECT * FROM user WHERE type = "erunner" and firstname like "%'.$keyword.'%" and status = "pending" or lastname like "%'.$keyword.'%" and status = "pending" order by lastname';
        $query = $this->db->query($sql);
        return $query->result_array();
    }
	
	function getAllApplicantByKeyword($keyword){
        $sql = 'SELECT * FROM user WHERE firstname like "%'.$keyword.'%" and status = "active" or lastname like "%'.$keyword.'%" and status = "active" order by lastname';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    //get all users -eseeker and erunner-
    function getAllUser(){
		//$cond1 = "status != 'pending'";
		$cond2 = "status != 'denied'";
        $this->db->select('*');
        $this->db->from('user');
        //$this->db->where($cond1);
        $this->db->where($cond2);
        $this->db->order_by('lastname');
        $query = $this->db->get();
        return $query->result_array();
    }
	
	function getAllUserErunner(){
		$cond1 = "type = 'erunner'";
		$cond2 = "status != 'denied'";
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where($cond1);
        $this->db->where($cond2);
        $this->db->order_by('lastname');
        $query = $this->db->get();
        return $query->result_array();
    }
	
	function getAllUserEseeker(){
        $this->db->select('*');
        $this->db->from('user');
		$this->db->where('type', 'eseeker');
        $this->db->order_by('lastname');
        $query = $this->db->get();
        return $query->result_array();
    }

    //accept erunner applicant
    function acceptErunner($username, $update){
        $this->db->set($update);
        $this->db->where('username', $username);
        $query = $this->db->update('user');
        return 'YES';
    }

    //deny erunner applicant
    function denyErunner($username, $update){
        $this->db->set($update);
        $this->db->where('username', $username);
        $query = $this->db->update('user');
        return 'YES';
    }
	
	function banUser($username){
        $this->db->set('status', 'banned');
        $this->db->where('username', $username);
        $query = $this->db->update('user');
        return 'YES';
    }
	
	function reactivateUser($username){
        $this->db->set('status', 'active');
        $this->db->where('username', $username);
        $query = $this->db->update('user');
        return 'YES';
    }
	
	function suspendUser($username){
        $this->db->set('status', 'suspended');
        $this->db->where('username', $username);
        $query = $this->db->update('user');
        return 'YES';
    }

    //remove errand category
    function removeErrandCategory($id){
        $this->db->where('errand_category_id', $id);
        $query = $this->db->delete('errand_category');
        return 'YES';
    }
	
	//add errand options
	function addErrandOption($data){
		$query = $this->db->insert('errand_option', $data);
		return $this->db->insert_id();
	}
	
	function addOptionToErunner($data){
        $query = $this->db->insert('services_offered', $data);
        return $this->db->insert_id();
    }

    //get all active errand category
    function getAllActiveErrandCategory(){
        $this->db->order_by('errand_name');
        $query = $this->db->get('errand_category');
        return $query->result_array();
    }
	
	function getErrandCategoryById($id){
		$this->db->from('errand_category');
		//$this->db->select('errand_name');
		$this->db->where('errand_category_id', $id);
		$query = $this->db->get();
        return $query->row_array();
    }
	
	function getErrandDocuments(){
		$query = $this->db->get('errand_option');
        return $query->result_array();
	}
	
	function getErrandOptionByErrandCategory($id){
		$query = $this->db->get_where('errand_option', array('errand_category_id'=>$id));
		return $query->result_array();
	}
	
	//
	function addReport($reportData){
		$query = $this->db->insert('report', $reportData);
		return $this->db->insert_id();
	}
	
	function getDataForPayment(){
		$cond = "type = 'erunner' AND user.status = 'active' AND errand_transaction.status = 'Confirmed' OR type = 'erunner' AND user.status = 'logged out' AND errand_transaction.status = 'Confirmed'";
		$this->db->select('sum(total_fee - bf_rate) as earning, max(date_end) as date, errand_transaction.*, user.*');
		$this->db->from('user');
		$this->db->join('errand_transaction', 'errand_transaction.erunner_username = user.username', 'left');
		$this->db->join('disbursement', 'disbursement.erunner_username = errand_transaction.erunner_username', 'left');
		$this->db->where($cond);
		$this->db->group_by('erunner_username');
		$this->db->order_by('lastname', 'desc');
		$this->db->order_by('date', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function getWallet(){
		$query = $this->db->get_where('errand_transaction', array('status'=>'Confirmed'));
		return $query->result_array();
	}
	
	function payErunner($data){
		$query = $this->db->insert('disbursement', $data);
		return $this->db->insert_id();
	}
	
	function updateUserWallet($username, $earning){
		$this->db->set('earning', $earning);
		$this->db->where('username', $username);
		$query = $this->db->update('user_wallet');
		return 'YES';
	}
	
	function getUserWallet($username){
		$query = $this->db->get_where('user_wallet', array('username'=>$username));
		return $query->row_array();
	}
	
	function userDisbursement(){
		$this->db->select('max(date_end) as date, user_wallet.*, user.*, errand_transaction.*');
		$this->db->from('user_wallet');
		$this->db->join('user', 'user_wallet.username = user.username', 'left');
		$this->db->join('errand_transaction', 'errand_transaction.erunner_username = user_wallet.username', 'left');
		$this->db->group_by('user_wallet.username', 'desc');
		$this->db->order_by('lastname', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function getReportAcceptedDenied(){
		$cond = "action = 'activated' OR action = 'denied'";
		$this->db->from('report');
		$this->db->join('user', 'report.to = user.username', 'left');
		$this->db->where($cond);
		$this->db->order_by('date', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function getReportSuspendedBanned(){
		$cond = "action = 'suspended' || action = 'banned' || action = 'reactivated'";
		$this->db->from('report');
		$this->db->join('user', 'report.to = user.username', 'left');
		$this->db->where($cond);
		$this->db->order_by('date', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function addUserLog($logData){
		$query = $this->db->insert('user_log', $logData);
		return $this->db->insert_id();
	}
	
	function getUserLog(){
		$this->db->select('*');
		$this->db->from('user_log');
		$this->db->join('user', 'user_log.username = user.username', 'left');
		$this->db->order_by('date', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	//
	//function getDateRegisteredErunner(){
	//	$condition = "type = 'erunner' and status != 'pending'";
	//	$this->db->from('user');
	//	$this->db->where($condition);
	//	$this->db->order_by('date_registered');
    //  $query = $this->db->get();
    //  return $query->result_array();
	//}
}


?>