@php
$notifications = [
1=>'success',
2=>'warning',
3=>'error',
4=>'info',
];
@endphp
@foreach($notifications as $key => $notification)
    @if(Session::has($notification))
        <script>
            $(document).ready(function () {

                notie.alert({!! $key !!}, '{!! Session::get($notification) !!}', 5);
            })
        </script>
    @endif
@endforeach
