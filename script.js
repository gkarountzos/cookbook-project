document.addEventListener('DOMContentLoaded', function () {

    const togglePfp = document.querySelector('#togglePfp');
    const updatePfp = document.querySelector('.update-pfp');

    console.log(togglePfp);
    console.log(updatePfp);

    togglePfp.addEventListener('click', () => {
        console.log('Button clicked');
        if (updatePfp.style.display === 'none') {
            updatePfp.style.display = 'block';
        } else {
            updatePfp.style.display = 'none';
        }
    });
});