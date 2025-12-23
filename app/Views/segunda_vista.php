<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Vista estilo Noctua</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fuente sobria -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;500;700&display=swap" rel="stylesheet">

    <style>
        /* =========================
           RESET
        ========================= */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
            font-family: 'Inter', sans-serif;
            overflow: hidden;
        }

        /* =========================
           PALETA NOCTUA
        ========================= */
        :root {
            --beige: #f2e8d5;
            --beige-soft: #faf4ea;
            --brown: #4b3621;
            --brown-dark: #2e1f13;
        }

        /* =========================
           FONDO NOCTUA (ESTÁTICO)
        ========================= */
        body {
            background:
                radial-gradient(circle at center, var(--beige-soft), var(--beige));
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--brown);
        }

        /* =========================
           ROTOR CIRCULAR
        ========================= */
        .rotor {
            position: absolute;
            width: 140vmax;
            height: 140vmax;
            border-radius: 50%;
            background:
                repeating-conic-gradient(from 0deg,
                    rgba(75, 54, 33, 0.08) 0deg 5deg,
                    transparent 5deg 12deg);
            animation: slowRotate 140s linear infinite;
        }

        .rotor::before,
        .rotor::after {
            content: '';
            position: absolute;
            inset: 14%;
            border-radius: 50%;
            border: 2px solid rgba(75, 54, 33, 0.08);
        }

        .rotor::after {
            inset: 26%;
            border-color: rgba(75, 54, 33, 0.05);
        }

        @keyframes slowRotate {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        /* =========================
           CONTENIDO
        ========================= */
        .content {
            position: relative;
            z-index: 10;
            text-align: center;
        }

        .title {
            font-size: 3.2rem;
            font-weight: 700;
            letter-spacing: 3px;
        }

        .subtitle {
            margin-top: 10px;
            font-size: 0.9rem;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: rgba(75, 54, 33, 0.7);
        }

        /* =========================
           BOTONES
        ========================= */
        .actions {
            margin-top: 50px;
            display: flex;
            flex-direction: column;
            gap: 18px;
            align-items: center;
        }

        .btn {
            display: inline-block;
            padding: 14px 42px;
            border-radius: 40px;
            text-decoration: none;
            font-size: 0.75rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--beige-soft);
            background: linear-gradient(135deg, var(--brown), var(--brown-dark));
            box-shadow: 0 8px 25px rgba(75, 54, 33, 0.4);
            transition: all 0.3s ease;
        }

        .btn.secondary {
            background: transparent;
            color: var(--brown);
            border: 1px solid rgba(75, 54, 33, 0.4);
            box-shadow: none;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 16px 35px rgba(75, 54, 33, 0.6);
        }

        .btn.secondary:hover {
            background: rgba(75, 54, 33, 0.05);
            box-shadow: none;
        }

        /* =========================
           FOOTER
        ========================= */
        .footer {
            position: absolute;
            bottom: 20px;
            font-size: 0.7rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: rgba(75, 54, 33, 0.45);
        }
    </style>
</head>

<body>

    <!-- ROTOR -->
    <div class="rotor"></div>

    <!-- CONTENIDO -->
    <div class="content">
        <div class="title">Vista estilo Noctua</div>
        <div class="subtitle">Silencio · Ingeniería · Función</div>

        <div class="actions">
            <!-- Ir a tercera vista -->
            <a href="<?= base_url('tercera_vista'); ?>" class="btn">
                Entrar a NeoTokyo
            </a>

            <!-- Volver al inicio -->
            <a href="<?= base_url('/'); ?>" class="btn secondary">
                Volver
            </a>
        </div>
    </div>

    <div class="footer">
        <?= date('Y'); ?> · No RGB · No Noise
    </div>

</body>

</html>