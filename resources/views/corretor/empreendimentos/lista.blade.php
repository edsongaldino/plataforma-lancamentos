@extends('corretor.layouts.app')
@section('conteudo')
<div class="conteudo empreendimentos">
    <h3 class="perfil"><i class="fa fa-info"></i> Empreendimentos</h3>

    <div class="busca" style="display: none;">
        <div class="icone-filtro"><span class="glyphicon glyphicon-search" aria-hidden="true"></div>
        <div class="busca-cidade">
            <select class="form-control" name="cidade" id="BuscaCidade">
                <option value="" selected>Cidade</option>
                @foreach (get_cidades() as $cidade)
                <option value="{{ $cidade->id }}">{{ $cidade->nome }} ({{ $cidade->estado->uf }})</option>
                @endforeach
            </select>
        </div>
        <div class="busca-tipo">
            <select class="form-control" name="tipo" id="BuscaTipo">
                <option value="">Tipo:</option>
                @foreach (get_subtipos() as $subtipo)
                <option value="{{ $subtipo->id }}">{{ $subtipo->nome }}</option>
                @endforeach
            </select>
        </div>
    </div>

    @foreach ($empreendimentos as $empreendimento)

        @php
            $icone_tipo = '';
            switch($empreendimento->subtipo_id):
            case 1:
                $icone_tipo = '<i class="fa fa-building"></i>';
            break;
            case 2:
                $icone_tipo = '<i class="fa fa-briefcase"></i>';
            break;
            case 3:
                $icone_tipo = '<i class="fa fa-home"></i>';
            break;
            case 4:
                $icone_tipo = '<i class="fa fa-tree"></i>';
            break;
            endswitch;
        @endphp


        <div class="lista-empreendimentos">
            <a href="/corretor/empreendimento/{{ $empreendimento->id }}">
            <div class="titulo">
                <?php echo $icone_tipo;?>
                {{ $empreendimento->nome }}
            </div>
            <div class="foto"><img src="{{ $empreendimento->fotoPrincipal() }}" class="img-responsive" alt=""></div>
            <div class="info">
                <div class="quartos"><span class="fa fa-bed"></span><br/> 3</div>
                <div class="garagem"><span class="fa fa-car"></span><br/> 3</div>
                <div class="metragem"><span class="fa fa-object-group"></span><br/> 48,32m²</div>

                <div class="titulo-comissao">Comissão de Vendas</div>
                <div class="comissao-corretor">Corretor <span class="valor">4%</span></div>
                <div class="comissao-imobiliaria">Imobiliária <span class="valor">5%</span></div>

            </div>
            </a>
            <div class="endereco"><span class="fa fa-map-marker"></span> {{ $empreendimento->endereco->bairro->nome }}, {{ $empreendimento->endereco->cidade->nome }} - {{ $empreendimento->endereco->estado->uf }}</div>
            <div class="contato-construtora"><img src="{{ url($empreendimento->getLogo()) }}" class="img-responsive logo-busca" alt=""></div>
            <div class="ligar-construtora"><span class="fa fa-phone"></span></div>
            <div class="whatsapp-construtora"><span class="fa fa-whatsapp"></span></div>
        </div>

    @endforeach



</div>



@include('corretor.layouts.includes.menu-rodape')

@endsection
