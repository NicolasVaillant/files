//JS FILE
const token = document.querySelector('#token')
const submit = document.querySelector('.submit-token')
const card_dl = document.querySelector('.card-dl')
const background = document.querySelector('.background')
const wrapper = document.querySelector('.wrapper')
const elements = document.querySelector('.elements')
const noFile = document.querySelector('.noFile')

function getFromToken(token_value){
    $.ajax({
        type : "GET",
        url  : "http://files.nicolasvaillant.net/php/get.php",
        dataType: 'json',
        data : {},
        success: function(res) {
            for (let i = 0; i < res.length; i++) {
                if(res[i].token === token_value){
                    showElement(res[i].file)
                }else{
                    showError()
                }
            }
        },
        error: function (request, status, error) {
            showError()
        }
    });
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

function showElement(link){
    afterInit()

    const clone = card_dl.cloneNode(true);

    clone.querySelector('#dl-icon').href = "./" + link
    clone.querySelector('.name-element').innerHTML = link

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