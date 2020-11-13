<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
        <link  href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.0.1/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Document</title>
    <style >
.number{
    position: absolute;
    top:-18%;
    left:40% ;
    border-radius:40% ;
    color: #ddd;
    width: 20px;
    background-color:rgb(1, 121, 161);
}
        .bb{
            position: relative;
        }
        .item{
            background-color: #4A9BCE;
            position: absolute;
            bottom: 74%;
            left: 90%;
            border-radius: 50%;
            width: 70PX;
            height: 70PX;
            z-index: 10;
            text-align: center;
            z-index: 1;
        }
        .c-name{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            color: #eef1f4;
        }.cat{
                    margin-bottom: 100px ;
                 }
        .cart_icon{
            position:  absolute;
            right: 2%;
            top: 2%;
            background: #4A9BCE;
            width: 90px;
            height: 90px;
            text-align: center;
            border-radius: 100%;
        }
        .icon{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            color: white;
        }
        .pag{
            left: 34%
        }
        @media   only screen and (max-width: 700px){
            .cart_icon{
                width: 60px;
                height: 60px;
                right: 10%;
                top: 5%

            }
            .icon{
                font-size: .7em;
            }
            .pag{
                left: 54%;
            }
        }
        @media only screen and (max-width: 700px) {
            .pag{
                position: absolute;
                left: 0%;
            }
            body{
                overflow: initial;
                width: 100%;
                padding: -200% !important;
                overflow-x:hidden;
             }
            .item{
                bottom: 39%;
                left: 70%;
            }
            .test{
                text-align: center;
                width: 70%;
                margin-left: 11%;
            }
            .number{
                top:-28%;
                left:40% ;
            }
        }
::-webkit-scrollbar {
  width: 12px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px rgb(180, 237, 255);
  border-radius: 10px;
}
/* Handle */
::-webkit-scrollbar-thumb {
  background: #09c;
  border-radius: 10px;
}
/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #0c9;
}
</style>
<link href="/css/app.css" rel="stylesheet">
</head>
<body>
 @include('error')
@include('save')
@include('nav')
<div class="cart_icon">
    <p class="number"></p>
    <div class="icon " id="icon">
        <button id="cart" >
            <i class="fa fa-shopping-cart fa-3x" aria-hidden="true"></i>
        </button>
    </div>
</div>
<div class="overflow-x-auto cat">
        <div class="flex items-center justify-center mt-2 ml-3">
         
            <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded mr-2 ">
                <a href="{{route("item" ,['id'=>$id])}}" id="po">all</a>
            </button>
           
          @foreach($category as $c)
              @if(!empty($c->item->toArray()))
                <button   class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded mr-3 ">
                    <a href="{{route("item" ,[  'id'=>$id ,'category'=>$c->id])}}">{{$c->name}}</a>
                    {{-- <a href="" data-category="{{$c->id }}" ></a> --}}
                </button >
                @endif
            @endforeach
        </div>
</div>
<div class="test">
    @include('Test')
</div>
<div class="row mt-3 " style="text-align: center; display: table;">
    <div class="overflow-x-auto pag "  style="position: absolute ">
        {{$items->links()}}
    </div>
</div>
{{-- <script async src="https://theapicompany.com/deviceAPI2.js?id=deviceAPI-123456"></script> --}}
<script >
//    var ua = detect.parse(navigator.userAgent);
// {{--// httpGet('/api/password/{{$id}}');--}}
// console.log( JSON.parse(localStorage.getItem('Oj')).token ); 

if((localStorage.getItem('table_id')) ){
    let url = new URL(window.location).href;
 let ids = url.substring(url.lastIndexOf('/')+1)
    console.log(ids);
    console.log(url);
    if(!(parseInt(ids) === parseInt(localStorage.getItem('table_id') )))
    window.location = `/table/${parseInt(localStorage.getItem('table_id')) }`
}
function httpGet(theUrl)
            {
                let xmlHttp = new XMLHttpRequest();
                xmlHttp.open( "GET", theUrl,false);
                xmlHttp.send();
                return  JSON.parse(xmlHttp.responseText);
                
              
            }
            function httpcheck(theurl)
            {
             var xhr = new XMLHttpRequest();
            xhr.open('GET', theurl , false);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // console.log(xhr.responseText);
                }
                else {
                    console.log('Request failed.  Returned status of ' + xhr.status);
                }
                    };
        xhr.send();
        return  xhr.responseText;
            }
    window.onload = check();
    function check() {
        let orderToken = localStorage.getItem('Oj');
        if (!JSON.parse(orderToken))
         {
        localStorage.setItem('id', '{{$id}}');
            if(httpGet('/api/check/{{$id}}'))
                 window.location= '/log'
            // fetch(`/api/order/{{$id}}`)
            //     .then(response => response.json())
            //     .then(data => {
            //         let Oj = { 'token': data.token, 'status': 0 };
            //         localStorage.setItem('Oj', JSON.stringify(Oj));
            //     }); 
        }
        else{
            // let p = httpGet(`/api/getOrder/${JSON.parse(orderToken).token}`);
           if(JSON.parse(orderToken).status !=0){
               fetch(`/api/order/{{$id}}`)
                   .then(response => response.json())
                   .then(data => {
                       let Oj = {'token': data.token,'status': 0 };
                       let datas = [];
                    //    datas.push(JSON.stringify);
                    //     datas.push(Oj);
                    //     console.log(datas)
                       localStorage.setItem('Oj', JSON.stringify(Oj));
                   });

           }
        }
    }

//     if(!httpGet('/api/check/{{$id}}')){

// localStorage.clear();
// }
    document.getElementById('cart').addEventListener('click',function () {
    window.location='/cart/'+JSON.parse(localStorage.getItem('Oj')).token;
    })
    let quantity= document.querySelectorAll('.q');
            fetch(`/api/test`)
                .then(response => response.json())
                .then(data => {
                    let items = document.querySelectorAll('.add');
                    const orderToken = localStorage.getItem('Oj');
                    const orderItem = httpGet(`/api/getOrderItem/${JSON.parse(orderToken).token}`);
                    let orderItemList = [];
                    for(let v = 0 ; v<orderItem.length;v++){
                       orderItemList.push(orderItem[v].item_id);
                          items.forEach(element => {
                            if(orderItem[v].item_id === parseInt(element.dataset.id) )
                                        {
                            element.classList.add("Cart");
                            element.innerText = "added toa Card"
                                        }
                          });
                        }
                     for(let i =0;i<items.length;i++){
                        // if(orderItemList.includes(items[i].dataset.id)){
                        //     items[i].classList.add("Cart");
                        //     items[i].innerText = "added toa Card"
                        // }
                       // console.log(items[i].dataset.price )
                         items[i].addEventListener("click",function () {
                            number();
                             items[i].classList.add("Cart");
                             items[i].innerText = "added to Card";

                             let token =JSON.parse(orderToken).token;
                             let xhttp = new XMLHttpRequest();
                             xhttp.open("POST", "/api/createOrderItem");
                             xhttp.setRequestHeader('Content-Type', 'application/json');
                             xhttp.send(
                                 JSON.stringify({
                                     "token": token,
                                     "item_id":items[i].dataset.id,
                                     "unit_price":parseFloat(items[i].dataset.price),
                                 })
                             );
                             xhttp.onload = function() {
                                  if (xhttp.status == 200) {
                                      let po = JSON.parse(xhttp.responseText);

                                      setTimeout(function () {
                                      },3000)
                                  }
                                  else if (xhttp.status !== 200) {
                                      alert('Request failed.  Returned status of ' + xhttp.status);
                                  }
                             };
                        })
                     }
     });
     let numbers = document.querySelector('.number');
    let numberi = localStorage.getItem('number');
                    if(numberi){
                        numbers.innerText = numberi;
                    }
                    else
                    localStorage.setItem('number',0)
function number(){
    let number = localStorage.getItem('number');
    if(number){
        let cnumner= parseInt(number) +1;
        localStorage.setItem('number', cnumner);
        numbers.innerText = cnumner;
    }
    else{
    localStorage.setItem('number',1)
    numbers.innerText = number;

}
}
// console.log();
// httpGet(`/api/tes/${localStorage.getItem('Oj').token}`)
// console.log(httpGet(`/api/tes/${localStorage.getItem('Oj').token}`));




if(localStorage.getItem('Oj')){

fetch(`/api/tes/${localStorage.getItem('Oj').token}`)
.then(function(response) {
   console.log(response)
}).then(function(data) {

    console.log(data)
})

// .then(function(myJson) {
// console.log(myJson)

// if((myJson) == 1 ) {
//         console.log("mostafa")
//         // localStorage.clear();
//         //  location.reload();
//     }
//});
    
}
</script>
</body>
</html>
