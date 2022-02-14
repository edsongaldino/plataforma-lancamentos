@extends('site/empreendimento/premium/layout_interno')

@push('meta')
<title>INICIO</title>
@endpush

@push('includes_head')

@endpush

@section('content')

<div class="conteudo">
    <div id="plantas">
        <div class="titulo-plantas"><i class="fa fa-object-ungroup" aria-hidden="true"></i> Plantas</div>

        @php
        $plantas_empreendimento = $empreendimento->plantasComFotos;
        @endphp
        @foreach($plantas_empreendimento as $planta_empreendimento)

            @php
                $metragem = $planta_empreendimento->area_privativa;
                $foto_planta = $planta_empreendimento->getFotoDestaque();
            @endphp

            <div class="plantas-empreendimento">
                <div class="titulo-planta"><i class="fa fa-object-group" aria-hidden="true"></i> {{ $planta_empreendimento->nome }}</div>
                <div class="foto-planta" data-idplanta="{{ $planta_empreendimento->id }}"><img src="{{ $foto_planta->getUrl('400x300') ?? '' }}" alt=""></div>
                <div class="btn-metragem"><i class="fas fa-ruler-combined" aria-hidden="true"></i> {{ $metragem }}m²</div>
                <div class="btn-detalhes" data-idplanta="{{ $planta_empreendimento->id }}">+ Detalhes</div>
                <a href="/empreendimento/planta/{{ $planta_empreendimento->id }}/unidades"><div class="btn-unidades-disponiveis"><i class="fa fa-check" aria-hidden="true"></i> Unidades desta planta</div></a>
            </div>

        @endforeach


        <div class="modal fade" id="plantaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" id="detalhe-planta-modal">
                
            </div>
            </div>
        </div>



    </div>
</div>

@endsection

@push('rodape')
<div class="rodape">
    <div class="btn-voltar" onclick='history.go(-1)'><i class="fa fa-reply-all" aria-hidden="true"></i></div>
    <a href="/empreendimento/{{ $empreendimento->id }}/unidades"><div class="btn-condicoes-pagamento"><i class="fa fa-check" aria-hidden="true"></i> Unidades Disponíveis</div></a>
</div>
@endpush