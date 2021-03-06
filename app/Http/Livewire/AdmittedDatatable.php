<?php

namespace App\Http\Livewire;

use App\Models\Admittance;
use App\Models\Student;
use Livewire\Component;

class AdmittedDatatable extends Component
{

    private $headers;
    public $sortColumn = 'created_at';
    public $sortDirection = 'desc';
    public $searchTerm = '';

    public function headerConfig(){
        return [
            'student' => [
                'label' => 'Student Name',
                'func' => function($value){
                    return $value->full_name;
                }
            ],
            'student_ID' => 'Student ID',
            'time_in' => 'Entry Time',
            'time_out' => 'Exit Time',
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
    private function searchStudent(){
        $student =  Student::where('full_name', 'like', '%'.$this->searchTerm.'%')->first();
        $id = '';
        if($student != null){
            $id = $student->id;
        }else{
            $id = " ";
        }
        return $id;
    }

    private function resultData(){
        return Admittance::where(function ($query){
            $query->where('student_ID', '!=', '');
            if($this->searchTerm != ""){
                $query->where('full_name','like','%'.$this->searchStudent().'%');
                $query->where('student_ID','like','%'.$this->searchTerm.'%');
                $query->where('time_in','like','%'.$this->searchTerm.'%');
                $query->where('time_out','like','%'.$this->searchTerm.'%');
            }
        })
            ->orderBy($this->sortColumn, $this->sortDirection)
            ->with('student')
            ->paginate(20);
    }

    public function render()
    {
        return view('livewire.admitted-datatable',[
            'admitted' => $this->resultData(),
            'headers' => $this->headers,
        ]);
    }
}
