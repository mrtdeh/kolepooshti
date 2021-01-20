<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    {{-- {{$target_schedules}} --}}
    @foreach ($target_schedules as $i => $s)
<a href="/meeting/select?uid={{ $user->id }}&ccs={{ $s["ccs_id"] }}&mn={{ $s["meetingName"] }}">
     {{  $s["meetingName"] }} </a><br>
    @endforeach
</body>
</html>