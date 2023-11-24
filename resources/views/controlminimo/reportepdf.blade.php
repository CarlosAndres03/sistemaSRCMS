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
        <strong>Etapa tecnológica: </strong>{{ $etapa}} <br>
        <strong>Semestre seleccionado: </strong> {{ $semester }} {{ $year }} <br>
        <strong>Total de controles:</strong> {{ $controles->count() }} <br>
        <strong>Controles completos:</strong> {{ $totalCompleto}}<br>
        <strong>Controles incompletos:</strong> {{ $totalIncompleto}}<br>
        <strong>Porcentaje de cumplimiento:</strong> {{ $porcentajeCumplimiento }}%<br>
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
            @foreach ($controles as $control)
            <tr>
                <td style="text-align:justify; font-size: 12px;">{{ $control->descripcionControlMinimo }}</td>
                <td style="text-align:center; font-size: 12px;">
                    @if ($control->cumplimientoControlMinimo->isNotEmpty())
                    @php
                    $latestStatus = $control->cumplimientoControlMinimo->last()->statusCumplimiento;
                    @endphp
                    @if ($latestStatus == 'Sí')
                    <img src="images/chek.png">
                    @else
                    <img src="images/false.png">
                    @endif
                    @else
                    <!-- Manejar el caso en que no haya actualizaciones de cumplimiento -->
                    <span>Sin actualizaciones</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h1 class="card-header">Gráfica de cumplimiento</h1>
    <div style="text-align: center;">
        <div class="footer">
            <p>Generado el: {{ now() }}</p>
        </div>

</body>

</html>