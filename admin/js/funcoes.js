var y = el;
y.value =0;

function getRating(el) {
    var x = document.getElementById("crea");
 
    if ( el.value ==0 ) {
        x.style.display = "none";
      } else if(el.value ==1) {
        x.style.display = "block";
      }
  
    console.log(el.value);
  


}