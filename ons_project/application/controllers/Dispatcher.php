<?php

/**
 * Created by PhpStorm.
 * User: DanielaCarmelina
 * Date: 10/05/2016
 * Time: 12:32
 */
class Dispatcher  extends CI_Controller
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
           // $data['aanmaakDatum']=$row->datum;
            $data['type']=$row->type;
            $data['prioriteit']=$row->prioriteit;
            $data['status']=$row->status;
//            $data[campusID]=$row->campusIDT;
        }
        $this->load->view('header');
        $this->load->view('Dispatcher/index', $data);
        $this->load->view('footer');

        echo count($data);
    }
    /*    $query = $this->db->query("SELECT * FROM campussen");
         foreach ($query->result() as $row) {
             $data[campusID] = $row->campusID;
             if (campusIDT == campusID) {
                 $data['naam'] = $row->naam;
             }
         }*/


    /**
     *
     */
    public function details()
    {
        $query = $this->db->query("SELECT * FROM tickets");

        foreach ($query->result() as $row)
        {
            $data['onderwerp']= $row->onderwerp;
            // $data['aanmaakDatum']=$row->datum;
            $data['type']=$row->type;
            $data['prioriteit']=$row->prioriteit;
            $data['status']=$row->status;
//            $data[campusID]=$row->campusIDT;


        }
//        $data['statussen']->get_enum_values(ticket_model, status);* /

        unset($arrayStatussen);
        $arrayStatussen = array ();
        $arrayStatussen = get_enum_values(ticket_model, status);

        $this->load->view('header');
        $this->load->view('Dispatcher/details', $data, $arrayStatussen);
        $this->load->view('footer');

    }
    //'Geparkeerd','Afgesloten','In behandeling','Geannuleerd'

    function get_enum_values( $table, $field )
    {
        $type = $this->db->query( "SHOW COLUMNS FROM {$table} WHERE Field = '{$field}'" )->row( 0 )->Type;
        preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches);
        $enum = explode("','", $matches[1]);
        return $enum;
    }

    public function proberen()
    {
        $data = $this->getAllTickets();
        $this->load->view('header');
        $this->load->view('Dispatcher/index', $data);
        $this->load->view('footer');
    }
    public function getAllTickets(){
        $query = $this->db->query("SELECT * FROM tickets");
        $data = array();
        foreach ($query->result() as $row)
        {
            $data['onderwerp']= $row->onderwerp;
          //  $data['aanmaakDatum']=$row->datum;
            $data['type']=$row->type;
            $data['prioriteit']=$row->prioriteit;
            $data['status']=$row->status;

        }

        return $data;
    }

}