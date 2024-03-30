//EJECUTAR FUNCION EN EL  EVENTO CLICK::
document.getElementById("btn_open").addEventListener("click",open_close_menu);
//DECLARACION DE VARIABLES:
var side_menu = document.getElementById("menu_side");
var btn_open  = document.getElementById("btn_open");
var body = document.getElementById("body");

//EVENTO PARA MOSTRAR Y OCULTAR MENU:
function open_close_menu(){
    body.classList.toggle("body_move");
    side_menu.classList.toggle("menu__side_move");
}

//SI EL ANCHO DE LA PAGINA ES MENOR A 760PX ,OCULTARA EL MENU AL RECARGAR LA PAGINA::
   if(window.innerWidth < 760){
    
    body.classList.add("body_move");
    side_menu.classList.add("menu__side_move");
   }

   //HACIENDO EL MENU RESPONSIVE(ADAPTABLE)::
   window.addEventListener("resize",function(){

    if(window.innerWidth > 760){
        body.classList.remove("body_move");
        side_menu.classList.remove("menu__side_move");
    }

    if(window.innerWidth < 760){
        body.classList.add("body_move");
        side_menu.classList.add("menu__side_move");
    }
   });

