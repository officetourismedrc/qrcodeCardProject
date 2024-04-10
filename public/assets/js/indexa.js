sideToggle = document.querySelector('.side-side__toggle');
sideContainer = document.querySelector('.side-side__container');
sideClose = document.querySelector('.side-side__close');

sideToggle.addEventListener('click', ()=>{
     sideContainer.classList.add('show-side-menu');
});

sideClose.addEventListener('click', ()=>{
    sideContainer.classList.remove('show-side-menu');
});

// side menu toggle remove name keep icon

sideMenuNameToggle = document.querySelector('.side-toggle');
sideMenuList = document.querySelectorAll('.side-menu__list');

sideMenuNameToggle.addEventListener('click', ()=>{
    sideMenuList.forEach(el => {
        el.classList.toggle('hide-name');
    });     
});

const sideMenuRoll = document.querySelectorAll('.side-menu__list');

sideMenuRoll.forEach(element => {
    if(element.children.length > 1){
        element.addEventListener('click', function(){
            this.children[1].classList.toggle('show-active');
            // console.log(this.children[1]);
        })
    }
});

