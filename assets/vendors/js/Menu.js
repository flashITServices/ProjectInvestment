(function($){
    "use strict"
  
    var scrollY=function(){
        var supportPageOffset= window.pageXOffset !== undefined
        var isCSS1Compat= ((document.compatMode || "") === "CSS1Compat")
        return supportPageOffset ? window.pageYOffset : isCSS1Compat ? document.documentElement.scrollTop : document.body.scrollTop
    }

    //Variables
    var element=document.querySelector('.options')
   
    var element2=document.querySelector('.global')
    var rect=element.getBoundingClientRect()
    var top=rect.top +scrollY()
    var width=rect.width;
    var fake=document.createElement('div')
    fake.style.width=rect.width
    fake.style.height=rect.height

    // Functions
    var onScroll= function (){ 
        var hasScrollClass=element.classList.contains('fixed')
        if(scrollY() > top && !hasScrollClass){      
          element.classList.add('fixed')
          element.style.width=width+"px"
          element.parentNode.insertBefore(fake,element);
                                     
        }else if(scrollY() < top && hasScrollClass){
            element.classList.remove('fixed')
            element.parentNode.removeChild(fake)
           
        }
    }

   

    var onResize = function(){
        element.style.width="auto"
        element.classList.remove('fixed')
        fake.style.display="none"
        rect=element.getBoundingClientRect()
        top=rect.top +scrollY()
        fake.style.width=rect.width +"px"
        fake.style.height=rect.height+"px"
        fake.style.display= "block"
        onScroll()
    }

    //Listeners
    window.addEventListener('scroll',onScroll)
    window.addEventListener('resize',onResize)
 
})(jQuery);