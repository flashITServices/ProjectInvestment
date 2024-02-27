(function($){
    "use strict"
   
  
    var afficherOnglet=function(a){
        var li=a.parentNode
        var div = a.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode
        if(li.classList.contains('active')){
            return false
        }
         //ON RETIRE LA CLASSE ACTIVE DE L'ONGLET ACTIF
        div.querySelector('.tabs .active').classList.remove('active')

         //J'AJOUTE LA CLASSE ACTIVE A L'ONGLET ACTUEL
        li.classList.add('active')

        //ON RETIRE LA CLASSE ACTIVE DU CONTENU ACTIF
       
        div.querySelector('.tab-content.active').classList.remove('active')
        div.querySelector(a.getAttribute('href'))
        div.querySelector(a.getAttribute('href')).classList.add('active')
       
    }

    var tabs= document.querySelectorAll('.tabs a')
  
    for( var i = 0; i< tabs.length; i++){
        tabs[i].addEventListener('click',function(e){
            afficherOnglet(this)
         })
    }

    var hash=window.location.hash
    var a= document.querySelector('a[href="'+hash+'"]')
    if(a !== null && !a.classList.contains('active')){
        afficherOnglet(a)
    }

})();