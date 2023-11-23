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
                <h4 class="card-header">Roles</h4>

                <div class="card-body">
                    <?php if(session('status')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('status')); ?>

                    </div>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crear-rol')): ?>
                    <a class="btn btn-success" href="<?php echo e(route('roles.create')); ?>"><i class="fa fa-plus">Nuevo</i></a>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table class="table align-middle table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align:center">Rol</th>
                                    <th style="text-align:center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td style="text-align:center">
                                        <?php echo e($role->name); ?>

                                    </td>
                                    <td style="text-align:center">
                                        
                                        <a class="btn btn-sm btn-success" href="<?php echo e(route('roles.edit', $role->id)); ?>"><i
                                                class="fa fa-edit"></i></a>
                                        
                                        <?php echo Form::open(['method' => 'DELETE', 'route'=> ['roles.destroy',
                                        $role->id], 'style'=>'display:inline']); ?>

                                        <?php echo Form::button('<i class="fa fa-trash"></i>',  ['type' => 'submit', 'class'=>'btn btn-sm btn-danger']); ?>

                                        <?php echo Form::close(); ?>

                                        
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div class="pagination justify-content-end">
                            <?php echo $roles->links(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.vistaadministrador', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/sistemaSRCMS/P-SRCMS/resources/views/roles/index.blade.php ENDPATH**/ ?>