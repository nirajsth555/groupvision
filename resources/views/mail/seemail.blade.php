<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2>Name:</h2> {{$contact_details->first_name}} {{$contact_details->last_name}}
	<h2>Phone Number:</h2> {{$contact_details->number}} 
	<h2>Email:</h2>{{$contact_details->email}}
<p>Message:</p>
{{$contact_details->message}}
</body>
</html>