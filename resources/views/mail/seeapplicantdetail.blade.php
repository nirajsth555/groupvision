<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Applied For:</h1>{{$applicant_details->applied_for}}
	<h2>Name:</h2> {{$applicant_details->fullname}} 
	<h2>Gender:</h2>@if($applicant_details->gender==1)
	Male

@elseif($applicant_details->gender==2)
	Female

@else
	Other

@endif
	<h2>Phone Number:</h2> {{$applicant_details->number}} 
	<h2>Email:</h2>{{$applicant_details->email}}
	<h2>Address: </h2>{{$applicant_details->address}}
	<h2>Experience:</h2>{{$applicant_details->experience}} Years
	<h2>Expected Salary:</h2>{{$applicant_details->experience}}
	

</body>
</html>