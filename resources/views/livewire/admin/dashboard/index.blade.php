<div>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <x-slot name="breadcrumb">
        <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.dashboard.index') }}">{{ __('bap.dashboard') }}</a></li>
        </ol>
    </x-slot>

<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div>
        <x-jet-application-logo class="block h-12 w-auto"  />
    </div>

    <div class="mt-8 text-2xl">
        {{$globalSettings['app_tagline']}}
    </div>

    <div class="mt-6 text-gray-500">
   
    {{$globalSettings['dashboard_info']}}
 </div>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    <div class="p-6">
        <div class="flex items-center">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">New Users</div>
        </div>

        <div class="ml-12">
        <div class="mt-2 text-sm text-gray-500">
      
        <table class="table datatable" >
  <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
        </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
      <th scope="row">{{$user->id}}</th>
      <td>{{ $user->name}}</td>
      <td>{{ $user->email}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
  </div>
            <a href="{{ route('admin.user.index')}}">All Users</a>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
        <div class="flex items-center">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"> Recent Articles </div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
            

     
     <livewire:datatable model="App\Models\Article" 
     with="category, category.title"
     name="all-articles"  
     include="id, title, category.title|Category" 
     sortingStatus="false"
     hide-pagination="true"/>
       
</div>
            <a href="{{route('admin.content.article.index')}}">All Articles</a>
        </div>
    </div>

</div>

</div>



<script>
        document.addEventListener('livewire:load', function () {
            
    $(function(){
        

// DataTable
$('.datatable').DataTable({
    searching: false,
    paging: false,
    info: false
});

    });
        });
    </script>