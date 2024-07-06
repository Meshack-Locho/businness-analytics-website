let passWordVisibiltyToggle = document.querySelectorAll('.fa-eye-slash')

const passwordInput = document.getElementById("password")
let submitBtn = document.getElementById("submit-btn")

for (let i = 0; i < passWordVisibiltyToggle.length; i++) {
    passWordVisibiltyToggle[i].addEventListener("click", ()=>{
    if (passWordVisibiltyToggle[i].classList.contains("fa-eye-slash")) {
        passWordVisibiltyToggle[i].classList.add("fa-eye")
        passWordVisibiltyToggle[i].classList.remove("fa-eye-slash")
        passwordInput.type = "text"
    } else {
        passWordVisibiltyToggle[i].classList.remove("fa-eye")
        passWordVisibiltyToggle[i].classList.add("fa-eye-slash")
        passwordInput.type = "password"
    }
})
    
    
}

let menuToggleIcons = document.querySelectorAll(".menu-toggle")
let menuEl = document.querySelector(".mobile-menu")

for (let i = 0; i < menuToggleIcons.length; i++) {
    menuToggleIcons[i].addEventListener("click", ()=>{
        menuEl.classList.toggle("active")
    })
    
}

let animationElements = document.querySelectorAll(".animate")
let windowHeight = window.innerHeight
let pointOfReveal = 150
function showElements() {
    for (let i = 0; i < animationElements.length; i++) {
        let animationElementsTop = animationElements[i].getBoundingClientRect().top

        if (animationElementsTop < windowHeight - pointOfReveal) {
            animationElements[i].classList.add("active")
        } else {
            animationElements[i].classList.remove("active")
        }
        
    }
}

let imageContainer = document.querySelector(".img-slider2")
// Register the ScrollTrigger and ScrollSmoother plugins

gsap.registerPlugin(ScrollTrigger);

function createScrollTrigger () {
    gsap.to("[data-speed]", {
        y: (i, el) => -(1 - parseFloat(el.getAttribute("data-speed"))) * imageContainer.clientHeight,
        ease: "none",
        scrollTrigger: {
        trigger: "[data-speed]",
          start: "top 90%",
          end: "bottom 20%",
          invalidateOnRefresh: true,
          scrub: 0
        }
      });
}

window.addEventListener("scroll", ()=>{
    showElements()
})

if (window.innerWidth > 900) {
    window.addEventListener("DOMContentLoaded", createScrollTrigger)
}


let optionsToggle = document.querySelectorAll(".options-toggle")
let optionsEl = document.querySelector(".options")

for (let i = 0; i < optionsToggle.length; i++) {
    optionsToggle[i].addEventListener("click", ()=>{
        optionsEl.classList.toggle("active")
    })
    
}

 
const tl = gsap.timeline({
    onComplete: function () {
        this.restart()
    }
})

    
tl.to(".main-header", {
    delay: 2,
    duration: 2,
    text: "Take your Business To The Next Level",
    ease: "none",
});
tl.to(".main-header", {
    delay: 3,
    duration: 2,
    text: "Grow Your Online Presence",
    ease: "none",
});
tl.to(".main-header", {
    delay: 3,
    duration: 2,
    text: "Boost Your Sales Effortlessly",
    ease: "none",
});
tl.to(".main-header", {
    delay: 3,
    duration: 2,
    text: "Welcome to our website",
    ease: "none",
});







