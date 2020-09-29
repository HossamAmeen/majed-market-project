<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/jquery-2.2.4.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/jquery.printPage.js')}}"></script>
</head>
<body>
	<div class="container">
    	<div class="col-md-12">
	     @yield('content')
      </div>
    </div>
</body>
</html>
