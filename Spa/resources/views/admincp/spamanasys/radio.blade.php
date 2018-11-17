<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="{{route('test')}}" method="POST">
	{{csrf_field()}}
	Na1 <input type="checkbox" name="na[]" value="na1"> <br>
	Na2 <input type="checkbox" name="na[]" value="na2"> <br>
	Na3 <input type="checkbox" name="na[]" value="na3"> 	<br>
	Na4 <input type="checkbox" name="na[]" value="na4"> <br>
	Na5 <input type="checkbox" name="na[]" value="na5"> <br>
	<br>
	<input type="submit" value="Submit">
</form>
</body>
</html>