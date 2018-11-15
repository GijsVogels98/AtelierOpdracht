<?php
class autoload extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('autoload_model');
    }

//    public function index() {
//        $this->load->view('templates/header');
//        $this->load->view('blog_view');
//        $this->load->view('templates/footer');
//
//    }

//    function get_autocomplete(){
//        if (isset($_GET['term'])) {
//            $result = $this->autoload_model->search_blog($_GET['term']);
//            if (count($result) > 0) {
//                foreach ($result as $row)
//                    $arr_result[] = $row->stamnr;
//                echo json_encode($arr_result);
//            }
//        }
//    }

}