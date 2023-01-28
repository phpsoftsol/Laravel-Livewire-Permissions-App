<div>
    <x-slot name="header">
        <h2 class="text-xl text-gray-800 leading-tight">
            {{__('General Settings')}}
        </h2>
    </x-slot>
    
    <x-slot name="breadcrumb">
        <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ __('bap.dashboard') }}</a></li>
        </ol>
    </x-slot>
    <div class="card">
    <form  id="general-settings" wire:submit.prevent="saveAppSettings">
            <div class="card-header">
                <h3 class="card-title">{{ __('General Settings')}}</h3>
            </div>
            <div class="card-body">
                    <div class="row">

        <div class="col-md-3 col-12">
            <h2 class="section-title">{{ __('Basic')}}</h2>
            <p class="info">All App settings that reflect globally</p>

    </div>
    <div class="col-md-9 col-12">

                        <div class="col-12">
                            <label class="" for="dashboard-heading">App Title</label>
                            <input class="form-control" id="app_title" wire:model="app_title" />
                            @error('app_title') <span class="error text-danger ">{{ $message }}</span> @enderror
 
</div>
                        <div class="col-12">
                            <label class="" for="dashboard-heading">App Tagline</label>
                            <input class="form-control" id="app_tagline" wire:model="app_tagline" />
                            @error('app_tagline') <span class="error text-danger ">{{ $message }}</span> @enderror
 
</div>
                        <div class="col-12">
                            <label class="" for="dashboard-heading">App Description</label>
                            <textarea class="form-control" id="app_description" wire:model="app_description"></textarea>
                            @error('app_description') <span class="error text-danger ">{{ $message }}</span> @enderror
 
</div>
                        <div class="col-12">
                            <label class="" for="dashboard-heading">Dashboard Info</label>
                            <textarea class="form-control" id="dashboard_info" wire:model="dashboard_info" ></textarea>
                            @error('dashboard_info') <span class="error text-danger ">{{ $message }}</span> @enderror
 
</div>
                
</div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success float-end" >Save Settings</button>
            </div>

            </form>
        </div>

</div>

    <div class="card">
    <form  id="app-logo-settings" wire:submit.prevent="saveLogoSettings">
            <div class="card-body">
                <div class="row">

                <div class="col-md-3 col-12">
                    <h2 class="section-title">{{ __('Logo/FavIcon')}}</h2>
                    <p class="info">App Branding</p>

                </div>
                <div class="col-md-9 col-12">

                        <div class="row">

          
 <div class="col-md-6">
 <label class="">App Logo</label>

    <input type="file" name="app_logo" wire:model="app_logo">
 
    @error('app_logo') <span class="error">{{ $message }}</span> @enderror
</div>
@if($app_logo)
<div class="col-md-6" id="logo-icon-preview"> Logo:

        <img width="200" src="{{ $app_logo->temporaryUrl() }}">
</div>
@endif

@if ($allSettings['app_logo'] &&  gettype($allSettings['app_logo'])=='string')
<div class="col-md-6" id="logo-icon-uploaded"> Logo :

        <img width="200" src="{{ asset($allSettings['app_logo'] ) }}">

        <button type="button" class="btn btn-danger" wire:click="removeImage('logo')">Remove</button>
</div>
@endif     

</div>
                        <div class="row">                    
 <div class="col-md-6">
 <div
    x-data="{ isUploading: false, progress: 0 }"
    x-on:livewire-upload-start="isUploading = true"
    x-on:livewire-upload-finish="isUploading = false"
    x-on:livewire-upload-error="isUploading = false"
    x-on:livewire-upload-progress="progress = $event.detail.progress"
>
                            <label class="" for="dashboard-heading">App FavIcon</label>  
    <input type="file" name="app_favicon" wire:model="app_favicon">
 
 <!-- Progress Bar -->
 <div x-show="isUploading">
        <progress max="100" x-bind:value="progress"></progress>
    </div>
</div>

    @error('app_favicon') <span class="error">{{ $message }}</span> @enderror
</div>
@if ($allSettings['app_favicon'] &&  gettype($allSettings['app_favicon'])=='string')
       <div class="col-md-6" id="fav-icon-uploaded"> FavIcon:
        <img width="200" src="{{ asset($allSettings['app_favicon'] ) }}">
        <button type="button" class="btn btn-danger" wire:click="removeImage('favicon')">Remove</button>
</div>
@endif
@if($app_favicon &&  gettype($app_favicon)!=='string')
<div class="col-md-6" id="fav-icon-preview"> FavIcon:

        <img width="200" src="{{ $app_favicon->temporaryUrl() }}">
</div>

    @endif
 
</div>
                      

            </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success float-end" >Save Images</button>
            </div>

            </form>
        </div>

<script>
    document.addEventListener("livewire-upload-start", function(event){
        var logoFor=event.target.name;
if(logoFor=='app_logo'){
    $('#logo-icon-uploaded').hide();
    $('#logo-icon-preview').show();
}
if(logoFor=='app_favicon'){
    $('#fav-icon-uploaded').hide();  
    $('#fav-icon-preview').show(); 
}
  
    });
    document.addEventListener("livewire-upload-finish", function(event){
        var logoFor=event.target.name;
        if(logoFor=='app_logo'){
    $('#logo-icon-uploaded').hide();
    $('#logo-icon-preview').show();
}
if(logoFor=='app_favicon'){
    $('#fav-icon-uploaded').hide();  
    $('#fav-icon-preview').show(); 
}
    });
</script>