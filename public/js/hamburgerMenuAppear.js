function humburgerMenuAppear() {
    const topMenuBtn = document.getElementById('top-menu-btn');
    const topMenu = document.getElementById('top-menu');
    if(topMenuBtn.classList.contains('top-menu-btn-move')) {
        topMenuBtn.classList.remove('top-menu-btn-move');
        topMenu.classList.remove('top-menu-appear');
    } else {
        topMenuBtn.classList.add('top-menu-btn-move');
        topMenu.classList.add('top-menu-appear');
    }
}

// const topMenuBtn = document.getElementById('top-menu-btn');
// const topMenu = document.getElementById('top-menu');
// topMenuBtn.addEventListener('click', () => {
//     if(topMenuBtn.classList.contains('top-menu-btn-move')) {
//         topMenuBtn.classList.remove('top-menu-btn-move');
//         topMenu.classList.remove('top-menu-appear');
//     } else {
//         topMenuBtn.classList.add('top-menu-btn-move');
//         topMenu.classList.add('top-menu-appear');
//     }
// });