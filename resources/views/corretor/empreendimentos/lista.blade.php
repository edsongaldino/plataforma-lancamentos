@extends('corretor.layouts.app')
@section('conteudo')
<div class="conteudo empreendimentos">
    <h3 class="perfil"><i class="fa fa-info"></i> Empreendimentos</h3>

    <div class="busca">
        <div class="icone-filtro"><span class="glyphicon glyphicon-search" aria-hidden="true"></div>
        <div class="busca-cidade">
            <select class="form-control" name="" id="">
                <option value="">Cidade</option>
            </select>
        </div>
        <div class="busca-tipo">
            <select class="form-control" name="" id="">
                <option value="">Tipo</option>
            </select>
        </div>
    </div>

    @foreach ($empreendimentos as $empreendimento)
    <a href="/corretor/empreendimento/{{ $empreendimento->id }}">
        <div class="lista-empreendimentos">
            <div class="titulo"><span class="fa fa-building"></span> {{ $empreendimento->nome }}</div>
            <div class="foto"><img src="{{ $empreendimento->fotoPrincipal() }}" class="img-responsive" alt=""></div>
            <div class="info">
                <div class="quartos"><span class="fa fa-bed"></span><br/> 3</div> 
                <div class="garagem"><span class="fa fa-car"></span><br/> 3</div> 
                <div class="metragem"><span class="fa fa-object-group"></span><br/> 48,32m²</div>

                <div class="titulo-comissao">Comissão de Vendas</div>
                <div class="comissao-corretor">Corretor <span class="valor">4%</span></div>
                <div class="comissao-imobiliaria">Imobiliária <span class="valor">5%</span></div>

            </div>
            <div class="endereco"><span class="fa fa-map-marker"></span> {{ $empreendimento->endereco->bairro->nome }}, {{ $empreendimento->endereco->cidade->nome }} - {{ $empreendimento->endereco->estado->uf }}</div>
        </div>
    </a>   
    @endforeach
    


</div>



@include('corretor.layouts.includes.menu-rodape')

@endsection
