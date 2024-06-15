document.getElementById('refresh').addEventListener('click', function(){
    fetch('refreshcaptcha')
        .then(response => response.json())
        .then(data => {
            document.querySelector('.captcha span').innerHTML = data.captcha;
        })
        .catch(error => console.error('Error:', error));
});