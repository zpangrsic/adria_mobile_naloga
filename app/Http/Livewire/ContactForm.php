<?php

namespace App\Http\Livewire;

use App\Models\Form;
use Livewire\Component;

class ContactForm extends Component
{
    public $first_name;
    public $last_name;
    public $email;
    public $question;

    protected $listeners = [
        'save' => 'save'
    ];

    public function render()
    {
        return view('livewire.contact-form');
    }

    public function save()
    {
        $validatedData = $this->validate(Form::$rules);

        if ($validatedData) {
            $form = new Form();
            $form->fill($validatedData);
            if ($form->save()) {
                session()->flash('success', 'Form submitted successfully');
                $this->reset();
                return true;
            }
            session()->flash('error', 'Failed to save Form information!');
        }
        else{
            session()->flash('error', 'Failed to validate one or more fields!');
        }
        return false;
    }
}
