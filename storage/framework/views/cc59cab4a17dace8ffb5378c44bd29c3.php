<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card offset-md-2 " style="width: 30rem;">
                <div class="card-header text-center text-white"style="background-color: #ff0000;"><?php echo e(__('Alerta')); ?></div>
                <div class="card-body">
                <p class="fs-3 text-center">Usuario bloqueado, por favor contacte al administrador</p>
                <p class="fs-4 text-center">Gracias</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/sistemaSRCMS/P-SRCMS/resources/views/usuarios/bloqueado.blade.php ENDPATH**/ ?>