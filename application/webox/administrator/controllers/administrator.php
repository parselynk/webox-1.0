<?php

if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Administrator extends CI_Controller {
       public function __construct() {
        parent::__construct();

              // Library
        $this->load->library('session');
        $this->load->library('webox_core/WX_template');
        $this->load->library('webox_core/WX_password');
        $this->load->library('form_validation');
        
        // Model
        $this->load->model('webox_core/Database_model');
        $this->load->model('webox_core/news_model');
        $this->load->model('users/Authorize');
        $this->load->model('users/Token_model', 'token', TRUE);
        $this->load->model('users/User_model', 'user_model', TRUE);

        // Helper
        $this->load->helper('url_helper');
        $this->load->helper('webox_core/WX_validate_helper');
        $this->load->helper('webox_core/WX_require_header_helper');
        $this->load->helper('html');
        
        // Config
        $this->load->config('webox_core/config');


    }
    public function index() {
       // var_dump( $this->config->item('style'));

        //echo "here";die;
//       $this->news_model->select_all();
//       $data['news'] = $this->news_model->get_response(); 
//        
//       $data['title'] = "user Login UI";
       // $this->load->view('index', $data);
              // $this->load->view('/templates/header');

       // $this->wx_template->load('default','webox/hmvc', 'content', $data);
                $this->load->view('/templates/header');
                $this->load->view('/templates/sidebar');
                $this->load->view('/templates/navbar');
                $this->load->view('/templates/title-dashboard');
                $this->load->view('index');
                $this->load->view('/templates/topRightSidebar');
                $this->load->view('/templates/settings');
                $this->load->view('/templates/footer');
                $this->load->view('/templates/after_footer');

    }
    
        public function users() {
       // var_dump( $this->config->item('style'));

        //echo "here";die;
//       $this->news_model->select_all();
//       $data['news'] = $this->news_model->get_response(); 
//        
//       $data['title'] = "user Login UI";
       // $this->load->view('index', $data);
              // $this->load->view('/templates/header');

       // $this->wx_template->load('default','webox/hmvc', 'content', $data);
                $this->load->view('/templates/header');
                $this->load->view('/templates/sidebar');
                $this->load->view('/templates/navbar');
                $this->load->view('/templates/title');
                $this->load->view('/users/admin/users');
                $this->load->view('/templates/topRightSidebar');
                $this->load->view('/templates/settings');
                $this->load->view('/templates/footer');
                $this->load->view('/users/admin/templates/users-after-footer');

    }
}
 

