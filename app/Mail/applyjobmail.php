<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class applyjobmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $applicant_details;
    public function __construct($applicant_details)
    {
        //
        $this->applicant_details= $applicant_details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()

    {
        $file = $this->applicant_details->file('applicant_resume');
        $filename= $file->getClientOriginalName();
         $fullpath = "public/applicant_resume/".$filename;
        return $this->view('mail.seeapplicantdetail')->attach($fullpath);

        // return $this->view('mail.seeapplicantdetail');
    }
}
