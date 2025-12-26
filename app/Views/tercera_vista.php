<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>ShiroTokyo // Third View</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Fuentes: japonés + lectura -->
    <link
        href="https://fonts.googleapis.com/css2?family=Shippori+Mincho:wght@500;700&family=Zen+Maru+Gothic:wght@500;700&display=swap"
        rel="stylesheet">

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
        }

        body {
            overflow: hidden;
        }

        :root {
            /* tradicional japonés */
            --washi1: #faf7f1;
            --washi2: #f3efe6;
            --ink: #141312;
            --inkSoft: rgba(20, 19, 18, .70);

            --vermillion: #c1121f;
            /* aka / bermellón */
            --gold: #c8a45a;
            --wood: #a07d4f;
            --wood2: #8a6a42;

            --line: rgba(20, 19, 18, .18);
            --shadow: 0 26px 70px rgba(0, 0, 0, .20);
        }

        /* =========================
           BACKGROUND: washi + patrones
        ========================= */
        body {
            font-family: 'Zen Maru Gothic', system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
            color: var(--ink);
            display: grid;
            place-items: center;
            background:
                radial-gradient(1100px 700px at 20% 18%, rgba(193, 18, 31, .08), transparent 55%),
                radial-gradient(900px 520px at 86% 78%, rgba(20, 19, 18, .06), transparent 58%),
                linear-gradient(180deg, var(--washi1), var(--washi2));
            position: relative;
        }

        /* grano de papel */
        .washi-grain {
            position: absolute;
            inset: 0;
            pointer-events: none;
            opacity: .12;
            background-image:
                radial-gradient(circle at 20% 30%, rgba(0, 0, 0, .14) 1px, transparent 1px),
                radial-gradient(circle at 80% 70%, rgba(0, 0, 0, .10) 1px, transparent 1px);
            background-size: 4px 4px, 5px 5px;
            mix-blend-mode: multiply;
            filter: blur(.2px);
        }

        /* patrón seigaiha (olas) arriba */
        .pattern-seigaiha {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            height: 220px;
            pointer-events: none;
            opacity: .18;
            background:
                radial-gradient(circle at 12px 14px, transparent 11px, rgba(20, 19, 18, .18) 12px, transparent 13px) 0 0/24px 24px,
                radial-gradient(circle at 12px 14px, transparent 6px, rgba(193, 18, 31, .16) 7px, transparent 8px) 0 0/24px 24px;
            mask-image: linear-gradient(to bottom, rgba(0, 0, 0, 1), rgba(0, 0, 0, 0));
        }

        /* patrón asanoha (cáñamo) abajo */
        .pattern-asanoha {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            height: 240px;
            pointer-events: none;
            opacity: .12;
            background:
                linear-gradient(60deg, rgba(20, 19, 18, .22) 2px, transparent 2px) 0 0/34px 34px,
                linear-gradient(-60deg, rgba(20, 19, 18, .22) 2px, transparent 2px) 0 0/34px 34px,
                linear-gradient(0deg, rgba(193, 18, 31, .16) 2px, transparent 2px) 0 0/34px 34px;
            mask-image: linear-gradient(to top, rgba(0, 0, 0, 1), rgba(0, 0, 0, 0));
        }

        /* =========================
           ESCENA: marco shoji + panel
        ========================= */
        .scene {
            width: min(980px, 92vw);
            height: min(600px, 86vh);
            position: relative;
            border-radius: 26px;
            box-shadow: var(--shadow);
            overflow: hidden;
            background: rgba(255, 255, 255, .55);
            border: 1px solid rgba(20, 19, 18, .16);
        }

        /* marco madera */
        .scene::before {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: 26px;
            border: 10px solid rgba(160, 125, 79, .55);
            box-shadow:
                inset 0 0 0 2px rgba(20, 19, 18, .10),
                inset 0 0 0 12px rgba(138, 106, 66, .10);
            pointer-events: none;
        }

        /* rejilla shoji */
        .shoji {
            position: absolute;
            inset: 18px;
            border-radius: 18px;
            background:
                /* líneas verticales */
                repeating-linear-gradient(to right,
                    rgba(20, 19, 18, .12) 0px,
                    rgba(20, 19, 18, .12) 1px,
                    transparent 1px,
                    transparent 72px),
                /* líneas horizontales */
                repeating-linear-gradient(to bottom,
                    rgba(20, 19, 18, .10) 0px,
                    rgba(20, 19, 18, .10) 1px,
                    transparent 1px,
                    transparent 66px),
                linear-gradient(180deg, rgba(255, 255, 255, .62), rgba(255, 255, 255, .48));
            border: 1px solid rgba(20, 19, 18, .12);
        }

        /* pinceladas sumi-e en esquinas */
        .sumi {
            position: absolute;
            inset: 0;
            pointer-events: none;
            opacity: .55;
            mix-blend-mode: multiply;
        }

        .sumi::before,
        .sumi::after {
            content: "";
            position: absolute;
            width: 520px;
            height: 520px;
            border-radius: 50%;
            filter: blur(0.2px);
            opacity: .40;
            background:
                radial-gradient(circle at 30% 30%, rgba(20, 19, 18, .28), transparent 60%),
                radial-gradient(circle at 60% 70%, rgba(20, 19, 18, .18), transparent 62%),
                radial-gradient(circle at 40% 60%, rgba(193, 18, 31, .14), transparent 60%);
        }

        .sumi::before {
            left: -240px;
            top: -240px;
            transform: rotate(-10deg);
        }

        .sumi::after {
            right: -260px;
            bottom: -260px;
            transform: rotate(14deg);
        }

        /* =========================
           Header: estilo placita japonesa
        ========================= */
        .topbar {
            position: absolute;
            top: 26px;
            left: 32px;
            right: 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 14px;
            z-index: 5;
        }

        .brand {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .brand .jp {
            font-family: 'Shippori Mincho', serif;
            font-weight: 700;
            letter-spacing: 3px;
            font-size: 1.05rem;
        }

        .brand .es {
            font-size: .82rem;
            color: var(--inkSoft);
            letter-spacing: 1px;
        }

        .time {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 10px 14px;
            border-radius: 999px;
            border: 1px solid rgba(20, 19, 18, .18);
            background: rgba(250, 247, 241, .75);
            color: rgba(20, 19, 18, .78);
            font-size: .86rem;
            backdrop-filter: blur(4px);
        }

        .time .sun {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: var(--vermillion);
            box-shadow: 0 0 0 3px rgba(193, 18, 31, .12);
        }

        /* =========================
           Contenido central
        ========================= */
        .content {
            position: absolute;
            inset: 0;
            display: grid;
            place-items: center;
            padding: 110px 26px 110px;
            text-align: center;
            z-index: 6;
        }

        .title {
            font-family: 'Shippori Mincho', serif;
            font-weight: 700;
            font-size: clamp(2.1rem, 4.8vw, 3.7rem);
            letter-spacing: 2px;
            line-height: 1.08;
        }

        .title small {
            display: block;
            margin-top: 10px;
            font-family: 'Zen Maru Gothic', sans-serif;
            font-weight: 700;
            letter-spacing: 1px;
            font-size: clamp(.95rem, 1.8vw, 1.1rem);
            color: var(--inkSoft);
        }

        .divider {
            margin: 22px auto 0;
            width: min(520px, 82vw);
            height: 2px;
            border-radius: 999px;
            background: linear-gradient(90deg, transparent, rgba(193, 18, 31, .70), transparent);
            opacity: .90;
        }

        /* haiku-ish */
        .haiku {
            margin: 18px auto 0;
            width: min(720px, 90vw);
            color: rgba(20, 19, 18, .72);
            font-size: .98rem;
            line-height: 1.65;
        }

        /* =========================
           Botones estilo "placa" / madera
        ========================= */
        .actions {
            margin-top: 30px;
            display: flex;
            justify-content: center;
            gap: 14px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 14px 18px;
            border-radius: 14px;
            border: 1px solid rgba(20, 19, 18, .18);
            background:
                linear-gradient(180deg, rgba(160, 125, 79, .22), rgba(160, 125, 79, .12)),
                radial-gradient(600px 120px at 20% 0%, rgba(255, 255, 255, .35), transparent 60%);
            text-decoration: none;
            color: rgba(20, 19, 18, .92);
            font-family: 'Zen Maru Gothic', sans-serif;
            font-weight: 700;
            letter-spacing: 1px;
            transition: transform .15s ease, box-shadow .15s ease, border-color .15s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            border-color: rgba(193, 18, 31, .35);
            box-shadow: 0 18px 34px rgba(0, 0, 0, .12);
        }

        .btn.primary {
            background:
                linear-gradient(180deg, rgba(193, 18, 31, .18), rgba(193, 18, 31, .10)),
                radial-gradient(600px 120px at 20% 0%, rgba(255, 255, 255, .35), transparent 60%);
            border-color: rgba(193, 18, 31, .32);
        }

        .tag {
            font-family: 'Shippori Mincho', serif;
            padding: 2px 10px;
            border-radius: 999px;
            border: 1px solid rgba(20, 19, 18, .16);
            background: rgba(250, 247, 241, .70);
            font-size: .82rem;
            opacity: .95;
        }

        /* =========================
           Caligrafía vertical grande (kanji)
        ========================= */
        .kanji-vertical {
            position: absolute;
            top: 78px;
            bottom: 70px;
            width: 120px;
            display: grid;
            place-items: center;
            opacity: .22;
            pointer-events: none;
            z-index: 4;
        }

        .kanji-vertical.left {
            left: 26px;
        }

        .kanji-vertical.right {
            right: 26px;
        }

        .kanji-vertical .kanji {
            writing-mode: vertical-rl;
            text-orientation: upright;
            font-family: 'Shippori Mincho', serif;
            font-weight: 700;
            font-size: 54px;
            letter-spacing: 2px;
            color: rgba(20, 19, 18, .85);
            filter: blur(.0px);
        }

        /* =========================
           Hanko (sello rojo)
        ========================= */
        .hanko {
            position: absolute;
            right: 42px;
            bottom: 42px;
            width: 94px;
            height: 94px;
            border-radius: 16px;
            border: 2px solid rgba(193, 18, 31, .70);
            background:
                linear-gradient(180deg, rgba(193, 18, 31, .12), rgba(193, 18, 31, .05));
            display: grid;
            place-items: center;
            transform: rotate(-8deg);
            box-shadow: 0 16px 28px rgba(0, 0, 0, .14);
            z-index: 7;
        }

        .hanko span {
            writing-mode: vertical-rl;
            text-orientation: upright;
            font-family: 'Shippori Mincho', serif;
            font-weight: 700;
            letter-spacing: 2px;
            font-size: 16px;
            color: rgba(193, 18, 31, .88);
        }

        /* =========================
           Footer discreto
        ========================= */
        .footer {
            position: absolute;
            left: 32px;
            right: 32px;
            bottom: 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            z-index: 6;
            color: rgba(20, 19, 18, .70);
            font-size: .86rem;
        }

        .footer .pill {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 10px 14px;
            border-radius: 999px;
            border: 1px solid rgba(20, 19, 18, .16);
            background: rgba(250, 247, 241, .72);
            backdrop-filter: blur(4px);
        }

        .dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--vermillion);
            box-shadow: 0 0 0 3px rgba(193, 18, 31, .10);
        }

        /* =========================
           Responsive
        ========================= */
        @media (max-width: 720px) {
            .kanji-vertical {
                width: 82px;
                opacity: .18;
            }

            .kanji-vertical .kanji {
                font-size: 40px;
            }

            .topbar {
                left: 22px;
                right: 22px;
            }

            .footer {
                left: 22px;
                right: 22px;
            }

            .hanko {
                right: 22px;
                bottom: 22px;
                width: 82px;
                height: 82px;
            }
        }
    </style>
</head>

<body>
    <div class="washi-grain" aria-hidden="true"></div>
    <div class="pattern-seigaiha" aria-hidden="true"></div>
    <div class="pattern-asanoha" aria-hidden="true"></div>

    <div class="scene" role="region" aria-label="ShiroTokyo Third View">
        <div class="shoji" aria-hidden="true"></div>
        <div class="sumi" aria-hidden="true"></div>

        <div class="topbar">
            <div class="brand">
                <div class="jp">白東京 · SHIROTOKYO</div>
                <div class="es">Tercera vista · estética japonesa tradicional</div>
            </div>
            <div class="time"><span class="sun"></span> <?= date('H:i'); ?></div>
        </div>

        <div class="kanji-vertical left" aria-hidden="true">
            <div class="kanji">和<br>風</div>
        </div>

        <div class="kanji-vertical right" aria-hidden="true">
            <div class="kanji">東<br>京</div>
        </div>

        <div class="content">
            <div>
                <div class="title">
                    東京の空気
                    <small>Un rincón de Japón, en tu tercera vista</small>
                </div>

                <div class="divider"></div>

                <div class="haiku">
                    Papel de arroz, tinta y madera.<br>
                    Olas en silencio, luz bermellón.<br>
                    Hoy también: calma.
                </div>

                <div class="actions">
                    <a class="btn primary" href="<?= base_url('/'); ?>">
                        Volver <span class="tag">ホーム</span>
                    </a>

                    <a class="btn" href="<?= base_url('segunda_vista'); ?>">
                        Ir a Noctua <span class="tag">夜</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="hanko" aria-hidden="true">
            <span>判<br>子</span>
        </div>

        <div class="footer">
            <div class="pill"><span class="dot"></span> © <?= date('Y'); ?> · Third View</div>
            <div class="pill">和 · Washi · Shoji</div>
        </div>
    </div>
</body>

</html>