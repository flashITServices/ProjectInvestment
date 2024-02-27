<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
class EmailModel extends CI_Email{
    public function __construct()
    {
        parent::__construct();
    }

    public function sendmail($mailSender,$nameSender,$mailRecever,$ccMail,$bccMail,$subject,$message){
        $this->email->from($mailSender, $nameSender);
        $this->email->to($mailRecever);
        $this->email->cc($ccMail);
        $this->email->bcc($bccMail);

        $this->email->subject($subject);
        $this->email->message($message);

        return $this->email->send();
    }

}

?>