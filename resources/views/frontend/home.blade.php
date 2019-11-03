@extends('frontend.test')

@section('title', 'Home')

@section('content')
{{--這邊放各個頁面不同的內容--}}
你好, {{$name}}
<br/>
@if(count($arr) === 1)
我有一筆資料
@elseif(count($arr) > 1)
我有很多筆資料
@else
我沒有資料
@endif
<br/>
@switch(count($arr))
	@case(1)
		我有一個東西
		@break
	@case(2)
		我有兩個東西
		@break
	@default
		我有很多個東西
@endswitch
<br/>
@for($i = 0; $i < count($arr); $i++)
@continue($i == 1)
編號{{$i+1}}<br/>
@endfor
@endsection