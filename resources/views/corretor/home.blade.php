@extends('layouts.app')
@section('conteudo')
<div class="details-grid">
    <div class="details-shade">
        <div class="details-right">
            <img src="{{ asset('app-assets/images/logo.png') }}" alt=" " />
            <h3>Explica.Í</h3>
            <h4>Tudo que precisa saber</h4>
        </div>
    </div>
</div>

<div class="parker" id="service">
    <div class="services">

        @foreach ($tipos ?? '' as $tipo)
        <div class="col-sm-6 goal-icons">
            <div class="goal">
                <div class=" hi-icon-effect-6">
                    <a href="{{ url("/convencao/tipo/$tipo->id") }}" class="hi-icon glyphicon glyphicon-eye-open"></a>
                    <h4>{{ $tipo->nome }}</h4>
                </div>
            </div>
        </div>
        @endforeach
        
        <div class="clearfix"></div>
    </div>

</div>

@include('layouts.includes.menu-rodape')
@endsection
