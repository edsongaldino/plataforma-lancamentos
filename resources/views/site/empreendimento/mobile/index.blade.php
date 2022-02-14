@php
ini_set('memory_limit','-1');

$mostra_mapa = $empreendimento->caracteristicas->where('nome', 'mostra_mapa')->first();

if ($mostra_mapa) {
$mostra_mapa = $mostra_mapa->pivot->valor;  
}

$link_tour = $empreendimento->caracteristicas->where('nome', 'link_tour')->first();

if ($link_tour) {
$link_tour = $link_tour->pivot->valor;  
}

@endphp
@extends('site/layout_mobile')

@section('title')
{{ strtoupper($empreendimento->nome) }}
@endsection
@push('meta')
 <!-- OLD -->
 <meta charset="utf-8">
  @if ($empreendimento->seo)
    <title>{{ $empreendimento->nome }}</title>
    <meta name="description" content="{{ $empreendimento->seo->descricao ?? null }}">
    <meta name="keywords" content="{{ $empreendimento->seo->palavra_chave ?? null }}"> 
    <meta name="author" content="Lançamentos Online"> 
    <link rel="shortcut icon" href="/site/m/images/favicon.ico">
    <!-- Resolution Screen -->
    <meta content="IE=edge" http-equiv="x-ua-compatible">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no"/>
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="yes" name="apple-touch-fullscreen">
    <!-- /Resolution Screen -->
    <meta property="og:title" content="{{ $empreendimento->nome }}"/>
    <meta property="og:description" content="{{ $empreendimento->seo->descricao }}">
    <meta property="og:type" content="Portal Imobiliário"/>
    <meta property="og:site_name" content="Portal de anúncios imobiliários especializado em lançamentos."/>
    <meta property="og:image" content="{{ $empreendimento->fotoPrincipal() }}"/>
    <meta property="og:url" content="https://www.lancamentosonline.com.br/imoveis/{{ url_amigavel($empreendimento->subtipo->nome)}}-{{ url_amigavel($empreendimento->nome)}}-{{ $empreendimento->id }}.html"/>
    <!-- /SEO -->
  @else
    <title>@yield('title', 'Portal Lançamentos Online - Exclusivo para Construtoras e Incorporadoras')</title>
    <meta name="description" content="O seu novo lar está aqui!">
    <meta name="keywords" content="lançamentos online, lançamentos imobiliários, apartamento em cuiabá, apartamento novo, imoveis mt, imoveis novos cuiabá"> 
    <meta name="author" content="Lançamentos Online"> 
    <link rel="shortcut icon" href="/site/m/images/favicon.ico">
    <!-- Resolution Screen -->
    <meta content="IE=edge" http-equiv="x-ua-compatible">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no"/>
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="yes" name="apple-touch-fullscreen">
    <!-- /Resolution Screen -->
    <meta property="og:title" content="Lançamentos Online"/>
    <meta property="og:description" content="O seu novo lar está aqui!">
    <meta property="og:type" content="Portal Imobiliário"/>
    <meta property="og:site_name" content="Portal de anúncios imobiliários especializado em lançamentos."/>
    <meta property="og:image" content="https://lancamentosonline.com.br/site/m/images/logo/lancamentos-online.jpg"/>
    <meta property="og:url" content="https://lancamentosonline.com.br"/>

  @endif
 <!-- Web App -->
 <meta name="apple-mobile-web-app-capable" content="yes"/>
 <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
 <meta name="apple-mobile-web-app-title" content="Lançamentos Online"/>
 <link rel="apple-touch-icon" href="/site/m/images/logo/app/lancamentosonline.png" />
 <link rel="apple-touch-icon" sizes="57x57" href="/site/m/images/logo/app/lancamentosonline-57x57.png" />
 <link rel="apple-touch-icon" sizes="72x72" href="/site/m/images/logo/app/lancamentosonline-72x72.png" />
 <link rel="apple-touch-icon" sizes="76x76" href="/site/m/images/logo/app/lancamentosonline-76x76.png" />
 <link rel="apple-touch-icon" sizes="114x114" href="/site/m/images/logo/app/lancamentosonline-114x114.png" />
 <link rel="apple-touch-icon" sizes="120x120" href="/site/m/images/logo/app/lancamentosonline-120x120.png" />
 <link rel="apple-touch-icon" sizes="144x144" href="/site/m/images/logo/app/lancamentosonline-144x144.png" />
 <link rel="apple-touch-icon" sizes="152x152" href="/site/m/images/logo/app/lancamentosonline-152x152.png" />

 <meta name="application-name" content="Lançamentos Online"/>
 <meta name="msapplication-TileColor" content="#000000"/>
 <meta name="msapplication-TileImage" content="https://lancamentosonline.com.br/site/m/images/logo/app/wphone.png"/>

@endpush

@push('css')
<link rel="stylesheet" type="text/css" href="/site/m/css/responsive.css">
<link rel="stylesheet" type="text/css" href="/site/m/css/relatorios.css">
<link rel="stylesheet" type="text/css" href="/site/m/css/style-aba.css">
<link rel="stylesheet" href="/global/css/loader/index.css">
<link rel="stylesheet" href="/assets/sweetalert/dist/sweetalert.css">
<script src="/assets/vendor/pnotify/pnotify.custom.js"></script>
@endpush

@push('js_header')

@endpush

@push('js_footer')
<link href="/site/m/ferramenta/Galeria2016/css/photoswipe.css?v=4.1.1-1.0.4" rel="stylesheet" />
<link href="/site/m/ferramenta/Galeria2016/css/default-skin.css?v=4.1.1-1.0.4" rel="stylesheet" />
<script src="/site/m/ferramenta/Galeria2016/js/photoswipe.min.js?v=4.1.1-1.0.4"></script>
<script src="/site/m/ferramenta/Galeria2016/js/photoswipe-ui-default.min.js?v=4.1.1-1.0.4"></script>

<script src="/bower_components/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
<script src="/assets/vendor/pnotify/pnotify.custom.js"></script>
<script src="/assets/javascripts/sweetalert2.8.js"></script>
<script src="/global/js/loader/index.js?v=1.5"></script>
<script src="/site/js/empreendimento/formulario.js?v=1.5"></script>
<script type="text/javascript" src="/site/m/js/empreendimento.js?v=01"></script>
<script type="text/javascript" src="/site/m/js/materialize.min.js"></script>
<script type="text/javascript" src="/site/m/js/jquery-ui.min.js"></script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-1kSaM3BsibuKoW3Dip8d7Uw2p9mLuws&callback=inicializar"></script>


<script type="text/javascript" src="/site/m/js/slick.min.js"></script>
<script type="text/javascript" src="/site/m/js/custom.js"></script>
<script type="text/javascript" src="/site/m/js/jquery-ui.min.js"></script>
@endpush

@section('content')   
  <input type="hidden" id="latitude" value="{{ $empreendimento->endereco->latitude }}">
  <input type="hidden" id="longitude" value="{{ $empreendimento->endereco->longitude }}">

  @include('site/empreendimento/mobile/topo')    
  <div class="content-container animated fadeInUp content-container-detalhe" style="margin-bottom: 40px;padding-top: 0;">
    <div class="tab_container">          
      @include('site/empreendimento/mobile/cabecalho')    
      @include('site/empreendimento/mobile/selo')    
      @include('site/empreendimento/mobile/foto')
      @include('site/empreendimento/mobile/oferta')
      @include('site/empreendimento/mobile/detalhe')
      @include('site/empreendimento/mobile/video')
      @include('site/empreendimento/mobile/tour')
      @include('site/empreendimento/mobile/itens')
      @include('site/empreendimento/mobile/mapa')
      @include('site/empreendimento/mobile/localizacao')
      @include('site/empreendimento/mobile/formulario')      
    </div>    
    <div class="clear"></div>    
  </div>  

  <div id="openModal" class="modalDialog">
    <div>
      <a href="#close" title="Close" class="close">X</a>
      <div class="icone-chat-modal"><img src="/assets/images/chat-online.png" alt="" class="img-responsive"></div>
      <div class="texto-chat-modal">Para iniciar o atendimento com o corretor, precisamos te conhecer</div>
      <form action="" id="modal-chat" name="modal-chat">
        <input type="text" class="form-control nome-modal" name="nome" id="nome" placeholder="Nome completo" required>
        <input type="text" class="form-control whatsapp-modal telefone" name="whatsapp" id="whatsapp" placeholder="Whatsapp" required>
        <input type="hidden" name="tipo_clique" id="tipo_clique" value="Whatsapp">
        <input type="hidden" name="empreendimento_id" id="empreendimento_id" value="{{ $empreendimento->id }}">

        <div class="loadingImg_Chat" style="display:none;"><img src="/site/imagens/loader2.gif" alt=""></div>
        <button type="button" id="botaoContinuar" class="btn btn-primary continuar ChatMobileEnviar" style="display:block;"><i class="fa fa-arrow-right" aria-hidden="true"></i> Continuar</button>

      </form>


      <div class="link-whatsapp-mobile" style="display: none;">
      @if($empreendimento->getCaracteristica('whatsapp_atendimento'))
      <a href="https://api.whatsapp.com/send?phone=55{{ limpa_campo($empreendimento->getCaracteristica('whatsapp_atendimento')) }}&text=Ol%C3%A1%2C%20vi%20o%20an%C3%BAncio%20do%20empreendimento%20({{ $empreendimento->nome }})%20no%20Portal%20Lan%C3%A7amentos%20Online%20e%20gostaria%20de%20obter%20maiores%20informa%C3%A7%C3%B5es" target="_blank">
        <button type="button" class="btn btn-primary btn-whatsapp"><i class="fa fa-whatsapp" aria-hidden="true"></i> Atendimento Whatsapp</button>
      </a>
      @elseif($empreendimento->construtora->whatsapp)
      <a href="https://api.whatsapp.com/send?phone=55{{ limpa_campo($empreendimento->construtora->whatsapp) }}&text=Ol%C3%A1%2C%20vi%20o%20an%C3%BAncio%20do%20empreendimento%20({{ $empreendimento->nome }})%20no%20Portal%20Lan%C3%A7amentos%20Online%20e%20gostaria%20de%20obter%20maiores%20informa%C3%A7%C3%B5es" target="_blank">
        <button type="button" class="btn btn-primary btn-whatsapp"><i class="fa fa-whatsapp" aria-hidden="true"></i> Atendimento Whatsapp</button>
      </a>
      @else
        <button type="button" class="btn btn-primary btn-whatsapp"><i class="fa fa-whatsapp" aria-hidden="true"></i> Atendimento Whatsapp</button>
      @endif
      </div>

      <div class="link-telefone-mobile" style="display: none;">

        @if($empreendimento->getCaracteristica('telefone_central'))
        <a href="tel:{{ $empreendimento->getCaracteristica('telefone_central') }}" onclick="GravarCliquetel(); return true;">
          <button type="button" class="btn btn-primary btn-ligar"><i class="fa fa-phone" aria-hidden="true"></i> Ligar para a construtora</button>
        </a>
        @elseif($empreendimento->construtora->telefone_nun)
        <a href="tel:{{ $empreendimento->getCaracteristica('telefone_central') }}" onclick="GravarCliquetel(); return true;">
          <button type="button" class="btn btn-primary btn-ligar"><i class="fa fa-phone" aria-hidden="true"></i> Ligar para a construtora</button>
        </a>
        @elseif($empreendimento->construtora->celular_atendimento)
        <a href="tel:{{ $empreendimento->construtora->telefone_nun }}" onclick="GravarCliquetel(); return true;">
          <button type="button" class="btn btn-primary btn-ligar"><i class="fa fa-phone" aria-hidden="true"></i> Ligar para a construtora</button>
        </a>
        @elseif($empreendimento->construtora->telefone)
        <a href="tel:{{ $empreendimento->construtora->telefone }}" onclick="GravarCliquetel(); return true;">
          <button type="button" class="btn btn-primary btn-ligar"><i class="fa fa-phone" aria-hidden="true"></i> Ligar para a construtora</button>
        </a>
        @else
          <button type="button" class="btn btn-primary btn-ligar-off"><i class="fa fa-phone" aria-hidden="true"></i> Ligar para a construtora</button>
        @endif

      </div>




    </div>
  </div>

@endsection

@push('modal')
@include('site/empreendimento/mobile/lightbox')
@endpush