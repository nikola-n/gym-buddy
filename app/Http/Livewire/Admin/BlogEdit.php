<?php

namespace App\Http\Livewire\Admin;

use App\Models\Blog;
use Livewire\Component;

class BlogEdit extends Component
{
    public Blog $blog;

    public $title;

    public $content;

    public $published;

    protected $rules = [
        'title'     => 'required',
        'content'   => 'required',
        'published' => 'required',
    ];

    public function mount(Blog $blog)
    {
        $this->blog      = $blog;
        $this->title     = $blog->title;
        $this->content   = $blog->content;
        $this->published = $blog->published;
    }

    public function update()
    {
        $this->validate();

        $this->blog->update([
            'title'     => $this->title,
            'content'   => $this->content,
            'published' => $this->published,
        ]);
    }

    public function render()
    {
        return view('livewire.admin.blogs.blog-edit');
    }
}
