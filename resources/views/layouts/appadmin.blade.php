<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('titre')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('backend/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/css/vendor.bundle.addons.css') }}">
  <script src="backend/js/sweetalert2@11.js"></script>
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('backend/images/logo_2H_tech.png') }}" />
</head>
<body>

  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->

    {{--start navbar 1--}}
        @include('includes.navbar1')
    {{--end navbar 1--}}

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      
      {{--start navbar 2--}}
        @include('includes.navbar2')
      {{--end navbar 2--}}

      <!-- partial -->

      {{-- start content --}}

            @yield('contenu')
      {{--end content --}}


    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{ asset('backend/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('backend/js/vendor.bundle.addons.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{ asset('backend/js/off-canvas.js') }}"></script>
  <script src="{{ asset('backend/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('backend/js/template.js') }}"></script>
  <script src="{{ asset('backend/js/settings.js') }}"></script>
  <script src="{{ asset('backend/js/todolist.js') }}"></script>
  <script src="{{ asset('backend/js/bootbox.min.js') }}"></script>
  {{-- <script src="{{ asset('backend/js/sweetalert2@11.js') }}"></script> --}}
  <!-- endinject -->
  <!-- Custom js for this page-->
  
  <!-- End custom js for this page-->

  @yield('script')

    <script>
        $(document).on("click", "#delete", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        // bootbox.confirm("Do you really want to delete this element ?", function(confirmed){
        //   if (confirmed){
        //       window.location.href = link;
        //     };
        //   });
        
        Swal.fire({
          title: 'Etes-vous sûr ?',
          text: "Une fois l'opération validé, vous ne pouvez plus revenir en arrière !",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Annuler',
          confirmButtonText: 'Oui'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = link;
          }
        })

        });
    </script>
</body>

</html>

