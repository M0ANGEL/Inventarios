<x-app-layout>
    <style>
        body {
            background: white;
        }
        .filter-container {
            display: flex;
            justify-content: center; /* Centra el formulario horizontalmente */
            margin: 20px; /* Espacio alrededor del contenedor */
        }

        form {
            display: flex;
            flex-wrap: wrap; /* Permite que los elementos se ajusten en varias líneas si es necesario */
            align-items: center; /* Alinea verticalmente los elementos */
            gap: 10px; /* Espacio entre los elementos */
            max-width: 100%; /* Asegura que el formulario no se expanda más allá del contenedor */
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        label{
            font-weight: bold;
        }

        x-input {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            flex: 1; /* Hace que el campo de entrada ocupe el espacio disponible */
        }

        .btn-filter {
            background: #0496ff;
            padding: 10px 15px;
            border-radius: 5px;
            border: 2px solid black;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
            margin-top: 30px;
        }

        .btn-filter:hover {
            background: #0373e3; /* Color de hover */
        }

    </style>

    <div class="filter-container">
        <form action="{{ route('graficoActivos.index') }}" method="GET">
            <div class="form-group">
                <label for="start_date">Fecha de Inicio:</label>
                <x-input type="date" id="start_date" name="start_date" value="{{ request('start_date') }}" />
            </div>
            
            <div class="form-group">
                <label for="end_date">Fecha de Fin:</label>
                <x-input type="date" id="end_date" name="end_date" value="{{ request('end_date') }}" />
            </div>

            <button type="submit" class="btn-filter"><b>Filtrar</b></button>
        </form>
    </div>


    <div style="width: 80%; margin: auto;">
        <canvas id="myChart"></canvas>
    </div>

    <script>
        const ctx = document.getElementById('myChart').getContext('2d');

        // Obtener los datos del controlador
        const data = @json($datos);

        // Extraer las empresas y las cantidades
        const labels = data.map(item => item.empresa);
        const values = data.map(item => item.cantidad);

        // Configuración del gráfico
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels, // Etiquetas para el eje X
                datasets: [{
                    label: 'Cantidad de Equipos',
                    data: values, // Valores para el gráfico
                    backgroundColor: ['#6bf1ab','#63d69f', '#438c6c', '#509c7f', '#1f794e', '#34444c', '#90CAF9', '#64B5F6', '#42A5F5', '#2196F3', '#0D47A1'],
                    borderColor: '#1E88E5',
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return value; // Muestra los valores sin porcentaje
                            }
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Cliente'
                        }
                    }
                }
            }
        });
    </script>

</x-app-layout>
