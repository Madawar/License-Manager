<?php

namespace App\Mail;

use App\Models\License;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LicenseExpired extends Mailable
{
    use Queueable, SerializesModels;
    public $license;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(License $license)
    {
        $this->license = $license;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.expired');
    }
}
