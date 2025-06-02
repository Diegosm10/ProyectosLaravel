<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte Mensual</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
            margin: 20px;
            color: #1f2937;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #111827;
        }

        h2 {
            font-size: 18px;
            margin-top: 20px;
            color: #1d4ed8;
        }

        h3 {
            font-size: 16px;
            margin-top: 15px;
            color: #2563eb;
        }

        .section {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            background-color: #f9fafb;
        }

        .machine {
            margin-left: 15px;
            margin-top: 10px;
            padding: 8px;
            background-color: #ffffff;
            border: 1px solid #d1d5db;
            border-radius: 4px;
        }

        ul {
            margin: 5px 0 5px 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #d1d5db;
            padding: 6px 8px;
            text-align: left;
        }

        th {
            background-color: #f3f4f6;
        }

        .resumen-final {
            margin-top: 10px;
            padding: 10px;
            background-color: #fef3c7; /* yellow-100 */
            border: 1px solid #fde68a; /* yellow-300 */
            border-radius: 4px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Reporte Mensual - {{ \Carbon\Carbon::parse($startMonth)->format('F Y') }}</h1>

    @foreach ($provinces as $province)
        @php
            $totalKmProvincia = 0;
            $totalMantenimientosProvincia = 0;
        @endphp

        <div class="section">
            <h2>Provincia: {{ $province->name }}</h2>

            @forelse ($province->constructions as $obra)
                <div class="section">
                    <h3>Obra: {{ $obra->name }}</h3>
                    <p><strong>Inicio:</strong> {{ $obra->start_date }} | <strong>Fin:</strong> {{ $obra->end_date ?? 'En curso' }}</p>

                    @forelse ($obra->constructionMachines as $cm)
                        <div class="machine">
                            <p><strong>Máquina:</strong> {{ $cm->machine->brand_model }}</p>
                            <p><strong>Tipo:</strong> {{ $cm->machine->typeMachine->name ?? 'N/D' }}</p>
                            <p><strong>KM Recorridos:</strong> {{ $cm->km_traveled }} km</p>

                            @php
                                $totalKmProvincia += $cm->km_traveled;
                                $totalMantenimientosProvincia += $cm->maintenances->count();
                            @endphp

                            @if ($cm->maintenances->count())
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Descripción</th>
                                            <th>KM mantenimiento</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cm->maintenances as $mnt)
                                            <tr>
                                                <td>{{ $mnt->date }}</td>
                                                <td>{{ $mnt->description }}</td>
                                                <td>{{ $mnt->kilometers_maintenance }} km</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>🔧 Sin mantenimientos registrados este mes.</p>
                            @endif
                        </div>
                    @empty
                        <p>Sin máquinas asignadas a esta obra.</p>
                    @endforelse
                </div>
            @empty
                <p>No hay obras activas en esta provincia durante este mes.</p>
            @endforelse

            <div class="resumen-final">
                <p>🔁 Resumen de {{ $province->name }}:</p>
                <p>Total kilómetros recorridos: {{ number_format($totalKmProvincia, 0, ',', '.') }} km</p>
                <p>Total mantenimientos realizados: {{ $totalMantenimientosProvincia }}</p>
            </div>
        </div>
    @endforeach
</body>
</html>