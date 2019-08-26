<?php

class Auth extends CI_controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('m_auth');
    }

    function index(){
        $data['title'] = 'Login';
        $this->load->view('auth/login');
    }

    public function login(){
        $user = $this->input->post('user_name');
		$pass = $this->input->post('password');
		
		if($user == "" || $pass == ""){
			$this->session->set_flashdata("msg","<div class='alert alert-danger' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Login Failed!</strong><br> Username & password cant empty. 
            </div>");
            redirect('auth');
		}
        

        
        $queryUser = $this->m_auth->userLogin($user, $pass);
        
        // var_dump($user,$queryUser['name']);
        // exit();

        $data_session = array(
                'id' => $queryUser['id'],
                'user_name' => $user,
                'name' => $queryUser['name'],
                'access_level' => $queryUser['access_level'],
                'status' => "login"
                );
 
        $this->session->set_userdata($data_session);

        if($queryUser){
            $arrayAccessAdminSales = [
                'Masters'=>
                    [
                        'Customers','Zones'
                    ],
                    'Transaction'=>
                    [
                        'Request','Receive'
                    ],
                'Report' => [1]
            ];

            $arrayAccessSales = [
                'Masters' => [0],
                'Transaction'=>
                [
                    'Approves'
                ],
                'Report' => [0]
            ];

            $arrayAccessSalesHead = [
                'Masters' => [0],
                'Transaction' => [0],
                'Report' => [1]
            ];

            $arrayAccessEngDrawing = [
                'Masters' => [0],
                'Transaction' => ['Drawing'],
                'Report' => [0]
            ];

            $arrayAccessEngPackaging = [
                'Masters' => [0],
                'Transaction' => ['Packaging'],
                'Report' => [0]
            ];

            $arrayAccessEngBom = [
                'Masters' => [
                    'Manufactures', 'Brands', 'Warehouses'
                ],
                'Transaction' => ['BOM'],
                'Report' => [0]
            ];

            $arrayAccessEngHead = [
                'Masters' => [0],
                'Transaction' => [0],
                'Report' => [1]
            ];

            $arrayAccessSistemAdmin = [
                'Masters' => [
                    'Users','Manufactures','Brands','Warehouses','Customers','Zones'
                ],
                'Transaction' => [
                    'Request', 'approves','Drawing','Packaging','BOM','Receive'
                ],
                'Report' => [1]

            ];
            
            if ($queryUser['access_level'] == 1) {
                $data = [
                    'user'=> $queryUser["user_name"],
                    'access' => $arrayAccessAdminSales
                ];
                $this->session->set_userdata($data);
                redirect('dashboard');

            }elseif ($queryUser['access_level'] == 2){
                $data = [
                    'user' =>$queryUser["user_name"],
                    'access' => $arrayAccessSales 
                ];
                $this->session->set_userdata($data);
                redirect('dashboard');

            }elseif ($queryUser['access_level'] == 3) {
                $data = [
                    'user' =>$queryUser["user_name"],
                    'access' => $arrayAccessSalesHead 
                ];
                $this->session->set_userdata($data);
                redirect('dashboard');

            }elseif ($queryUser['access_level'] == 4) {
                $data = [
                    'user' =>$queryUser["user_name"],
                    'access' => $arrayAccessEngDrawing 
                ];
                $this->session->set_userdata($data);
                redirect('dashboard');

            }elseif ($queryUser['access_level'] == 5) {
                $data = [
                    'user' =>$queryUser["user_name"],
                    'access' => $arrayAccessEngPackaging 
                ];
                $this->session->set_userdata($data);
                redirect('dashboard');

            }elseif ($queryUser['access_level'] == 6) {
                $data = [
                    'user' =>$queryUser["user_name"],
                    'access' => $arrayAccessEngBom 
                ];
                $this->session->set_userdata($data);
                redirect('dashboard');
            }elseif ($queryUser['access_level'] == 7) {
                $data = [
                    'user' =>$queryUser["user_name"],
                    'access' => $arrayAccessEngHead
                ];
                $this->session->set_userdata($data);
                redirect('dashboard');

            }elseif ($queryUser['access_level'] == 8) {
                $data = [
                    'user' =>$queryUser["user_name"],
                    'access' => $arrayAccessSistemAdmin
                ];
                $this->session->set_userdata($data);
                redirect('dashboard');
            }
            
        }else{
            $this->session->set_flashdata("msg","<div class='alert alert-danger' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Login Failed!</strong><br> Check your username & password. 
            </div>");
            redirect('auth');
        }
        
    }

    public function logout(){
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('access');

        $this->session->sess_destroy();

        redirect('auth');
    }

    public function updatePassword()
    {
        // $newPassword = $this->input->post('new_password');
        // var_dump($newPassword);
        // exit;

        $user = $this->m_auth;
        $res = $user->updatePassword();

        redirect('dashboard');

    }


}

?>
