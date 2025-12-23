<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>ShiroTokyo // Third View</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Fuentes: sobrio + japonés display -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600;800&family=Share+Tech+Mono&display=swap"
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
            font-family: 'Share Tech Mono', monospace;
        }

        :root {
            --paper: #fbfbf7;
            --paper2: #f2f2ea;
            --ink: #111114;
            --muted: rgba(17, 17, 20, .62);

            --red: #cc0000;
            --red2: #a80000;

            --line: rgba(17, 17, 20, .12);
            --shadow: 0 22px 55px rgba(0, 0, 0, .12);
        }

        /* =========================
           BACKGROUND PAPER
        ========================= */
        body {
            background:
                radial-gradient(1200px 700px at 20% 18%, rgba(204, 0, 0, .06), transparent 55%),
                radial-gradient(900px 520px at 88% 78%, rgba(0, 0, 0, .04), transparent 58%),
                linear-gradient(180deg, var(--paper), var(--paper2));
            color: var(--ink);
            display: grid;
            place-items: center;
            position: relative;
        }

        /* Paper grain */
        .grain {
            position: absolute;
            inset: 0;
            pointer-events: none;
            opacity: 0.06;
            background-image: radial-gradient(circle, rgba(0, 0, 0, .35) 1px, transparent 1px);
            background-size: 3px 3px;
            filter: blur(0.2px);
            mix-blend-mode: multiply;
        }

        /* =========================
           BIG VERTICAL KANJI SIDES
           (Poster look)
        ========================= */
        .kanji-side {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 160px;
            pointer-events: none;
            display: grid;
            place-items: center;
            opacity: .14;
        }

        .kanji-side.left {
            left: 0;
            border-right: 1px solid var(--line);
            background: linear-gradient(180deg, rgba(204, 0, 0, .06), transparent);
        }

        .kanji-side.right {
            right: 0;
            border-left: 1px solid var(--line);
            background: linear-gradient(180deg, rgba(0, 0, 0, .04), transparent);
        }

        .kanji {
            writing-mode: vertical-rl;
            text-orientation: upright;
            font-family: 'Orbitron', sans-serif;
            font-weight: 800;
            letter-spacing: 2px;
            font-size: 56px;
            line-height: 1;
            user-select: none;
        }

        /* A small red seal stamp vibe */
        .seal {
            position: absolute;
            bottom: 22px;
            left: 22px;
            width: 62px;
            height: 62px;
            border: 2px solid rgba(204, 0, 0, .65);
            border-radius: 10px;
            display: grid;
            place-items: center;
            transform: rotate(-6deg);
            opacity: .9;
            background: rgba(204, 0, 0, .06);
            pointer-events: none;
        }

        .seal span {
            writing-mode: vertical-rl;
            text-orientation: upright;
            font-weight: 800;
            color: rgba(204, 0, 0, .85);
            letter-spacing: 2px;
            font-size: 14px;
            font-family: 'Share Tech Mono', monospace;
        }

        /* =========================
           MAIN POSTER CARD
        ========================= */
        .poster {
            position: relative;
            width: min(980px, 92vw);
            height: min(560px, 86vh);
            background: rgba(255, 255, 255, .58);
            border: 1px solid var(--line);
            border-radius: 26px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        /* inner paper lines */
        .poster::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(to bottom, rgba(0, 0, 0, .035), transparent 40%),
                repeating-linear-gradient(to bottom,
                    rgba(0, 0, 0, .03) 0px,
                    rgba(0, 0, 0, .03) 1px,
                    transparent 2px,
                    transparent 10px);
            opacity: 0.18;
            pointer-events: none;
        }

        /* red corner accent */
        .poster::after {
            content: "";
            position: absolute;
            top: -120px;
            right: -120px;
            width: 320px;
            height: 320px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(204, 0, 0, .22), transparent 60%);
            pointer-events: none;
        }

        /* =========================
           JAPAN FLAG CIRCLE (replaces koi)
        ========================= */
        .hinomaru {
            position: absolute;
            right: 26px;
            bottom: 22px;
            width: 220px;
            height: 220px;
            pointer-events: none;
            z-index: 3;
            filter: drop-shadow(0 16px 28px rgba(0, 0, 0, .10));
        }

        /* A subtle “brush/ink” ring + red disc */
        .hinomaru::before {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: 50%;
            background:
                radial-gradient(circle, rgba(204, 0, 0, .92) 0 46%, transparent 47%),
                radial-gradient(circle, rgba(204, 0, 0, .10) 0 62%, transparent 63%);
            opacity: .98;
        }

        /* Imperfect ink edge */
        .hinomaru::after {
            content: "";
            position: absolute;
            inset: 10px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(0, 0, 0, .05), transparent 62%);
            filter: blur(0.4px);
            opacity: .55;
            mix-blend-mode: multiply;
        }

        /* =========================
           HEADER
        ========================= */
        .topbar {
            position: absolute;
            top: 18px;
            left: 18px;
            right: 18px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            z-index: 5;
        }

        .brand {
            font-family: 'Orbitron', sans-serif;
            font-weight: 800;
            letter-spacing: 3px;
            font-size: .92rem;
            text-transform: uppercase;
            color: rgba(17, 17, 20, .9);
        }

        .time {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 10px 14px;
            border-radius: 999px;
            border: 1px solid var(--line);
            background: rgba(255, 255, 255, .65);
            color: rgba(17, 17, 20, .72);
            font-size: .82rem;
        }

        .time .dot {
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: var(--red);
            box-shadow: 0 0 0 3px rgba(204, 0, 0, .10);
        }

        /* =========================
           CENTER CONTENT
        ========================= */
        .center {
            position: absolute;
            inset: 0;
            display: grid;
            place-items: center;
            padding: 78px 26px 88px;
            text-align: center;
            z-index: 5;
        }

        .title {
            font-family: 'Orbitron', sans-serif;
            font-weight: 800;
            letter-spacing: 6px;
            font-size: clamp(2.0rem, 4.8vw, 3.6rem);
            line-height: 1.05;
            text-transform: uppercase;
        }

        .subtitle {
            margin-top: 14px;
            color: var(--muted);
            letter-spacing: 3px;
            text-transform: uppercase;
            font-size: .92rem;
        }

        .divider {
            margin: 22px auto 0;
            width: min(420px, 78vw);
            height: 2px;
            border-radius: 999px;
            background: linear-gradient(90deg, transparent, rgba(204, 0, 0, .75), transparent);
            opacity: .85;
        }

        /* =========================
           BUTTONS (japanese poster vibe)
        ========================= */
        .actions {
            margin-top: 34px;
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
            border-radius: 999px;
            border: 1px solid var(--line);
            background: rgba(255, 255, 255, .70);
            text-decoration: none;
            color: rgba(17, 17, 20, .92);
            font-family: 'Orbitron', sans-serif;
            font-weight: 800;
            letter-spacing: 2px;
            font-size: .78rem;
            text-transform: uppercase;
            transition: transform .15s ease, box-shadow .15s ease, border-color .15s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            border-color: rgba(204, 0, 0, .35);
            box-shadow: 0 14px 26px rgba(204, 0, 0, .08);
        }

        .btn.primary {
            background: linear-gradient(180deg, rgba(204, 0, 0, .14), rgba(204, 0, 0, .08));
            border-color: rgba(204, 0, 0, .35);
        }

        .kbd {
            font-family: 'Share Tech Mono', monospace;
            font-size: .74rem;
            padding: 2px 8px;
            border-radius: 10px;
            border: 1px solid rgba(17, 17, 20, .14);
            background: rgba(255, 255, 255, .65);
            opacity: .9;
        }

        /* =========================
           FOOTER
        ========================= */
        .footer {
            position: absolute;
            left: 18px;
            right: 18px;
            bottom: 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            color: rgba(17, 17, 20, .62);
            font-size: .78rem;
            z-index: 5;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 8px 12px;
            border-radius: 999px;
            border: 1px solid var(--line);
            background: rgba(255, 255, 255, .62);
        }

        .badge .chip {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--red);
        }

        /* =========================
           RESPONSIVE
        ========================= */
        @media (max-width: 640px) {
            .kanji-side {
                width: 92px;
            }

            .kanji {
                font-size: 42px;
            }

            .hinomaru {
                width: 170px;
                height: 170px;
                right: 14px;
                bottom: 14px;
            }
        }
    </style>
</head>

<body>
    <div class="grain"></div>

    <!-- Vertical kanji sides -->
    <div class="kanji-side left">
        <div class="kanji">東京</div>
    </div>
    <div class="kanji-side right">
        <div class="kanji">日本</div>
    </div>

    <div class="seal"><span>判<br>子</span></div>

    <div class="poster" role="region" aria-label="ShiroTokyo View">
        <div class="topbar">
            <div class="brand">SHIROTOKYO / SYSTEM</div>
            <div class="time"><span class="dot"></span> <?= date('H:i'); ?></div>
        </div>

        <div class="center">
            <div>
                <div class="title">TOKYO POSTER</div>
                <div class="subtitle">minimal · white · red accents</div>
                <div class="divider"></div>

                <div class="actions">
                    <a class="btn primary" href="<?= base_url('/'); ?>">
                        Volver <span class="kbd">HOME</span>
                    </a>

                    <a class="btn" href="<?= base_url('segunda_vista'); ?>">
                        Ir a Noctua <span class="kbd">ALT</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Hinomaru (Japan flag circle) -->
        <div class="hinomaru" aria-hidden="true"></div>

        <div class="footer">
            <div class="badge"><span class="chip"></span> © <?= date('Y'); ?> · Third View</div>
            <div class="badge">和 · TOKYO</div>
        </div>
    </div>
</body>

</html>