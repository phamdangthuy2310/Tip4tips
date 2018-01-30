@section('javascript')
    <script>
      $(function () {
        var body = $('body.has-img');
        var backgrounds = [
          'url({{asset('images/bg-home-1.jpg')}})',
            {{--'url({{asset('images/bg-home-2.jpg')}})',--}}
              'url({{asset('images/bg-home-3.jpg')}})',
            {{--'url({{asset('images/bg-home-4.jpg')}})'--}}
        ];
        var current = 0;

        function nextBackground() {
          body.css(
            'background-image',
            backgrounds[current = ++current % backgrounds.length]);

          setTimeout(nextBackground, 20000);
        }
        setTimeout(nextBackground, 20000);
        body.css('background-image', backgrounds[0]);
      });
    </script>
@stop