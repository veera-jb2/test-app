<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class InviteMail extends Mailable
{
    use Queueable, SerializesModels;
    public $project_name;
    public $user_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($project_name,$user_name)
    {
        $this->project_name = $project_name;
        $this->user_name = $user_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $project_name = $this->project_name;
        $user_name = $this->user_name;
        $loggin_user = Auth::user()->first_name.' '.Auth::user()->last_name;
        return $this->subject("Project Collaboration")->view('email.invite',compact('user_name','project_name','loggin_user'));
      
    }
}
