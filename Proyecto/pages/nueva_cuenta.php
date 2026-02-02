<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login_vista.php");
    exit();
}
require_once '../config/conexion.php';

$usuario_id = $_SESSION['usuario_id'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Cuenta - NoDou</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <style>
        .form-section { 
            background: white; 
            padding: 25px; /* Más espacio interno */
            border-radius: 15px; 
            margin-bottom: 25px; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.05); 
        }

        .step-title { 
            color: #5a189a; 
            border-bottom: 2px solid #f0e6ff; 
            margin-bottom: 20px; 
            padding-bottom: 10px; 
            font-size: 1.2rem;
        }

        /* --- MEJORAS EN LA FILA DE PARTICIPANTES --- */
        .fila-participante { 
            display: flex; 
            align-items: center; 
            gap: 15px; /* Más espacio entre nombre, % y precio */
            margin-bottom: 15px; 
            padding: 10px; 
            background: #FAFAFA; 
            border: 1px solid #eee;
            border-radius: 12px; 
            transition: background 0.3s;
        }

        .fila-participante:hover {
            background: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            border-color: #ddd;
        }

        /* El input del nombre ahora ocupa todo el espacio disponible */
        .fila-participante input[type="text"] { 
            flex-grow: 1; /* Crece para ocupar espacio vacío */
            width: auto; /* Se adapta */
            min-width: 150px; /* Nunca será demasiado pequeño */
            margin: 0; 
            padding: 12px;
            font-size: 1rem;
        }

        .info-calculo { 
            min-width: 80px; /* Espacio fijo para el precio */
            text-align: right; 
            font-weight: bold; 
            color: var(--indigo); 
            font-size: 1rem; 
        }

        .input-pct { 
            width: 70px !important; 
            margin: 0 !important; 
            text-align: center; 
            font-weight: bold;
        }

        /* Botón de Eliminar (X) más estético */
        .btn-remove { 
            background: #ffebEE; 
            color: #d32f2f; 
            border: 1px solid #ffcdd2; 
            width: 36px;
            height: 36px;
            border-radius: 50%; /* Redondo */
            cursor: pointer; 
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
            margin-left: 5px;
            padding: 0; /* Reset del padding */
        }

        .btn-remove:hover {
            background: #d32f2f;
            color: white;
            border-color: #b71c1c;
            transform: scale(1.1);
        }

        /* Botón Añadir Persona / Artículo */
        .btn-add { 
            background: #e8f5e9; 
            color: #2e7d32; 
            border: 1px solid #c8e6c9;
            padding: 12px 20px; 
            border-radius: 8px; 
            cursor: pointer; 
            font-size: 0.95rem; 
            font-weight: 600;
            width: 100%; /* Ocupa todo el ancho para ser fácil de tocar */
            transition: all 0.2s;
            margin-top: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-add:hover {
            background: #2e7d32;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(46, 125, 50, 0.2);
        }

        /* --- ESTILOS ARTÍCULOS --- */
        .item-row { 
            display: flex; 
            flex-wrap: wrap; 
            gap: 12px; 
            align-items: center; 
            border: 1px solid #eee;
            padding: 15px; 
            border-radius: 12px;
            margin-bottom: 15px; 
            background: #fafafa;
        }

        .item-row input { margin: 0 !important; }

        .participantes-item { 
            width: 100%; 
            display: flex; 
            gap: 8px; 
            flex-wrap: wrap; 
            margin-top: 10px; 
            padding-top: 10px;
            border-top: 1px dashed #ddd;
        }

        .check-pill { 
            background: white; 
            border: 1px solid #ddd;
            padding: 6px 14px; 
            border-radius: 20px; 
            font-size: 0.85rem; 
            cursor: pointer; 
            user-select: none; 
            transition: all 0.2s;
        }

        .check-pill:hover { background: #f0f0f0; }

        .check-pill.active { 
            background: var(--indigo); 
            color: white; 
            border-color: var(--indigo);
            box-shadow: 0 2px 5px rgba(63, 81, 181, 0.3);
        }

        .hidden { display: none; }
    </style>
</head>

<body>
    <?php include 'menu.php'; ?>

    <main class="dashboard-container fade-in">
        <h1>➕ Registrar Nuevo Gasto</h1>

        <form action="../backend/guardar_gasto.php" method="POST" id="formGasto">

            <section class="form-section">
                <h2 class="step-title">1. Información del Gasto</h2>

                <div class="input-group">
                    <label>Título (ej: Cena Pizza)</label>
                    <input type="text" name="titulo" placeholder="¿Qué compraste?" required>
                </div>

                <div class="input-group">
                    <label>Fecha</label>
                    <input type="date" name="fecha_gasto" 
                           value="<?php echo date('Y-m-d'); ?>" required>
                </div>

                <div class="input-group">
                    <label>Método de División</label>
                    <select name="metodo_division" id="metodo_division" onchange="cambiarMetodo()">
                        <option value="iguales">Por partes iguales</option>
                        <option value="porcentaje">Por porcentaje (%)</option>
                        <option value="articulos">Por artículos (Detallado)</option>
                    </select>
                </div>

                <div class="input-group">
                    <label>Monto Total ($)</label>
                    <input type="number" step="0.01" name="monto_total" id="monto_total" 
                           placeholder="0.00" oninput="recalcular()" required>
                    <small id="aviso-auto" style="display:none; color: var(--indigo); font-weight:bold; margin-top:5px;">
                        🤖 Calculado automáticamente por la suma de artículos.
                    </small>
                </div>
            </section>

            <section class="form-section">
                <h2 class="step-title">2. Participantes</h2>
                <div id="container-participantes"></div>

                <button type="button" class="btn-add" onclick="agregarParticipante()">
                    <span>👤</span> Añadir Persona
                </button>
            </section>

            <section class="form-section hidden" id="seccion-articulos">
                <h2 class="step-title">3. Detalle de Artículos</h2>
                <p><small>Añade los ítems del ticket y selecciona quién consumió cada uno.</small></p>

                <div id="container-articulos"></div>

                <button type="button" class="btn-add" onclick="agregarArticulo()">
                    <span>🛒</span> Añadir Artículo
                </button>
            </section>

            <button type="submit" class="btn-login" 
                    style="width: 100%; background: #5a189a; color: white; margin-top:20px; padding: 15px; font-size: 1.1rem;">
                💾 Guardar Gasto
            </button>
        </form>
    </main>

    <script>
        /* ===========================
           0. ESTADO INICIAL
        ============================ */
        let participantes = [
            { id: 1, nombre: 'Yo' },
            { id: 2, nombre: '' }
        ];

        document.addEventListener('DOMContentLoaded', () => {
            renderizarParticipantes();
        });

        /* ===========================
           1. PARTICIPANTES
        ============================ */
        function renderizarParticipantes() {
            const container = document.getElementById('container-participantes');
            const metodo = document.getElementById('metodo_division').value;

            container.innerHTML = '';

            participantes.forEach((p, index) => {
                const div = document.createElement('div');
                div.className = 'fila-participante';

                let html = `
                    <input type="text" 
                           name="nombres[]" 
                           value="${p.nombre}" 
                           placeholder="Nombre participante" 
                           oninput="actualizarNombre(${index}, this.value)" 
                           required>

                    <input type="hidden" 
                           name="montos_finales[]" 
                           id="input-monto-${index}" 
                           value="0">
                `;

                if (metodo === 'porcentaje') {
                    html += `
                        <input type="number" 
                               name="porcentajes[]" 
                               class="input-pct" 
                               placeholder="%" 
                               step="0.1" 
                               oninput="recalcular()" 
                               value="${p.porcentaje || 0}"> %
                    `;
                }

                html += `<div class="info-calculo" id="pago-${index}">$0.00</div>`;

                if (participantes.length > 1) {
                    html += `
                        <button type="button" 
                                class="btn-remove" 
                                title="Eliminar participante"
                                onclick="eliminarParticipante(${index})">×</button>
                    `;
                }

                div.innerHTML = html;
                container.appendChild(div);
            });

            if (metodo === 'articulos') {
                renderizarArticulos();
            }

            recalcular();
        }

        function agregarParticipante() {
            participantes.push({ id: Date.now(), nombre: '' });
            renderizarParticipantes();
        }

        function eliminarParticipante(index) {
            participantes.splice(index, 1);
            renderizarParticipantes();
        }

        function actualizarNombre(index, valor) {
            participantes[index].nombre = valor;

            if (document.getElementById('metodo_division').value === 'articulos') {
                document.querySelectorAll(`.label-nombre-${index}`)
                    .forEach(span => span.innerText = valor || 'Persona ' + (index + 1));
            }
        }

        /* ===========================
           2. MÉTODO DE DIVISIÓN
        ============================ */
        function cambiarMetodo() {
            const metodo = document.getElementById('metodo_division').value;
            const seccionArticulos = document.getElementById('seccion-articulos');
            const inputTotal = document.getElementById('monto_total');
            const aviso = document.getElementById('aviso-auto');

            if (metodo === 'articulos') {
                seccionArticulos.classList.remove('hidden');
                inputTotal.readOnly = true;
                inputTotal.style.backgroundColor = '#e9ecef';
                aviso.style.display = 'block';

                if (document.getElementById('container-articulos').children.length === 0) {
                    agregarArticulo();
                }
            } else {
                seccionArticulos.classList.add('hidden');
                inputTotal.readOnly = false;
                inputTotal.style.backgroundColor = '#FAFAFA';
                aviso.style.display = 'none';
            }

            renderizarParticipantes();
        }

        /* ===========================
           3. ARTÍCULOS
        ============================ */
        function agregarArticulo() {
            const container = document.getElementById('container-articulos');
            const div = document.createElement('div');
            div.className = 'item-row';

            let checksHtml = '';
            participantes.forEach((p, idx) => {
                checksHtml += `
                    <label class="check-pill">
                        <input type="checkbox" 
                               name="articulos_owners[]" 
                               value="${idx}" 
                               onchange="togglePill(this); recalcular()">

                        <span class="label-nombre-${idx}">
                            ${p.nombre || 'Persona ' + (idx + 1)}
                        </span>
                    </label>
                `;
            });

            div.innerHTML = `
                <input type="text" 
                       name="articulos_nombres[]" 
                       placeholder="Item (ej. Cervezas)" 
                       style="flex-grow: 2; min-width: 150px;">

                <input type="number" 
                       step="0.01" 
                       name="articulos_precios[]" 
                       placeholder="$0.00" 
                       class="precio-articulo" 
                       style="width: 100px;" 
                       oninput="recalcular()">

                <button type="button" 
                        class="btn-remove" 
                        title="Eliminar artículo"
                        onclick="this.parentElement.remove(); recalcular()">×</button>

                <div class="participantes-item">
                    ${checksHtml}
                </div>
            `;

            container.appendChild(div);
        }

        function togglePill(checkbox) {
            checkbox.parentElement.classList.toggle('active', checkbox.checked);
        }

        /* ===========================
           4. CÁLCULOS
        ============================ */
        function recalcular() {
            const metodo = document.getElementById('metodo_division').value;
            const inputTotal = document.getElementById('monto_total');

            let total = parseFloat(inputTotal.value) || 0;
            let pagos = new Array(participantes.length).fill(0);

            if (metodo === 'iguales') {
                if (participantes.length > 0) {
                    const montoIndividual = total / participantes.length;
                    pagos.fill(montoIndividual);
                }
            } else if (metodo === 'porcentaje') {
                const inputsPct = document.getElementsByName('porcentajes[]');
                inputsPct.forEach((input, idx) => {
                    const pct = parseFloat(input.value) || 0;
                    pagos[idx] = total * (pct / 100);
                });
            } else if (metodo === 'articulos') {
                let sumaTotalArticulos = 0;
                const filasItems = document.querySelectorAll('.item-row');

                filasItems.forEach(fila => {
                    const precio = parseFloat(
                        fila.querySelector('.precio-articulo').value
                    ) || 0;

                    sumaTotalArticulos += precio;

                    const checks = fila.querySelectorAll('input[type="checkbox"]:checked');

                    if (checks.length > 0) {
                        const parte = precio / checks.length;
                        checks.forEach(chk => {
                            const idxParticipante = parseInt(chk.value);
                            pagos[idxParticipante] += parte;
                        });
                    }
                });

                inputTotal.value = sumaTotalArticulos.toFixed(2);
            }

            pagos.forEach((monto, idx) => {
                const el = document.getElementById(`pago-${idx}`);
                const inputHidden = document.getElementById(`input-monto-${idx}`);

                if (el) el.innerText = `$${monto.toFixed(2)}`;
                if (inputHidden) inputHidden.value = monto.toFixed(2);
            });
        }
    </script>
</body>
</html>
