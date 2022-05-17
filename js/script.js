//JS FILE
const token = document.querySelector('#token')
const submit = document.querySelector('.submit-token')
const card_dl = document.querySelector('.card-dl')
const background = document.querySelector('.background')
const wrapper = document.querySelector('.wrapper')
const elements = document.querySelector('.elements')
const noFile = document.querySelector('.noFile')
const explication_txt = document.querySelector('.explication--txt')
const token_container = document.querySelector('.token-container')
const token_added = document.querySelector('.token-added')

$(document).ready(function(){
    $('.collapsible').collapsible();
});

let flag = true

window.onload = function (){
    // if(token_added !== null){
    if(flag){
        // getFromToken(tokenFromUrl)
        getFromToken("py")
    }else{
        explication_txt.innerText = "" +
            "Ce site vous permet de récupérer des fichiers à télécharger. " +
            "Veuillez rentrer le token qui vous a été transmis." + "\n\n" +
            "Si aucun token ne vous a été transmis, contactez moi."
    }
}

function getFromToken(token_value){
    let url = `https://files.nicolasvaillant.net/php/get.php?token=${token_value}`
    httpRequest(url)
}

function httpRequest(url) {

    const xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState === 4 && xmlHttp.status === 200){
            const resp = JSON.parse(xmlHttp.responseText)
            if(resp.length !== 0){
                showElement(resp[0].file, resp[0].size)
                // if(token_added !== null){
                if(flag){
                    tokenGivenPassed()
                }
            }else{
                showError()
            }
        }

    }
    xmlHttp.open("GET", url, true); // true for asynchronous
    xmlHttp.send(null);
}

function tokenGivenPassed(){
    explication_txt.innerText = "" +
        "Ce site vous permet de récupérer des fichiers à télécharger. " +
        "Votre token a bien été pris en compte." + "\n\n" +
        "Si vous pensez que ce fichier n'est pas le bon, contactez moi."
    token_container.classList.add('tokenGiven')
}

submit.addEventListener('click', () => {
    let token_value = token.value

    for (let child of elements.children) {
        if(child.getAttribute('data-status') === 'visible'){
            child.remove()
            noFile.setAttribute('data-status', 'hidden')
        }
    }
    getFromToken(token_value)

},false)

function showElement(link, size){
    afterInit()

    const clone = card_dl.cloneNode(true);

    clone.querySelector('#dl-icon').href = "./" + link
    clone.querySelector('.name-element').innerHTML = link.split("/")[1]
    clone.querySelector('.size-element').innerHTML = size

    clone.setAttribute('data-status', 'visible')
    elements.appendChild(clone);
}

function showError(){
    afterInit()
    noFile.setAttribute('data-status', 'visible')
}

function afterInit(){
    background.setAttribute('data-status', 'hidden')
    noFile.setAttribute('data-status', 'hidden')
    wrapper.classList.remove('init')
}