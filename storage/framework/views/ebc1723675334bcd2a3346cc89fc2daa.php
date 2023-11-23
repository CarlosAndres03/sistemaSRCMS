<!-- Bootstrap 5 CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
    integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
<!-- Font Awesome CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="width: 80rem;">
                <h4 class="card-header">Usuarios</h4>

                <div class="card-body">
                    <?php if(session('status')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('status')); ?>

                    </div>
                    <?php endif; ?>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class="btn btn-success" href="<?php echo e(route('usuarios.create')); ?>"><i class="fa fa-plus">
                                Nuevo</i></a>
                    </div><br>
                    <div class="table-responsive">
                        <table class="table align-middle table-bordered">
                            <thead style="background-color:#6777ef;">
                                <tr>
                                    <th style="text-align:center">Id</th>
                                    <th style="text-align:center">Usuario</th>
                                    <th style="text-align:center">E-mail</th>
                                    <th style="text-align:center">Rol</th>
                                    <th style="text-align:center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td style="text-align:center">
                                        <?php echo e($usuario->id); ?>

                                    </td>
                                    <td style="text-align:center">
                                        <?php echo e($usuario->name); ?>

                                    </td>
                                    <td style="text-align:center">
                                        <?php echo e($usuario->email); ?>

                                    </td>
                                    <td style="text-align:center">
                                        <?php if(!empty($usuario->getRoleNames())): ?>
                                        <?php $__currentLoopData = $usuario->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rolName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <h5><span><?php echo e($rolName); ?></span></h5>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </td>
                                    <td style="text-align:center">
                                        <a class="btn btn-sm btn-info"
                                            href="<?php echo e(route('usuarios.edit', $usuario->id)); ?>"><i
                                                class="fa fa-edit"></i></a>

                                        <?php echo Form::open(['method' => 'DELETE', 'route'=> ['usuarios.destroy',
                                        $usuario->id], 'style'=>'display:inline']); ?>

                                        <?php echo Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class'=>'btn btn-sm btn-danger']); ?>

                                        <?php echo Form::close(); ?>

                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div class="pagination justify-content-end">
                            <?php echo $usuarios->links(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.vistaadministrador', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/sistemaSRCMS/P-SRCMS/resources/views/usuarios/index.blade.php ENDPATH**/ ?>