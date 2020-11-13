<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<style>
html,
body {
  width: 100%;
  height: 100%;
}
body {
  background: #efefef;
  font: 14px/1 "Roboto", sans-serif;
}
main {
  -ms-flex-align: center;
  align-items: center;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-pack: center;
  height: 100%;
}
.container {
  margin: 0 auto;
}
form {
  background: #fff;
  border-top: 1px solid rgba(0, 0, 0, 0.08);
  border-right: 1px solid rgba(0, 0, 0, 0.1);
  border-bottom: 1px solid rgba(0, 0, 0, 0.12);
  border-left: 1px solid rgba(0, 0, 0, 0.08);
  box-shadow: 0 3rem 5rem -2rem rgba(0, 0, 0, 0.2);
  margin: 0 auto;
  max-width: 380px;
  padding: 15px 35px 45px;
}
h2 {
  color: #666;
  margin-bottom: 0.75em;
  text-align: center;
}
.input-group {
  margin-bottom: 1.25em;
}
input[type="text"],
input[type="password"] {
  -webkit-appearance: none;
  border-radius: 1px;
  box-sizing: border-box;
  font-size: 1.25em;
  height: auto;
  padding: 0.5em;
}
/* suppress IE >= 10 native functionality that can show password */
input[type="password"]::-ms-reveal {
  display: none;
}
.btn {
  margin-top: 1.75em;
}
.input-group {
  position: relative;
  width: 100%;
}
.toggle {
  background: none;
  border: none;
  color: #337ab7;
  /*display: none;*/
  /*font-size: .9em;*/
  font-weight: 600;
  /*padding: .5em;*/
  position: absolute;
  right: 0.75em;
  top: 2.25em;
  z-index: 9;
}

.fa {
  font-size: 2rem;
}
</style>
<main>
    <div class="container">
      <form id="fo">
        <h2>Enter Table Password</h2>
        <div class="input-group">
          <label for="txtPassword">Password</label>
          <input type="password" id="txtPassword" class="form-control" name="txtPassword" />
          <button type="button" id="btnToggle" class="toggle"><i id="eyeIcon" class="fa fa-eye"></i></button>
        </div>
        <button class="btn btn-lg btn-primary btn-block" id="submit">Go!</button>
      </form>
    </div>
  </main>

  <script>
  
document.getElementById('fo').addEventListener('submit',function(e){
e.preventDefault();
console.log("ds")
});
console.log( localStorage.getItem('id'))
let table_id = localStorage.getItem('table_id');
if(!'{{ Session::get('table_id')}}' == '')
   localStorage.setItem('table_id' , '{{ Session::get('table_id')}}')
let passwordInput = document.getElementById('txtPassword');
    let s = document.getElementById('submit');
    s.addEventListener('click',function(e){
      e.preventDefault();
           console.log(passwordInput.value)
           let  xhr = new XMLHttpRequest();
              xhr.open('POST', '/api/checkPassword');
              xhr.setRequestHeader('Content-Type', 'application/json');
              xhr.send(
                      JSON.stringify({
                            "password": passwordInput.value,
                            "table_id": localStorage.getItem('id'), 
                            })
              );
              xhr.onload = function() {
                  if (xhr.status === 200 ) {
                    tos(passwordInput.value , localStorage.getItem('id'))
               
                  }
                  else if (xhr.status !== 200) {
                      alert('Request failed.  Returned status of ' + xhr.status);
                  }
                  if(xhr.status==200){
                    setTimeout(() => {
                    fetch(`/api/order/${localStorage.getItem('id')}`)
                              .then(response => response.json())
                              .then(data => {
                                  let Oj = { 'token': data.token, 'status': 0 };
                                  localStorage.setItem('Oj', JSON.stringify(Oj));
                                  window.location= '/table/' +localStorage.getItem('id');
                              });
                   }, 1000);
                  }
              } 
    });

    toggle = document.getElementById('btnToggle'),
    icon =  document.getElementById('eyeIcon');

function togglePassword() {
  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    icon.classList.add("fa-eye-slash");
    //toggle.innerHTML = 'hide';
  } else {
    passwordInput.type = 'password';
    icon.classList.remove("fa-eye-slash");
    //toggle.innerHTML = 'show';
  }
}
function checkInput() {
  //if (passwordInput.value === '') {
  //toggle.style.display = 'none';
  //toggle.innerHTML = 'show';
  //  passwordInput.type = 'password';
  //} else {
  //  toggle.style.display = 'block';
  //}
}
toggle.addEventListener('click', togglePassword, false);
passwordInput.addEventListener('keyup', checkInput, false);
function  tos(password , table_id){
                        let xhttp = new XMLHttpRequest();
                             xhttp.open("get", `/tos?password=${password}&table_id=${table_id}`);
                             xhttp.setRequestHeader('Content-Type', 'application/json');
                             xhttp.send(
                                 JSON.stringify({
                                     "password": password,
                                     "table_id'":table_id
                                 })
                             );
                             xhttp.onload = function() {
                                  if (xhttp.status == 200) {
                                      let po = JSON.parse(xhttp.responseText);
                                      setTimeout(function () {
                                        localStorage.clear();

                                      },3000)
                                  }
                                  else if (xhttp.status !== 200) {
                                      alert('Request failed.  Returned status of ' + xhttp.status);
                                  }
                             }
}
  </script>