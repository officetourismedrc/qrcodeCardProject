@extends('adminPanel.index')
@section('sectionC')
  <div class="add__item-container">
    <form method="POST" action="{{ route('employee.store') }}" class="add-item-form" >
        @csrf

       
        <!-- Employee name -->

       
        <div class='module-insert'>
            <label for="f_name" class="input-item-desc"> {{__('First Name')}}</label>
            <input id="f_name" class="block mt-1 w-full input-item" type="text" name="f_name" value="{{old('f_name')}}" required autofocus autocomplete="f_name"/>

        </div>

        <div class='module-insert'>
            <label for="last_name" class="input-item-desc"> {{__('Last name')}}</label>
            <input id="last_name" class="block mt-1 w-full input-item" type="text" name="last_name" value="{{old('last_name')}}" required autofocus autocomplete="last_name"/>

        </div>
        
       
        <div class='module-insert'>
            <label for="middle_name" class="input-item-desc"> {{__('Midlle name')}}</label>
            <input id="middle_name" class="block mt-1 w-full input-item" type="text" name="middle_name" value="{{old('middle_name')}}" required autofocus autocomplete="middle_name"/>

        </div>

        <div class='module-insert'>

        <div class='module-insert'>
            <label for="dob" class="input-item-desc"> {{__('date de naissance')}}</label>
            <input id="dob" class="block mt-1 w-full input-item" type="date" name="dob" value="{{old('dob')}}"  autofocus autocomplete="dob"/>

        </div>

        <div class='module-insert'>
            <label for="email" class="input-item-desc"> {{__('email')}}</label>
            <input id="email" class="block mt-1 w-full input-item" type="email" name="email" value="{{old('email')}}"  autofocus autocomplete="email"/>

        </div>
        </div>

        <div class='module-insert'>
            <label for="phone_numb" class="input-item-desc"> {{__('phone_numb')}}</label>
            <input id="phone_numb" class="block mt-1 w-full input-item" type="text" name="phone_numb" value="{{old('phone_numb')}}"  autofocus autocomplete="phone_numb"/>

        </div>

        {{-- <div class='module-insert'>
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
          </div> --}}

      





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