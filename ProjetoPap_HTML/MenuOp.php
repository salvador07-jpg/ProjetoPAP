<!DOCTYPE html>
<html lang = "pt">
    <head>
        <meta charset = "UTF-8">
            <title> PcBuilder </title>
            <link rel = "stylesheet" href = "..\ProjetoPap_CSS\FeMenuOp.css">
            <link rel = "stylesheet" href = "..\ProjetoPap_CSS\responsivo.css">

    </head>
    <body>
        <header>
            <div class = "Logo">
                <img src = "..\imagens\ImagemTestebaba.jpg" alt = "logo">
                <h1> PcBuilder </h1>
            </div>
        </header>

        <main>
            <div class = "OpButtons">

                <a href = "BtBuildPc.php" class = "BotaoGeral F1"> Escolher Componentes </a>

                <div class = "BotaoGeral F2">
                    <button id = "BtUserJS" class = "BotaoGeral"> User </button>
                    <div class = "BtUserContent">
                        <button id = "BtLoginJS" class = "BtLogin"> Login </button>
                        <button id = "BtSigInJS" class = "BtSignIn"> Sign in </button>
                    </div>
                </div>

                <a href = "GpuBenchmark.php" class = "BotaoGeral"> Comparar GPUs </a>

                <a href = "###" class = "BotaoGeral"> Por Definir </a>

                <a href = "..\ProjetoPap_HTML\AddBd.php" class = "BotaoGeral"> Base de Dados </a>

                <button id = "BtConfigJS" class = "BotaoGeral"> Definições </button>
            </div>
        </main>
        <script src = "..\ProjetoPap_JS\ScriptsMenuOp.js"></script>
    </body>
</html>