<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Informe PDF</title>
    <style>
        /* Define estilos CSS según tus necesidades */
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
<table style="width: 100%; margin: 0 auto; border-collapse: collapse;">
        <thead>
            <tr>
            <th colspan="1" style="width: 30%; text-align:center"><img src="images/logo.png" style="max-width: 100%; height: auto;"></th>
            <th colspan="2" style="width: 100%; text-align:center; font-size: 15px;">Informe de Controles Mínimos de Seguridad</th>
            <th colspan="3" style="width: 20%; text-align:center; font-size: 10px;">Departamento de Análisis e Instrumentación de la Estrategia Digital Nacional</th>
            </tr>
        </thead>
    </table>

    <p style="font-size: 12px;"><strong>Total de Controles:</strong> <?php echo e($controles->count()); ?></p>
    <p style="font-size: 12px;"><strong>Total Completo:</strong> <?php echo e($controlCompleto->count()); ?></p>
    <p style="font-size: 12px;"><strong>Total Incompleto:</strong> <?php echo e($controlIncompleto->count()); ?></p>
    <p style="font-size: 12px;"><strong>Porcentaje de Cumplimiento:</strong> <?php echo e($porcentajeCumplimiento); ?>%</p>

    <table>
        <thead>
            <tr>
            <th style="text-align:center; font-size: 15px;">Control mínimo</th>
                <th style="text-align:center; font-size: 15px;">¿Se implementó?</th>
                <!-- Agrega más columnas según tus datos -->
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $controles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $control): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td style="text-align:justify; font-size: 12px;"><?php echo e($control->descripcionControlMinimo); ?></td>
                    <td style="text-align:center; font-size: 12px;">
                    <?php if($control->statusCumplimiento == 'Sí'): ?>
                            <img src="images/chek.png">
                        <?php else: ?>
                            <img src="images/false.png">
                        <?php endif; ?>
                                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <h1 class="card-header">Gráfica de cumplimiento</h1>
    <div class="footer">
        <p>Generado el: <?php echo e(now()); ?></p>
    </div>

</body>
</html>
<?php /**PATH /var/www/sistemaSRCMS/P-SRCMS/resources/views/controlminimo/planeacion/reportepdf.blade.php ENDPATH**/ ?>