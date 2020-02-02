<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	@include('layouts.links')
	<title>Document</title>
</head>
<body>

	<h1>Pagination</h1>
	@foreach($data as $d)
	{{$d->name}}
	@endforeach	

		
	{{$data->links()}}

</body>
</html>
