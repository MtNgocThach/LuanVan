@extends('moteler.layout.index')

@section('content')
<?php
    foreach ($rooms as $room){
        echo $room->name;
    }
?>

@endsection