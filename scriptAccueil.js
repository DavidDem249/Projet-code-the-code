var boutton = document.querySelector('.bouttonAnimation')
var compagnie = document.querySelector('.comp')

var animation = function(){
    console.log('dgdgd')
    compagnie.classList.remove('cacher')
    compagnie.classList.add('trouver')
}

boutton.addEventListener('click', function(){
    console.log('dgdgd')
    compagnie.classList.remove('cacher')
    compagnie.classList.add('trouver')
})