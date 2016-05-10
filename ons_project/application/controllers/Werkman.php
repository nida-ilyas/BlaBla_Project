<?php
/**
 * Created by PhpStorm.
 * User: nida ilyas
 * Date: 5/05/2016
 * Time: 22:56
 */
class Werkman extends CI_Controller
{
    function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->model('ticket_model');

    }

    public function index()
    {
        $query = $this->db->query("SELECT * FROM tickets");
        foreach ($query->result() as $row)
        {
            $data['onderwerp']= $row->onderwerp;
            $data['aanmaakDatum']=$row->datum;
            $data['type']=$row->type;


        }
        $this->load->view('header');
        $this->load->view('Werkman/index', $data);
        $this->load->view('footer');

        echo count($data);
    }

    public function proberen()
    {
        $data = $this->getAllTickets();
        $this->load->view('header');
        $this->load->view('Werkman/index', $data);
        $this->load->view('footer');
    }
    public function getAllTickets(){
        $query = $this->db->query("SELECT * FROM tickets");
        $data = array();
        foreach ($query->result() as $row)
        {
            $data['onderwerp']= $row->onderwerp;
            $data['aanmaakDatum']=$row->datum;
            $data['type']=$row->type;
        }

        return $data;
    }

}
    ?>
