<?php
  class Pages extends Controller {
    public function __construct(){
      $this->adminModel = $this->model('Admins');
      $this->chauffModel = $this->model('Chauffeurs');
      $this->avisModel = $this->model('Avis');
    }
    
    public function index(){
      
      $this->view('pages/index');
    }

   public function avis(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
      // process form
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 
       $data = [
           'id_chauff' => trim($_POST['chauff']),
           'id_client' => trim($_POST['client']),
           'av' => trim($_POST['avi']),
         
          ];

          $this->avisModel->registerAv($data);
  
  }
    $data = $this->chauffModel->getAllChauff();
      $this->view('pages/avis', $data);
   }
 

  }