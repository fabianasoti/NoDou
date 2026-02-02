<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login_vista.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cálculos Rápidos - NoDou</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <style>
        .calc-container { max-width: 500px; margin: 0 auto; }
        .calc-card { background: white; padding: 25px; border-radius: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); margin-bottom: 20px; }
        .input-row { margin-bottom: 15px; }
        .input-row label { display: block; margin-bottom: 5px; font-weight: bold; color: #5a189a; }
        .input-row input { width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 1rem; }
        .res-box { background: #f0e6ff; padding: 15px; border-radius: 8px; text-align: center; margin-top: 15px; }
        .res-val { font-size: 1.5rem; font-weight: bold; color: #5a189a; }
    </style>
</head>
<body>
    <?php include 'menu.php'; ?>

    <main class="dashboard-container fade-in">
        <h1 style="text-align:center;">🧮 Cálculos Rápidos</h1>

        <div class="calc-container">
            <div class="calc-card">
                <h3>💰 Divisor con Propina</h3>
                <div class="input-row">
                    <label>Monto Total del Ticket</label>
                    <input type="number" id="monto" placeholder="0.00" oninput="calcularPropina()">
                </div>
                <div class="input-row">
                    <label>% de Propina</label>
                    <input type="number" id="propina_pct" value="10" oninput="calcularPropina()">
                </div>
                <div class="input-row">
                    <label>¿Entre cuántos?</label>
                    <input type="number" id="personas" value="2" oninput="calcularPropina()">
                </div>

                <div class="res-box">
                    <p>Cada uno paga:</p>
                    <div class="res-val" id="total_cada_uno">$0.00</div>
                    <small id="detalle_propina">(Incluye $0.00 de propina total)</small>
                </div>
            </div>

            <div class="calc-card">
                <h3>📊 ¿Cuánto es el X%?</h3>
                <div class="input-row">
                    <label>Monto</label>
                    <input type="number" id="monto_pct" placeholder="0.00" oninput="calcSimple()">
                </div>
                <div class="input-row">
                    <label>Porcentaje (%)</label>
                    <input type="number" id="valor_pct" placeholder="%" oninput="calcSimple()">
                </div>
                <div class="res-box">
                    <div class="res-val" id="res_simple">$0.00</div>
                </div>
            </div>
        </div>
    </main>

    <script>
        function calcularPropina() {
            const monto = parseFloat(document.getElementById('monto').value) || 0;
            const pct = parseFloat(document.getElementById('propina_pct').value) || 0;
            const personas = parseInt(document.getElementById('personas').value) || 1;

            const totalPropina = monto * (pct / 100);
            const totalConPropina = monto + totalPropina;
            const porPersona = totalConPropina / personas;

            document.getElementById('total_cada_uno').innerText = `$${porPersona.toFixed(2)}`;
            document.getElementById('detalle_propina').innerText = `(Incluye $${totalPropina.toFixed(2)} de propina total)`;
        }

        function calcSimple() {
            const m = parseFloat(document.getElementById('monto_pct').value) || 0;
            const p = parseFloat(document.getElementById('valor_pct').value) || 0;
            const res = m * (p / 100);
            document.getElementById('res_simple').innerText = `$${res.toFixed(2)}`;
        }
    </script>
</body>
</html>
