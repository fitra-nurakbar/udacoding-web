// const tombol = document.querySelector('.close');
// const card = document.querySelector('.card');

// tombol.addEventListener('click', function(){
//     card.style.display = 'none';
// })

//DOM traversal
// const close = document.querySelectorAll('.close');

// close.forEach(function(i) {
//     i.addEventListener('click', function(s){
//         window.open("https://www.w3schools.com");
//         console.log(s);
//     });    
// });

// for( let i = 0; i <= close.length; i++){

//     close[i].addEventListener('click', function(e){
//         e.target.parentElement.style.display = 'none';
//     });
// }
// console.log(close);

// close.forEach(function(i) {
//     i.addEventListener('click', function(e){
//         e.target.parentElement.style.display = 'none';
//         console.log(e);
//         e.preventDefault();
//         e.stopPropagation();
//     });
// });


// const card = document.querySelectorAll('.card');

// card.forEach(function(p) {
//     p.addEventListener('click', function(f) {
//         alert("hello");
//     });
// });

// Memanfaatkan event bubling

const container = document.querySelector('.container');

container.addEventListener('click', function(e){
    if(e.target.className == 'close') {
        e.target.parentElement.style.display = 'none';
    }
});
