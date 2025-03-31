let isopen = false;

function open(event) {
    event.stopPropagation(); // stop main from triggering close on same click
    for (let element of document.getElementsByTagName('nav')) {
        element.className = 'visible';
    }
    isopen = true;
}
function close() {
    if (isopen) {
        for (let element of document.getElementsByTagName('nav')) {
            element.className = '';
        }
        isopen = false;
    }
}

document.getElementById('nav-burger').addEventListener('click', open);

document.getElementsByClassName('main')[0].addEventListener('click', close);

// the nav will close itself if the window is made larger and then shrunk
// rather than remembering that it was open last time thew window was small
window.addEventListener('resize', () => {
    if (window.innerWidth >= 576) {
        close();
    }
})