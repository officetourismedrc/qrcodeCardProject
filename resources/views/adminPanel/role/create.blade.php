@extends('adminPanel.index')
@section('sectionC')
  <div class="add__item-container">
    <form method="POST" action="{{ route('employee.store') }}" class="add-item-form" >
        @csrf

       
        <!-- Employee name -->

       
        <div class='module-insert'>
            <label for="name" class="input-item-desc"> {{__('Name')}}</label>
            <input id="name" class="block mt-1 w-full input-item" type="text" name="ame" value="{{old('name')}}" required autofocus autocomplete="name"/>

        </div>

        <div class='module-insert'>
            <label for="desc" class="input-item-desc"> {{__('desc')}}</label>
            <input id="desc" class="block mt-1 w-full input-item" type="text" name="desc" value="{{old('desc')}}" required autofocus autocomplete="desc"/>

        </div>
        
       
        
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