<?php

namespace App\Http\Livewire\Admin\Dashboard;

use Livewire\Component;
use App\Models\User;

class Index extends Component
{
    public function render()
    {
        if(!auth()->user()->can('admin_dashboard_index')) {
            return abort(403);
        }
        $users= User::orderBy('id', 'desc')->get();

        return view('livewire.admin.dashboard.index')
        ->with('users',$users)
        ->layout('layouts.admin');
    }
}
