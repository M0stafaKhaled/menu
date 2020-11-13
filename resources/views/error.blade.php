
<style>
    #error{
        position: absolute;
        bottom: 10%;
        right: 1%;
        transition: all  ease-in-out;
        display: none;
    }
</style>
<link  href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.0.1/tailwind.min.css" rel="stylesheet" >
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert" id="error">
    <strong class="font-bold"  id="message">Holy Shit</strong>
{{--    <span class="block sm:inline">Something seriously bad happened</span>--}}
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
    </span>
</div>
