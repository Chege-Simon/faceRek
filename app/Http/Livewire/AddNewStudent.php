<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;

class AddNewStudent extends Component
{
    public $full_name;
    public $student_ID;
    public $student_picture;

    protected $rules = [
        'full_name' => 'required|min:10',
    ];

    public function addNewStudent(){
        $this->validate();

        Student::create([
            'full_name' => $this->full_name,
            'picture' => $this->student_picture,
            'student_ID' => $this->student_ID,
        ]);

        session()->flash('message', 'New Student Added Successfully.');
        $this->redirect('/dashboard');
    }

    public function mount(){

    }

    public function render()
    {
        return view('livewire.add-new-student')
            ->layout('layouts.app',['header' => 'Add New Student']);
    }
}
