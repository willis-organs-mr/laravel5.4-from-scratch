<?php 

namespace App\Repositories;

use App\Post;

class Posts
{
    public function allFiltered()
        {
            return Post::latest()
                ->filter(request(['month', 'year']))
                ->get();
        }    
}
