const  menuIcon  = document.querySelector(".ligne");
const  sidebar = document.querySelector(".sidebar");

menuIcon.addEventListener ('click', ()=>{
    sidebar.classList.toggle("change");

});
$('.item__image').slick({
    slidesToShow:2,
    slidesToScroll:1,
    autoplay:true,
    autoplaySpeed: 2000,
});


