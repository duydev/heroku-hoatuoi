@extends('Shared.LayoutUser')

@section('content')

                
                    @include('HoaTuoi.Banner',[ 'banner' => $banner ])   
                    @include('HoaTuoi.Hoamoi',[ 'layhoamoi' => $layhoamoi] )                
                 
@endsection


