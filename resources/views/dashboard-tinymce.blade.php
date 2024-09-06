<x-app-layout>
<x-head.tinymce-config/>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight" style="color:white !important;">
          <br> Vítej uživateli {{ Auth::user()->name }}!
        </h2>
    </x-slot>

    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div role="alert" class="alert">
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
  
</div> <br> <br>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <x-forms.tinymce-editor/>
            <div class="flex flex-col items-center justify-center min-h-screen">
            
          
         
</div>

            </div>
        </div>
    </div>
</x-app-layout>