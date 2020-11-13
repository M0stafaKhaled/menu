<style>
    /* The side navigation menu */
.sidenav {
  height: 100%; /* 100% Full-height */
  width: 0; /* 0 width - change this with JavaScript */
  position: fixed; /* Stay in place */
  z-index: 1; /* Stay on top */
  top: 0;
  left: 0;
  background-color: rgb(0, 225, 233); /* Black*/
  overflow-x: hidden; /* Disable horizontal scroll */
  overflow-y:hidden ;
  padding-top: 60px; /* Place content 60px from the top */
  transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
  z-index: 10;
}
/* The navigation menu links */
.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  font-family: Gotham;
  color: #818181;
  display: block;
  transition: 0.3s;
}
/* When you mouse over the navigation links, change their color */
.sidenav a:hover,
.offcanvas a:focus {
  color: #f1f1f1;
}

/* Position and style the close button (top right corner) */
.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}
/* Style page content - use this if you want to push the page content to the right when you open the side navigation */
#main {
  transition: margin-left 0.5s;
  padding: 20px;
}
/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidenav {
    padding-top: 15px;
  }
  .sidenav a {
    font-size: 18px;
  }
}
</style>
    <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="#" id="myorder">My Order</a>
    <a href="{{ route('chat') }}">Chat</a>
    @if (isset($id))
        <a href="{{ route('item' ,['id'=>$id]) }}">Menu</a>
        @endif
  </div>
  <!-- Use any element to open the sidenav -->
  <span onclick="openNav()"><img src="https://cdn4.iconfinder.com/data/icons/wirecons-free-vector-icons/32/menu-alt-512.png" width="70px" style="padding-top: 40px; padding-left: 40px;"></span>
  <!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
  <div id="main">
  </div>
  <script>
 let order = document.getElementById('myorder');
         order.addEventListener('click',function(e){
        e.preventDefault();
        if(JSON.parse(localStorage.getItem('Oj')))
        {
            let id  = JSON.parse(localStorage.getItem('Oj')).token;
            window.location.href = '/order/'+id;
        }
        else{
            alert("pleas make order first")
        }
    });
      /* Set the width of the side navigation to 250px */
function openNav() {
    document.getElementById("mySidenav").style.width = "300px";
    var winX = null, winY = null;
window.addEventListener('scroll', function () {
    if (winX !== null && winY !== null) {
        window.scrollTo(winX, winY);
    }
});
function disableWindowScroll() {
    winX = window.scrollX;
    winY = window.scrollY;
};
function enableWindowScroll() {
    winX = null;
    winY = null;
};
}
/* Set the width of the side navigation to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
  </script>
