window.addEventListener('load', () => {
    document.getElementById('close-message').addEventListener('click', (evt) => {
        document.getElementById('message').remove();
    })
})