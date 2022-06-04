const body = document.querySelector("body");
const navbar = document.querySelector(".navbar");
const menu = document.querySelector(".menu-list");
const menuBtn = document.querySelector(".menu-btn");
const cancelBtn = document.querySelector(".cancel-btn");
const btnSwitch = document.querySelector("#switch");
const conten = document.querySelector(".contenido");
const loader = document.querySelector("#contenedor-loader");
var img_prin = document.getElementById("img-prin");
const typed = new Typed('.typed', {
    strings: ['<i class="palabras">Emprendiendo</i>', '<i class="palabras">Innovando</i>'],
    typeSpeed: 75,
    starDelay: 300,
    backSpeed: 75,
    smartBackspace: true,
    shuffle: false,
    backDelay: 1500,
    loop: true,
    loopCount: false,
    showCursor: true,
    cursorChar: '|',
    contentType: 'html',
});
menuBtn.onclick = () => {
    menu.classList.add("active");
    menuBtn.classList.add("hide");
    cancelBtn.classList.add("show");
    body.classList.add("disabledScroll");
}
cancelBtn.onclick = () => {
    menu.classList.remove("active");
    menuBtn.classList.remove("hide");
    cancelBtn.classList.remove("show");
    body.classList.remove("disabledScroll");
}

btnSwitch.addEventListener('click', () => {
    document.body.classList.toggle('dark');
    btnSwitch.classList.toggle('ligth');
    menu.classList.toggle('dark');
    conten.classList.toggle('dark');
    navbar.classList.toggle('dark');
    loader.classList.toggle('dark');
    //guardando modo
    if (document.body.classList.contains('dark')) {
        localStorage.setItem('dark-mode', 'true');
        img_prin.setAttribute("src", "imagenes/meits-white.png");
    } else {
        img_prin.setAttribute("src", "imagenes/meits-black.png");
        localStorage.setItem('dark-mode', 'false');
    }
});

//modo actual
if (localStorage.getItem('dark-mode') === 'true') {
    document.body.classList.add('dark');
    btnSwitch.classList.add('ligth');
    menu.classList.add('dark');
    conten.classList.add('dark');
    navbar.classList.add('dark');
    loader.classList.add('dark');
    img_prin.setAttribute("src", "imagenes/meits-white.png");
} else {
    document.body.classList.remove('dark');
    btnSwitch.classList.remove('ligth');
    menu.classList.remove('dark');
    conten.classList.remove('dark');
    navbar.classList.remove('dark');
    loader.classList.remove('dark');
    img_prin.setAttribute("src", "imagenes/meits-black.png");
}

function openCity(cityName, elmnt, color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(cityName).style.display = "block";
    elmnt.style.backgroundColor = color;

}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();

window.onscroll = () => {
    this.scrollY > 20 ? navbar.classList.add("sticky") : navbar.classList.remove("sticky");
}
