<head>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    @import url(https://fonts.googleapis.com/css?family=Droid+Serif:400,400italic|Montserrat:400,700);
    html, body, div, span, applet, object, iframe,
    h1, h2, h3, h4, h5, h6, p, blockquote, pre,
    a, abbr, acronym, address, big, cite, code,
    del, dfn, em, img, ins, kbd, q, s, samp,
    small, strike, strong, sub, sup, tt, var,
    b, u, i, center,
    dl, dt, dd, ol, ul, li,
    fieldset, form, label, legend,
    table, caption, tbody, tfoot, thead, tr, th, td,
    article, aside, canvas, details, embed,
    figure, figcaption, footer, header, hgroup,
    menu, nav, output, ruby, section, summary,
    time, mark, audio, video {
        margin: 0;
        padding: 0;
        border: 0;
        font: inherit;
        font-size: 100%;
        vertical-align: baseline;
    }

    html {
        line-height: 1;
    }

    ol, ul {
        list-style: none;
    }

    table {
        border-collapse: collapse;
        border-spacing: 0;
    }

    caption, th, td {
        text-align: left;
        font-weight: normal;
        vertical-align: middle;
    }

    q, blockquote {
        quotes: none;
    }
    q:before, q:after, blockquote:before, blockquote:after {
        content: "";
        content: none;
    }

    a img {
        border: none;
    }

    article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary {
        display: block;
    }

    * {
        box-sizing: border-box;
    }

    body {
        color: #333;
        -webkit-font-smoothing: antialiased;
        font-family: "Droid Serif", serif;
    }

    img {
        max-width: 100%;
    }

    .cf:before, .cf:after {
        content: " ";
        display: table;
    }

    .cf:after {
        clear: both;
    }

    .cf {
        *zoom: 1;
    }

    .wrap {
        width: 75%;
        max-width: 960px;
        margin: 0 auto;
        padding: 5% 0;
        margin-bottom: 5em;
    }

    .projTitle {
        font-family: "Montserrat", sans-serif;
        font-weight: bold;
        text-align: center;
        font-size: 2em;
        padding: 1em 0;
        border-bottom: 1px solid #dadada;
        letter-spacing: 3px;
        text-transform: uppercase;
    }
    .projTitle span {
        font-family: "Droid Serif", serif;
        font-weight: normal;
        font-style: italic;
        text-transform: lowercase;
        color: #777777;
    }

    .heading {
        padding: 1em 0;
        border-bottom: 1px solid #D0D0D0;
    }
    .heading h1 {
        font-family: "Droid Serif", serif;
        font-size: 2em;
        float: left;
    }
    .heading a.continue:link, .heading a.continue:visited {
        text-decoration: none;
        font-family: "Montserrat", sans-serif;
        letter-spacing: -.015em;
        font-size: .75em;
        padding: 1em;
        color: #fff;
        background: #4A9BCE;
        font-weight: bold;
        border-radius: 50px;
        float: right;
        text-align: right;
        -webkit-transition: all 0.25s linear;
        -moz-transition: all 0.25s linear;
        -ms-transition: all 0.25s linear;
        -o-transition: all 0.25s linear;
        transition: all 0.25s linear;
    }
    .heading a.continue:after {
        content: "\276f";
        padding: .5em;
        position: relative;
        right: 0;
        -webkit-transition: all 0.15s linear;
        -moz-transition: all 0.15s linear;
        -ms-transition: all 0.15s linear;
        -o-transition: all 0.15s linear;
        transition: all 0.15s linear;
    }
    .heading a.continue:hover, .heading a.continue:focus, .heading a.continue:active {
        background: #f69679;
    }
    .heading a.continue:hover:after, .heading a.continue:focus:after, .heading a.continue:active:after {
        right: -10px;
    }

    .tableHead {
        display: table;
        width: 100%;
        font-family: "Montserrat", sans-serif;
        font-size: .75em;
    }
    .tableHead li {
        display: table-cell;
        padding: 1em 0;
        text-align: center;
    }
    .tableHead li.prodHeader {
        text-align: left;
    }

    .cart {
        padding: 1em 0;
    }
    .cart .items {
        display: block;
        width: 100%;
        vertical-align: middle;
        padding: 1.5em;
        border-bottom: 1px solid #fafafa;
    }
    .cart .items.even {
        background: #fafafa;
    }
    .cart .items .infoWrap {
        display: table;
        width: 100%;
    }
    .cart .items .cartSection {
        display: table-cell;
        vertical-align: middle;
    }
    .cart .items .cartSection .itemNumber {
        font-size: .75em;
        color: #777;
        margin-bottom: .5em;
    }
    .cart .items .cartSection h3 {
        font-size: 1em;
        font-family: "Montserrat", sans-serif;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: .025em;
    }
    .cart .items .cartSection p {
        display: inline-block;
        font-size: .85em;
        color: #777777;
        font-family: "Montserrat", sans-serif;
    }
    .cart .items .cartSection p .quantity {
        font-weight: bold;
        color: #333;
    }
    .cart .items .cartSection p.stockStatus {
        color: #4A9BCE;
        font-weight: bold;
        padding: .5em 0 0 1em;
        text-transform: uppercase;
    }
    .cart .items .cartSection p.stockStatus.out {
        color: #F69679;
    }
    .cart .items .cartSection .itemImg {
        width: 4em;
        float: left;
    }
    .cart .items .cartSection.qtyWrap, .cart .items .cartSection.prodTotal {
        text-align: center;
    }
    .cart .items .cartSection.qtyWrap p, .cart .items .cartSection.prodTotal p {
        font-weight: bold;
        font-size: 1.25em;
    }
    .cart .items .cartSection input.qty {
        width: 2em;
        text-align: center;
        font-size: 1em;
        padding: .25em;
        margin: 1em .5em 0 0;
    }
    .cart .items .cartSection .itemImg {
        width: 8em;
        display: inline;
        padding-right: 1em;
    }

    .special {
        display: block;
        font-family: "Montserrat", sans-serif;
    }
    .special .specialContent {
        padding: 1em 1em 0;
        display: block;
        margin-top: .5em;
        border-top: 1px solid #dadada;
    }
    .special .specialContent:before {
        content: "\21b3";
        font-size: 1.5em;
        margin-right: 1em;
        color: #6f6f6f;
        font-family: helvetica, arial, sans-serif;
    }

    a.remove {
        text-decoration: none;
        font-family: "Montserrat", sans-serif;
        color: #ffffff;
        font-weight: bold;
        background: #e0e0e0;
        padding: .5em;
        font-size: .75em;
        display: inline-block;
        border-radius: 100%;
        line-height: .85;
        -webkit-transition: all 0.25s linear;
        -moz-transition: all 0.25s linear;
        -ms-transition: all 0.25s linear;
        -o-transition: all 0.25s linear;
        transition: all 0.25s linear;
    }
    a.remove:hover {
        background: #f30;
    }

    .promoCode {
        border: 2px solid #efefef;
        float: left;
        width: 35%;
        padding: 2%;
    }
    .promoCode label {
        display: block;
        width: 100%;
        font-style: italic;
        font-size: 1.15em;
        margin-bottom: .5em;
        letter-spacing: -.025em;
    }
    .promoCode input {
        width: 85%;
        font-size: 1em;
        padding: .5em;
        float: left;
        border: 1px solid #dadada;
    }
    .promoCode input:active, .promoCode input:focus {
        outline: 0;
    }
    .promoCode a.btn {
        float: left;
        width: 15%;
        padding: .75em 0;
        border-radius: 0 1em 1em 0;
        text-align: center;
        border: 1px solid #4A9BCE;
    }
    .promoCode a.btn:hover {
        border: 1px solid #f69679;
        background: #f69679;
    }

    .btn:link, .btn:visited {
        text-decoration: none;
        font-family: "Montserrat", sans-serif;
        letter-spacing: -.015em;
        font-size: 1em;
        padding: 1em 3em;
        color: #fff;
        background: #4A9BCE;
        font-weight: bold;
        border-radius: 50px;
        float: right;
        text-align: right;
        -webkit-transition: all 0.25s linear;
        -moz-transition: all 0.25s linear;
        -ms-transition: all 0.25s linear;
        -o-transition: all 0.25s linear;
        transition: all 0.25s linear;
    }
    .btn:after {
        content: "\276f";
        padding: .5em;
        position: relative;
        right: 0;
        -webkit-transition: all 0.15s linear;
        -moz-transition: all 0.15s linear;
        -ms-transition: all 0.15s linear;
        -o-transition: all 0.15s linear;
        transition: all 0.15s linear;
    }
    .btn:hover, .btn:focus, .btn:active {
        background: #f69679;
    }
    .btn:hover:after, .btn:focus:after, .btn:active:after {
        right: -10px;
    }
    .promoCode .btn {
        font-size: .85em;
        paddding: .5em 2em;
    }

    /* TOTAL AND CHECKOUT  */
    .subtotal {
        float: right;
        width: 35%;
    }
    .subtotal .totalRow {
        padding: .5em;
        text-align: right;
    }
    .subtotal .totalRow.final {
        font-size: 1.25em;
        font-weight: bold;
    }
    .subtotal .totalRow span {
        display: inline-block;
        padding: 0 0 0 1em;
        text-align: right;
    }
    .subtotal .totalRow .label {
        font-family: "Montserrat", sans-serif;
        font-size: .85em;
        text-transform: uppercase;
        color: #777;
    }
    .subtotal .totalRow .value {
        letter-spacing: -.025em;
        width: 35%;
    }
    @media only screen and (max-width: 39.375em) {
        .wrap {
            width: 98%;
            padding: 2% 0;
        }

            body{

            height: 100%;
            widows: 100%;
            }

        .projTitle {
            font-size: 1.5em;
            padding: 10% 5%;
        }

        .heading {
            padding: 1em;
            font-size: 90%;
        }

        .cart .items .cartSection {
            width: 100%;
            display: block;
            float: left;
        }

        .cart .items .cartSection.qtyWrap {
            width: 10%;
            text-align: center;
            padding: .5em 0;
            float: right;
        }

        .cart .items .cartSection.qtyWrap:before {
            content: "QTY";
            display: block;
            font-family: "Montserrat", sans-serif;
            padding: .25em;
            font-size: .75em;
        }

        .cart .items .cartSection.prodTotal, .cart .items .cartSection.removeWrap {

        }

        .cart .items .cartSection .itemImg {
            width: 26%;
        }

        .promoCode, .subtotal {
            width: 100%;
        }

        .btn.continue {
            width: 100%;
            text-align: center;
        }
    }

    @media only screen and (max-width: 700px) {
        *{
            box-sizing: border-box !important;
        }
        body{
            box-sizing: border-box !important;
            overflow-x:hidden !important;
        }
        .items{
            overflow: hidden;
            all: initial;
            display: flex;
            width: 100%;
            position: relative;
            flex-direction: row;
        }
        .quantity-control{
            position: absolute;
            left: 44%;
           display: flex;
            flex-grow:1;

            padding:19px;

            /* margin-bottom:90px;     */

        }
        .prodTotal{
            all: initial;
            position: absolute;
            box-sizing: border-box;
            left: 60%;
            top: 40%;
            transform: translateX(-28%);
            flex-grow: .5;
            font-size:12px;
        }
        .cartSection{
            flex-grow:1;
        }
        .qu{
            display:none;
        }
        .removeWrap{

        flex-grow:1;
        position: absolute;
        left: 93%;
        }

        }

</style>
</head>
@include('save')
@include('error')
@include('nav')
<div class="wrap cf">
    <h1 class="projTitle"><span>-Le</span> My Shopping Cart</h1>
    <div class="heading cf">
        <h1>My Cart</h1>
        {{-- route('item',['id'=>$order->table->id]) --}}
        <a  class="continue" href="/table/{{$order->table->id}}" id="back">Continue Shopping</a>
    </div>
    <div class="cart">
        <ul class="cartWrap">
            @foreach($items as $item)
            <li class="items odd">
                <div class="infoWrap">
                    <div class="cartSection">
                    <img src= {{ Storage::url($item->item->image)}} alt="" class="itemImg" />
                        <p class="itemNumber">{{ $item->item->name }}</p>
                        <h3> {{$item->name}}</h3>
                        <p ><span class="qu">{{$item->item->quantity}}</span></p>
                        <p class="stockStatus price">{{$item->item->unit_price}}</p>
                    </div>
                    <div class="button ">
                        @include("button")
                    </div>

                    <div class="prodTotal cartSection float-right">
                        <p>
                            EGP
                        <span class="itemPrice ">
                             {{(int)$item->unit_price * $item->quantity }}
                        </span>
                        </p>
                    </div>
                    <div class="cartSection removeWrap">
                        <a  href=""  id="elementRemove" class="remove  elementRemove">x</a>
                    </div>
                </div>
            </li>
            @endforeach
            <!--<li class="items even">Item 2</li>-->
        </ul>
    </div>
{{--    <div class="promoCode"><label for="promo">Have A Promo Code?</label><input type="text" name="promo" placholder="Enter Code" />--}}
{{--        <a href="#" class="btn"></a></div>--}}
    <div class="subtotal cf">
        <ul>
            <li class="totalRow"><span class="label">Subtotal</span><span class="value subtotal" id="sub"> EGP  {{$order->sub_total}}</span></li>
            <li class="totalRow"><span class="label">service</span><span class="value service"> EGP {{$order->service}}</span></li>
            <li class="totalRow"><span class="label">Tax</span><span class="value tax"> EGP {{$order->tax}}</span></li>
            <li class="totalRow final"><span class="label">Total</span><span class="value total">EGP {{$order->total}} </span></li>
            @if($order->status->value ==0)
            <li class="totalRow"><a id="checkout"   href="" class="btn continue"  >Checkout</a></li>
            @endif
        </ul>
    </div>
</div>
<script !src="">

    if (!(localStorage.getItem('Oj')))
    {
        //localStorage.setItem('id', '{$id}{}');
        // if(httpGet('/api/check/{{$id}}'))
        let pod = '{{$id}}';
      
         window.location= `/table/${pod}`
        // fetch(`/api/order/{{$id}}`)--}}
        //     .then(response => response.json())
        //     .then(data => {
        //         let Oj = { 'token': data.token, 'status': 0 };
        //         localStorage.setItem('Oj', JSON.stringify(Oj));
        //     });
    }
let itemPrice = document.querySelectorAll('.itemPrice');
let remove = document.querySelectorAll('#elementRemove');
let quantity= document.querySelectorAll ('.ql');
    let ite = document.querySelectorAll('.items');
    let quantityInput= document.querySelectorAll('.pop');
    console.log(ite[0])
        for (let index = 0; index<ite.length; index++) {
            remove[index].addEventListener("click",function(e){
                e.preventDefault();
                console.log("mostafa");
                quantityInput[index].value =0;
                itemPrice[index].innerText = 0;
                calculate();
                ite[index].parentNode.removeChild(ite[index]);
                httpGet(`/api/remove/${orderItem[index].id}`)
            })
        }
    const debounce = (func, wait) => {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    };
    let increaseButton= document.querySelectorAll('.increase');
    let decreaseButton= document.querySelectorAll('.decrease');
    let qus=  document.querySelectorAll('.qu');
    let orderToken = JSON.parse(localStorage.getItem('Oj')).token;
    const orderItem = httpGet(`/api/getOrderItem/${orderToken}`);
    function increaseValue() {
       for(let i =0; i<increaseButton.length;i++){
            increaseButton[i].addEventListener("click",debounce(e=> {
                quantityInput[i].value= parseInt(quantityInput[i].value) +1;
                qus[i].innerText =  quantityInput[i].value;
                itemPrice[i].innerText = quantityInput[i].value * Price[i].innerText ;
                console.log(orderItem[i])
                httpGet(`/api/update/${orderItem[i].id}`)
                number();
                calculate();
            },100));
       }
    }
    function decreaseValue() {
        for(let i =0; i<decreaseButton.length;i++){
            decreaseButton[i].addEventListener("click",debounce(e=>
            {
                if(quantityInput[i].value >=1){
                    quantityInput[i].value= parseInt(quantityInput[i].value) -1;
                qus[i].innerText =  quantityInput[i].value;
                itemPrice[i].innerText =  quantityInput[i].value * Price[i].innerText ;
                httpGet(`/api/des/${orderItem[i].id}`)
                calculate();
                if(quantityInput[i].value==0){
                    ite[i].parentNode.removeChild(ite[i]);
                   httpGet(`/api/remove/${orderItem[i].id}`)

                }
                        decreaseNumber();
                }

            },100));
        }
     }
    function httpGet(theUrl)
    {
        let xmlHttp = new XMLHttpRequest();
        xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
        xmlHttp.send();
        return  JSON.parse(xmlHttp.responseText);
    }
    increaseValue();
    decreaseValue();

    let sub = document.querySelector('#sub');
    let tax = document.querySelectorAll('.tax');
    let service = document.querySelectorAll('.service');
    let total = document.querySelector('.total');
    let l = document.querySelectorAll('.qu');
    let subtotalValue =0;
    let Price = document.querySelectorAll('.price');
    let priceItem =0 ;
    function calculate() {
        let p  =0;
                for(let it= 0; it<itemPrice.length;it++){
                    p +=  parseInt(itemPrice[it].innerText);
                }
        sub.innerText = p;
                total.innerText ="EGP "+ (p+{{$order->tax}} +{{$order->service}})
    }
    for(let i =0;i<quantity.length;i++){
         quantity[i].addEventListener("click",function () {
             l[i].innerText = quantity[i].value;
             itemPrice[i].innerText = quantity[i].value * Price[i].innerText ;
             priceItem +=  parseInt(itemPrice[i].innerText);
             calculate();
         })
    }
    let  check=document.getElementById('checkout');
            check.addEventListener("click", function(e){
                e.preventDefault();
                let xhr = new XMLHttpRequest();
                xhr.open('GET', '/api/submit/{{$order->id}}');
                xhr.onload = function() {
             increaseButton.forEach(e => e.parentNode.removeChild(e));
                decreaseButton.forEach(e => e.parentNode.removeChild(e));
            if (xhr.status === 200) {
                let oJ = {'token':"{{$order->token}}" , 'status':1};
                localStorage.setItem('Oj', JSON.stringify(oJ));
                localStorage.setItem('number',0)

                console.log(JSON.parse(localStorage.getItem('Oj')).status)
                ite.forEach(element => {
                    element.parentNode.removeChild(element);
                    setTimeout(()=>{

                        httpGet(`/api/remove/${orderItem[i].id}`)
                    })
                   
                    });
                document.getElementById('lol').style.display= "flex";
                const text = document.getElementById('text').innerText
                document.getElementById('text').innerText = "your order has been saved"
                setTimeout(() => {
                    check.parentNode.removeChild(check);
                    

                }, 200);

                setTimeout(function () {
                    document.getElementById('lol').style.display= "none";
                    document.getElementById('text').innerText = text;
                },3000)
            }
            else {
                let oJ = {'token':"{{$order->token}}" , 'status':1};
                localStorage.setItem('Oj', JSON.stringify(oJ));
                console.log(JSON.parse(localStorage.getItem('Oj')).status)
                document.getElementById('error').style.display= "flex";
                // const text = document.getElementById('message').innerText
              let  output = JSON.parse(xhr.responseText);
                console.log(output)
                document.getElementById('message').innerText = output.message
                setTimeout(function () {
                    document.getElementById('error').style.display= "none";
                },2000)
            }
        };
        xhr.send();
    });
    // document.getElementById("back").addEventListener("click",function (e) {
    // //     e.preventDefault();
    // //     // location.replace('/table/' +{$order->table_id});
    // //     // location.reload(true);
    // //    window.location= '/table/' +{{$order->table_id}};
    // })

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
function decreaseNumber(){
    let number = localStorage.getItem('number');
    if(number){
        let cnumner= parseInt(number) -1;
        if(cnumner ==0)
        return false;

        localStorage.setItem('number', cnumner);
        numbers.innerText = cnumner;
    }
    else{
    localStorage.setItem('number',1)
    numbers.innerText = number;

}

}

</script>

{{-- .item{
    /* display:flex;
     justify-content: space-between;
    flex-direction: column;
    width: 100%;
    overflow: hidden;  */
    all: initial;
    position: relative;
    display: flex;
    box-sizing: border-box;
     flex-flow: row wrap;
     align-items: stretch;

}
.removeWrap{
 all: initial;
    flex-grow: 1;
    /* left: 100%; */
}
.prodTotal{
     all: initial;
     display:block;
     margin-left:auto;
    padding: 0 !important;
    flex-grow: 2;

     /* transform: translate(-50%,0);s */
}
.quantity-control{
 all: initial;
 padding: 0 !important;
 display: flex;
 flex-grow:2;
     /* width: 60px;
     position: absolute;
     left: 40%;
    transform: translate(-50%,0);  */
}
.cartSection {




} --}}
