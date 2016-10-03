<?php

class Users extends CI_Controller {

    private $_elapsed;
    private $_last_query;

    public function __construct() {
        parent::__construct();
        $this->load->model('database_model');
        $this->load->model('WX_user_model', 'user_model');
        $this->load->helper('url_helper');
        $this->load->helper('WX_validate_helper');
        $this->load->helper('html');
        $this->load->helper('WX_require_header_helper');
    }

    public function index() {
        $this->user_model->select_all();
        $data['news'] = $this->user_model->get_response();

        //var_dump($data['news']);
       // echo require_headers();die;

        $data['title'] = 'Users';

        $this->load->view('templates/header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('templates/footer');
    }
    


    public function save($generate_id = false, $properties=[]) {
        try {
            //$this->news_model->
            $properties = [
             // "id"=>"wNsw578fac9",  
              "title"=>"Jafar",
              "slug"=>"r",
              "text"=>"checking",
            ];
            $this->news_model->set_data($properties);
            $this->benchmark->mark('code_start');
            $data['news'] = $this->news_model->save();
            $this->benchmark->mark('code_end');
            $this->_elapsed = $this->benchmark->elapsed_time('code_start', 'code_end');
//
            var_dump($data['news']->get_response());
//            //die;
        } catch (Exception $ex) {
            //echo error_message($ex,$this->news_model->get_last_query());
            //show_error( $ex->getTraceAsString(),100,'Custome Error Message');
            //set_status_header();
            show_webox_error($ex, '', 'Webox Error Message', $this->news_model->get_last_query());
        }
    }

    public function remove($parameter, $field = "id") {
        $param = preg_split("/(,|_|-)/", $parameter);
        try {
            $this->benchmark->mark('code_start');
            $data['news'] = $this->news_model->remove($field, $param);
            $this->benchmark->mark('code_end');
            $this->_elapsed = $this->benchmark->elapsed_time('code_start', 'code_end');
            $this->_last_query = $this->news_model->get_last_query();
            var_dump($data['news']->get_response());
            //die;
        } catch (Exception $ex) {
            //show_error( $ex->getTraceAsString(),100,'Custome Error Message');
            show_webox_error($ex, '', 'Webox Error Message', $this->news_model->get_last_query());
        }
    }

    public function list_where($parameter, $field = "title", $operator = "like") {
        /* Like Example */
        //$this->news_model->select_where($field, $operator, $parameter );
        /* Comparison Example */
        //$parameter = '';
        try {
            $this->news_model->select_where($field, $operator, $parameter);
        } catch (Exception $ex) {
            //error_message($ex, $this->news_model->get_last_query());
            //show_error( $ex->getMessage(),100,'Webox Error Message');
            show_webox_error($ex, '', 'Webox Error Message', $this->news_model->get_last_query());
        }
        $this->_last_query = $this->news_model->get_last_query();

        //  var_dump(            $this->news_model->get_response());
        $data['news'] = $this->news_model->get_response();
        $data['title'] = 'News archive';

        $this->load->view('templates/header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('templates/footer');
    }

    public function list_in($parameter, $field = "id") {
        //gets parameters as string -> string(7) "5,5,7_8"
        //creates an array passed parameter using delimiters:[',' '_' '-'] ->
        //array(4) { [0]=> string(1) "5" [1]=> string(1) "5" [2]=> string(1) "7" [3]=> string(1) "8" }
        $parameter = preg_split("/(,|_|-)/", $parameter);
        $parameter[]='18';
        try {
            $this->news_model->select_in($field, $parameter);
            $data['news'] = $this->news_model->get_response();
        } catch (Exception $ex) {
            //echo error_message($ex,$this->news_model->get_last_query());
            //show_error( $ex->getTraceAsString(),100,'Custome Error Message');
            //set_status_header();
            show_webox_error($ex, '', 'Webox Error Message', $this->news_model->get_last_query());
        }
        $this->_last_query = $this->news_model->get_last_query();

        $data['title'] = 'News archive';

        $this->load->view('templates/header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('templates/footer');
    }

    public function list_between($min, $max, $field = 'id') {
        //echo "here" .' '. $min .' '. $max;
        //generates array from $parameter
        //$parameter = preg_split( "/(,|_)/", $parameter );
        //var_dump($parameter);
        $parameter = [$min, $max];
        try {
            $this->news_model->select_between($field, $parameter);
            $data['news'] = $this->news_model->get_response();
        } catch (Exception $ex) {
            //error_message($ex, $this->news_model->get_last_query());
            show_webox_error($ex, '', 'Webox Error Message', $this->news_model->get_last_query());

            //show_error( $ex->getTraceAsString(),100,'Custome Error Message');
        }
        $this->_last_query = $this->news_model->get_last_query();
        $data['title'] = 'News archive';

        $this->load->view('templates/header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('templates/footer');
    }

    public function view_by_id($id = NULL) {
        // echo 'viw';die;
        $this->news_model->select_by_id($id);
        $data['news_item'] = $this->news_model->get_response();
        $data['news_item']->date = strtotime('tomorrow');
        $segs = $this->uri->segment_array();
//var_dump($segs);
        $data['title'] = $data['news_item']->title;
        $this->load->view('templates/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer');
    }

}
