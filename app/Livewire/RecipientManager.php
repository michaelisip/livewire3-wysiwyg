<?php

namespace App\Livewire;

use App\Models\Recipient;
use Livewire\Component;

class RecipientManager extends Component
{
    public $recipients, $name, $email, $recipient_id;

    public $updateMode = false;

    public function render()
    {
        $this->recipients = Recipient::all();

        return view('livewire.recipient-manager');
    }

    public function create()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        Recipient::create([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        session()->flash('message', 'Recipient successfully added.');

        $this->resetInput();
    }

    public function edit($id)
    {
        $recipient = Recipient::findOrFail($id);

        $this->recipient_id = $id;
        $this->name = $recipient->name;
        $this->email = $recipient->email;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if ($this->recipient_id) {
            $recipient = Recipient::find($this->recipient_id);

            $recipient->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);

            session()->flash('message', 'Recipient successfully updated.');
        }

        $this->resetInput();
    }

    public function delete($id)
    {
        Recipient::find($id)->delete();

        session()->flash('message', 'Recipient successfully deleted.');
    }

    public function resetInput()
    {
        $this->name = '';
        $this->email = '';
        $this->updateMode = false;
        $this->recipient_id = null;
    }
}
