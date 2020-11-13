<style>


    	.realtives{
		position:relative;
	}
    #owl-demo .item{
        margin: 3px;
        color: #FFF;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        text-align: center;
    }
	#owl-demo .item img{
		width:100%;
		height:100px;
	}
    .customNavigation{
      text-align: right;
	  margin-top:10px;
	  margin-bottom:3px;
	  padding-bottom:3px;
	  border-bottom:2px solid #333;
    }
    .customNavigation a{
      -webkit-user-select: none;
      -khtml-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    }
</style>
<div id="demo">
    <div class="container-fluid">
      <div class="row">
        <div class=" ">
          <div class="customNavigation"> <a class="btn prev"><i class="fa fa-caret-left"></i></a> <a class="btn next"><i class="fa fa-caret-right"></i></a> </div>
          <div id="owl-demo" class="owl-carousel">
                  <div class="item"><img src="https://goo.gl/btDGCM" alt="Mahi_Product_Slider"></div>
                  <div class="item"><img src="https://goo.gl/ZhjjTr" alt="Mahi_Product_Slider"></div>
                  <div class="item"><img src="https://goo.gl/3Updwu" alt="Mahi_Product_Slider"></div>
                  <div class="item"><img src="https://goo.gl/T9AoYM" alt="Mahi_Product_Slider"></div>
                  <div class="item"><img src="https://goo.gl/q6N4t7" alt="Mahi_Product_Slider"></div>
                  <div class="item"><img src="https://goo.gl/g8AFSi" alt="Mahi_Product_Slider"></div>
                  <div class="item"><img src="https://goo.gl/HLMCFM" alt="Mahi_Product_Slider"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <a href="https://codepen.io/maheshambure21"> a pen by Mahesh </a>
  {{-- <script src="{{ mix('app') }}"></script> --}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script>
$(document).ready(function() {
		  var owl = $("#owl-demo");
		  owl.owlCarousel({
		  autoPlay: 1500,
		  items : 4, //10 items above 1000px browser width
		  itemsDesktop : [1000,4], //5 items between 1000px and 901px
		  itemsDesktopSmall : [900,3], // 3 items betweem 900px and 601px
		  itemsTablet: [600,2], //2 items between 600 and 0;
		  itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
		  pagination:false
      });
      $(".next").click(function(){
          owl.trigger('owl.next');
      })
      $(".prev").click(function(){
          owl.trigger('owl.prev');
      })
    });
  </script>

    {{-- @foreach ($items as $item )
                    <div class="item"><img src="{{ Storage::url($item->item->image) }}" alt="Mahi_Product_Slider"></div>
                    @endforeach --}}