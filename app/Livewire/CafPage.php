<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Entity;
use App\Models\Request;

class CafPage extends Component
{
    public $entity;

    public $step;

    public $typeOfUse;
    public $country;
    public $name;
    public $company;
    public $email;
    public $phoneNumber;
    public $projectTitle;
    public $projectDescription;
    public $projectDuration;
    public $agree;

    public $stepActions = [
        'submit1',
        'submit2',
        'submit3',
        'submit4'
    ];

    public $nicenames = [

    ];

    public function submit() {
        if($this->step == 0) {
            $this->step++;
        } else {
            $action = $this->stepActions[$this->step];
            $this->$action();
        }
    }

    public function submit2() {
        $this->validate([
            'typeOfUse' => 'required',
        ], ['typeOfUse' => 'Must select which type of use for your request']);
        $this->step++;
    }

    public function submit3() {
        $this->validate([
            'country' => 'required',
            'name' => 'required',
            'company' => 'required',
            'email' => 'email|required',
            'phoneNumber' => 'numeric|required',
            'projectTitle' => 'required',
            'projectDescription' => 'required',
            'projectDuration' =>'required'
        ]);
        $this->step++;
    }

    public function submit4() {
        $this->validate([
            'agree' => 'required'
        ], ['agree' => 'Please agree before proceeding']);
        $newRequest = Request::create([
            'type_of_use' => $this->typeOfUse,
            'name' => $this->name,
            'email' => $this->email,
            'country' => $this->country,
            'company' => $this->company,
            'number' => $this->phoneNumber,
            'project_title' => $this->projectTitle,
            'project_description' => $this->projectDescription,
            'project_duration' => $this->projectDuration,
            'entity_id' => $this->entity->id,
            'status' => 'New'

        ]);
        $newRequest->save();

        $this->step++;

    }

    public function mount(Entity $entity) {
        $this->step = 0;
    }

    public function goBack() {
        $this->step--;
    }

    public function render()
    {
        return view('livewire.caf-page')->layout('layouts.app');
    }
}
