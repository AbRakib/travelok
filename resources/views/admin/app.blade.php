@php
    $setting = App\Models\Setting::where('id', 1)->first();
@endphp
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{$setting->title}}-{{$setting->sub_title}}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- jquery datatable bootstrap 5 -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/dataTables.bootstrap5.min.css')}}">
    <!-- jquery datatable bootstrap 5 -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}" />
  </head>
  <body>
    <div class="container-scroller">
      @include('admin.partials.banner')
      <!-- partial:partials/_navbar.html -->
      @include('admin.partials.topbar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.partials.sidebar')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            @yield('content')
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          @include('admin.partials.footer')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('admin/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('admin/assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('admin/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admin/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('admin/assets/js/misc.js') }}"></script>
    <!-- endinject -->
    <!-- jquery datatable bootstrap 5 -->
    <script src="{{asset('admin/assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/ckeditor.js')}}"></script>
    <!-- jquery datatable bootstrap 5 -->
    <!-- Custom js for this page -->
    <script src="{{ asset('admin/assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('admin/assets/js/todolist.js') }}"></script>
    <!-- End custom js for this page -->
    <!-- push js code -->
    @stack('script')
    <!-- push js code -->

    <script>
      new DataTable('#example');
    </script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
  </body>
</html>