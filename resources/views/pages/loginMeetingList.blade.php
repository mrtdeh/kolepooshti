<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body dir="rtl">
    <div class="links">
            {{-- {{$target_schedules}} --}}

            <h4>
                کلاس های شما در این زمان :
            </h4>
            
            @foreach ($target_schedules as $i => $s)
                <a 
                target="_blank" 
                href="/meeting/select?uid={{ $user->id }}
                &ccs={{ $s["ccs_id"] }}&mn={{ $s["meetingName"] }}">
                    {{  $s["meetingName"] }} </a><br>
            @endforeach
    </div>

    <style>

        body{
            text-align : center;
        }

        .links{

            padding:20px;

            margin-top:100px;

            display:inline-block;

            background: white;


        }

        a {
            display: inline-block;
            padding: 10px;
            margin: 5px;
            color: white;
            background: #000;
            text-decoration: none;
            border-radius: 10px;
        }

        a:hover{

            color: #000;
            background: #ffe300;
        }
        
    </style>
</body>
</html>