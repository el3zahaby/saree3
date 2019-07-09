<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>


{{--{{ dd( app('router')->getRoutes()) }}--}}
<script>
    $.ajaxSetup({
        beforeSend: function() {
            console.log('test');
        },
        complete: function() {
            console.log('completed');
        }
    });

    var route= [];
    var token = document.head.querySelector('meta[name="csrf-token"]').content;
    var userid = {{Auth::user()->id}};
{{--    var userid = {{Auth::user()->id}};--}}
    route['chat.upload'] = "{{route('chat.upload') }}";
    route['chat.send'] = "{{route('chat.send') }}";


    var list = [];
    $('.contact').each(function () {
        var element = $(this).attr('element');
        list.push(element);
    });
    var socket = io.connect("http://localhost:5000",
        {query: 'userid=' + userid + '&username=' + '&list=' + list.join(','),  'reconnection': true,
            'reconnectionDelay': 500,
            'reconnectionAttempts': 10});


</script>


<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/lightbox.js') }}"></script>



<!-- Footer -->
<script src="{{asset('chat_asset/script.js')}}"></script>
<script src="{{asset('chat_asset/Recorderjs/dist/recorder.js')}}"></script>
<script src="{{asset('chat_asset/Recorderjs/dist/app.js')}}"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/tinycolor/1.4.1/tinycolor.js"></script>

<script>
    // $(window).load(function () {
    //
    //
    //
    //
    //
    // });
    $(document).ready(function() {
        $('.imageChat').magnificPopup({ type: 'image' });
    });
    $('.messages').bind("DOMSubtreeModified",function(){
        $('.imageChat').magnificPopup({ type: 'image' });
        // $(".messages").animate({scrollTop: $('.messages')[0].scrollHeight}, "fast");
    });

    var $fType = {
        "audio":"audio",
        "video":"video",
        "image":"img",
        "multipart":true,
        "application":true,
        "text":true,
    };



</script>
</body>
