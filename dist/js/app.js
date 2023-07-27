window.onload = function(){
  // Menu hamburger
  let buttonMenu = document.querySelectorAll(".hamb");
  buttonMenu ? (
    buttonMenu.forEach(buttonMenu => {
      buttonMenu.addEventListener('click', () => {
        if(buttonMenu.classList.contains("open-hamb")){
          buttonMenu.classList.remove( "open-hamb" );
          document.querySelector("#nav-menu-container").classList.remove( "container-menu-aberto" ); 
          document.querySelector("html").classList.remove( "no-scroll" );
          document.querySelector("body").classList.remove( "no-scroll" );
        } 
        else{
          buttonMenu.classList.add('open-hamb');
          document.querySelector("#nav-menu-container").classList.add('container-menu-aberto');
          document.querySelector("body").classList.add('no-scroll');
          document.querySelector("html").classList.add('no-scroll');
        }
      })
    })
  ) : false   


  //loadmore cards
  const btnsActiveCards = document.querySelectorAll('.button-load-more')
  btnsActiveCards ? (
    btnsActiveCards.forEach(btnsActiveCards => {
      btnsActiveCards.addEventListener('click', () => {

        const attributeValue = btnsActiveCards.getAttribute('data-load'); 
        const cards =  document.querySelectorAll("."+attributeValue)
        cards ? (
          cards.forEach( cards => {
            cards.classList.remove( "card-none" );
            btnsActiveCards.style.display = "none";
          })
        ) : false  

      })
    })
  ) : false   
  
   //hover menu products
  const btnsActiveMenuProducts = document.querySelectorAll('.link-menu-products')
  btnsActiveMenuProducts ? (
    btnsActiveMenuProducts.forEach(btnsActiveMenuProducts => {
      btnsActiveMenuProducts.addEventListener('mouseover', () => {

        document.querySelector( ".active-menu-products" ).classList.add( "d-none" );
        document.querySelector( ".active-menu-products" ).classList.remove( "active-menu-products" );
        document.querySelector( "#"+btnsActiveMenuProducts.id+"-hover" ).classList.add( "active-menu-products" );

        document.querySelector( ".active-menu-link-products" ).classList.remove( "active-menu-link-products" );
        document.querySelector( "#"+btnsActiveMenuProducts.id).classList.add( "active-menu-link-products" );
  
      })
    })
  ) : false   
  
  var windowWidth = window.innerWidth;
  if(windowWidth < 1024){
    const navMenu = document.querySelectorAll('.nav-item-anchor')
    navMenu ? (
      navMenu.forEach(navMenu => {
        navMenu.addEventListener('click', () => {
          
         document.getElementById('nav-menu-container').classList.remove( "container-menu-aberto" );
         document.querySelector( ".hamb" ).classList.remove( "open-hamb" );    
  
        })
      })
    ) : false   
  }
}

// ativar tracking whatsapp
const btns = document.querySelectorAll('.whats-tracking')
btns ? (
  btns.forEach(btn => {
    btn.addEventListener('click', () => {
      gtag('event', 'WhatsApp', {
        'event_category': 'WhatsApp',
        'event_action' : 'Click',
        'event_label': 'WhatsApp',
        'value': 'WhatsApp'
      });

    })
  })
) : false   

// called when the window is scrolled. 
window.onscroll = function (e) {  
  if(window.pageYOffset || document.documentElement.scrollTop > 100){
    document.querySelector( "header" ).classList.add( "header-fixed" );
    document.querySelector( "header" ).style.transition = "0.7s";
    document.querySelector( "header" ).classList.add( "shadow" );  
  }
  else{
    document.querySelector( "header" ).classList.remove( "header-fixed" );
    document.querySelector( "header" ).classList.remove( "shadow" );
  }
} 


