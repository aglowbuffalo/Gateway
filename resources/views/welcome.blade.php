@extends('layouts.main')

@section('content')

    <div class="home-text">First method : at first I wanted to get data once from Api and then just to pass it to controller (to escape special characters) when I need the next page.<br>
        PS: After I send the task I check my php setting and saw that data transfer is to little so the first method where i slice the array and pass it to controller work normal.
        It work but php give me warning for to much data so I change it to when I need next page just get the data from api(did't see pagination in the api so I get all the data)
    </div>
    <div class="home-text">Second method : get data from api save it in DB and then use it
    </div>



@endsection
