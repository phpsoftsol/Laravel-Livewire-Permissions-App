<?php

namespace App\Http\Livewire\Admin\Setting\General;

use Livewire\Component;
use App\Models\Setting;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class Edit extends Component
{
    
    use LivewireAlert;
    use WithFileUploads;
    
    public $app_title;
    public $app_tagline;
    public $app_description;

    public $app_logo;
    public $app_favicon;
    public $allSettings;


    public $dashboard_info;
    
    protected $rules = [
        'app_title' => 'required',
        'app_tagline' => '',
        'app_description' => '',
        'dashboard_info' => 'required',
    ];
    public function saveAppSettings(){
        $validatedData = $this->validate();
        // print_r($validatedData);
        foreach($validatedData as $key=>$value){
            Setting::updateOrCreate([
                'setting_name'=>$key
            ],[
                'setting_name'=>$key,
                'setting_value'=>$value,
            ]
        );

        }

        $this->alert('success', 'Settings data updated.' );
    }

    public function saveLogoSettings(){
       $validatedData= $this->validate([
            'app_logo' => 'nullable|sometimes|image|max:1024',
            'app_favicon' => 'nullable|sometimes|image|max:1024',
        ]);
 if ($this->app_logo){
        $data['app_logo'] = $this->app_logo->store('admin-settings');
    }
    if ($this->app_favicon){
        $data['app_favicon'] = $this->app_favicon->store('admin-settings');
    }
    
    foreach($data as $key=>$value){
        Setting::updateOrCreate([
            'setting_name'=>$key
        ],[
            'setting_name'=>$key,
            'setting_value'=>$value,
        ]
    );

    }
    $this->app_logo=null;
    $this->app_favicon=null;

    $this->alert('success', 'App Logos are updated.' );  
}
    public function render()
    {
        $settingData= Setting::whereIn('setting_name', ['app_title', 'app_tagline', 'app_description', 'app_logo','app_favicon','dashboard_info'])->select('setting_name', 'setting_value')->get()->toArray();

        foreach($settingData as $row){
    if(!in_array($row['setting_name'], ['app_logo','app_favicon']))
    $this->{$row['setting_name']} = $row['setting_value'];
    $this->allSettings[$row['setting_name']]=$row['setting_value'];
}
    
        return view('livewire.admin.setting.general.edit')
        ->layout('layouts.admin');;
    }

    public function removeImage($logoFor){
        if($logoFor=='favicon'){
            $this->app_favicon=null;
            Setting::updateOrCreate([
                'setting_name'=>'app_favicon'
            ],[
                'setting_name'=>'app_favicon',
                'setting_value'=>null,
            ]
            );

    $this->alert('success', 'App Favicon removed.' );  
        }
        if($logoFor=='logo'){
            $this->app_logo=null;
            Setting::updateOrCreate([
                'setting_name'=>'app_logo'
            ],[
                'setting_name'=>'app_logo',
                'setting_value'=>null,
            ]
            );

    $this->alert('success', 'App Logo removed.' );  
        }
    }
}
