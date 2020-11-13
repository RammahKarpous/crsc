<?php

namespace App\View\Components;

use App\Models\MemberType;
use App\Models\Status;
use Illuminate\View\Component;

class MemberForm extends Component
{
    public $route;
    public $method;
    public $model;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($route, $method = 'post', $model = null)
    {
        $this->route = $route;
        $this->method = $method;
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.member-form');
    }

    public function statuses()
    {
        return Status::all();
    }

    public function member_types()
    {
        return MemberType::all();
    }
}