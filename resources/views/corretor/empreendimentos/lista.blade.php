@extends('corretor.layouts.app')
@section('conteudo')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <!--
  <script type="text/javascript" src="/site/m/js/jquery.js"></script>-->
  <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link href="/site/m/css/stylec474.css" rel="stylesheet">
<link href="/site/m/css/responsive.css" rel="stylesheet">
<div class="conteudo empreendimentos">
    <h3 class="perfil"><i class="fa fa-info"></i> Empreendimentos</h3>

    @include('site.busca.mobile.lista')

</div>
@include('corretor.layouts.includes.menu-rodape')
<script type="text/javascript" src="/site/m/js/slick.min.js"></script>
@endsection
