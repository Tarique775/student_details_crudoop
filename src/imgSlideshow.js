let index = 1;
showSlides(index);
            
function plusSlides(n) {
    showSlides(index += n);
}
            
function currentSlide(n) {
    showSlides(index = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
     
    if (n > slides.length){
      //SET TO DISPLAY FROM FIRST ONE IF PRESS nTH NEXT BUTTON
      index = 1;
    }    
    if (n < 1){
      //SET TO DISPLAY FROM LAST ONE IF PRESS nTH PREVIOUS BUTTON
      index = slides.length;
    }
    for (i = 0; i < slides.length; i++){
      slides[i].style.display = "none";  
    }
    for (i = 0; i < dots.length; i++){
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[index-1].style.display = "block";  
    dots[index-1].className += " active";
}