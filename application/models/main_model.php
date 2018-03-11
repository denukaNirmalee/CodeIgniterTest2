<?php
class Main_model extends CI_Model
{
    function test_main()
    {
        echo "This is model function";
    }
    function insert_data($data)
    {
        $this->db->insert("books", $data);
    }
    function fetch_data()
    {
        $this->db->select("*");
        $this->db->from("books");
        $query = $this->db->get();
        return $query;
    }
    function delete_data($id){
        $this->db->where("book_id", $id);
        $this->db->delete("books");
        //DELETE FROM tbl_user WHERE id = $id
    }
    function fetch_single_data($id)
    {
        $this->db->where("book_id", $id);
        $query = $this->db->get("books");
        return $query;
        //Select * FROM tbl_user where id = '$id'
    }
    function update_data($data, $id)
    {
        $this->db->where("book_id", $id);
        $this->db->update("books", $data);
        //UPDATE tbl_user SET first_name = '$first_name', last_name = '$last_name' WHERE id = '$id'
    }


    //for borrowing details

    function insert_borrowed($data)
    {
        $this->db->insert("borrowing_detail", $data);
    }

    function update_data2($data, $id)
    {
        $this->db->where("borrowing_id", $id);
        $this->db->update("borrowing_detail", $data);
        //UPDATE tbl_user SET first_name = '$first_name', last_name = '$last_name' WHERE id = '$id'
    }

    function view_data($id){
        $this->db->where("borrowing_id", $id);
        $this->db->delete("borrowing_detail");
        //DELETE FROM tbl_user WHERE id = $id
    }

    function fetch_data2()
    {
        $this->db->select("*");
        $this->db->from("borrowing_detail");
        $query = $this->db->get();
        return $query;
    }

    //first drop down
    function get_detail_in_dropdown() {
        $query = $this->db->query('SELECT borrower_name FROM borrowers');
        return $query->result();
    }

    //second drop down
    function dropdown2() {
        $query1 = $this->db->query('SELECT book_name FROM books');
        return $query1->result();
    }



}
