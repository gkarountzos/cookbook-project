
const togglePfp = document.querySelector('#togglePfp');
const updatePfp = document.querySelector('.update-pfp');


togglePfp.addEventListener('click', (event) => {
    event.preventDefault();
    if (updatePfp.style.visibility === 'hidden') {
        updatePfp.style.visibility = 'visible';
    }

});
