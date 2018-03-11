<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends CI_Controller {
    //functions
    public function index(){
        $this->load->model("main_model");
        $data["fetch_data"] = $this->main_model->fetch_data();
        //$this->load->view("main_view");
        $this->load->view("main_view", $data);

        if($this->input->post("btn_for_borower_page")){
            redirect(base_url().'main/borrower_page');
        }

    }


    public function form_validation()
    {
        //echo 'OK';
        $this->load->library('form_validation');
        $this->form_validation->set_rules("book_name", "Book Name", 'required');
        $this->form_validation->set_rules("book_author", "Author Name", 'required');
        if($this->form_validation->run())
        {
            //true
            $this->load->model("main_model");
            $data = array(
                "book_name"     =>$this->input->post("book_name"),
                "book_author"   =>$this->input->post("book_author")
            );
            if($this->input->post("update"))
            {
                $this->main_model->update_data($data, $this->input->post("hidden_id"));
                redirect(base_url() . "main/updated");
            }
            if($this->input->post("insert"))
            {
                $this->main_model->insert_data($data);
                redirect(base_url() . "main/inserted");
            }
        }
        else
        {
            //false
            $this->index();
        }
    }
    public function inserted()
    {
        $this->index();
    }
    public function delete_data(){
        $id = $this->uri->segment(3);
        $this->load->model("main_model");
        $this->main_model->delete_data($id);
        redirect(base_url() . "main/deleted");
    }
    public function deleted()
    {
        $this->index();
    }
    public function update_data(){
        $user_id = $this->uri->segment(3);
        $this->load->model("main_model");
        $data["user_data"] = $this->main_model->fetch_single_data($user_id);
        $data["fetch_data"] = $this->main_model->fetch_data();
        $this->load->view("main_view", $data);
    }
    public function updated()
    {
        $this->index();
    }

    public function borrower_page(){
        // $this->load->view("borrower_page");

        $this->load->helper('url');

        if($this->input->post("btn_for_books_page")){
            redirect(base_url().'main/index');
        }

        $this->load->model("main_model");
        $data["fetch_data2"] = $this->main_model->fetch_data2();

        $data['borrower_name'] = $this->main_model->get_detail_in_dropdown();
        $data['book_name'] = $this->main_model->dropdown2();

        $this->load->view("borrower_page", $data);

    }

    public function form_validation2()
    {
        //echo 'OK';
        $this->load->library('form_validation');
        $this->form_validation->set_rules("borrower_name", "Borrower Name", 'required');
        $this->form_validation->set_rules("borrowed_book", "Borrowed Book", 'required');
        $this->form_validation->set_rules("borrowed_date", "Borrowed Date", 'required');
        $this->form_validation->set_rules("lending_date", "Lending Date", 'required');

        if($this->form_validation->run())
        {
            //true
            $this->load->model("main_model");
            $data = array(
                "borrower_name"   =>$this->input->post("borrower_name"),
                "borrowed_book"   =>$this->input->post("borrowed_book"),
                "borrowed_date"   =>$this->input->post("borrowed_date"),
                "lending_date"    =>$this->input->post("lending_date")

            );

            if($this->input->post("insert"))
            {
                $this->main_model->insert_borrowed($data);
                redirect(base_url() . "main/inserted2");
            }
        }
        else
        {
            //false
            $this->borrower_page();
        }
    }


    public function inserted2(){
        $this->borrower_page();
    }

    public function view_data(){
        $id = $this->uri->segment(3);
        $this->load->model("main_model");
        $this->main_model->view_data($id);
        redirect(base_url() . "main/deleted");
    }

    public function borrow_page()
    {
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $this->load->model("main_model");
        $books = $this->main_model->fetch_data2();

        $data = array();

        foreach($books->result() as $r) {

            $data[] = array(
                $r->borrower_name,
                $r->borrowed_book,
                $r->borrowed_date,
               // $r->rating . "/10 Stars",
                $r->lending_date
            );
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $books->num_rows(),
            "recordsFiltered" => $books->num_rows(),
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }
}