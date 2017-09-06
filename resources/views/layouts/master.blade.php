<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">

  <title>Blog Template for Bootstrap</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Custom styles for this template -->

  <link href="css/app.css" rel="stylesheet">

</head>

<body>




@include('layouts.nav')



@include('layouts.ForMaster.header') <!-- This is diferent than the master -->


<div class="container">

    <div class="row">

        @yield('content')
        @include('layouts.sidebar')
    </div><!-- /.row -->

</div>



<!-- Bootstrap core JavaScript



include('layouts.container')

        <!-- /.container -->



@include('layouts.footer')
<!-- ================================================== -->
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
