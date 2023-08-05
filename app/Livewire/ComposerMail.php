<?php

namespace App\Livewire;

use App\Mail\RecipientMail;
use App\Models\Recipient;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ComposerMail extends Component
{
    public $subject, $body;

    public function render()
    {
        return view('livewire.composer-mail');
    }

    public function send()
    {
        $this->validate([
            'subject' => 'required',
            'body' => 'required',
        ]);

        $recipients = Recipient::all();
        $method = App::environment('local') ? 'send' : 'queue';

        Mail::to($recipients)->{$method}(new RecipientMail($this->subject, $this->body));

        session()->flash('message', 'Mail successfully sent.');
    }
}
