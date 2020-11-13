@foreach ($items as $item)
<img src="data:image/jpeg;base64,{{}}" alt="">


<div class="antialiased  font-sans mt-6 ">
    <div class="flex items-center justify-center min-h-0 ">
    <div class="flex items-center justify-center min-h-0 ">
        <div class="max-w-md md:max-w-2xl px-2 cardd bb" >
            <div class="item"> <div class="c-name"></div> </div>
            <div class="bg-white shadow-xl rounded-lg overflow-hidden md:flex ">
                <div class="bg-cover bg-bottom h-56 md:h-auto md:w-56 "    style="background-image: url({{$item['image_medium']}} )">
                </div>
                <div>
                    <div class="p-4 md:p-5">
                        <p class="font-bold text-xl md:text-2xl name" id="name">{{$item->name}}</p>
                        <p class="text-gray-700 md:text-lg">Explore popular destinations as well as hidden local favourites.</p>
                    </div>

                    <div class="p-4 md:p-5 bg-gray-100">
                        <div class="sm:flex sm:justify-between sm:items-center">
                            <div>
                                <div class="text-lg text-gray-700"><span style="color: #4A9BCE" class="text-gray-900 font-bold ">{{$item->unit_price}}</span> EGP</div>
                            </div>

                            <button class="mt-3 sm:mt-0 py-2 px-5 md:py-3 md:px-6 bg-indigo-700 hover:bg-indigo-600 font-bold text-white md:text-lg rounded-lg shadow-md  add"  id="add">Add to cart</button>
                        </div>
                        <div class="mt-3 text-gray-600 text-sm md:text-base"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endforeach