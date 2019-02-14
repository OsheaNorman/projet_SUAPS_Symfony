/* Calcul de la hauteur et la largeur de la page en fonction du redimensionnement du screen */

var Lscreen=document.body.offsetWidth; //Prend la largeur du screen selon son redimenssionnement
var screenLDivise = Lscreen / 3; //permet de les partager en 3 colonnes
var screenReduitL = screenLDivise - 10;

var Hscreen = window.scrollMaxY + document.documentElement.clientHeight; //Prend la hauteur du screen et du scroll
var screenHDivise = Hscreen / 13; //chiffre permettant de partager la hauteur de chaque div des étudiants en essayant de ne pas dépasser le bas de la page

var div_etudiant =  document.getElementsByClassName("div_etudiant");
var colonne =  document.getElementsByClassName("colonne");
var div_photo = document.getElementsByClassName("contenant_photo");

/* On parcour toutes les classes colonne et on applique le redimensionnement des divs en 3 colonnes */
if(colonne.length > 0){
    for (var i = 0; i < colonne.length; i++) {
        colonne[i].style.width = screenReduitL + "px";
    }
}

/* On parcour toutes les classes div_etudiant et on applique le redimensionnement des divs sur la hauteur selon la dimension actuelle du screen */
if(div_etudiant.length > 0){
    for(var i = 0; i < div_etudiant.length; i++) {
        div_etudiant[i].style.height = screenHDivise + "px";
    }
}

/* redimensionne le conteneur des photos selon leurs div */
if(div_photo.length > 0){
    for (var i = 0; i < div_photo.length; i++) {
        div_photo[i].style.width = screenReduitL/8 + "px";
        div_photo[i].style.height = screenHDivise-3 + "px";
    }
}