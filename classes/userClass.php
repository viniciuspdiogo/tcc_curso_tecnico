<?php

class userAdmin{

    public $name;
    public $user;
    public $email;
    public $password;

    function __construct(){

        include "../paginas/conexao-geral.php";
        $this->con = $con;

    }
    public function createUserAdmin(){
        $existsUser = false;
        $existsEmail = false;

        $verifyUniqueUser = "select loginmst,emailmst from masters where loginmst ='$this->user' or emailmst ='$this->email' ";
        $resultQuery = mysqli_query($this->con,$verifyUniqueUser);
        if(!$resultQuery){
            return 500;
        }
        while($row = mysqli_fetch_assoc($resultQuery)){
            if($row["loginmst"] == $this->user && $row["emailmst"] == $this->email){
                $existsUser = true;
                $existsEmail = true;
            } 
            if($row["loginmst"] == $this->user){
                $existsUser = true;
            }
            if($row["emailmst"] == $this->email){
                $existsEmail = true;
            }
        }

        if($existsUser && $existsEmail){
            return 401;
        }
        if($existsUser){
            return 402;
        }
        if($existsEmail){
            return 403;
        }
   
        $query = "insert into masters(nomemst, loginmst, senhamst, emailmst)
        values('$this->name','$this->user','".crypt($this->password)."','$this->email')";
        
        if(mysqli_query($this->con,$query)){
            return 200;
        }else{
            return 500;
        }
        
       mysqli_close($this->con);
    }
}