@extends('adminPanel.index')
@section('sectionC')
  <div class="add__item-container">
    <form method="POST" action="{{ route('card.store') }}" class="add-item-form" enctype="multipart/form-data">
        @csrf

       
        <!-- Employee name -->

       
        <div class='module-insert'>
            <div><span>{{$data->f_name}}</span></div>
            <div><span>{{$data->last_name}}</span></div>
            <div><span>{{$data->middle_name}}</span></div>
        </div>

       <input type="hidden" name="empl" value="{{$data->id}}">
        <div class='module-insert'>
            <label for="card_numb" class="input-item-desc"> {{__('card_numb')}}</label>
            <input id="card_numb" class="block mt-1 w-full input-item" type="text" name="card_numb" value="{{old('card_numb')}}"  autofocus autocomplete="card_numb"/>

        </div>

        <div class='module-insert'>
            <label for="desc" class="input-item-desc"> {{__('desc')}}</label>
            <input id="desc" class="block mt-1 w-full input-item" type="text" name="desc" value="{{old('desc')}}"  autofocus autocomplete="desc"/>

        </div>

        <div class='module-insert'>
            <label for="image_slider" class="input-item-desc"> {{__('Insert image')}}</label>
            <input id="image_slider" class="block mt-1 w-full input-item" type="file" name="image"   value="{{old('image')}}" required />
          </div>

      
        {{-- ['card_numb','desc','employee_id']; --}}
       
        {{-- ['f_name','last_name','middle_name','dob','email','phone_numb'] --}}
             
        <div class="input-item-save">
            <button class="ms-3 input-item-btn">
                {{ __('Save') }}
            <button>
        </div>

        <div class='module-insert'>


     @if ($errors->any())
    <div class="alert alert-danger">
        <ul style="color:red">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    </div>
    </form>
  </div>
@endsection