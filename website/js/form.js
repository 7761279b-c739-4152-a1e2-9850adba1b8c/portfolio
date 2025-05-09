
const email_regex = new RegExp(String.raw`^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$`);
const phone_regex = new RegExp(String.raw`^((?:\+|00)[17](?: |\-)?|(?:\+|00)[1-9]\d{0,2}(?: |\-)?|(?:\+|00)1\-\d{3}(?: |\-)?)?(0\d|\([0-9]{3}\)|[1-9]{0,3})(?:((?: |\-)[0-9]{2}){4}|((?:[0-9]{2}){4})|((?: |\-)[0-9]{3}(?: |\-)[0-9]{4})|([0-9]{7}))$`);

// invalid fields on last form check
let invalids;
let visible = false;

function invalidName() {
    const element = document.getElementById('name');
    if (element.value != '') {
        element.className = 'valid'
        element.setCustomValidity("");
        invalids ^= (invalids & 0b1);
    } else {
        element.className = 'invalid'
        element.setCustomValidity("N is required");
        invalids |= 0b1;
    }
}
function invalidEmail() {
    const element = document.getElementById('email');
    if (email_regex.test(element.value)) {
        element.className = 'valid'
        element.setCustomValidity("");
        invalids ^= (invalids & 0b1100);
    } else {
        element.className = 'invalid'
        if (element.value == '') {
            element.setCustomValidity("Email address is required");
            invalids ^= (invalids & 0b1100);
            invalids |= 0b100;
        } else {
            element.setCustomValidity("Invalid email address");
            invalids ^= (invalids & 0b1100);
            invalids |= 0b1000;
        }
    }
}
function invalidPhone() {
    const element = document.getElementById('phone');
    if (element.value == '' || phone_regex.test(element.value)) {
        element.className = 'valid'
        element.setCustomValidity("");
        invalids ^= (invalids & 0b110000);
    } else {
        element.className = 'invalid'
        element.setCustomValidity("Invalid phone number");
        invalids ^= (invalids & 0b110000);
        invalids |= 0b100000;
    }
}
function invalidSubject() {
    const element = document.getElementById('subject');
    if (element.value != '') {
        element.className = 'valid'
        element.setCustomValidity("");
        invalids ^= (invalids & 0b1000000);
    } else {
        element.className = 'invalid'
        element.setCustomValidity("Subject must not be empty");
        invalids |= 0b1000000;
    }
}
function invalidMessage() {
    const element = document.getElementById('message');
    if (element.value != '') {
        element.className = 'valid'
        element.setCustomValidity("");
        invalids ^= (invalids & 0b10000000);
    } else {
        element.className = 'invalid'
        element.setCustomValidity("Message must not be empty");
        invalids |= 0b10000000;
    }
}

function updateErrorMessage() {
    hideErrorMessage();
    if (invalids == 0) {
        return;
    }
    visible = true;
    const element = document.createElement('div');
    element.id = "formError"
    let content = "<p>Unable to submit form:</p>";
    if (invalids & 0b1) {
        content += "<p>Name is required</p>";
    }
    if (invalids & 0b10) {
        content += "<p></p>";
    }
    if (invalids & 0b100) {
        content += "<p>Email address is required</p>";
    }
    if (invalids & 0b1000) {
        content += "<p>Invalid email address</p>";
    }
    if (invalids & 0b10000) {
        content += "<p>Phone number is required</p>";
    }
    if (invalids & 0b100000) {
        content += "<p>Invalid phone number</p>";
    }
    if (invalids & 0b1000000) {
        content += "<p>Subject is required</p>";
    }
    if (invalids & 0b10000000) {
        content += "<p>Message is required</p>";
    }
    element.innerHTML = `<div>${content}</div>`;
    const close = document.createElement('a');
    close.addEventListener('click', hideErrorMessage);
    element.append(close);
    document.getElementsByTagName('form')[0].prepend(element);
}
function hideErrorMessage() {
    const element = document.getElementById('formError');
    if (element) {
        element.remove();
    }
    visible = false;
}

document.getElementById('submit').addEventListener('click', () => {
    invalidName();
    invalidEmail();
    invalidPhone();
    invalidSubject();
    invalidMessage();
    updateErrorMessage();
})

document.getElementById('name').addEventListener('focusout', () => {
    invalidName();
    if (visible) {
        updateErrorMessage();
    }
});
document.getElementById('email').addEventListener('focusout', () => {
    invalidEmail();
    if (visible) {
        updateErrorMessage();
    }
});
document.getElementById('phone').addEventListener('focusout', () => {
    invalidPhone();
    if (visible) {
        updateErrorMessage();
    }
});
document.getElementById('subject').addEventListener('focusout', () => {
    invalidSubject();
    if (visible) {
        updateErrorMessage();
    }
});
document.getElementById('message').addEventListener('focusout', () => {
    invalidMessage();
    if (visible) {
        updateErrorMessage();
    }
});

// if form errors from php, add event listener to close them
if (document.getElementById('formError') != undefined) {
    for (element of document.getElementById('formError').children) {
        if (element.tagName.toLowerCase() == 'a') {
            element.addEventListener('click', hideErrorMessage);
        }
    }
}