<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


       

        <title>Administrador : Sistema Facturación</title>
        <style type="text/css" media="all">
            @import url("http://localhost/inventario/public/css/style.css");
            @import url("http://localhost/inventario/public/css/jquery.wysiwyg.css");
            @import url("http://localhost/inventario/public/css/facebox.css");
            @import url("http://localhost/inventario/public/css/visualize.css");
            @import url("http://localhost/inventario/public/css/date_input.css");
        </style>
        <!--[if lt IE 8]>
        <style type="text/css" media="all">@import url("public/admin/css/ie.css");</style>
    <![endif]-->
    </head>
    <body>
        <div id="hld">
            <div class="wrapper">
                <div class="block small center login">
                    <div class="block_head">
                        <div class="bheadl"></div>
                        <div class="bheadr"></div>
                        <h2 id="logo">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2>
                        <ul>
                            <li><a href="">Administrador</a></li>
                        </ul>
                    </div>		<!-- .block_head ends -->
                    <div class="block_content" id="flogin">
                        <div class="message info"><p>Información, Ingrese sus datos de acceso.</p></div>
                        <form action="login/entrar" method="post">						<p>
                                <label>Usuario:</label> <br />
                                <input type="text" class="text" tabindex="1" name="nick" id="nick" value="" />
                            </p>

                            <p>
                                <label>Contraseña:</label> <br />
                                <input type="password" class="text" value="" tabindex="2" name="clave" id="clave" />
                            </p>
                            <p>
                                <input type="submit" class="submit" value="Acceder" /> &nbsp; 
                                <input type="checkbox" class="checkbox" id="rememder" name="recordar_si_MKD" value="si"  /> <label for="rememberme">Recordarme</label>
                            </p>
                        </form>

                    </div>		
                    <div class="bendl"></div>
                    <div class="bendr"></div>
                </div>		
            </div>						
        </div>		

        <!--[if IE]><script type="text/javascript" src="public/admin/js/excanvas.js"></script><![endif]-->	
        <script type="text/javascript" src="http://localhost/inventario/public/js/jquery.js"></script>
        <script type="text/javascript" src="http://localhost/inventario/public/js/jquery.img.preload.js"></script>
        <script type="text/javascript" src="http://localhost/inventario/public/js/jquery.filestyle.mini.js"></script>
        <script type="text/javascript" src="http://localhost/inventario/public/js/jquery.wysiwyg.js"></script>
        <script type="text/javascript" src="http://localhost/inventario/public/js/jquery.date_input.pack.js"></script>
        <script type="text/javascript" src="http://localhost/inventario/public/js/facebox.js"></script>
        <script type="text/javascript" src="http://localhost/inventario/public/js/jquery.select_skin.js"></script>
        <script type="text/javascript" src="http://localhost/inventario/public/js/jquery.tablesorter.min.js"></script>
        <script type="text/javascript" src="http://localhost/inventario/public/js/ajaxupload.js"></script>
        <script type="text/javascript" src="http://localhost/inventario/public/js/jquery.pngfix.js"></script>
        <script type="text/javascript" src="http://localhost/inventario/public/js/jquery.tipsy.js"></script>
        <script type="text/javascript" src="http://localhost/inventario/public/js/jquery.validate.js"></script>
        <script type="text/javascript" src="http://localhost/inventario/public/js/custom.js"></script>
    </body>
</html>



<!--<h2>Login</h2>

    <form action="login/entrar" method="post" class="formulario">
        <div>
            <label for="login">Usuario</label>
            <input class="texto" type="text" name="login" id="login" />
        </div>
        <div>
            <label for="password">Password</label>
            <input class="texto" type="password" name="password" id="password"/>
        </div>
       
            <input class="boton-enviar" type="submit" >
        
    </form>-->
