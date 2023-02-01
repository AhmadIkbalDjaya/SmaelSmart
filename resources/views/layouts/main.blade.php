<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Icon Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- my css -->
    
    @if (Request::is('login'))
    <link rel="stylesheet" href="/css/login.css">
    @else
    <link rel="stylesheet" href="/css/index.css">
      @if (Request::is('/'))
        <link rel="stylesheet" href="/css/home.css">
      @elseif(Request::is('calender'))
        <link rel="stylesheet" href="/css/calender.css">
      @elseif(Request::is('raport'))
      <link rel="stylesheet" href="/css/raport.css">
      @elseif(Request::is('control-card'))
      <link rel="stylesheet" href="/css/control-card.css">
      @elseif(Request::is('lesson'))
      <link rel="stylesheet" href="/css/lesson.css">
      @endif
    @endif
  </head>
  <body>
    <input type="checkbox" id="humbergermenu" class="d-none" checked>
    @yield('navbar')

    @yield('sidebar')

    <main>
      @yield('main')
    </main>

    @yield('footer')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  {{-- jQuery --}}
  <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function () {
      $('.select-level').change(function (e) { 
        if($(this).val() == 3){
          $('.select-claass').show();
          $('.update-claass').show();
        }
        else{
          $('.select-claass').hide();
          $('.update-claass').hide();
        }
      });
    });
  </script>
  </body>
</html>