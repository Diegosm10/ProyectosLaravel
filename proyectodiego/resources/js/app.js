import './bootstrap';

function createRandomUser(){
    const count = document.getElementById('count').value;
    const url = `https://randomuser.me/api/?results=${count}`;
    fetch(url)
        .then(response => response.text())
        .then(data => {
            return JSON.parse(data); 
        })
        .then(data => {
            const users = data.results; 
            fetch('/users/store', { 
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ users })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    const alertDiv = document.createElement('div');
                    alertDiv.className = 'alert alert-success';
                    alertDiv.innerText = data.message;
                    document.body.prepend(alertDiv);
            
                    setTimeout(() => alertDiv.remove(), 3000);
                }
            })
            .catch(error => console.error('Error guardando usuarios:', error));
        })
        .catch(error => console.error('Error fetching random users:', error));
}

window.createRandomUser = createRandomUser;