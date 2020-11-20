// hamburger toggle function
var hamburgerToggle = function(t) {
    let hamburger = t.classList;
    let masthead = document.querySelector('#masthead').classList;
    if (hamburger.contains('is-active')) {
        hamburger.remove('is-active');
        masthead.remove('expand');
    } else {
        hamburger.add('is-active');  
        masthead.add('expand');
    }
}

var scrollCheck = function() {
    if (window.scrollY !== 0) {
        document.querySelector('#masthead').classList.add('scrolled');
    } else {
        document.querySelector('#masthead').classList.remove('scrolled');
    }
}

window.addEventListener('scroll', scrollCheck);

var validatesAsRequired = document.querySelectorAll('.wpcf7-validates-as-required');

if (validatesAsRequired.length !== 0) {
    for (i = 0; i < validatesAsRequired.length; i++) {
        validatesAsRequired[i].required = true;
    }
}

var cf7Forms = document.querySelectorAll('.wpcf7-form');

if (cf7Forms.length !== 0) {
    for (i = 0; i < cf7Forms.length; i++) {
        cf7Forms[i].removeAttribute('novalidate');
        cf7Forms[i].setAttribute('validate', true);
    }
}

window.onload = function() {
    scrollCheck(); 
}