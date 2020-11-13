<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script !src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.css" integrity="sha512-Woz+DqWYJ51bpVk5Fv0yES/edIMXjj3Ynda+KWTIkGoynAMHrqTcDUQltbipuiaD5ymEo9520lyoVOo9jCQOCA==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Document</title>

</head>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body {
        background-color:#fff;
    }
    a{

        z-index: 23;
        max-width: 100%;



    }
    .data{
        text-align: center;
        position: relative;
        top:25%
    }

    .header{
        width: 100%;
        height: 29vh;
        /* background-color: cadetblue; */
        clip-path: polygon(0 0, 100% 0, 100% 14vh, 0 100%);
        z-index: -10;
    }
    #title{
        font-size: 34px ;
        font-weight: bold;
        font-family: 'Nunito', sans-serif;
    }
    #description{
        font-size: 15px ;
        font-family: 'Nunito', sans-serif;

    }


    img{
        cursor: pointer;
        max-width: 100%;
        min-width: 30%;
        margin-top: -80px;
        max-height: 40vh;
        height: auto;

        box-shadow: 0px 10px 14.1px 0.9px rgba(0, 0, 0, 0.24), 0px 4px 19.6px 0.4px rgba(0, 0, 0, 0.16);
        border-radius: 2px;
        margin-bottom: 85px;
        line-height: 0;


    }
    .img{
        display: flex;
        justify-content:center;
    }
    @media only screen and (max-width: 700px) {
        img {
            margin-top: -90px;
            min-width: 40%;
            max-width: 90%;
            margin-bottom: 100px;
            max-height: 40vh;
            overflow: hidden;
        }
        .cont{
            text-align: center;
        }

        .data{
            text-align: center;
            position: relative;
            top:16%
        }
        .img{
            display: flex;
            justify-content:center;
        }
        #title{
            font-size: 25px ;
            font-weight: bold;
            font-family: 'Nunito', sans-serif;
        }
        #description{
            font-size: 15px ;
            font-family: 'Nunito', sans-serif;

        }
    }


    input{
        margin-top:20px;
        width: 100px;
        background: #430051;
        border: none;
        border-radius: 40px;
        position: fixed;
           top: 90%;
        font-size: 12px;
        color: #eef1f4;
        z-index: 300;
    }

    @media only screen and (max-width: 700px) {

                input{
                   width: 70px;

                }
    }

    @media only screen and (max-width: 800px) {

        input{
            width: 80px;
        }
    }





</style>
<body>
<div class="header" id="header">
    <div class="data">
         <h4 id="title"></h4>
         <p id="description"></p>
    </div>


</div>

<div id="row">
    <div id="cont" class="col-12"></div>
</div>
        <div>
            <input type="submit" value="Submit" id="bt">
        </div>
<script >
try{
    fetch('/api/menu')
        .then(response => response.json())
        .then(data =>{
            const html = data.data.map(images =>{
                console.log(images.color)

                let background = document.getElementById("header");
                // background.style.backgroundColor=`"${images.color}"`;

                document.body.style.backgroundColor = images.primary;
                background.style.backgroundColor = images.secondary;
                const title = document.getElementById('title');
                title.innerText = images.title ;
                const description = document.getElementById('description');
                description.innerText = images.description ;
                    title.style.color = images.fontColor ;
                    description.style.color = images.fontColor;
                Object.keys(images.MenuImages).forEach((key,value) =>{
                    var ele = document.createElement("div");

                    var links = document.createElement('a');

                    links.setAttribute("href",`https://menu.tabadil.com/${images.MenuImages[key]}`);
                    ele.className="img";
                    var img = document.createElement("img");
                    img.setAttribute("src",`https://menu.tabadil.com/${images.MenuImages[key]}`);
                    links.setAttribute("data-lightbox", "roadtrip")
                    links.appendChild(img);
                    ele.append(links);
                    var elem=document.getElementById('cont').appendChild(ele);
                });

            } ).join("")

        });

    lightbox.option({
        'wrapAround': false,
        'positionFromTop':window.innerHeight /2,
        'minWidth':window.innerWidth,
        'alwaysShowNavOnTouchDevices':true
    });


}
catch (e) {
    console.log("error");
}

document.getElementById('bt').addEventListener("click", function () {
alert({{isset($data) ? $data: "nothing"}});
});
</script>

</body>
</html>
