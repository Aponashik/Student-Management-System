<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.include.head')
<body>
    <div id="app">
        @include('layouts.include.nav')

        <main class="py-4">
		        	<div class="container">
		    <div class="row justify-content-center">

		        @if(auth()->user())
		        @include('layouts.include.sidebar')
		        @endif
		       
		        <div class="col-md-10">
            		 @yield('content')
                </div>
		        
		    </div>
		</div>
           
        </main>
    </div>
</body>
</html>
