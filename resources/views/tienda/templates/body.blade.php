<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
            <meta content="IE=edge" http-equiv="X-UA-Compatible">
                <meta content="width=device-width, initial-scale=1" name="viewport">
                    <meta content="" name="description">
                        <meta content="" name="author">
                            <title>
                                Antonio Baccarelli - @yield('titulo')
                            </title>

                            <link href="{{ asset('img/favicon.png') }}" rel="icon" type="image/png"/>
                            
                            <link href="{{ asset('css/pages/layouts/header.css') }}" rel="stylesheet">
                            <link href="{{ asset('css/pages/layouts/desplegable.css') }}" rel="stylesheet">
                                <link href="{{ asset('css/pages/layouts/footer.css') }}" rel="stylesheet">
                                    @yield('css')
                              <!--     
                            <?php header('Access-Control-Allow-Origin: *');?>
                                    <link href="http://allfont.es/allfont.css?fonts=raleway-extrabold" rel="stylesheet" type="text/css" />-->
                                    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                                    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
                                    <script src='https://www.google.com/recaptcha/api.js'></script>

                                        <link href="{{ asset('plugins/materialize/css/materialize.min.css') }}" rel="stylesheet">

                                            <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
                                            <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

       <!--    <script type="text/javascript" src="http://osolelaravel.com/drimer/js/materialize.min.js"></script>-->
                                        </link>
                                    </link>
                                </link>
                            </link>
                        </meta>
                    </meta>
                </meta>
            </meta>
        </meta>

    </head>
    <body>
        <!-- CABECERA -->
        <header>
            @include('tienda.templates.header')
        </header>
        <main style="">
            @yield('contenido')
        </main>
        <!--Import jQuery before materialize.js-->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript">
        </script>
        <!-- Materialize Core JavaScript -->
        <script src="{{ asset('plugins/materialize/js/materialize.min.js') }}">
        </script>
        @yield('js')
        <script type="text/javascript">
        </script>
    </body>
</html>