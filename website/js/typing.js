
let typingElement = document.getElementById('typing')
const typingString = typingElement.textContent;
typingElement.textContent = '';
let i = 1;
const delay = 50;

function typing() {
    if (i <= typingString.length) {
        typingElement = document.getElementById('typing');
        typingElement.textContent = typingString.substring(0, i);
        i++;
        setTimeout(typing, delay);
    }
}

setTimeout(typing, delay);
