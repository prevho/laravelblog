<?php

namespace App\Http\Livewire\Newsletter;

namespace App\Http\Livewire\Newsletter;

use App\Actions\Newsletter\EmailsSubscribersAction;
use App\Mail\SubscriberMailable;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Spatie\Newsletter\NewsletterFacade as Newsletter;

class Form extends Component
{
    public string $name = "";
    public string $email = "";

    protected $rules = [
        'name' => ['required'],
        'email' => ['required', 'email', 'unique:subscribers']
    ];

    public function formSubmit() {
        // dd("WORKING");
        $this->validate();

        $token = bcrypt($this->email);
        
        $data = array(
            'name' => $this->name,
            'email' => $this->email,

        );

        (new EmailsSubscribersAction)([
            'name' => $this->name,
            'email' => $this->email,
            'token' => $token,
            
        ]);

        if(!Newsletter::isSubscribed($this->email)){
            Newsletter::subscribe($this->email, ['NAME' => $this->name, 'TOKEN' => $token]);
        }

        Mail::to($this->email)
        ->bcc('admin@laravelblg', 'Laravelblog')
        ->send(new SubscriberMailable($data));

        session()->flash('message', 'You Have Subscribed');

        $this->reset();

    }
    public function render()
    {
        return view('livewire.newsletter.form');
    }
}
