<!DOCTYPE html>
<html lang = "pt">
    <head>
        <meta charset = "UTF-8">
            <title> PcBuilder </title>
            <link rel = "stylesheet" href = "..\ProjetoPap_CSS\FeMenuInicial.css">
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

                <a href = "BtBuildPc.php" class = "BotaoGeral F1"> 
                    <img src = "../imagens/ChooseOp.png" alt = "BtBuildPc" class = "TamanhoIconOp">
                        <span class = "TextoBtn"> Escolher Componentes </span>
                </a>

                <div class = "BotaoGeral F2">
                    <button id = "BtUserJS" class = "BotaoGeral"> 
                       <img src = "../imagens/UserOp.png" alt = "BtUser" class = "TamanhoIconOp">
                            <span class = "TextoBtn"> User </span>
                    </button>
                    <div class = "BtUserContent">
                        <button id = "BtLoginJS" class = "BtLogin"> Login </button>
                        <button id = "BtSigInJS" class = "BtSignIn"> Sign in </button>
                    </div>
                </div>

                <a href = "GpuBenchmark.php" class = "BotaoGeral"> 
                    <img src = "../imagens/BenchMarkOp.png" alt = "GpuBenchmark" class = "TamanhoIconOp">
                        <span class = "TextoBtn"> Comparar GPUs </span>
                </a>

                <a href = "###" class = "BotaoGeral"> 
                    <img src = "../imagens/SettingOp.png" alt = "###" class = "TamanhoIconOp">
                        <span class = "TextoBtn"> naosei </span>
                </a>

                <a href = "..\ProjetoPap_HTML\AddBd.php" class = "BotaoGeral"> 
                    <img src = "../imagens/DataBaseOp.png" alt = "AddBd" class = "TamanhoIconOp">
                        <span class = "TextoBtn"> Base de Dados </span>
                </a>

                <button id = "BtConfigJS" class = "BotaoGeral">  
                    <img src = "../imagens/SettingOp.png" alt = "Settings" class = "TamanhoIconOp">
                        <span class = "TextoBtn"> Definições </span>
                </button>
            </div>
        </main>
        <script src = "..\ProjetoPap_JS\ScriptsMenuOp.js"></script>
    </body>
</html>