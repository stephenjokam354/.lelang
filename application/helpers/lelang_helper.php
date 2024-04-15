<?php


 function admin(){
    get_instance();
    if($this->session->userdata('id_level')==""){
        
    }else{
        redirect('Auth/Login');
    }
}
 function user(){
    get_instance();
    if($this->session->userdata('id_user')==""){
        redirect('Hal404');
    }else if($this->session->userdata('id_level')!=""){
        redirect('Hal404');
    }else{

    }
}
?>