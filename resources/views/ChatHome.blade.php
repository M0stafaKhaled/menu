{{-- @extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="message-area" ref="message">
        @foreach ($messages as $item)
        {{$item->body}}
    @endforeach
        </div>
    </div>
</div> --}}
<style>
.from{
    color:blue;
}
.send{
    color: red;
}
</style>
@extends('layouts.app')
@section('content')
<div class="container">
    <div id="co">
    </div>
    <div class="min">
        {{-- @foreach ($messages as $item)
              <p class="from">
                {{$item->body}}
              </p>
        @endforeach
        @foreach ($send as $item)
    <p class="send"> {{$item->body}}</p>
        @endforeach --}}
        </div>
    <div class="row justify-content-center">
        {{-- <single-chat-component></single-chat-component>
    <single-form-component></single-form-component> --}}
    <single-chat></single-chat>
    {{-- <single-messages-componen></single-messages-componen> --}}
    </div>
</div>
@endsection


<script>


// let html = '<button type="button">Click Me!</button>';
// let fragmentFromString = function (strHTML) {
//   return document.createRange().createContextualFragment(strHTML);
// }
// let fragment = fragmentFromString(html);

// let poo = document.createElement("div");

// poo.appendChild(fragment);
document.getElementById("co").insertAdjacentElement('before',html);
    let url = new URL(window.location).href;
         let id = url.substring(url.lastIndexOf('/')+1)
           let  p = httpGet('/single/'+id);
        p[0].forEach(element => {
            console.log(element.body)
        });
           console.log(p[0][0].body);
        function httpGet(theUrl)
                {
        let xmlHttp = new XMLHttpRequest();
        xmlHttp.open( "GET", theUrl, false );
        xmlHttp.send();
        return  JSON.parse(xmlHttp.responseText);
    }
</script>
