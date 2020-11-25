<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Blog as Blogs;

class AddBlogs extends Component
{
    public Blogs $blog;

    protected $rules = [
        'blog.title'     => 'required',
        'blog.content'   => 'required|min:3',
        'blog.published' => 'nullable',
    ];

    public function mount()
    {
        return $this->blog = $this->makeBlankBlog();
    }

    public function makeBlankBlog()
    {
        return Blogs::make(['created_at' => now(), ['published' => 1]]);
    }

    public function submit()
    {
        $this->validate();
        $this->blog->save();

        $this->dispatchBrowserEvent('notify', 'Saved!');
    }

    public function render()
    {
        return view('livewire.admin.blogs.add-blogs')
            ->layout('layouts.admin');
    }
}
