<!-- Bootstrap 5 CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
    integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
<!-- Font Awesome CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card" style="width: 60rem;">
                <h1 class="card-header">Recursos Humanos</h1>
                <div class="card-body">
                    <?php if(session('status')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('status')); ?>

                    </div>
                    <?php endif; ?>
                    <p class="fs-5 text-center"><?php echo e($control->descripcionControlMinimo); ?></p>

                    <?php if($errors->any()): ?>
                    <div class="alert alert-dark alert-dismissible fade show" role="alert">
                        <strong>¡Revise los campos!</strong>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="badge badge-danger"><?php echo e($error); ?></span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <button type="button" class="close" data-dismiss="alert" arial-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif; ?>

                    <?php echo Form::model($control, ['method'=>'PATCH', 'files' => true, 'route' => ['rh.update',
                    $control->idControlMinimo]]); ?>

                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="">Observaciones: </label>
                                <?php echo Form::textArea('observacionCumplimiento', null, array('class' => 'form-control' , 'required' => 'required')); ?>

                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="">Atenciones: </label>
                                <?php echo Form::textArea('atencionCumplimiento', null, array('class' => 'form-control', 'required' => 'required')); ?>

                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 ">
                            <div class="form-chexk"><br>
                                <label for="">¿Se implementó?</label><br>
                                <input class="form-check-input" type="radio" name="respuesta" id="respuesta" value="Sí" required>
                                <label class="form-check-label" for="flexRadioDefault1">Sí </label>
                                <input class="form-check-input" type="radio" name="respuesta" id="respuesta" value="No" required>
                                <label class="form-check-label" for="flexRadioDefault1">No</label>
                            </div>
                        </div>
                        
                        <div class="col-xs-6 col-sm-6 col-md-6"><br>
                            <div class="input-group mb-3">
                                <label for="">Evidencia:</label> 
                            </div>
                            <?php echo Form::file('documentoEvidencia', null, array('class' => 'form-control', 'required' => 'required' )); ?>

                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-3">
                                <label for="">Semestre</label><br>
                                <select class="form-control" id="semestre" name="semestre" required>
                                <option value="" selected disabled>Seleccione un semestre</option>
                                 <option value="Ene-Jun">Ene-Jun</option>
                                <option value="Jul-Dic">Jul-Dic</option>
                                </select>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Guardar</button>
                        </div>
                    </div>
                </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.vistaadministrador', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/sistemaSRCMS/P-SRCMS/resources/views/controlminimo/recursoshumanos/edit.blade.php ENDPATH**/ ?>