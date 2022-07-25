//pilihan computer
function getPilihanComputer() {
    var comp = Math.random();
    if (comp < 0.34)
        return 'kertas';
    if (comp >= 0.34 && comp < 0.67)
        return 'gunting';
    return 'batu';
}

//hasil
function getHasil(comp, player) {
    if (player == comp)
        return 'SERI!';
    if (player == 'batu')
        return (comp == 'gunting') ? 'MENANG!' : 'KALAH!';
    if (player == 'gunting')
        return (comp == 'batu') ? 'KALAH!' : 'MENANG!';
    if (player == 'kertas')
        return (comp == 'gunting') ? 'KALAH' : 'MENANG!';
    return 'memasukkan pilihan yang salah!';

}

function putar(){
    const pilComp = document.querySelector('.pilihan-computer');
    const view = ['batu', 'gunting', 'kertas'];
    let i = 0;
    const waktuMulai = new Date().getTime();
    setInterval(function(){
        if(new Date().getTime() - waktuMulai > 1000){
            clearInterval;
            return;
        }
        pilComp.setAttribute(view[i++]);
        if( i == view.length) i = 0;
    }, 100);
}

//pilihan player
const pilihan = document.querySelectorAll('li');
pilihan.forEach(function(pi){
    pi.addEventListener('click', function(){
    const pilihanComputer = getPilihanComputer();
    const pilihanPlayer = pi.className;
    const hasil = getHasil(pilihanComputer, pilihanPlayer);

    putar();

    setTimeout(function() {
        const jawabanComp = document.querySelector('.pilihan-comp');
        jawabanComp.innerHTML = pilihanComputer;
    
        const info = document.querySelector('.info');
        info.innerHTML = hasil;
        });
    }, 1000);
});


// const pBatu = document.querySelector('.batu');
// pBatu.addEventListener('click', function(){
//     const pilihanComputer = getPilihanComputer();
//     const pilihanPlayer = pBatu.className;
//     const hasil = getHasil(pilihanComputer, pilihanPlayer);
    
//     const jawabanComp = document.querySelector('.pilihan-comp');
//     jawabanComp.innerHTML = pilihanComputer;

//     const info = document.querySelector('.info');
//     info.innerHTML = hasil;
// });

// const pGunting = document.querySelector('.gunting');
// pGunting.addEventListener('click', function(){
//     const pilihanComputer = getPilihanComputer();
//     const pilihanPlayer = pGunting.className;
//     const hasil = getHasil(pilihanComputer, pilihanPlayer);
    
//     const jawabanComp = document.querySelector('.pilihan-comp');
//     jawabanComp.innerHTML = pilihanComputer;

//     const info = document.querySelector('.info');
//     info.innerHTML = hasil;
// });

// const pKertas = document.querySelector('.kertas');
// pKertas.addEventListener('click', function(){
//     const pilihanComputer = getPilihanComputer();
//     const pilihanPlayer = pKertas.className;
//     const hasil = getHasil(pilihanComputer, pilihanPlayer);
    
//     const jawabanComp = document.querySelector('.pilihan-comp');
//     jawabanComp.innerHTML = pilihanComputer;

//     const info = document.querySelector('.info');
//     info.innerHTML = hasil;
// });

