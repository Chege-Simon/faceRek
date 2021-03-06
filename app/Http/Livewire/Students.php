<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;

class Students extends Component
{

    private $headers;
    public $sortColumn = 'created_at';
    public $sortDirection = 'desc';
    public $searchTerm = '';
    public $isOpen;

    public $full_name;
    public $student_ID;
    public $student_picture;
    public $student;


    protected $rules = [
        'full_name' => 'required|min:10',
    ];

    public function openModal($id){
        $this->isOpen = true;
        $this->student = Student::find($id);
        $this->student_ID = $this->student->student_ID;
        $this->full_name = $this->student->full_name;
        $this->student_picture = $this->student->picture;
    }

    public function closeModal(){
        $this->isOpen = false;
    }

    public function editStudent(){
        $this->validate();

        $this->student->student_ID = $this->student_ID;
        $this->student->full_name = $this->full_name;
        $this->student->picture = $this->student_picture;

        $this->student->save();
        $this->closeModal();
        session()->flash('message', 'New Student Details Edited Successfully.');
    }

    private function headerConfig(){
        return [
            'full_name' => 'Student Full Name',
            'student_ID' => 'Student ID',
        ];
    }
    public function mount(){
        $this->headers = $this->headerConfig();
    }

    public function hydrate(){
        $this->headers = $this->headerConfig();
    }

    public function sort($column){
        $this->sortColumn = $column;
        $this->sortDirection = $this->sortDirection == 'asc' ? 'desc':'asc';
    }

    private function resultData(){
        return Student::where(function ($query){
            $query->where('full_name', '!=', '');
            if($this->searchTerm != ""){
                $query->where('full_name','like','%'.$this->searchTerm.'%');
                $query->where('student_ID','like','%'.$this->searchTerm.'%');
            }
        })
            ->orderBy($this->sortColumn, $this->sortDirection)
            ->paginate(20);
    }
    public function render()
    {
        return view('livewire.students',[
            'students' => $this->resultData(),
            'headers' => $this->headers,
        ])
            ->layout('layouts.app',['header'=> 'All Registered Students']);
    }
}
