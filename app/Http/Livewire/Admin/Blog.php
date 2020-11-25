<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use \App\Models\Blog as Blogs;
use Livewire\WithPagination;

class Blog extends Component
{
    use WithPagination;

    public $title;
    public $content;
    public $published;

    public $sortAsc = true;

    public $sortField;

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }


    public function render()
    {
        return view('livewire.admin.blogs.blog', [
            'blogs' => Blogs::when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            })->paginate(10),
        ])->layout('layouts.admin');
    }
}
