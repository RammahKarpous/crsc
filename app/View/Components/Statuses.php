<?php

namespace App\View\Components;

use App\Models\Status;
use Illuminate\View\Component;

class Statuses extends Component
{
    public $model;
    public $method;
    public $memberStatus;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($model = '', $method = '', $memberStatus = '')
    {
        $this->method = $model;
        $this->method = $method;
        $this->method = $memberStatus;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.statuses');
    }

    public function statuses()
    {
        return Status::all();
    }
}