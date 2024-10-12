@extends('layouts.app-master')

@section('title', 'Editar Perfil Estudiante')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6 max-w-4xl m-auto">Perfil del Estudiante</h1>
    @if (session('success'))
    <div id="success-message" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 transition-opacity duration-1000 opacity-100 max-w-4xl m-auto">
        <p>{{ session('success') }}</p>
    </div>
    @endif

    <div class="flex gap-4 justify-end max-w-4xl m-auto">
            <!-- Botón para habilitar el modo de edición -->
            <button id="edit-button" class="bg-blue-500 text-white px-4 py-2 mb-6 rounded" onclick="enableEdit()">Editar Perfil</button>
        
            <!-- Botón para cancelar el modo de edición (oculto inicialmente) -->
            <button id="cancel-button" class="bg-red-500 text-white px-4 py-2 mb-6 rounded hidden" onclick="cancelEdit()">Cancelar Edición</button>
    </div>
    <div class="max-w-4xl m-auto">
        <form action="{{ route('profile.update', $data['profile']->user_id) }}" method="POST">
            @csrf
            @method('PUT')
    
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Cada input con su respectivo label -->
                <div>
                    <label for="first_name" class="block text-gray-700">Primer Nombre</label>
                    <input type="text" id="first_name" name="first_name" value="{{ $data['profile']->user->first_name }}" class="border border-gray-300 p-2 w-full" disabled>
                </div>

                <div>
                    <label for="second_name" class="block text-gray-700">Segundo Nombre</label>
                    <input type="text" id="second_name" name="second_name" value="{{ $data['profile']->user->second_name }}" class="border border-gray-300 p-2 w-full" disabled>
                </div>

                <div>
                    <label for="first_lastname" class="block text-gray-700">Primer Apellido</label>
                    <input type="text" id="first_lastname" name="first_lastname" value="{{ $data['profile']->user->first_lastname }}" class="border border-gray-300 p-2 w-full" disabled>
                </div>

                <div>
                    <label for="second_lastname" class="block text-gray-700">Segundo Apellido</label>
                    <input type="text" id="second_lastname" name="second_lastname" value="{{ $data['profile']->user->second_lastname }}" class="border border-gray-300 p-2 w-full" disabled>
                </div>

                <div>
                    <label for="document_type" class="block text-gray-700">Tipo de Documento</label>
                    <select id="document_type" name="document_type" value="{{ $data['profile']->document_type }}" class="border border-gray-300 p-2 w-full" disabled>
                        <option value="CC">CC</option>
                        <option value="TI">TI</option>
                        <option value="CE">CE</option>    
                    </select>
                </div>

                <div>
                    <label for="document_number" class="block text-gray-700">Número de Documento</label>
                    <input type="text" id="document_number" name="document_number" value="{{ $data['profile']->document_number }}" class="border border-gray-300 p-2 w-full" disabled>
                </div>

                <div>
                    <label for="zone" class="block text-gray-700">Zona</label>
                    <select id="zone" name="zone" value="{{ $data['profile']->zone }}" class="border border-gray-300 p-2 w-full" disabled> 
                        <option value="Urbana">Urbana</option>
                        <option value="Rural">Rural</option>
                    </select>
                </div>

                <div>
                    <label for="birth_date" class="block text-gray-700">Fecha de Nacimiento</label>
                    <input type="date" id="birth_date" name="birth_date" value="{{ $data['profile']->birth_date }}" class="border border-gray-300 p-2 w-full" disabled>
                </div>

                <div>
                    <label for="age" class="block text-gray-700">Edad</label>
                    <input type="text" id="age" name="age" value="{{ $data['profile']->age }}" class="border border-gray-300 p-2 w-full" disabled>
                </div>

                <div>
                    <label for="marital_status" class="block text-gray-700">Estado Civil</label>
                    <select type="text" id="marital_status" name="marital_status" value="{{ $data['profile']->marital_status }}" class="border border-gray-300 p-2 w-full" disabled>
                        <option value="Soltero">Soltero</option>
                        <option value="Casado">Casado</option>
                        <option value="Unión Libre">Unión Libre</option>
                        <option value="Viudo">Viudo</option>
                    </select>   
                </div>

                <div>
                    <label for="has_children" class="block text-gray-700">¿Tiene Hijos?</label>
                    <input type="number" id="has_children" name="has_children" value="{{ $data['profile']->has_children }}" class="border border-gray-300 p-2 w-full" disabled>
                </div>

                <div>
                    <label for="address" class="block text-gray-700">Dirección</label>
                    <input type="text" id="address" name="address" value="{{ $data['profile']->address }}" class="border border-gray-300 p-2 w-full" disabled>
                </div>

                <div>
                    <label for="phone" class="block text-gray-700">Teléfono</label>
                    <input type="text" id="phone" name="phone" value="{{ $data['profile']->phone }}" class="border border-gray-300 p-2 w-full" disabled>
                </div>

                <div>
                    <label for="department" class="block text-gray-700">Departamento</label>
                    <select id="department_id" name="department_id" class="border border-gray-300 p-2 w-full" disabled>
                        <option value="">Selecciona un departamento</option>
                        @foreach ($data['departments'] as $departmentGroup)
                            @foreach ($departmentGroup as $department)
                                <option value="{{ $department->id }}">
                                    {{ $department->id == $data['profile']->department_id ? 'selected' : '' }}>
                                    {{ $department->department }}, {{ $department->city }}
                                </option>
                            @endforeach
                        @endforeach
                    </select>
                </div>
                

                <div>
                    <label for="city" class="block text-gray-700">Ciudad</label>
                    <input type="text" id="city" name="city" value="{{ $data['profile']->city->city ?? '' }}" class="border border-gray-300 p-2 w-full" disabled>
                </div>
                {{-- health regime --}}
                <div>
                    <label for="health_regime" class="block text-gray-700">Régimen de Salud</label>
                    <select id="health_regime" name="health_regime" value="{{ $data['profile']->health_regime }}" class="border border-gray-300 p-2 w-full" disabled>
                        <option value="Contributivo EPS">Contributivo EPS</option>
                        <option value="Subsidiado Sisbén">Subsidiado sisben</option>
                        <option value="Régimen especial">Régimen especial</option>
                        <option value="Medicina prepagada">Medicina prepagada</option>
                        <option value="Ninguna">Ninguna</option>
                    </select>
                </div>

                @if ($data['profile']->health_regime == 'Contributivo EPS')
                    <div>
                        <label for="eps" class="block text-gray-700">Nombre de la EPS</label>
                        <input type="text" id="eps_name" name="eps_name" value="{{ $data['profile']->eps_name }}" class="border border-gray-300 p-2 w-full" disabled>
                    </div>                    
                @endif

                @if ($data['profile']->health_regime == 'Subsidiado Sisbén')
                    <select name="sisben_classification" id="sisben_classification" value="{{ $data['profile']->sisben_classification }}">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>    
                
                @endif

                {{-- Academic Program --}}
                <div>
                    <label for="academic_program" class="block text-gray-700">Programa Académico</label>
                    <select type="text" id="academic_program" name="academic_program" value="{{ $data['profile']->academic_program }}" class="border border-gray-300 p-2 w-full" disabled>
                        <option value="Administración de Negocios Internacionales">Administración de Negocios Internacionales</option>
                        <option value="Comunicación Social">Comunicación Social</option>
                        <option value="Ingeniería Agroindustrial">Ingeniería Agroindustrial</option>
                        <option value="Ingeniería Agronómica">Ingeniería Agronómica</option>
                        <option value="Ingeniería de Producción">Ingeniería de Producción</option>
                        <option value="Ingeniería Informática">Ingeniería Informática</option>
                        <option value="Licenciatura en Artes">Licenciatura en Artes</option>
                        <option value="Medicina Veterinaria y Zootecnia">Medicina Veterinaria y Zootecnia</option>
                        <option value="Técnico profesional en Operación del Transporte Multimodal">Técnico profesional en Operación del Transporte Multimodal</option>
                        <option value="Química">Química</option>
                        <option value="Tecnología en Operación de Sistemas Electromecánicos">Tecnología en Operación de Sistemas Electromecánicos</option>
                        <option value="Tecnología en Logística de Transporte Multimodal">Tecnología en Logística de Transporte Multimodal</option>
                        <option value="Ingeniería Ambiental y de Saneamiento">Ingeniería Ambiental y de Saneamiento</option>
                        <option value="Tecnología en Seguridad y Salud en el Trabajo">Tecnología en Seguridad y Salud en el Trabajo</option>
                        <option value="Tecnología en Obras Civiles">Tecnología en Obras Civiles</option>
                        <option value="Trabajo Social">Trabajo Social</option>
                        <option value="Tecnología en Procesamiento de Alimentos">Tecnología en Procesamiento de Alimentos</option>
                        <option value="Ingeniería en Seguridad y Salud en el Trabajo">Ingeniería en Seguridad y Salud en el Trabajo</option>
                        <option value="Especialización Tecnológica en Control de Calidad de Biocombustibles Líquidos">Especialización Tecnológica en Control de Calidad de Biocombustibles Líquidos</option>
                        <option value="Especialización en Gerencia de Proyectos Culturales">Especialización en Gerencia de Proyectos Culturales</option>
                        <option value="Especialización en Agronegocios">Especialización en Agronegocios</option>
                    </select>
                </div>

                {{-- Schedule --}}
                <div>
                    <label for="schedule" class="block text-gray-700">Horario</label>
                    <select id="schedule" name="schedule" value="{{ $data['profile']->schedule }}" class="border border-gray-300 p-2 w-full" disabled>
                        <option value="Diurno">Diurno</option>
                        <option value="Nocturno">Nocturno</option>
                    </select>
                </div>

                <div>
                    <label for="disability" class="block text-gray-700">Discapacidad</label>
                    <input type="text" id="disability" name="disability" value="{{ $data['profile']->disability }}" class="border border-gray-300 p-2 w-full" disabled>
                </div>
            </div>
            
            <!-- Botón de Actualizar (solo visible en modo edición) -->
            <button id="update-button" type="submit" class="bg-green-500 text-white px-4 py-2 rounded hidden w-full mt-4">Actualizar Perfil</button>
        </form>
    </div>
</div>

<script>

    document.addEventListener('DOMContentLoaded', function() {
            const successMessage = document.getElementById('success-message');
            if (successMessage) {
                setTimeout(() => {
                    successMessage.classList.add('opacity-0');
                    setTimeout(() => {
                        successMessage.style.display = 'none';
                    }, 1000); // Tiempo para que termine la transición
                }, 2000); // 2000 milisegundos = 2 segundos
            }
        });


    function enableEdit() {
        console.log('Habilitar edición');
        // Habilitar todos los inputs excepto nombres y apellidos
        document.getElementById('document_type').disabled = false;
        document.getElementById('document_number').disabled = false;
        document.getElementById('zone').disabled = false;
        document.getElementById('birth_date').disabled = false;
        document.getElementById('age').disabled = false;
        document.getElementById('marital_status').disabled = false;
        document.getElementById('has_children').disabled = false;
        document.getElementById('address').disabled = false;
        document.getElementById('phone').disabled = false;
        document.getElementById('department_id').disabled = false;
        document.getElementById('city').disabled = false;
        document.getElementById('health_regime').disabled = false;
        document.getElementById('academic_program').disabled = false;
        document.getElementById('schedule').disabled = false;
        // document.getElementById('eps_name').disabled = false;
        // document.getElementById('sisben_classification').disabled = false;

        // Mostrar botones de actualizar y cancelar
        const updateButton = document.getElementById('update-button');
        const cancelButton = document.getElementById('cancel-button');
        const editButton = document.getElementById('edit-button');

        updateButton.classList.remove('hidden');
        cancelButton.classList.remove('hidden');
        editButton.classList.add('hidden');

        // Deshabilitar botón de edición
        document.getElementById('edit-button').disabled = true;
    }

    function cancelEdit() {
        // Deshabilitar todos los inputs
        document.getElementById('document_type').disabled = true;
        document.getElementById('document_number').disabled = true;
        document.getElementById('zone').disabled = true;
        document.getElementById('birth_date').disabled = true;
        document.getElementById('age').disabled = true;
        document.getElementById('marital_status').disabled = true;
        document.getElementById('has_children').disabled = true;
        document.getElementById('address').disabled = true;
        document.getElementById('phone').disabled = true;
        document.getElementById('department_id').disabled = true;
        document.getElementById('city').disabled = true;
        document.getElementById('health_regime').disabled = true;
        document.getElementById('academic_program').disabled = true;
        document.getElementById('schedule').disabled = true;
        // document.getElementById('eps_name').disabled = true;

        // Ocultar botones de actualizar y cancelar
        document.getElementById('update-button').classList.add('hidden');
        document.getElementById('cancel-button').classList.add('hidden');

        // Habilitar botón de edición
        const editButton = document.getElementById('edit-button');
        editButton.classList.remove('hidden');
        editButton.disabled = false;
    }
</script>
<style>
    .transition-opacity {
        transition: opacity 1s ease-in-out;
    }
</style>
@endsection
