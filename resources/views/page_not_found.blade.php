@extends('layouts.app')
@section('content')
<head>
	<title>{{ ( 'Page non trouvée') }}</title>
</head>
<div class="bg0 m-t-23 p-b-60">
	<div class="container">
		<div class="flex-w flex-sb-m p-b-52">
			<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					
			</div>

			<div class="flex-w flex-c-m m-tb-10">
					
			</div>

		</div>
		<div class="m-t-60 col-md-12">
			<center><div class="col-md-6 flex-t ">
				<div class="m-b-10 ">
					<img src="{{asset('images/icons/title_icon.png')}}"style="height: 200px;width: 200px">
				</div>
				<div class=" m-b-20 m-t-15 m-l-30">
					<h1 style="font-size: 120px">404</h1>
					<h5>Page non trouvée</h5>
				</div>
				
				
			</div></center>
			
		</div>
	</div>
</div>
@endsection