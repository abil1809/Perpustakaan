const mybutton = document.getElementById("scrollTopBtn");
const navbar = document.querySelector(".navbar");

    window.addEventListener("scroll", function () {
      if (window.scrollY > 100) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    });

    mybutton.onclick = function() {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
      };
      
    mybutton.addEventListener("scroll", function() {
      if(window.scrollY>300){
        navbar.classList.add("scrolled");
      }
      else{
        navbar.classList.remove("scrolled");
      }
    });