<?php

	session_start();

	require_once("../../includes/db.php");

	if(!isset($_SESSION['seller_user_name'])){

	echo "<script>window.open('../login','_self')</script>";

	}

  $rules = array(
  "title" => "required",
  "content" => "required");

  $val = new Validator($_POST,$rules);

  if($val->run() == false){

  echo "error";

  }else{

  $proposal_id = strip_tags($input->post('proposal_id'));

  $id = strip_tags($input->post('id'));

  $data = $input->post();

  unset($data['change_status']);
  
  unset($data['proposal_id']);

  unset($data['id']);

  $update_extra = $db->update("proposals_faq",$data,array('id' => $id,'proposal_id'=>$proposal_id));

  if(isset($_POST["proposal_id"])){
    $status = $_POST['change_status'];
    $proposal_id = $_POST['proposal_id'];
    if($status == 'true'){
      $update_status = $db->update("proposals", array('proposal_status' => 'pending') ,array("proposal_id"=>$proposal_id));
    }
  }

  }