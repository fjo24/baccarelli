<!--Footer-->
<style type="text/css">
</style>
<footer class="page-footer center-on-small-only ">
    <div style="position: relative;">
        <!--Footer Links-->
        <div class="container conte-foot" style="width: 89%; ">
            <div class="row margen-foot">
                <div class="col l12 m12 s12">
                    <div class="col l8 m8 s8">
                        <div class="row">
                            <div class="col l4 m4 s4 texto-footer">
                                <div class="">
                                    <p class="newsletter">
                                        NEWSLETTER
                                    </p>
                                </div>
                                <p style="margin-top: 0px;">
                                    Para recibir, escribí tu  e-mail aquí
                                </p>
                            </div>
                            <div class="col l8 m8 s8" style="padding-top: 20px;padding-left: 0px;">
                                <form action="newsletter.php" method="POST" role="form">
                                    <div class="form-group col l9 m9 s9 newsbox" style="padding-right: 0px; padding-left: 0px;">
                                        <input class="news form-control" name="email" placeholder="Email" type="text">
                                        </input>
                                    </div>
                                    <div class="col l3 m3 s3" style="width: 14%;">
                                        <button class="btn btn-enviar" type="submit">
                                            Enviar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col l4 m4 s4 texto-footer" style="height: 110px;">
                        <div class="col l12 m12 s12 texto-footer" style="border-left: 1px solid #EE4695;height: 80px;padding-left: 57px;">
                            <div class="row datos-emp">
                                <div class="col l1">
                                    <img src="{{asset('img/layouts/ubicacion.png')}}">
                                    </img>
                                </div>
                                <div class="col l11" style="color: #545454;">
                                    <p style="margin: 0;">
                                        {{$direccion->descripcion}}
                                    </p>
                                </div>
                                <div class="col l1">
                                    <img src="{{asset('img/layouts/phone.png')}}">
                                    </img>
                                </div>
                                <div class="col l11">
                                    <p style="margin:0;color: #545454;">
                                        {{$telefono->descripcion}} /
                                {{$telefono2->descripcion}} /
                                {{$telefono3->descripcion}}
                                    </p>
                                </div>
                                <div class="col l1">
                                    <img src="{{asset('img/layouts/email.png')}}">
                                    </img>
                                </div>
                                <div class="col l11">
                                    <p style="margin: 0;">
                                        <a style="color: #545454;" class="texto-mail" href="mailto:<?php echo ($email["descripcion"]); ?>">
                                            {{$email->descripcion}}
                                        </a>
                                    </p>
                                </div>
                                <div class="col l1">
                                    <img src="{{asset('img/layouts/email.png')}}">
                                    </img>
                                </div>
                                <div class="col l11">
                                    <p style="margin: 0;">
                                        <a style="color: #545454;" class="texto-mail" href="mailto:<?php echo ($email2["descripcion"]); ?>">
                                                {{$email2->descripcion}}
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
