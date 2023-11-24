<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>SRCMS</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js']); ?>
</head>

<body>
    <div class="p-4" style="background-color:#0b231e;">
        <!--<img src="/images/logoheader.svg">-->
    </div>
    </div>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm" style="background-color: #13322b;">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <?php echo e(('SRCMS')); ?>

                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                        <?php if(Route::has('login')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                        </li>
                        <?php endif; ?>

                        <?php if(Route::has('register')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                        </li>
                        <?php endif; ?>
                        <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/home">Inicio</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" aria-current="page" href="#" role="button" data-bs-toggle="dropdown">Controles mínimos</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="<?php echo e(route('planeacion.anios')); ?>">Planeación</a></li>
                                <li><a class="dropdown-item" href="<?php echo e(route('gestion.anios')); ?>">Gestión</a></li>
                                <li><a class="dropdown-item" href="<?php echo e(route('rh.anios')); ?>">Recursos humanos</a></li>
                                <li><a class="dropdown-item" href="<?php echo e(route('equiposfisicos.anios')); ?>">Equipos físicos</a></li>
                                <li><a class="dropdown-item" href="<?php echo e(route('centrodatos.anios')); ?>">Centros de datos</a></li>
                                <li><a class="dropdown-item" href="<?php echo e(route('redtel.anios')); ?>">Redes y telecomunicaciones</a></li>
                                <li><a class="dropdown-item" href="<?php echo e(route('equipocomputo.anios')); ?>">Equipo de cómputo</a></li>
                                <li><a class="dropdown-item" href="<?php echo e(route('tecmovil.anios')); ?>">Tecnologia móvil</a></li>
                                <li><a class="dropdown-item" href="<?php echo e(route('sisappserv.anios')); ?>">Sistemas, aplicaciones y servicios</a></li>
                                <li><a class="dropdown-item" href="<?php echo e(route('bd.anios')); ?>">Bases de datos</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('editar-control mínimo')): ?>
                            <a class="nav-link active dropdown-toggle" aria-current="page" href="/usuarios" role="button" data-bs-toggle="dropdown">Administrar usuarios</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="/usuarios">Usuarios</a></li>
                                <li><a class="dropdown-item" href="/roles">Roles</a></li>
                            </ul>
                            <?php endif; ?>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/soporte">Soporte</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link active dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <?php echo e(Auth::user()->name); ?>

                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <?php echo e(__('Salir')); ?>

                                </a>
                                <a class="dropdown-item" href="<?php echo e(route('usuarios.resetcontraseña')); ?>">Cambiar contraseña</a>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
</body>

</html><?php /**PATH /var/www/sistemaSRCMS/P-SRCMS/resources/views/layouts/vistaadministrador.blade.php ENDPATH**/ ?>