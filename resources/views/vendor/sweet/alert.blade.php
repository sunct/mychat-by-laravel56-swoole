@if (Session::has('sweet_alert.alert'))
    <script>
        let aa = {!! Session::has('sweet_alert.alert') !!};
        console.log(aa);
        @if (Session::has('sweet_alert.content'))
            var config ={!! Session::pull('sweet_alert.alert') !!}
            var content = document.createElement('div');
            content.insertAdjacentHTML('afterbegin', config.content);
            config.content = content;
            swal(config);
        @else
            swal({!! Session::pull('sweet_alert.alert') !!});
        @endif
    </script>
@endif
