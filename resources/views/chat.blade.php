@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <chat-component></chat-component>
        <user-component></user-component>
    </div>
</div>
@endsection
<script !src="">
    if (!(localStorage.getItem('Oj'))) {
        //localStorage.setItem('id', '{$id}{}');
        {{--if(httpGet('/api/check/{{$id}}'))--}}
            window.location = '/log'
    }
</script>
