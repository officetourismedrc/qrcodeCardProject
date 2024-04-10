@extends('adminPanel.index')
@section('sectionC')
<div class="crud__index-container">
 
  <div class="crud__index">
      <div class="crud__index-top">
           <form action="{{route('employee.create')}}" method="GET"  class="crud__add">
              <button class="crud__add-btn">Add new Employee</button>
           </form>
      </div>
      <div class="crud__index-bottom">
          <div class="province__btm-container">
              
                  <div class="data_content_container_crud">
                    @isset($data)
                        
                                <table class="crud_table">
                                    
                                       
                                        <tr class="crud-table-row">
                                            <th class="crud-table-header">id</th>
                                            <td class="crud_table_cell">{{$data->id}} </td>
                                        </tr>
                                        <tr class="crud-table-row">
                                            <th class="crud-table-header">first name</th>
                                            <td class="crud_table_cell">{{$data->f_name}} </td>
                                        </tr>
                                        <tr class="crud-table-row">
                                            <th class="crud-table-header">last name</th>
                                            <td class="crud_table_cell">{{$data->last_name}} </td>
                                        </tr>
                                        <tr class="crud-table-row">
                                            <th class="crud-table-header">middle name</th>
                                            <td class="crud_table_cell">{{$data->middle_name}} </td>
                                        </tr>
                                        <tr class="crud-table-row">
                                            <th class="crud-table-header">dob</th>
                                            <td class="crud_table_cell">{{$data->dob}} </td>
                                        </tr>
                                        <tr class="crud-table-row">
                                            <th class="crud-table-header">phone number</th>
                                            <td class="crud_table_cell">{{$data->phone_numb}} </td>
                                        </tr> 
                                          
                                            @if(!empty($card[0]))
                                              <tr class="crud-table-row">
                                              <th class="crud-table-header">card number</th>
                                              <td class="crud_table_cell">{{$card[0]->card_numb}} </td>
                                              </tr> 
                                               <tr class="crud-table-row">
                                               <th class="crud-table-header">Qr-code</th>
                                               <td class="crud_table_cell"><img src="" alt="" srcset=""> </td>
                                               </tr>   
                                              
                                           @else
                                           <tr class="crud-table-row">
                                            <form action="{{route('card.create')}}" method="GET"  class="crud__add">
                                                @csrf
                                                <input type="hidden" name="emp" value="{{$data->id}}">
                                                <button class="crud__add-btn">generate Qr-code</button>
                                             </form>
                                            </tr> 
                                           @endif
                                       
                                        
                                   
                                   
                                </table>
                            
                     
                      @endisset
                    </div>
              </table>
          </div>
      </div>
  </div>
</div>


@endsection