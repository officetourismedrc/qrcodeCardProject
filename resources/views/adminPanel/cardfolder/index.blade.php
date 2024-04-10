@extends('adminPanel.index')
@section('sectionC')
<div class="crud__index-container">
 
  <div class="crud__index">
      <div class="crud__index-top">
           {{-- <form action="{{route('employee.create')}}" method="GET"  class="crud__add">
              <button class="crud__add-btn">Add new Employee</button>
           </form> --}}
      </div>
      <div class="crud__index-bottom">
          <div class="province__btm-container">
              
                  <div class="data_content_container_crud">
                    
                    @isset($data)
                        
                                <table class="crud_table">
                                    <thead class="crud-table-thead">
                                       
                                        <tr class="crud-table-row">
                                            <th class="crud-table-header">id</th>
                                            <th class="crud-table-header">first name</th>
                                            <th class="crud-table-header">last name</th>
                                            <th class="crud-table-header">middle name</th>
                                            <th class="crud-table-header">card numb</th>
                                            
                                            <th class="crud-table-header">action</th>

                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            
                                        <tr class="crud-table-row">
                                            <td class="crud_table_cell">{{$item->card_id}} </td>
                                            <td class="crud_table_cell">{{$item->employee_first_name}} </td>
                                            <td class="crud_table_cell">{{$item->employee_last_name}} </td>
                                            <td class="crud_table_cell">{{$item->employee_middle_name}} </td>
                                            <td class="crud_table_cell">{{$item->card_numb}} </td>
                                           
                                            <td class="crud_table_cell">
                                                <div class='module-insert'>
                                                    <form action="{{route('card.destroy',['card'=>$item->card_id])}}" method="POST"  class="crud__add">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="crud__add-btn">delete</button>
                                                     </form>

                                                     <form action="{{route('qr.download-qrcode',['card'=>$item->card_id])}}" method="GET"  class="crud__add">
                                                        @csrf
                                                        <button class="crud__add-btn">download QR-code</button>
                                                     </form>

                                                     <form action="" method="GET"  class="crud__add">
                                                        @csrf
                                                        <button class="crud__add-btn">download card</button>
                                                     </form>
                                                </div> 
                                            </td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                      @endisset
                    </div>
              </table>
          </div>
      </div>
  </div>
</div>


@endsection