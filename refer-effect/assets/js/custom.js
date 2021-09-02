        //code view
        document.addEventListener('DOMContentLoaded', (event) => {
            document.querySelectorAll('pre code').forEach((el) => {
                hljs.highlightElement(el);
            });
            });
        
        //code tab menu
            const title = document.querySelectorAll(".view-title ul li")
            const cont = document.querySelectorAll(".view-cont > div")

            title.forEach((element, index) => {                  
                element.addEventListener("click", function(){
           
                    title.forEach( el => {
                        el.classList.remove("active");  
                    });
                    element.classList.add("active"); 
        
                    cont.forEach( el => {
                        el.style.display = "none";
                    })
                    cont[index].style.display = "block";
                })
            })
        
        //Modal
        
        // $(".info button").click(function(){
        //     $("#modal").removeClass().addClass("show");
        // });
        
        document.querySelector(".info button").addEventListener("click", function(){
            document.querySelector("#modal").classList.add("show");
            document.querySelector("#modal").classList.remove("hide");
            
        });

        document.querySelector(".modal-cont button").addEventListener("click", function(){
            document.querySelector("#modal").classList.add("hide");
        });

        // $(".modal-cont button").click(function(){
        //     $("#modal").addClass("hide")
        // });
    
   