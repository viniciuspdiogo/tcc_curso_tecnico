<?php 

include("../classes/userClass.php");
$data = $_POST;
if($data){
    $userObj = new userAdmin();
    $userObj->name = $data['name'];
    $userObj->email = $data['email'];
    $userObj->user = $data['user'];
    $userObj->password = $data['password'];
    
    $data = $userObj->createUserAdmin();
    
    header("Location: ../formMasterCreate.html?infoResult=".$data);
    
}

