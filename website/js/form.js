
const email_regex = new RegExp(String.raw`^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$`)

function invalidFirstName() {
    const element = document.getElementById('first-name');
    if (element.value != '') {
        element.className = 'valid'
        element.setCustomValidity("");
        return false;
    }
    element.className = 'invalid'
    element.setCustomValidity("First name is required");
    return true;
}
function invalidLastName() {
    const element = document.getElementById('last-name');
    if (element.value != '') {
        element.className = 'valid'
        element.setCustomValidity("");
        return false;
    }
    element.className = 'invalid'
    element.setCustomValidity("Last name is required");
    return true;
}
function invalidEmail() {
    const element = document.getElementById('email');
    if (email_regex.test(element.value)) {
        element.className = 'valid'
        element.setCustomValidity("");
        return false;
    }
    element.className = 'invalid'
    element.setCustomValidity("Invalid email address");
    return true;
}
function invalidSubject() {
    const element = document.getElementById('subject');
    if (element.value != '') {
        element.className = 'valid'
        element.setCustomValidity("");
        return false;
    }
    element.className = 'invalid'
    element.setCustomValidity("Subject must not be empty");
    return true;
}
function invalidMessage() {
    const element = document.getElementById('message');
    if (element.value != '') {
        element.className = 'valid'
        element.setCustomValidity("");
        return false;
    }
    element.className = 'invalid'
    element.setCustomValidity("Message must not be empty");
    return true;
}
function showErrorMessage() {
    hideErrorMessage();
    const element = document.createElement('div');
    element.id = "formError"
    element.innerHTML = "<p>Unable to submit form: some fields are invalid.</p>";
    document.getElementsByTagName('form')[0].prepend(element);
}
function hideErrorMessage() {
    const element = document.getElementById('formError');
    if (element) {
        element.remove();
    }
}

document.getElementById('submit').addEventListener('click', () => {
    if (invalidFirstName() +
        invalidLastName() +
        invalidEmail() +
        invalidSubject() +
        invalidMessage()
    ) {
        showErrorMessage();
    } else {
        hideErrorMessage();
    }
})

document.getElementById('first-name').addEventListener('focusout', invalidFirstName);
document.getElementById('last-name').addEventListener('focusout', invalidLastName);
document.getElementById('email').addEventListener('focusout', invalidEmail);
document.getElementById('subject').addEventListener('focusout', invalidSubject);
document.getElementById('message').addEventListener('focusout', invalidMessage);
