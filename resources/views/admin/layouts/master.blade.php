<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel Crud</title>
  {{-- sweet alert --}}
  <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.css" rel="stylesheet">
  {{-- Toastify --}}
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  {{-- Bootsrap --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
  @yield('content')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>
  @yield('script')

  {{-- sweet alert --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $(document).on('click', '.show-alert-delete-box', function(event){
          var form =  $(this).closest("form");
          event.preventDefault();
          swal({
              title: "Are you sure you want to delete this record?",
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              dangerMode: true,
              buttons: [ 'Cancel', "Delete"],
              cancelButtonColor: '#d33',
          }).then((willDelete) => {
              if (willDelete) {
                  form.submit();
              }
          });
      });
  });
  </script>

  {{-- toastify --}}
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

  {{-- toastify display success message --}}
  @if(session('success') || session('delete'))
  <script>
    Toastify({
  text:{!! json_encode(session('success') ? session('success') : session('delete')) !!},
  duration: 3000,
  newWindow: true,
  close: true,
  gravity: "bottom", // `top` or `bottom`
  position: "right", // `left`, `center` or `right`
  stopOnFocus: true, // Prevents dismissing of toast on hover
  style: {
    background: {!! json_encode(session('success') ? 'green' : 'red') !!}
  },
  onClick: function(){} // Callback after click
}).showToast();
  </script>
  @endif

  
</body>

</html>