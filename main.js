
const tabItem = document.querySelectorAll('.tabs__btn-item');
const tabContent = document.querySelectorAll('.tabs__content-item');
const allCards = document.querySelector('.show__link');
const tabsText = document.querySelector('.tabs__text');


//ЛИСТАЕМ СТРАНИЦЫ


tabItem.forEach(function (element) {
    element.addEventListener('click', open);
})

function open(event) {
    const tabTarget = event.currentTarget;
    const button = tabTarget.dataset.button
    tabItem.forEach(function (item) {
        item.classList.remove('tabs__btn-item--active');

    })
    tabTarget.classList.add('tabs__btn-item--active')
    tabContent.forEach(function (item) {
        item.classList.remove('tabs__content-item--active')

    })
    tabContent.forEach(el => {
        el.classList.remove('all__tabs')
        el.classList.add('tabs__content-item')
    })
    document.querySelector(`#${button}`).classList.add('tabs__content-item--active')
    allCards.style.display = 'block'
    tabsText.style.display ='none'
}


const menuBtn = document.querySelector(".menu__btn");
const menu = document.querySelector(".menu__list");

menuBtn.addEventListener('click', () => {
    menu.classList.toggle('menu__list--active')
});



// const cardLink= document.querySelectorAll('.card__link')
// cardLink.forEach(function (el){
//     el.addEventListener('click', showBlock)
// })
// function showBlock(){
//    document.querySelector('.card__invisible').classList.add('show__block')
//
// }

