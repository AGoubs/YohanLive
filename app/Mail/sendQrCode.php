<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendQrCode extends Mailable
{
  use Queueable, SerializesModels;

  public $email;
  public $subject;
  public $body;
  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct($email, $subject, $body)
  {
    $this->email = $email;
    $this->subject = $subject;
    $this->body = $body;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    // dd($this->body);
    return $this->from($this->email)->view('emails.qrcode')->with([
      'userId' => $this->body,
    ]);
  }
}
