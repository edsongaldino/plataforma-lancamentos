@extends('site/empreendimento/premium/layout_interno')

@push('meta')
<title>UNIDADES</title>
@endpush

@section('content')

<div class="conteudo">

    <div class="unidades">

        <div class="topo-unidades">
            <div class="titulo">Unidades Disponíveis</div>
            <div class="qtd-unidades">{{ $unidades->count() }}</div>
        </div>

        @foreach ($unidades as $unidade)
        <a href="/proposta/unidade/{{ $unidade->id }}">
            @if($empreendimento->subtipo_id == 1)

            <div class="linha-unidade">
                <div class="linha">
                    <div class="unidade">{{ $unidade->nome ?? ''}}</div>
                    <div class="metragem">{{ $unidade->planta->area_privativa ?? '' }}m²</div>
                    <div class="metragem">-</div>
                    <div class="garagem"><i class="fa fa-car" aria-hidden="true"></i></div>
                    @if($unidade->caracteristicas->where('nome', 'valor_unidade')->first() && $unidade->caracteristicas->where('nome', 'valor_unidade')->first()->pivot->valor <> '')
                        <div class="valor">{{ converte_valor_real_semdecimal($unidade->caracteristicas->where('nome', 'valor_unidade')->first()->pivot->valor) }}</div>
                    @else
                        @if($unidade->caracteristicas->where('nome', 'valor_m2')->first() && $unidade->caracteristicas->where('nome', 'metragem_total')->first())
                            @php
                                $valor_m2 = $unidade->caracteristicas->where('nome', 'valor_m2')->first()->pivot->valor;
                                $metragem = $unidade->caracteristicas->where('nome', 'metragem_total')->first()->pivot->valor;
                            @endphp
                            <div class="valor">{{ converte_valor_real_semdecimal($valor_m2 * $metragem) }}</div>
                        @else
                            <div class="valor">Consulte</div>
                        @endif
                    @endif
                </div>
                <div class="linha">
                    <div class="andar">{{ $unidade->andar->numero ?? ''}}º andar</div>
                    <div class="area">Área Útil</div>
                    <div class="area">Quartos</div>
                    <div class="vaga">
                        @if($unidade->caracteristicas->where('nome', 'vagas_garagem')->first() <> '')
                            {{ $unidade->caracteristicas->where('nome', 'vagas_garagem')->first()->pivot->valor ?? '' }}
                        @else
                            @if($unidade->planta->caracteristicas->where('nome', 'vagas_garagem')->first() <> '')
                                {{ $unidade->planta->caracteristicas->where('nome', 'vagas_garagem')->first()->pivot->valor ?? '' }}
                            @else
                                -
                            @endif
                        @endif
                    </div>
                    <div class="preco">Valor: R$</div>
                </div>
            </div>

            @elseif($empreendimento->subtipo_id == 2)
            <div class="linha-unidade">
                <div class="linha">
                    <div class="unidade">{{ $unidade->nome ?? ''}}</div>
                    <div class="metragem">{{ $unidade->planta->area_privativa ?? '' }}m²</div>
                    <div class="metragem">@if (isset($unidade->planta) && $unidade->planta->caracteristicas->where('nome', 'laje_tecnica')->first()) {{  $unidade->planta->caracteristicas->where('nome', 'laje_tecnica')->first()->pivot->valor.'m²' }} @endif</div>
                    <div class="garagem"><i class="fa fa-car" aria-hidden="true"></i></div>
                    @if($unidade->caracteristicas->where('nome', 'valor_unidade')->first() && $unidade->caracteristicas->where('nome', 'valor_unidade')->first()->pivot->valor <> '')
                        <div class="valor">{{ converte_valor_real_semdecimal($unidade->caracteristicas->where('nome', 'valor_unidade')->first()->pivot->valor) }}</div>
                    @else
                        @if($unidade->caracteristicas->where('nome', 'valor_m2')->first() && $unidade->caracteristicas->where('nome', 'metragem_total')->first())
                            @php
                                $valor_m2 = $unidade->caracteristicas->where('nome', 'valor_m2')->first()->pivot->valor;
                                $metragem = $unidade->caracteristicas->where('nome', 'metragem_total')->first()->pivot->valor;
                            @endphp
                            <div class="valor">{{ converte_valor_real_semdecimal($valor_m2 * $metragem) }}</div>
                        @else
                            <div class="valor">Consulte</div>
                        @endif
                    @endif
                </div>
                <div class="linha">
                    <div class="andar">{{ $unidade->andar->numero ?? ''}}º andar</div>
                    <div class="area">Área Útil</div>
                    <div class="area">Laje Técnica</div>
                    <div class="vaga">
                        @if($unidade->caracteristicas->where('nome', 'vagas_garagem')->first())
                            {{ $unidade->caracteristicas->where('nome', 'vagas_garagem')->first()->pivot->valor }}
                        @else
                            @if($unidade->planta->caracteristicas->where('nome', 'vagas_garagem')->first())
                                {{ $unidade->planta->caracteristicas->where('nome', 'vagas_garagem')->first()->pivot->valor }}
                            @else
                                -
                            @endif
                        @endif
                    </div>
                    <div class="preco">Valor: R$</div>
                </div>
            </div>
            @elseif($empreendimento->subtipo_id == 3 || $empreendimento->subtipo_id == 4)

                @if($empreendimento->variacao->nome == "Lote")
                <div class="linha-unidade lote">
                    <div class="linha">
                        <div class="unidade">{{ $unidade->nome ?? ''}}</div>
                        <div class="metragem lote">{{ converte_valor_real($unidade->caracteristicas->where('nome', 'metragem_total')->first()->pivot->valor ?? '') }}m²</div>
                        <div class="valor_m2">{{ converte_valor_real($unidade->caracteristicas->where('nome', 'valor_m2')->first()->pivot->valor ?? '') }}</div>
                        @if($unidade->caracteristicas->where('nome', 'valor_unidade')->first() && $unidade->caracteristicas->where('nome', 'valor_unidade')->first()->pivot->valor <> '' && $unidade->caracteristicas->where('nome', 'valor_unidade')->first()->pivot->valor <> '0')
                        <div class="valor2">{{ converte_valor_real_semdecimal($unidade->caracteristicas->where('nome', 'valor_unidade')->first()->pivot->valor) }}</div>
                        @else
                            @if($unidade->caracteristicas->where('nome', 'valor_m2')->first() && $unidade->caracteristicas->where('nome', 'metragem_total')->first())
                                @php
                                    $valor_m2 = $unidade->caracteristicas->where('nome', 'valor_m2')->first()->pivot->valor;
                                    $metragem = $unidade->caracteristicas->where('nome', 'metragem_total')->first()->pivot->valor;

                                    if(isset($valor_m2) && isset($netragem)){
                                        $valor = $valor_m2 * $metragem;
                                    }else{
                                        $valor = '0.00';
                                    }

                                @endphp
                                <div class="valor2">{{ converte_valor_real_semdecimal($valor) }}</div>
                            @else
                                <div class="valor2">Consulte</div>
                            @endif
                        @endif
                    </div>
                    <div class="linha">
                        <div class="andar">{{ $unidade->quadra->nome ?? ''}}</div>
                        <div class="area lote">Metragem</div>
                        <div class="m2_valor">Valor M²</div>
                        <div class="preco2">Valor: R$</div>
                    </div>
                </div>
                @else
                <div class="linha-unidade">
                    <div class="linha">
                        <div class="unidade">{{ $unidade->nome ?? ''}}</div>
                        <div class="metragem lote">{{ $unidade->planta->area_privativa ?? '' }}m²</div>
                        <div class="garagem"><i class="fa fa-car" aria-hidden="true"></i></div>
                        @if($unidade->caracteristicas->where('nome', 'valor_unidade')->first() && $unidade->caracteristicas->where('nome', 'valor_unidade')->first()->pivot->valor <> '' && $unidade->caracteristicas->where('nome', 'valor_unidade')->first()->pivot->valor <> '0')
                        <div class="valor casa">{{ converte_valor_real_semdecimal($unidade->caracteristicas->where('nome', 'valor_unidade')->first()->pivot->valor) }}</div>
                        @else
                            @if($unidade->caracteristicas->where('nome', 'valor_m2')->first() && $unidade->caracteristicas->where('nome', 'metragem_total')->first())
                                @php
                                    $valor_m2 = $unidade->caracteristicas->where('nome', 'valor_m2')->first()->pivot->valor;
                                    $metragem = $unidade->caracteristicas->where('nome', 'metragem_total')->first()->pivot->valor;

                                    if(isset($valor_m2) && isset($netragem)){
                                        $valor = $valor_m2 * $metragem;
                                    }else{
                                        $valor = '0.00';
                                    }
                                @endphp
                                <div class="valor casa">{{ converte_valor_real_semdecimal($valor) }}</div>
                            @else
                                <div class="valor casa">Consulte</div>
                            @endif
                        @endif
                    </div>
                    <div class="linha">
                        <div class="andar">{{ $unidade->quadra->nome ?? ''}}</div>
                        <div class="area lote">Metragem</div>
                        <div class="vaga">1 vaga</div>
                        <div class="preco casa">Valor: R$</div>
                    </div>
                </div>
                @endif
                
            @endif
        </a>
        @endforeach
    </div>
    
    
</div>

@endsection

@push('rodape')
<div class="rodape">
    <div class="btn-voltar" onclick='history.go(-1)'><i class="fa fa-reply-all" aria-hidden="true"></i></div>
    <a href="/empreendimento/{{ $empreendimento->id }}/premium"><div class="btn-condicoes-pagamento"><i class="fa fa-building" aria-hidden="true"></i> Empreendimento</div></a>
</div>
@endpush