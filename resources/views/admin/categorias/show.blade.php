@extends('template.layouts.page')

@section('styles')
    <link href="{{asset('template/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('template/assets/css/components/cards/card.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="card component-card_4">
        <div class="card-body">
            <div class="user-profile">
                <img src="{{asset('template/assets/img/favicon1.ico')}}" style="width: 90px; height: 90px" class="" alt="...">
            </div>
            <div class="user-info">
                <h5 class="card-user_name">Categoria: {{$categoria->nombre}}</h5>
{{--                <p class="card-user_occupation">----------</p>--}}
                <div class="card-star_rating">
                    <span class="badge badge-primary">{{$categoria->id}}</span>
                </div>
                <p class="card-text"> <span class="font-weight-bold" style="font-size: larger">Ruta:</span>  {{$categoria->slug}}</p>
            </div>
        </div>
    </div>

    <a href="{{route('admin.categorias.index')}}" class="btn btn-dark mb-2 mr-2 rounded-circle"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left table-cancel">
            <line x1="19" y1="12" x2="5" y2="12"></line>
            <polyline points="12 19 5 12 12 5"></polyline>
        </svg></a>
@endsection

@section('scripts')

@endsection
