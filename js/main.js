document.getElementById("button").addEventListener("click", function () {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "https://api.github.com/users", true);
    console.log(this.status);

    xhr.onload = function () {
      if (this.status == 200) {
        let users = JSON.parse(this.responseText);
        let output = "";
        for (let i in users) {
          output += `
          <div class="user">
            <img src="${users[i].avatar_url}" alt="" width="80">
            <ul>
              <li>id : ${users[i].id}</li>
              <li>login : ${users[i].login} </li>
            </ul>
          </div>
         `;
        }
        document.getElementById("users").innerHTML = output;
      }
    };
    xhr.send();
  });