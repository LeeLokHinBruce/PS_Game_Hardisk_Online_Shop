let order = document.getElementsByClassName('order')
for(let i=0; i<order.length; i++){
    i % 2 == 0 ? order[i].classList.add('orderBgColor-gray') : order[i].classList.add('orderBgColor-white')
}