<link  href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    .finish{
        background-color: #38a169;
    }
    .finish:hover{
        background-color: mediumspringgreen;
    }
    .timesub{
            background-color: blueviolet;
            color: aliceblue;
            border: none;  
    }
    .timesub:active{

        border: none;
    }
    .timesub:hover{

        border: none;
    }
    .label_time{

        color:#09c;
        text-align: center;
        margin: 0 auto;
    }
    .timesubs{

     
            background-color: blueviolet;
            color: aliceblue;
            border: none;  
        
          
    }
    .label_times{
        color:#09c;
        text-align: center;
        margin: 0 auto;
        position: absolute ; 
        bottom: 50%;
        left: 50%;
    }
</style>
<div class="row mt-3   align-middle "  style="display:flex; justify-content: center">
<h4>
    username: {{auth()->user()->name }}   
</h4>
@foreach($orders as $order){{--        {{dd($order->table->color)}}--}}
<div class="col-md-12 col-sm-12 col-lg-3 mb-3 rows">
    <div class="card" style="">
        <div class="card-header" style="background-color:{{$order->table->color}}">
            <div class="float-right" style="color: white" >
            table Number {{$order->table_id}}
            </div>
            <div class=" " style="color: white">
                Order Number  {{$order->id}}
            </div>
          <p style="color: rgb(30, 255, 0)">  {{ $order->created_at }}</p>
        </div>
        <ul class="list-group list-group-flush up">
            @foreach($order->orderItem as $item)
            <li class="list-group-item">
                {{$item->item->name}}
                <p class="float-right">
                    {{$item->quantity}}
                </p>
            </li>
            @endforeach
            <li class="list-group-item status" data-id="{{ $order->id }}">
                @if($order->status->value == 1 )
                <a href="" class="card-link cancel btn btn-danger"  data-id="{{ $order->id }}">cancel </a>
                <a href="" class="card-link start btn btn-primary" data-id="{{ $order->id }} ">start</a>
                <p class="label_times"  data-id={{ $order->id }}></p>
                {{-- <button class="timesubs"  style="display: none" data-id="{{ $order->id }}">click me</button> --}}
                @else
                 <div class="pip"  data-id="{{ $order->id }}">
                    <a class="btn finish" data-id="{{$order->id}}">finish</a>
                    <div class="input-group mb-3 mt-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Time</span>
                        </div>
                        @if (($order->estimate_time ==null))
                        <input id="time" type="Number" class="form-control time" aria-label="Default"  aria-describedby="inputGroup-sizing-default" data-id="{{ $order->id }}" data-table_id="{{$order->table_id}}">
                        <button class="timesub"  style="display: none">click me</button>
                        <p class="label_time" data-id="{{ $order->id }}"></p>
                        @else 
                          
                        <p class="label_time setTime"data-time="{{$order->estimate_time}}"></p>
                        {{-- {{ date('H:i',strtotime($order->estimate_time))  }} --}}
                        @endif
                      
                    </div>
                 </div>
                @endif
            </li>
        </ul>
    </div>
</div>
@endforeach
</div>
<script>

// let diff = Math.abs(new Date() - date3);
//         console.log(diff / 1000 /60)
let setTime = document.querySelectorAll('.setTime');
// var timeDiff = Math.abs(date2.getTime() - date1.getTime());
// var diffHours = Math.ceil(timeDiff / (1000 * 3600)); 
let data = new Date();
 console.log(new Date().getMinutes()   +  " :" + new Date().getHours())
 console.log(new Date())
setInterval(function(){
    //var diff = Math.abs(new Date() - date3);
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
    let m ;
    let labelTime = document.querySelectorAll('.label_time');

    let timeCon = document.querySelectorAll('.timeCon');
   let but = document.querySelectorAll('.timesub');
    function createButton(status){
        console.log("mostafa")
    }
    const cancel   =   document.querySelectorAll('.cancel')
    const row      =   document.querySelectorAll('.rows');
    const start    =   document.querySelectorAll('.start');
    const up       =   document.querySelectorAll('.up');
    const status   = document.querySelectorAll('.status');
    const finish   = document.querySelectorAll('.finish');
    const time     = document.querySelectorAll('.time');
    let pip  = document.querySelectorAll('pip');
    let Istet = false;
    for(let i =0 ; i<time.length;i++){
                time[i].addEventListener('keyup',function(){    
                    console.log(time[i].dataset.id) 
                    //timer = setTimeout(doStuff(time[i].value, ), 3000)
                    var timer = null;
                    Istet = true;
                   setTimeout(() => {
                         but[i].style.display = "block"
                          but[i].addEventListener("click",function(){
                            console.log("mostafa")
                            if(but[i])
                            but[i].parentNode.removeChild(but[i])
                            let v = time[i].value ;
                            time[i].style.disabled = true;
                            if(time[i]){
                                save(time[i].dataset.id , v);
                                time[i].parentNode.removeChild(time[i])
                            }
                            labelTime.forEach(element => {
                                if(parseInt(element.dataset.id) === parseInt(time[i].dataset.id ))
                                 { //element.innerText = v
                                    let dt = new Date(); 
                                            let crunt=   dt.setMinutes( dt.getMinutes() + parseInt(v));
                                        setInterval(function(){
                                           let  dts =new Date(); 
                                           let diff =  dt - dts ;
                                            element.innerText =  parseInt((diff / 1000/60))+":"+ parseInt((diff/1000)%60)
                                            
                                        }, 1000 )
                                }    
                            });
                    })
                   }, 100);
                    clearTimeout(timer);
                   // setTimeout(savetime(time[i].dataset.id , time[i].dataset.table_id)),3000);               
                });
            //console.log(time[i].dataset.id , time[i].dataset.table_id)
            console.log(time[i].value);
    }
    for (let i =0; i<cancel.length;i++){
        cancel[i].addEventListener("click",function (e) {
            e.preventDefault();
            row[i].parentNode.removeChild(row[i]);
            httpGet(`/api/cancel/${cancel[i].dataset.id}`);
        });
    }
    let labelTimes = document.querySelectorAll('.label_times');
    for(let i =0; i<start.length ; i++)
    {
        let p = start[i].dataset.id;
   start[i].addEventListener("click",function (e) { 
            e.preventDefault();
            cancel[i].parentNode.removeChild(cancel[i]);
            // var elem2 = start[i].closest(".status");
            // elem2.style.color ="red"
            for(let v =0 ; v<status.length;v++ ){
                
               // console.log(start[i].dataset.id, status[v].dataset.id)
            //  console.log( status[v].dataset.id)
        if(parseInt(status[v].dataset.id )=== parseInt(start[i].dataset.id)){
            m = status[v].dataset.id; 
             var btn = document.createElement("BUTTON");   // Create a <button> element
                     btn.innerHTML = "finsh";     
                    btn.setAttribute("class","btn");
                    btn.classList.add("finish");
                    btn.style.marginBottom = "10px";
                             // btn.classList.add("btn");
                            // btn.classList.add("finish");
                            status[v].appendChild(btn); 
                     //  btn.className += "btn";
                     btn.addEventListener("click",function (e){
                         console.log("mostfa" , btn.dataset.id)
                          httpGet(`/api/finish/${status[v].dataset.id}`);
                          row[v].parentNode.removeChild(row[v])
        })
        let html = `    </div>
                        <input id="times" type="Number" class="form-control time" aria-label="Default"  aria-describedby="inputGroup-sizing-default" data-id="{{ $order->id }}" data-table_id="{{$order->table_id}}">
                        <button class="timesub"  style="display: none">click me</button>
                        <p class="label_time" onfocus="myFunction()"></p>
                    </div>`;
                    status[v].insertAdjacentHTML('beforeend', html);
                    function myFunction(){  
                    }
                    // if(parseInt(element.dataset.id)===parseInt(status[v].dataset.id ))
                    //         {
                                   
                    //                console.log(element.dataset.id)

                    //            }
                    let b =  `<button class="timesubs " style="display: none" >click me</button>`;
                    status[v].insertAdjacentHTML('beforeend', b);  
                   console.log(status[v].dataset.id)
                    let times    = document.querySelectorAll('#times')
                    let buts = document.querySelectorAll('.timesubs');
                        for(let i =0 ; i<times.length;i++){
                        times[i].addEventListener("keyup",function(){
                          buts[i].style.display = "block";
                        const poo=  parseInt(status[v].dataset.id);
                          buts[i].addEventListener("click",function(){
                            let v = times[i].value  ;
                           //let laabelTimesInsert = `<p class="label_times" style="display:none" data-id=${status[v].dataset.id }></p>`;
                       // status[v].insertAdjacentHTML('beforeend', laabelTimesInsert);                    
                                   for(let p =0; p<labelTimes.length;p++){
                                      
                                    if(parseInt(labelTimes[p].dataset.id) === poo)
                                        { 
                                             console.log(labelTimes[p].dataset.id)  
                                           
                                            // labelTimes[p].innerText = v  
                                            save(labelTimes[p].dataset.id, v)

                                            let dt = new Date(); 
                                            let crunt=   dt.setMinutes( dt.getMinutes() + parseInt(v));
                                        setInterval(function(){
                                           let  dts =new Date(); 
                                           let diff =  dt - dts ;
                                          
                                            labelTimes[p].innerText =  parseInt((diff / 1000/60))+":"+ parseInt((diff/1000)%60)
                                            
                                        }, 1000 )                                                                               
                                        }
                                   }   
                                   
                            if(buts[i])
                           buts[i].style.display ="none";
                           //buts[i].parentNode.removeChild(buts[i])
                           
                            times[i].style.disabled = true;
                            if(times[i])
                            times[i].style.display ="none";
                            // times[i].parentNode.removeChild(times[i])
                    })
                            // times[i].insertAdjacentHTML('beforeend', b);  
                        })
                        setTimeout(() => {
                            
                        }, 300);
                        
                    };              
                    }     
            }
             httpGet(`/api/processing/${start[i].dataset.id}`);
            start[i].parentNode.removeChild(start[i]);
            
        })
    }
    for(let p = 0 ; p<finish.length;p++){
        finish[p].addEventListener("click",function (e){
            e.preventDefault();
            httpGet(`/api/finish/${finish[p].dataset.id}`);
            row[p].parentNode.removeChild(row[p]);
        })
    }
    function httpGet(theUrl)
    {
        let xmlHttp = new XMLHttpRequest();
        xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
        xmlHttp.send();
        return  JSON.parse(xmlHttp.responseText);
    }
    function save(order_id , time){
let  xhr = new XMLHttpRequest();
              xhr.open('POST', '/api/time');
              xhr.setRequestHeader('Content-Type', 'application/json');
              xhr.send(
                      JSON.stringify({
                            "order_id": order_id,
                            "time": time, 
                            })
              );
              xhr.onload = function() {
                  if (xhr.status === 200 ) {
                   console.log("done");
                  }
                  else if (xhr.status !== 200) {
                      alert('Request failed.  Returned status of ' + xhr.status);
                  }
              } 
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
let channel = pusher.subscribe('channel1');
channel.bind('form-submit', function(data) {
     location.reload();
    let order = JSON.stringify(data) ;
    
});
</script>
