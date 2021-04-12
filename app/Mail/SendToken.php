<?php

namespace App\Mail;

use App\Models\Users;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendToken extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;

    /**
     * Create a new message instance.
     *
     * @param \App\Models\Users $user
     */
    public function __construct(Users $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('【SUPER JUNIOR 限定動画】セキュリティコードのご案内')
                    ->view('emails.send-token')
                    ->with([
                        'code' => $this->user->token_key,
                    ]);
    }
}
