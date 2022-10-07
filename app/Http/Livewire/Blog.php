<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Blog as BlogModel;

class Blog extends Component
{    
    public $open = false;
    public $blogs;
    public $blog;
    public $searchTerm;

    protected $listeners = [
        'search' => 'searchBlogs',
        'toggle' => 'toggle',
        'deleteBlog' => 'deleteBlog'
    ];

    public function mount(BlogModel $blog)
    {
        $this->blogs = BlogModel::all();       
    }   

    public function toggle() 
    {
        $this->open = !$this->open;
    }

    public function showBlog(BlogModel $blog)
    {
        $this->blog = $blog;
    }

    
    public function searchBlogs($term)
    {
        $this->blogs = BlogModel::where('title','like','%'.$term.'%')->get();
        $this->open = true;
    }

    public function deleteBlog(BlogModel $blog)
    {
        $blog->delete();
    }
    // public function render()
    // {      
    //     return view('livewire.blog',[
    //         'blogs' => $this->blogs
    //     ]);
    // }
}
