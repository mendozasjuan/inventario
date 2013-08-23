<?php Session::init(); ?>
<!doctype html>
<html>
    <head>
        <title>MVC<?php $this->mostrarTitulo(); ?>
        </title>
        
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/default.css" />
        <script type='text/javascript' src="<?php echo URL; ?>public/js/jquery.js"></script>
        <?php $this->mostrarJs(); ?>
    </head>
    <body>
        <div id="container" >
        <div id="header" >
            <div id="navbar">
                 <ul>
             <?php if(!Session::get('logeado')){?>
                <li><a href="<?php echo URL; ?>index" class="enlace">Index</a></li>
                <li><a href="<?php echo URL; ?>help" class="enlace">help</a></li>
            <?php }?>
                
                
            <?php if(Session::get('logeado')){?>
                <li><a href="<?php echo URL; ?>dashboard" class="enlace">Dashboard</a></li>
                
                <?php if(Session::get('role') == 'owner'){?>
                    <li><a href="<?php echo URL; ?>usuario" class="enlace">Usuarios</a></li>
                <?php }?>
                    
                <li><a href="<?php echo URL; ?>dashboard/logout" class="enlace">Salir</a></li>
                
            <?php }else{?>
                <li><a href="<?php echo URL; ?>login" class="enlace">Iniciar Sesion</a></li>
             <?php }?>
                
                </ul>
            </div>
        </div>
        <div id="content">
        <div id="content-main" >