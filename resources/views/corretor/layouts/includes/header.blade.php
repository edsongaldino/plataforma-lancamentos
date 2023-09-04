<!DOCTYPE html>
<html lang="pt-br">
	<head>
        <title>Explicaí - Tudo que você precisa saber sobre CCT</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Clean Recipe App Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android  Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() {setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <meta charset utf="8">

        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        <!--font-awsome-css-->
            <link rel="stylesheet" href="{{ asset('corretor/app-assets/css/font-awesome.min.css') }}">
        <!--bootstrap-->
            <link href="{{ asset('corretor/app-assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <!--custom css-->
            <link href="{{ asset('corretor/app-assets/css/style.css') }}" rel="stylesheet" type="text/css"/>
            <link rel="stylesheet" href="{{ asset('corretor/app-assets/css/percircle.css') }}">
        <!--component-css-->
            <script src="{{ asset('corretor/app-assets/js/jquery-2.1.4.min.js') }}"></script>
            <script src="{{ asset('corretor/app-assets/js/bootstrap.min.js') }}"></script>
                <!--script-->
                <script src="{{ asset('corretor/app-assets/js/modernizr.custom.js') }}"></script>
            <script src="{{ asset('corretor/app-assets/js/bigSlide.js') }}"></script>
            <script>
                $(document).ready(function() {
                $('.menu-link').bigSlide();
                });
            </script>
            <script type="text/javascript" src="{{ asset('corretor/app-assets/js/move-top.js') }}"></script>
            <script type="text/javascript" src="{{ asset('corretor/app-assets/js/easing.js') }}"></script>
            <script type="text/javascript">
                        jQuery(document).ready(function($) {
                            $(".scroll").click(function(event){
                                event.preventDefault();
                                $('html,body').animate({scrollTop:$(this.hash).offset().top},900);
                            });
                        });
            </script>

            <!--script-->
            <!-- swipe box js -->
            <link rel="stylesheet" href="{{ asset('corretor/app-assets/css/swipebox.css') }}">
            <script src="{{ asset('corretor/app-assets/js/jquery.swipebox.min.js') }}"></script>
                <script type="text/javascript">
                    jQuery(function($) {
                        $(".swipebox").swipebox();
                    });
            </script>
            <!-- //swipe box js -->
            <link href="{{ asset('corretor/app-assets/vendor/sweetalert/dist/sweetalert.css') }}" rel="stylesheet" type="text/css" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

            <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

    </head>
<body>

<div class="body-back">
	<div class="masthead pdng-stn1">
		<div id="menu" class="panel" role="navigation">
			<div class="wrap-content">
				<div class="profile-menu text-center">
                        @if(Session::get('usuario.foto') <> null)
					    <img class="img-circle border-effect" src="{{ url('corretor/usuario/'.Session::get('usuario.id').'/foto') }}" alt=" ">
                        @else
                        <img class="img-circle border-effect" src="{{ asset('corretor/app-assets/images/userFoto.png') }}" alt=" ">
                        @endif
						<h3>{{ Session::get('usuario.nome') }}</h3>
						<p>{{ Session::get('usuario')->perfil->nome }}</p>
						<div class="pro-menu">
							<div class="logo">
								<li><a class="link link--yaku active" href="{{ route('home') }}"><span>H</span><span>o</span><span>m</span><span>e</span></a></li>
                                @if(Session::get('usuario.perfil_id') == '1')
                                <li><a class="link link--yaku" href="{{ url('gerenciar/tipos') }}"><span>T</span><span>i</span><span>p</span><span>o</span><span>s</span><span>-</span><span>C</span><span>C</span><span>T</span></li>
                                <li><a class="link link--yaku" href="{{ url('gerenciar/avaliacoes') }}"><span>A</span><span>v</span><span>a</span><span>l</span><span>i</span><span>a</span><span>ç</span><span>õ</span><span>e</span><span>s</span></li>
                                @endif
								<li><a class="link link--yaku" href="{{ route('sobre') }}"><span>S</span><span>o</span><span>b</span><span>r</span><span>e</span></a></li>
								<li><a class="link link--yaku" href="{{ route('convencoes') }}"><span>C</span><span>o</span><span>n</span><span>v</span><span>e</span><span>n</span><span>ç</span><span>õ</span><span>e</span><span>s</span></a></li>

                                @if(Session::get('usuario.perfil_id') == '2')
                                <li><a class="link link--yaku" href="{{ route('avaliar.empresa') }}"><span>A</span><span>v</span><span>a</span><span>l</span><span>i</span><span>a</span><span>r</span> <span>E</span><span>m</span><span>p</span><span>r</span><span>e</span><span>s</span><span>a</span></a></li>
								@endif

                                <li><a class="link link--yaku" href="{{ route('perfil') }}"><span>M</span><span>i</span><span>n</span><span>h</span><span>a</span> <span>C</span><span>o</span><span>n</span><span>t</span><span>a</span></a></li>
								<li><a class="link link--yaku" href="{{ route('mensagens') }}"><span>M</span><span>e</span><span>n</span><span>s</span><span>a</span><span>g</span><span>e</span><span>n</span><span>s</span></a></li>
                                <li><a class="link link--yaku" href="{{ route('logout') }}"><span>S</span><span>a</span><span>i</span><span>r</span></a></li>
                            </div>
						</div>
				</div>
			</div>
		</div>
		<div class="phone-box wrap push" id="home">
        <div class="menu-notify">
            <div class="profile-left">
                <a href="#menu" class="menu-link"><i class="fa fa-list-ul"></i></a>
            </div>
            <div class="Profile-mid">
                <h5 class="pro-link">APP ExplicaÍ</h5>
            </div>
            <div class="voltar"><a href="javascript:void(0)" onClick="history.go(-1); return false;"><button><i class="fa fa-angle-double-left" aria-hidden="true"></i></button></a></div>
            <div class="clearfix"></div>
        </div>
