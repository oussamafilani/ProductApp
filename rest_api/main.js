obj = {
    id: "3"
}

fetch('http://localhost/rest_api/restApi.php', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json'
    },
    body: JSON.stringify(obj)
}).then(res => res.json())
.then(data => console.log(data))