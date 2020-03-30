function vacios() {
    var numero1=document.getElementById('txtjuego').value;
    var numero2=document.getElementById('txtdes').value;
    var numero3=document.getElementById('txtprecio').value;

    if (numero1=="") {
        alert("Ingresa un valor en la caja juego");
        return false;
        
    }
    if (numero2=="") {
        alert("Ingresa un valor en la caja Desarrollador");
        return false;
        
    }
    if (numero3=="") {
        alert("Ingresa un valor en la caja Precio");
        return false;
        
    }




    
}