
const email_regex = new RegExp(String.raw`^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$`)

function invalidFirstName() {
    const element = document.getElementById('first-name');
    if (element.value != '') {
        element.className = 'valid'
        element.setCustomValidity("");
        return 0;
    }
    element.className = 'invalid'
    element.setCustomValidity("First name is required");
    return 0b1;
}
function invalidLastName() {
    const element = document.getElementById('last-name');
    if (element.value != '') {
        element.className = 'valid'
        element.setCustomValidity("");
        return 0;
    }
    element.className = 'invalid'
    element.setCustomValidity("Last name is required");
    return 0b10;
}
function invalidEmail() {
    const element = document.getElementById('email');
    if (email_regex.test(element.value)) {
        element.className = 'valid'
        element.setCustomValidity("");
        return 0;
    }
    element.className = 'invalid'
    if (element.value == '') {
        element.setCustomValidity("Email address is required");
        return 0b100;
    } else {
        element.setCustomValidity("Invalid email address");
        return 0b1000;
    }
}
function invalidSubject() {
    const element = document.getElementById('subject');
    if (element.value != '') {
        element.className = 'valid'
        element.setCustomValidity("");
        return 0;
    }
    element.className = 'invalid'
    element.setCustomValidity("Subject must not be empty");
    return 0b10000;
}
function invalidMessage() {
    const element = document.getElementById('message');
    if (element.value != '') {
        element.className = 'valid'
        element.setCustomValidity("");
        return 0;
    }
    element.className = 'invalid'
    element.setCustomValidity("Message must not be empty");
    return 0b100000;
}

function showErrorMessage(invalids) {
    hideErrorMessage();
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
    console.log(content);
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
}

document.getElementById('submit').addEventListener('click', () => {
    let invalids;
    if ((invalids = (
        invalidFirstName() |
        invalidLastName() |
        invalidEmail() |
        invalidSubject() |
        invalidMessage()
    )) != 0) {
        showErrorMessage(invalids);
    } else {
        hideErrorMessage();
    }
})

document.getElementById('first-name').addEventListener('focusout', invalidFirstName);
document.getElementById('last-name').addEventListener('focusout', invalidLastName);
document.getElementById('email').addEventListener('focusout', invalidEmail);
document.getElementById('subject').addEventListener('focusout', invalidSubject);
document.getElementById('message').addEventListener('focusout', invalidMessage);

document.getElementsByTagName('form')[0].addEventListener('submit', (event) =>  {
    event.preventDefault();
    // for now just prevent page refreshing, later will send to backend
})