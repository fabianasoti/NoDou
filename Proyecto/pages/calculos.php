<?php
session_start();
require_once '../config/traductor.php';
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login_vista.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="<?php echo obtener_idioma_actual(); ?>">
<head>
    <meta charset="UTF-8">
    <title><?php echo t('calculos'); ?> - NoDou</title>
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
        <h1 style="text-align:center;">🧮 <?php echo t('calculos'); ?></h1>

        <div class="calc-container">
            <div class="calc-card">
                <h3>💰 <?php echo t('divisor_con_propina'); ?></h3>
                <div class="input-row">
                    <label><?php echo t('monto_total_ticket'); ?></label>
                    <input type="number" id="monto" placeholder="0.00" oninput="calcularPropina()">
                </div>
                <div class="input-row">
                    <label>% <?php echo t('de_propina'); ?></label>
                    <input type="number" id="propina_pct" value="10" oninput="calcularPropina()">
                </div>
                <div class="input-row">
                    <label><?php echo t('entre_cuantos'); ?></label>
                    <input type="number" id="personas" value="2" oninput="calcularPropina()">
                </div>

                <div class="res-box">
                    <p><?php echo t('cada_uno_paga'); ?></p>
                    <div class="res-val" id="total_cada_uno">$0.00</div>
                    <small id="detalle_propina"><?php echo t('detalle_propina'); ?></small>
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
