<?php

/**
 * PunSSH status module class
 *
 * @package munkireport
 **/
class Punssh_controller extends Module_controller
{

    /*** Protect methods with auth! ****/
    public function __construct()
    {
        // Store module path
        $this->module_path = dirname(__FILE__);
    }

    /**
     * Default method
     **/
    public function index()
    {
        echo "You've loaded the PunSSH module!";
    }

    /**
     * Retrieve data in json format
     **/
     public function get_data($serial_number = '')
     {
        $obj = new View();

        if (! $this->authorized()) {
            $obj->view('json', array('msg' => 'Not authorized'));
            return;
        }

        $obj = new Punssh_model;
        $result = array();
        foreach($obj->retrieve_records($serial_number) as $record) {
            $result[] = $record->rs;
        }

        $obj->view('json', array('msg' => $result));
     }

} // END class default_module
