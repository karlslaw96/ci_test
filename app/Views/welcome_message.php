<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>EL RAYO MACQUIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Font Vaporwave -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&display=swap" rel="stylesheet">

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
            font-family: 'Orbitron', sans-serif;
            overflow: hidden;
        }

        /* =========================
           FONDO VAPORWAVE
        ========================= */
        body {
            background: linear-gradient(135deg,
                    #ff00cc,
                    #333333,
                    #00ffff,
                    #CC0000);
            background-size: 400% 400%;
            animation: bgMove 12s ease infinite;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
        }

        @keyframes bgMove {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* =========================
           GRID + SOL
        ========================= */
        .grid {
            position: absolute;
            bottom: 0;
            width: 200%;
            height: 50%;
            background-image: linear-gradient(rgba(255, 255, 255, 0.2) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.2) 1px, transparent 1px);
            background-size: 40px 40px;
            transform: perspective(500px) rotateX(60deg);
            animation: gridMove 8s linear infinite;
        }

        @keyframes gridMove {
            from {
                background-position: 0 0;
            }

            to {
                background-position: 0 40px;
            }
        }

        .sun {
            position: absolute;
            top: 15%;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, #ffeb3b, #ff4081);
            border-radius: 50%;
            box-shadow: 0 0 60px rgba(255, 64, 129, 0.9);
        }

        /* =========================
           TEXTO GLITCH
        ========================= */
        .container {
            position: relative;
            text-align: center;
            z-index: 10;
        }

        .title {
            font-size: 4rem;
            font-weight: 900;
            letter-spacing: 4px;
            position: relative;
            animation: glitch 2s infinite;
        }

        .title::before,
        .title::after {
            content: 'EL RAYO MACQUIN';
            position: absolute;
            left: 0;
            width: 100%;
            overflow: hidden;
        }

        .title::before {
            color: #00ffff;
            top: -2px;
            animation: glitchTop 2s infinite;
        }

        .title::after {
            color: #ff00cc;
            top: 2px;
            animation: glitchBottom 1.5s infinite;
        }

        @keyframes glitch {
            0% {
                transform: none;
            }

            20% {
                transform: skew(-2deg);
            }

            40% {
                transform: skew(2deg);
            }

            60% {
                transform: skew(-1deg);
            }

            80% {
                transform: skew(1deg);
            }

            100% {
                transform: none;
            }
        }

        @keyframes glitchTop {
            0% {
                clip-path: inset(0 0 80% 0);
            }

            50% {
                clip-path: inset(0 0 40% 0);
            }

            100% {
                clip-path: inset(0 0 80% 0);
            }
        }

        @keyframes glitchBottom {
            0% {
                clip-path: inset(60% 0 0 0);
            }

            50% {
                clip-path: inset(20% 0 0 0);
            }

            100% {
                clip-path: inset(60% 0 0 0);
            }
        }

        .subtitle {
            margin-top: 20px;
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.8);
            text-shadow: 0 0 10px rgba(0, 255, 255, 0.8);
        }

        .footer {
            position: absolute;
            bottom: 20px;
            font-size: 0.75rem;
            opacity: 0.7;
        }
    </style>
</head>

<body>

    <div class="sun"></div>
    <div class="grid"></div>

    <div class="container">
        <div class="title">EL RAYO MACQUIN</div>
        <div class="subtitle">
            PSICODELIA • VAPORWAVE • CODEIGNITER
        </div>
    </div>

    <div class="footer">
        <?= date('Y'); ?> · REALIDAD DISTORSIONADA ACTIVADA y la gallina que cacarea es la que pone el huevo
    </div>

</body>

</html>