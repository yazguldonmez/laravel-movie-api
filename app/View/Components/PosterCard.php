<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class PosterCard extends Component
{
    public $title;
    public $posterUrl;
    public $type;
    public $link;
    /**
     * Create a new component instance.
     */
    public function __construct($title, $posterUrl, $type, $link)
    {
        $this->title = $title;
        $this->posterUrl = $posterUrl;
        $this->type = $type;
        $this->link = $link;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.poster-card');
    }
}
