<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class correo extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->library('email');
    }

    public function send_notification($subject, $message, $recipient) {
        $this->email->from('noreply@example.com', 'Grocery CRUD Notifications');
        $this->email->to($recipient);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
