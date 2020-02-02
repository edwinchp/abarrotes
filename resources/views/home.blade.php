@extends('layouts.app')

@section('content')
@guest
Inicia sesion para continuar...
@else
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

                               

                        
                        
                        @include('layouts.search_box')
                        

        </div>
    </div>
</div>
						
                        @include('layouts.recent_products')

@endsection
@endguest