/* Botão mudar tema do site */
document.getElementById("ThemeMenu-ButtonJS").onclick = function() 
{
    BtThemeMenu();
}
function BtThemeMenu() 
{
    document.getElementById("BtThemeMShow").classList.toggle("show");
}	

/* Botão fechar menu tema */
document.getElementById("BtTheme-CloseJS").onclick = function() 
{
    BtCloseThemeMenu();
}
function BtCloseThemeMenu() 
{
    document.getElementById("BtThemeMShow").classList.remove("show");
}




/* Botão abrir menu lateral */
document.getElementById("LeftMenu-ButtonJS").onclick = function()
{
    BtLeftMenu();
}
function BtLeftMenu() 
{
    document.getElementById("BtLeftMShow").classList.toggle("show");
}

/* Botão fechar menu lateral */
document.getElementById("BtLeftMenu-CloseJS").onclick = function() 
{
    BtMenuClose();
}
function BtMenuClose() 
{
    document.getElementById("BtLeftMShow").classList.remove("show");
}	
	



/* Botão abrir menu utilizador */
document.getElementById("DPmenuUser-ButtonJS").onclick = function() 
{
BtUserMenu();
}
function BtUserMenu()
{
    document.getElementById("BtUserMShow").classList.toggle("show");
}




/* Botão Login (Entrar na Conta)*/
document.getElementById("BtLogInJS").onclick = function() 
{
BtLogIn();
}
function BtLogIn()
{
    document.getElementById("BtLogInShow").classList.toggle("show");
}

/* Botão SignIn (Criar Conta) */
document.getElementById("BtSignInJS").onclick = function() 
{
BtSignIn();
}
function BtSignIn()
{
    document.getElementById("BtSignInShow").classList.toggle("show");
}




/* Botão Adicionar componente */
document.getElementById("BtAddComponentJS").onclick = function() 
{
BtAdd();
}
function BtAdd()
{
    document.getElementById("BtAddShow").classList.toggle("show");
}

/* Botão Alterar componente */
document.getElementById("BtChangeComponentJS").onclick = function() 
{
BtChange();
}
function BtChange()
{
    document.getElementById("BtChangeShow").classList.toggle("show");
}

/* Botão Apagar componente */
document.getElementById("BtDeleteComponentJS").onclick = function() 
{
BtDelete();
}
function BtDelete()
{
    document.getElementById("BtDeleteShow").classList.toggle("show");
}