var btn=document.getElementById('habi');
var nom=document.getElementById('nom');
var tel=document.getElementById('tel');
var cor=document.getElementById('cor');
var dir=document.getElementById('dir');
var cp=document.getElementById('cod');
var ciu=document.getElementById('ciu');
var btng=document.getElementById('gua');

btn.onclick=activarCampos;
function activarCampos(evento){
    nom.disabled=false;
    tel.disabled=false;
    cor.disabled=false;
    dir.disabled=false;
    cp.disabled=false;
    ciu.disabled=false;
    btng.disabled=false;

    btn.disabled=true;

}
