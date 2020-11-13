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

        .projTitle {
            font-size: 1.5em;
            padding: 10% 5%;
        }

        .heading {
            padding: 1em;
            font-size: 90%;
        }

        .cart .items .cartSection {
            width: 90%;
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
            width: 25%;
        }

        .promoCode, .subtotal {
            width: 100%;
        }

        .btn.continue {
            width: 100%;
            text-align: center;
        }
    }
    #status_order{
                    display: inline-block;

                }
    @media only screen and (max-width: 700px) {
        /* #status_order{
                    display: none !important;
                } */
                body{
                }
                .removeWrap{
                }
                .timels{
                            position: absolute;
                            right: 3%;
                            top: 22%;
                            font-size:12px !important;
                }
                .timels p {

                    font-size:26px !important;
                }
        }
    .setTime{
        color: #4A9BCE;
        font-size: 22px;
        font-weight: 500;
    }
</style>
<div class="wrap cf">
    @include('nav')
    <h1 class="projTitle"><span>My</span> Orders</h1>
    <div class="heading cf">
        <h1></h1>
        {{-- route('item',['id'=>$order->table->id]) --}}
        <a  class="continue" href="/table/{{$table_id}}" id="back">Continue Shopping</a>
    </div>
    <div class="cart">
        <ul class="cartWrap">
            @foreach($items as $item)
            <li class="items odd" style="position: relative">
                <div class="infoWrap">
                    <div class="cartSection">
                        <img src= "{{Storage::url($item->item->image)}}" alt="" class="itemImg" />
                        <p class="itemNumber" style="font-size: 1.3rem">{{ $item->item->name }}</p>
                        <h3> {{$item->name}}</h3>
                        <p > x  <span class="qu">{{$item->quantity}}</span></p>
                        {{-- <p class="stockStatus price">{{$item->item->unit_price}}</p> --}}
                    </div>
                    {{-- @include("button") --}}
                    {{-- <div class="prodTotal cartSection">
                        <p >EGP
                        <span class="itemPrice ">
                             {{$item->unit_price * $item->quantity}}
                        </span>
                        </p>
                    </div> --}}
                    <div  class="cartSection removeWrap " style="color: royalblue">
                      <p id="status_order"  style="color: royalblue">{{ $item->order->status->key}}</p>
                       @if ($item->order->status->value==3 )
                       <div class="timels">
                        <p  style="color: #840fe4; font-size: 33px ; position: absolute; right: 0" class="setTime" data-time="{{ $item->order->estimate_time }}">

                        </p>
                       </div>

                       @endif

                    </div>
                </div>
            </li>
            @endforeach
            <!--<li class="items even">Item 2</li>-->
        </ul>
    </div>
</div>
<script !src="">
    if (!(localStorage.getItem('Oj')))
    {
        //localStorage.setItem('id', '{$id}{}');
        // if(httpGet('/api/check/{{$id}}'))
        let pod = '{{$id}}';
        localStorage.setItem('id',pod)
         window.location= `/table/${pod}`
        // fetch(`/api/order/{{$id}}`)--}}
        //     .then(response => response.json())
        //     .then(data => {
        //         let Oj = { 'token': data.token, 'status': 0 };
        //         localStorage.setItem('Oj', JSON.stringify(Oj));
        //     });
    }
setInterval(function(){
    //var diff = Math.abs(new Date() - date3);
    let setTime = document.querySelectorAll('.setTime');
    setTime.forEach(element => {
    if((!element.dataset.time =='')){
        diff = new Date(element.dataset.time )- new Date();
        if(diff<=0)
        element.innerText = 0+":"+0
        else
        element.innerText =  parseInt((diff / 1000/60))+":"+ parseInt((diff/1000)%60)
    }
});
 }, 1000 )
 let orderToken = localStorage.getItem('Oj');
        if (!JSON.parse(orderToken))
         {
          window.location= '/log'
        }
</script>
<script
src="https://code.jquery.com/jquery-3.5.1.js"
integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
crossorigin="anonymous"></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
Pusher.logToConsole = true;
let pusher = new Pusher('fa32153a4fef2a640572', {
        cluster: 'eu',
        forceTLS: true,
        encrypted: true,
});
let channel = pusher.subscribe('channel2');
channel.bind('kit-time', function(data) {
    let order = JSON.stringify(data) ;
    window.location.reload()
    console.log(order)
});
</script>
