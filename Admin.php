<?php 
class Admin extends Controller{

    public function __construct()
    {
        $this->adminModel = $this->model('Admins');
        $this->chauffModel = $this->model('Chauffeurs');
        $this->avisModel = $this->model('Avis');
       
    }
    public function index(){
         if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $nn = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_URL);

            $this->chauffModel->deleteChauff($nn);
            $data = $this->chauffModel->getAllChauff();
            $this->view('admin/index',$data);
         }
       $data = $this->chauffModel->getAllChauff();
        $this->view('admin/index', $data );
    }
    public function addchauff(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            // process form
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 
             $data = [
                 'name' => trim($_POST['name']),
                 'email' => trim($_POST['email']),
                 'adress' => trim($_POST['adress']),
                 'tel' => trim($_POST['tel'])
                ];

                $this->chauffModel->register($data);
        
        }

        $this->view('admin/addchauff');        
    }

    public function avischauffeur(){
        $nn = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_URL);
         
        $data = $this->avisModel->getAvisByChauff($nn);
        $this->view('admin/avischauffeur', $data);
    }
    public function editchauff(){



        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $nn = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_URL);

            $this->chauffModel->updateChauffeur($_POST);
            $data = $this->chauffModel->getChauffById($nn);
            $this->view('admin/editchauff',$data);           
           
         }else{
            $nn = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_URL);
            $data = $this->chauffModel->getChauffById($nn);
            $this->view('admin/editchauff',$data);
         }
    }
}                            