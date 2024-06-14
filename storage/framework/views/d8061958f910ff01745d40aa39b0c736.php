<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

        th,
        td {
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
                <th colspan="1" style="width: 30%; text-align:center"><img src="images/logo.png"
                        style="max-width: 100%; height: auto;"></th>
                <th colspan="2" style="width: 100%; text-align:center; font-size: 15px;">Informe de Controles Mínimos de
                    Seguridad</th>
                <th colspan="3" style="width: 20%; text-align:center; font-size: 10px;">Departamento de Análisis e
                    Instrumentación de la Estrategia Digital Nacional</th>
            </tr>
        </thead>
    </table>
    <br>
    <div style="font-size: 13px; display: flex; justify-content: space-between;">
        <strong>Etapa tecnológica: </strong><?php echo e($etapa); ?> <br>
        <strong>Semestre seleccionado: </strong> <?php echo e($semester); ?> <?php echo e($year); ?> <br>
        <strong>Total de controles:</strong> <?php echo e($controles->count()); ?> <br>
        <strong>Controles completos:</strong> <?php echo e($totalCompleto); ?><br>
        <strong>Controles incompletos:</strong> <?php echo e($totalIncompleto); ?><br>
        <strong>Porcentaje de cumplimiento:</strong> <?php echo e($porcentajeCumplimiento); ?>%<br>
    </div>
    <br>
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
                    <?php if($control->cumplimientoControlMinimo->isNotEmpty()): ?>
                    <?php
                    $latestStatus = $control->cumplimientoControlMinimo->last()->statusCumplimiento;
                    ?>
                    <?php if($latestStatus == 'Sí'): ?>
                    <img src="images/chek.png">
                    <?php else: ?>
                    <img src="images/false.png">
                    <?php endif; ?>
                    <?php else: ?>
                    <!-- Manejar el caso en que no haya actualizaciones de cumplimiento -->
                    <span>Sin actualizaciones</span>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <!-- <h1 class="card-header">Gráfica de cumplimiento</h1> -->
    <div style="text-align: center;">
        <div class="footer">
            <p>Generado el: <?php echo e(now()); ?></p>
        </div>

</body>

</html><?php /**PATH /var/www/sistemaSRCMS/P-SRCMS/resources/views/controlminimo/reportepdf.blade.php ENDPATH**/ ?>