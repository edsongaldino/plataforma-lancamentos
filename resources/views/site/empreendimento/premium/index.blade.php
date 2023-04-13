@extends('site/empreendimento/premium/layout_interno')

@push('meta')
<title>INICIO</title>
@endpush

@push('includes_head')
<!-- Bootstrap -->
<link rel="stylesheet" href="/site/ferramenta/bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="/site/ferramenta/apartment-font/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/site/css/plugins.css">
<link rel="stylesheet" type="text/css" href="/site/css/apartment-layout.css?v=02">
<link rel="stylesheet" type="text/css" href="/site/css/empreendimento.css">
<link rel="stylesheet" href="/assets/sweetalert/dist/sweetalert.css">
<script src="/site/ferramenta/bootstrap/bootstrap.min.js"></script>
<script src="/site/ferramenta/js/swiper.js"></script>
<script src="/site/ferramenta/mail/validate.js"></script>
<script src="/site/ferramenta/js/apartment.js?v=06"></script>
<script src="/site/ferramenta/js/funcao_javascript.js" type="text/javascript"></script>
<script src="/site/ferramenta/bootstrap/bootstrap3-typeahead.min.js"></script>
<script src="/assets/javascripts/sweetalert2.8.js"></script>
<script src="/site/ferramenta/zoom/src/panzoom.js"></script>
<script src="/site/ferramenta/zoom/test/libs/jquery.mousewheel.js"></script>
<link href="/assets/premium/fontawesome/css/all.css" rel="stylesheet">

@endpush

@section('content')

<div class="conteudo">

    <!-- Slider main container -->
    <div id="swiper2" class="swiper-container">

    <div class="container swiper2-navigation">
        <div class="row">
            <div class="col-xs-2">
            <a href="#" class="navigation-box2 navigation-box-prev slide-prev"><div class="navigation-box-icon2"><i class="jfont">&#xe800;</i></div></a>
            </div>
            <div class="col-xs-2 col-xs-offset-8">
            <a href="#" class="navigation-box2 navigation-box-next slide-next"><div class="navigation-box-icon2"><i class="jfont">&#xe802;</i></div></a>
            </div>
        </div>
    </div>

    <!-- Additional required wrapper -->

    <div class="swiper-wrapper">

        @php $fotos = $empreendimento->getFotosCarrossel();@endphp
        @foreach($fotos AS $foto)
        @if(isset($foto->arquivo))
        <div class="swiper-slide swiper-lazy banner-index" onclick="location.href='/empreendimento/{{ $empreendimento->id }}/fotos';" data-background="{{ $foto->getUrl('original') }}">
            <div class="container">

                <div class="link-banner"></div>

            </div>
        </div>
        @endif
        @endforeach

    </div>

    </div>

    <div id="detalhes-empreendimento">

        <h1 class="nome-empreendimento"><i class="fa fa-building" aria-hidden="true"></i> {{ $empreendimento->nome }}</h1>
        <h2 class="subtitulo-empreendimento">{{ $empreendimento->subtipo->nome }}, {{ $empreendimento->endereco->cidade->nome }} - {{ $empreendimento->endereco->estado->uf }}</h2>


        <div class="caracteristicas">
            <div class="titulo"></div>
            @if($empreendimento->subtipo_id == 1 || $empreendimento->subtipo_id == 2)

                <div class="item">
                    <div class="icone-caracteristica"><i class="fa fa-building" aria-hidden="true"></i></div>
                    <div class="titulo-caracteristica">{{ $empreendimento->torres->count() }} Torre(s)</div>
                    <div class="valor-caracteristica">{{ $empreendimento->unidades->count() }} Unidades</div>
                </div>

                <div class="item">
                    <div class="icone-caracteristica"><i class="fa fa-object-group" aria-hidden="true"></i></div>
                    <div class="titulo-caracteristica">{{ $empreendimento->plantas->count() }} Planta(s)</div>
                    <div class="valor-caracteristica">{!! qtd_metragem($empreendimento) !!}m²</div>
                </div>

                @if($empreendimento->subtipo_id == 1)

                <div class="item">
                    <div class="icone-caracteristica"><i class="fa fa-bed" aria-hidden="true"></i></div>
                    <div class="titulo-caracteristica">{!! qtd_dormitorio($empreendimento, true) !!} Quartos</div>
                    <div class="valor-caracteristica">{!! qtd_suites($empreendimento, true) !!} Suíte(s)</div>
                </div>

                @endif

                <div class="item">
                    <div class="icone-caracteristica"><i class="fa fa-car" aria-hidden="true"></i></div>
                    <div class="titulo-caracteristica">Garagem</div>
                    <div class="valor-caracteristica">{!! vagas_empreendimento($empreendimento) !!} Vaga(s)</div>
                </div>

                @if($empreendimento->getCaracteristica('estacionamento_rotativo') == 'S')
                <div class="item">
                    <div class="icone-caracteristica"><i class="fas fa-parking" aria-hidden="true"></i></div>
                    <div class="titulo-caracteristica">Estacionamento</div>
                    <div class="valor-caracteristica">Rotativo</div>
                </div>
                @endif

                <div class="item">
                    <div class="icone-caracteristica"><i class="far fa-calendar-alt" aria-hidden="true"></i></div>
                    <div class="titulo-caracteristica">Previão de Entrega</div>
                    <div class="valor-caracteristica">{{ get_previsao_entrega($empreendimento) }}</div>
                </div>

                <div class="item">
                    <div class="icone-caracteristica"><i class="fas fa-columns" aria-hidden="true"></i></div>
                    <div class="titulo-caracteristica">Elevadores</div>
                    <div class="valor-caracteristica">{{ get_elevadores($empreendimento->id) }}</div>
                </div>

            @elseif($empreendimento->subtipo_id == 3 || $empreendimento->subtipo_id == 4)

                @if($empreendimento->variacao->nome == "Lote")

                    <div class="item">
                        <div class="icone-caracteristica"><i class="fas fa-columns" aria-hidden="true"></i></div>
                        <div class="titulo-caracteristica">Quadras</div>
                        <div class="valor-caracteristica">{{ $empreendimento->quadras->count() }}</div>
                    </div>

                    <div class="item">
                        <div class="icone-caracteristica"><i class="fab fa-buromobelexperte" aria-hidden="true"></i></div>
                        <div class="titulo-caracteristica">Unidades</div>
                        <div class="valor-caracteristica">{{ $empreendimento->unidades->count() }}</div>
                    </div>

                    <div class="item">
                        <div class="icone-caracteristica"><i class="far fa-map" aria-hidden="true"></i></div>
                        <div class="titulo-caracteristica">Lotes (Metragem)</div>
                        <div class="valor-caracteristica">{{ converte_valor_real_semdecimal($empreendimento->getCaracteristica('area_unidade_min')) }} à {{ converte_valor_real_semdecimal($empreendimento->getCaracteristica('area_unidade_max')) }}m²</div>
                    </div>

                    <div class="item">
                        <div class="icone-caracteristica"><i class="fas fa-tree" aria-hidden="true"></i></div>
                        <div class="titulo-caracteristica">Área Verde</div>
                        <div class="valor-caracteristica">{{ converte_valor_real_semdecimal($empreendimento->getCaracteristica('area_verde')) }}m²</div>
                    </div>

                    <div class="item">
                        <div class="icone-caracteristica"><i class="fas fa-crop-alt" aria-hidden="true"></i></div>
                        <div class="titulo-caracteristica">APP</div>
                        <div class="valor-caracteristica">{{ converte_valor_real_semdecimal($empreendimento->getCaracteristica('area_preservacao')) }}m²</div>
                    </div>

                    <div class="item">
                        <div class="icone-caracteristica"><i class="far fa-calendar-alt" aria-hidden="true"></i></div>
                        <div class="titulo-caracteristica">Previão de Entrega</div>
                        <div class="valor-caracteristica">{{ get_previsao_entrega($empreendimento) }}</div>
                    </div>

                @else

                    <div class="item">
                        <div class="icone-caracteristica"><i class="fa fa-building" aria-hidden="true"></i></div>
                        <div class="titulo-caracteristica">{{ $empreendimento->quadras->count() }} Quadras(s)</div>
                        <div class="valor-caracteristica">{{ $empreendimento->unidades->count() }} Unidades</div>
                    </div>

                    <div class="item">
                        <div class="icone-caracteristica"><i class="fa fa-object-group" aria-hidden="true"></i></div>
                        <div class="titulo-caracteristica">{{ $empreendimento->plantas->count() }} Planta(s)</div>
                        <div class="valor-caracteristica">{!! qtd_metragem($empreendimento) !!}m²</div>
                    </div>

                    <div class="item">
                        <div class="icone-caracteristica"><i class="fa fa-car" aria-hidden="true"></i></div>
                        <div class="titulo-caracteristica">Garagem</div>
                        <div class="valor-caracteristica">{!! vagas_empreendimento($empreendimento) !!} Vaga(s)</div>
                    </div>

                    <div class="item">
                        <div class="icone-caracteristica"><i class="far fa-calendar-alt" aria-hidden="true"></i></div>
                        <div class="titulo-caracteristica">Previão de Entrega</div>
                        <div class="valor-caracteristica">{{ get_previsao_entrega($empreendimento) }}</div>
                    </div>

                @endif

            @else

            @endif

        </div>

        <div class="descricao">{{ $empreendimento->descricao }}</div>

        <div id="botoes">
            <a href="/empreendimento/{{ $empreendimento->id }}/unidades"><div class="unidades-disponiveis"><i class="far fa-check-square" aria-hidden="true"></i> Escolha sua Unidade</div></a>
            @if($empreendimento->variacao->nome <> "Lote")
            <a href="/empreendimento/{{ $empreendimento->id }}/plantas"><div class="plantas-disponiveis"><i class="fa fa-object-group" aria-hidden="true"></i> Plantas </div></a>
            @endif

            @if($empreendimento->subtipo_id == 3 || $empreendimento->subtipo_id == 4)
                <div class="vagas-disponiveis"><i class="fa fa-check" aria-hidden="true"></i> Mapa de Vendas</div>
            @endif

            <a href="/empreendimento/{{ $empreendimento->id }}/fotos"><div class="galeria-fotos"><i class="fa fa-camera" aria-hidden="true"></i> Galeria de Fotos</div></a>

            @if ($empreendimento->tour->count() > 0)
            <a href="/empreendimento/{{ $empreendimento->id }}/tour360"><div class="tour-360"><i class="fas fa-circle-notch" aria-hidden="true"></i> Tour Virtual 360º</div></a>
            @endif

        </div>

        @php
        $video = $empreendimento->caracteristicas->where('nome', 'video')->first();
        @endphp
        @if($video)
        @if ($video->pivot->valor != null)
        <div class="video">
            <div class="titulo-video"><i class="fab fa-youtube" aria-hidden="true"></i> Vídeo do Empreendimento</div>
            <iframe class="video-youtube" src="{{ $empreendimento->caracteristicas->where('nome', 'video')->first()->pivot->valor }}" title="Vídeo - {{ $empreendimento->nome }}"></iframe>
            <!--<div class="outros-videos"><i class="fas fa-video" aria-hidden="true"></i> + Vídeos</div>-->
        </div>
        @endif
        @endif

        @php
        $itens_lazer = $empreendimento->itensLazer;
        $infra_estrutura = $empreendimento->caracteristicas
                ->where('tipo', 'Empreendimento')
                ->where('exibir', 'Sim');
        @endphp

        <nav class="abas">
            @if($itens_lazer->count() > 0)
            <div class="nav-item active" id="itensLazer"><i class="fas fa-swimming-pool" aria-hidden="true"></i> Itens de Lazer</div>
            @endif
            @if($infra_estrutura->count() > 0)
            <div class="nav-item" id="infraEstrutura"><i class="fas fa-clipboard-list" aria-hidden="true"></i> Ficha Técnica</div>
            @endif
        </nav>

        <div id="itens-lazer" style="display: block;">

            @foreach($itens_lazer->all() as $item_lazer)
                <div class="item"><i class="far fa-check-circle" aria-hidden="true"></i> {{ $item_lazer->nome }}</div>
            @endforeach

        </div>

        <div id="infra-estrutura" style="display: none;">

            @foreach($infra_estrutura->all() as $item_infra)
                <div class="item"><i class="far fa-check-circle" aria-hidden="true"></i> {{ $item_infra->nome }}</div>
            @endforeach

        </div>

        @if($empreendimento->arquivos->where('tipo', 'Memorial Descritivo')->first())
        <a href="/uploads/arquivos/{{  $empreendimento->arquivos->where('tipo', 'Memorial Descritivo')->first()->arquivo ?? '' }}" target="_blank"><div class="memorial-descritivo"><i class="fas fa-clipboard-list" aria-hidden="true"></i> Memorial Descritivo</div></a>
        @endif

        <div class="localizacao">
            <div class="titulo-mapa"><i class="fas fa-map-marker-alt" aria-hidden="true"></i> Localização</div>
            <div class="mapa-google" id="MapaLocalizacao"></div>
        </div>

        <script>
            var map;
            function initMap() {
              map = new google.maps.Map(document.getElementById('MapaLocalizacao'), {
                center: {lat: {{ $empreendimento->endereco->latitude }}, lng: {{ $empreendimento->endereco->longitude }}},
                zoom: 15
              });

              var marker = new google.maps.Marker({
                position: {lat: {{ $empreendimento->endereco->latitude }}, lng: {{ $empreendimento->endereco->longitude }}},
                map: map,
                title: 'Meu marcador'
              });
            }

          </script>
          <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzzfaZRQcQvaSDOtK3hyLoeY9YVUKedjQ&callback=initMap" async defer></script>

    </div>

</div>

@include('site.empreendimento.premium.mobile.proposta.modal_garagem')

@endsection

@push('rodape')

    <div class="rodape detalhes">
        <div class="valor">
            <span class="inicial"><i class="fas fa-dollar-sign" aria-hidden="true"></i> {{ $empreendimento->valor_inicial }}</span><br/>
            <span class="texto">Unidades à partir de</span>
        </div>

        @if($empreendimento->TabelaAtiva->count() > 0)
        <a href="/empreendimento/{{ $empreendimento->id }}/unidades"><div class="negociar"><i class="fas fa-cart-plus" aria-hidden="true"></i> Negociar Unidade</div></a>
        @else
        <a data-toggle="modal" data-target="#exampleModalCenter"><div class="negociar"><i class="fas fa-cart-plus" aria-hidden="true"></i> Falar com a Construtora</div></a>
        @endif
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header form">
            <h5 class="modal-title" id="exampleModalCenterTitle">Fale com a construtora</h5>
            <button type="button" class="close modal-form" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="/empreendimento/enviar-contato-cliente" name="FormContatoConstrutora" id="FormContatoConstrutora" method="POST">
                    @csrf
                    <div class="input-field">
                      <span class="icons icone_campo">
                        <i class="fa fa-user"></i>
                      </span>
                      <input name="nome" type="text" class="input-form with-icons input-font-maior" placeholder="Nome completo" value="" required/>
                    </div>
          
                    <div class="input-field">
                      <span class="icons icone_campo">
                        <i class="fa fa-envelope"></i>
                      </span>
                      <input type="email" name="email" id="email" placeholder="E-mail" class="input-form with-icons input-font-maior" required="required" value="">
                    </div>
          
                    <div class="input-field">
                      <span class="icons icone_campo">
                        <i class="fa fa-phone"></i>
                      </span>
                      <input type="text" placeholder="Telefone" name="telefone" id="telefone_form" class="input-form with-icons telefone phone" maxlength="16" required="required" value="">
                    </div>
          
                    <div class="input-field no-border">
                      <span class="icons icone_campo">
                        <i class="fa fa-calendar"></i>
                      </span>
                      <select class="search-box__combo js-businessSelect" name="previsao" id="previsao" required="required">
                        <option class="item" value="" selected="selected">Qual a sua previsão de compra?</option>
                        <option class="item" value="Imediata">Imediata</option>
                        <option class="item" value="Até 90 dias">Até 90 dias</option>
                        <option class="item" value="6 meses à 1 ano">6 meses à 1 ano</option>
                        <option class="item" value="1 ano ou mais">1 ano ou mais</option>
                      </select>
                    </div>
          
                    <div class="input-field no-border">
                      <span class="icons icone_campo">
                        <i class="fa fa-check"></i>
                      </span>
                      <select class="search-box__combo js-businessSelect" name="interesse" id="interesse" required="required">
                        <option class="item" value="" selected="selected">O que mais te agradou neste produto?</option>
                        <option class="item" value="Preço">Preço</option>
                        <option class="item" value="Localização">Localização</option>                                
                        <option class="item" value="Área de Lazer">Área de Lazer</option>
                        <option class="item" value="Planta do imóvel">Planta do imóvel</option>
                        <option class="item" value="Previsão de entrega">Previsão de entrega</option>
                      </select>
                    </div>
          
                    <div class="input-field no-border">
                      <span class="icons icone_campo">
                        <i class="fa fa-money"></i>
                      </span>
                      <select class="search-box__combo js-businessSelect" name="renda" id="renda" required="required">
                        <option class="item" value="" selected="selected">Qual a sua renda? R$</option>
                        <option class="item" value="Até 3.000,00">Até 3.000</option>
                        <option class="item" value="de 3.000 à 5.000">de 3.000 à 5.000</option>
                        <option class="item" value="de 5.000 à 7.000">de 5.000 à 7.000</option>
                        <option class="item" value="de 7.000 à 10.000">de 7.000 à 10.000</option>
                        <option class="item" value="de 10.000 à 15.000">de 10.000 à 15.000</option>
                        <option class="item" value="Acima de 15.000">Acima de 15.000</option>
                      </select>
                    </div>
          
                    <div class="input-field">
                      <span class="icons">
                        <i class="fa fa-comment"></i>
                      </span>
                      <textarea placeholder="Mensagem" name="mensagem" id="mensagem" class="input-form with-icons textarea" required="required">Olá, tenho interesse no empreendimento {{ $empreendimento->nome }}. Aguardo o contato. Obrigado.</textarea>
                    </div>
          
          
                    <div class="loadingImg_Mobile" style="display:none;"><img src="/site/imagens/loader2.gif" alt=""></div>
          
                    <div class="button-field btn-enviar-mobile" style="display:block;">
                      <button type="button" data-form="#form-contato-proposta" class="button-form" onclick="EnviarContatoConstrutora();"><i class="fa fa-send"></i> Enviar para Construtora</button>
                    </div>
          
                    <input type="hidden" placeholder="" name="empreendimento_id" value="{{ $empreendimento->id }}">  
                  </form> 
            </div>
        </div>
        </div>
    </div>

    <script src="/assets/vendor/pnotify/pnotify.custom.js"></script>
    <script src="/assets/vendor/magnific-popup/magnific-popup.js"></script>
    <script src="/site/painel/assets/javascripts/ui-elements/examples.modals.js"></script>
    <script src="/site/painel/assets/javascripts/ui-elements/examples.lightbox.js"></script>

    <script type="text/javascript" src="{{ asset('assets/javascripts/sweetalert2.8.js') }}" ></script>

    <script>

        $('#itensLazer').click(function (){
            $("#itens-lazer").css("display", "block");
            $("#infra-estrutura").css("display", "none");
            $('#infraEstrutura').removeClass('active');
            $('#itensLazer').addClass('active');
        });

        $('#infraEstrutura').click(function (){
            $("#itens-lazer").css("display", "none");
            $("#infra-estrutura").css("display", "block");
            $('#itensLazer').removeClass('active');
            $('#infraEstrutura').addClass('active');
        });

    </script>

@endpush
