@extends('layouts.app')
@section('content')
   <div>
    <div>
        <span>card verified successfully</span>
        @php
            
        @endphp
    </div>
    <div>
      <div>
        <span> {{$employee[0]->f_name}}</span><span> {{$employee[0]->last_name}}</span><span> {{ $employee[0]->middle_name}}</span>
      </div>

      <div>
        <span></span><span></span>
      </div>

      <div>
        <span></span><span></span>
      </div>

      <div>
        <span></span><span></span>
      </div>
    </div>

    <div>
        <div>
          <span>card number :{{$card[0]->card_numb}} </span><span></span>
        </div>
  
        <div>
          <span style='background-color:black; width:400px'><img  src="{{$card[0]->card_path}}" alt="no displaying" style='object-fit:cover'></span>
        </div>
  
        
      </div>

   </div>
   <div>
    <span style='display:block; background-color:black; width:400px'><img style='object-fit:cover' src="{{url('assets/images/logo_ont_noir_blanc.png')}}" alt="" class='logo-img'></span>
   </div>

@endsection