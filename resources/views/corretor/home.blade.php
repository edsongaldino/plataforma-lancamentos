@extends('corretor.layouts.app')
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


        <div class="col-sm-6 goal-icons">
            <div class="goal">
                <div class=" hi-icon-effect-6">
                    <a href="#" class="hi-icon glyphicon glyphicon-eye-open"></a>
                    <h4>Empreendimentos</h4>
                </div>
            </div>
        </div>

        <div class="col-sm-6 goal-icons">
            <div class="goal">
                <div class=" hi-icon-effect-6">
                    <a href="#" class="hi-icon glyphicon glyphicon-eye-open"></a>
                    <h4>Empreendimentos</h4>
                </div>
            </div>
        </div>

        <div class="col-sm-6 goal-icons">
            <div class="goal">
                <div class=" hi-icon-effect-6">
                    <a href="#" class="hi-icon glyphicon glyphicon-eye-open"></a>
                    <h4>Empreendimentos</h4>
                </div>
            </div>
        </div>

        <div class="col-sm-6 goal-icons">
            <div class="goal">
                <div class=" hi-icon-effect-6">
                    <a href="#" class="hi-icon glyphicon glyphicon-eye-open"></a>
                    <h4>Empreendimentos</h4>
                </div>
            </div>
        </div>


        <div class="clearfix"></div>
    </div>

</div>

@include('corretor.layouts.includes.menu-rodape')
@endsection
