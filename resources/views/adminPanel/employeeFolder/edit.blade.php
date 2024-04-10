@extends('adminPanel.index')
@section('sectionC')
  <div class="add__item-container">
    <form method="POST" action="{{ route('employee.update',['employee'=>$data->id]) }}" class="add-item-form">
        @csrf
        @method('PUT')
        <div class='module-insert'>
       <div class="module-title">
           <h2 class="section-title__2">Update employee intel</h2>
       </div>
       </div>


       <div class='module-insert'>
        <!-- Employee name -->
        <div class='module-insert'>
            <label for="f_name" class="input-item-desc"> {{__('First Name')}}</label>
            <input id="f_name" class="block mt-1 w-full input-item" type="text" name="f_name" value="{{old('f_name', $data->f_name)}}" required autofocus autocomplete="f_name"/>

        </div>

        <div class='module-insert'>
            <label for="last_name" class="input-item-desc"> {{__('first name')}}</label>
            <input id="last_name" class="block mt-1 w-full input-item" type="text" name="last_name" value="{{old('last_name' , $data->last_name)}}" required autofocus autocomplete="last_name"/>

        </div>
        </div>

        <div class='module-insert'>
            <label for="middle_name" class="input-item-desc"> {{__('midlle name')}}</label>
            <input id="middle_name" class="block mt-1 w-full input-item" type="text" name="middle_name" value="{{old('middle_name' , $data->middle_name)}}" required autofocus autocomplete="middle_name"/>

        </div>

        <div class='module-insert'>

        <div class='module-insert'>
            <label for="dob" class="input-item-desc"> {{__('date de naissance')}}</label>
            <input id="dob" class="block mt-1 w-full input-item" type="date" name="dob" value="{{old('dob' , $data->dob)}}"  autofocus autocomplete="dob"/>

        </div>

        <div class='module-insert'>
            <label for="email" class="input-item-desc"> {{__('email')}}</label>
            <input id="email" class="block mt-1 w-full input-item" type="email" name="email" value="{{old('email' , $data->email)}}"  autofocus autocomplete="email"/>

        </div>
        </div>

        <div class='module-insert'>
            <label for="phone_numb" class="input-item-desc"> {{__('phone_numb')}}</label>
            <input id="phone_numb" class="block mt-1 w-full input-item" type="text" name="phone_numb" value="{{old('phone_numb' , $data->phone_numb)}}"  autofocus autocomplete="phone_numb"/>

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
        

       
        <div class="flex items-center justify-end mt-4 input-item-save">
            <button class="ms-3 input-item-btn">
                {{ __('Update') }}
            </button>
        </div>
    </form>
  </div>
@endsection