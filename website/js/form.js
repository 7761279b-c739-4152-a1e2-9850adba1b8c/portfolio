
const email_regex = new RegExp(String.raw`^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$`)

// invalid fields on last form check
let invalids;
let visible = false;

function invalidFirstName() {
    const element = document.getElementById('first-name');
    console.log(element.value);
    if (element.value != '') {
        element.className = 'valid'
        element.setCustomValidity("");
        invalids ^= (invalids & 0b1);
    } else {
        element.className = 'invalid'
        element.setCustomValidity("First name is required");
        invalids |= 0b1;
    }
}
function invalidLastName() {
    const element = document.getElementById('last-name');
    if (element.value != '') {
        element.className = 'valid'
        element.setCustomValidity("");
        invalids ^= (invalids &= 0b10);
    } else {
        element.className = 'invalid'
        element.setCustomValidity("Last name is required");
        invalids |= 0b10;
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
function invalidSubject() {
    const element = document.getElementById('subject');
    if (element.value != '') {
        element.className = 'valid'
        element.setCustomValidity("");
        invalids ^= (invalids & 0b10000);
    } else {
        element.className = 'invalid'
        element.setCustomValidity("Subject must not be empty");
        invalids |= 0b10000;
    }
}
function invalidMessage() {
    const element = document.getElementById('message');
    if (element.value != '') {
        element.className = 'valid'
        element.setCustomValidity("");
        invalids ^= (invalids & 0b100000);
    } else {
        element.className = 'invalid'
        element.setCustomValidity("Message must not be empty");
        invalids |= 0b100000;
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
        content += "<p>First name is required</p>";
    }
    if (invalids & 0b10) {
        content += "<p>Last name is required</p>";
    }
    if (invalids & 0b100) {
        content += "<p>Email address is required</p>";
    }
    if (invalids & 0b1000) {
        content += "<p>Invalid email address</p>";
    }
    if (invalids & 0b10000) {
        content += "<p>Subject is required</p>";
    }
    if (invalids & 0b100000) {
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
    invalidFirstName();
    invalidLastName();
    invalidEmail();
    invalidSubject();
    invalidMessage();
    updateErrorMessage();
})

document.getElementById('first-name').addEventListener('focusout', () => {
    invalidFirstName();
    if (visible) {
        updateErrorMessage();
    }
});
document.getElementById('last-name').addEventListener('focusout', () => {
    invalidLastName();
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

document.getElementsByTagName('form')[0].addEventListener('submit', (event) =>  {
    event.preventDefault();
    // for now just prevent page refreshing, later will send to backend
})