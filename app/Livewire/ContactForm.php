<?php

namespace App\Livewire;

use Livewire\Component;

class ContactForm extends Component
{
    public $firstname;
    public $lastname;
    public $email;
    public $content;
    public $sendCopy;

    protected $rules = [
        'firstname' => 'required|min:3',
        'lastname' => 'required|min:3',
        'email' => 'required|email',
        'content' => 'required|min:10',
        'sendCopy' => 'boolean',
    ];

    public function render()
    {
        return view('livewire.contact-form');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function send()
    {
        $validatedDate = $this->validate();

        Mail::to($validatedDate['email'])->send(new ContactUs($validatedDate));
        Session::flash('success', 'Votre message a bien été envoyé !');
    }
}
