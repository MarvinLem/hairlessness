const fadeInAnimation = function() {
    let hiddenElements;
    let windowHeight;
    function init() {
        hiddenElements = document.querySelectorAll('.withoutJavascript');
        windowHeight = window.innerHeight;
        changeClass();
        addEventHandlers();
        checkPosition();
    }
    function changeClass(){
        for (let i = 0; i < hiddenElements.length; i++) {
            hiddenElements[i].className = hiddenElements[i].className.replace(
                'withoutJavascript',
                'hidden'
            );
        }
        hiddenElements = document.querySelectorAll('.hidden');
    }
    function addEventHandlers() {
        window.addEventListener('scroll', checkPosition);
        window.addEventListener('resize', init);
    }
    function checkPosition() {
        for (let i = 0; i < hiddenElements.length; i++) {
            let positionFromTop = hiddenElements[i].getBoundingClientRect().top;
            if (positionFromTop - windowHeight <= -100) {
                hiddenElements[i].className = hiddenElements[i].className.replace(
                    'hidden',
                    'fade-in-element'
                );
            }
        }
    }
    return {
        init: init
    };
};

const checkForm = function(){
    let contactForm;
    let submitButton;
    let nameInput;
    let emailInput;
    let mobileInput;
    let messageInput;
    let errorFeedback;
    function init(){
        contactForm = document.querySelector('#contactForm');
        submitButton = document.querySelector('#contactButton');
        nameInput = document.querySelector('#nom');
        emailInput = document.querySelector('#email');
        mobileInput = document.querySelector('#mobile');
        messageInput = document.querySelector('#message');
        errorFeedback = document.querySelector('#error');
        if(submitButton) {
            addEventHandler()
        }
    }
    function addEventHandler(){
        submitButton.addEventListener('click', checkInput);
    }
    function checkInput(){
        let errorArray = [];
        if(nameInput.value === ""){
            nameInput.classList.add('invalid');
            errorArray.push('error');
        } else {
            nameInput.classList.remove('invalid');
        }
        if(!emailInput.checkValidity()){
            emailInput.classList.add('invalid');
            errorArray.push('error');
        } else {
            emailInput.classList.remove('invalid');
        }
        if(messageInput.value === ""){
            messageInput.classList.add('invalid');
            errorArray.push('error');
        } else {
            messageInput.classList.remove('invalid');
        }

        if(errorArray.length === 0){
            contactForm.submit();
        } else {
            errorMessage("Les champs entourés rouge n'ont pas été remplis correctement");
        }
    }
    function errorMessage($text){
        errorFeedback.innerHTML = $text;
    }
    return {
        init: init
    }
};

const lightBoxEffect = function() {
    let body;
    let lightBox;
    let content;
    let background;
    let closeButton;
    let imageArray;
    let active;
    let windowWidth;
    let windowHeight;
    function init(){
        body = document.querySelector("body");
        lightBox = document.querySelector('#lightbox');
        content = document.querySelector('#lightbox .content');
        background = document.querySelector('#lightbox .background');
        closeButton = document.querySelector('#lightbox .icon--cancel');
        imageArray = document.querySelectorAll('.image--small');
        active = false;
        windowWidth = window.innerWidth;
        windowHeight = window.innerHeight;
        if(lightBox) {
            addEventHandler()
        }
    }
    function addEventHandler(){
        for(let i=0; i < imageArray.length;i++){
                imageArray[i].addEventListener('click', function(e){
                    if(active === false && windowWidth > windowHeight){
                        let element = e.target;
                        let image = document.createElement("img");
                        image.setAttribute("src", element.getAttribute('src').replace('.jpg','-hd.jpg'));
                        image.setAttribute("alt", element.getAttribute('alt'));
                        image.setAttribute("class", element.getAttribute('class'));
                        content.appendChild(image);
                        lightBox.classList.toggle('lightbox--off');
                        active = true;
                        body.style.overflowY = "hidden";
                    }
                });
            }
            background.addEventListener('click', desactiveLightBox);
            closeButton.addEventListener('click', desactiveLightBox);
            document.addEventListener('keyup', function (e){
                if(active === true && e.keyCode===27){
                    lightBox.classList.toggle('lightbox--off');
                    content.removeChild(content.lastChild);
                    active = false;
                    body.style.overflowY = "initial";
                }
            });
    }
    function desactiveLightBox(){
        if(active === true){
            lightBox.classList.toggle('lightbox--off');
            content.removeChild(content.lastChild);
            active = false;
            body.style.overflowY = "initial";
        }
    }
    return {
        init: init
    }
};

fadeInAnimation().init();
checkForm().init();
lightBoxEffect().init();