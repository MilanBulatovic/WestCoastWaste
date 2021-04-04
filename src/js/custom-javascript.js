window.onload=function(){
    const navOpen = () => {
        const burger = document.querySelector('.navbar-toggler-button');
        const navopen  = document.querySelector('.drop-list');
        
            //toggle nav
            burger.addEventListener('click', () => {
                navopen.classList.toggle('open');
            });
        
        }
        navOpen();



    //Sticky navigation on scroll
    let below = false;
    window.onscroll = () => {

    const Ypos = window.pageYOffset;

        if(Ypos > 100 && !below) {

            below = true;
            document.getElementById("main-nav").classList.add('sticky');
            document.getElementById("searchform").classList.add('hide');
            // document.getElementById("searchsubmit").onclick = function() {

                
            //    document.getElementById("s").classList.toggle('hide');
            // }

        } else if(Ypos < 100 && below) {
            event.preventDefault()
            below = false;
            document.getElementById("main-nav").classList.remove('sticky');
            document.getElementById("searchform").classList.remove('hide');
         
        }
    }
}