@extends('adminPanel.index')
@section('sectionC')
<div class="crud__index-container">
 
  <div class="crud__index">
      <div class="crud__index-top">
           <form action="{{route('employee.create')}}" method="GET"  class="crud__add">
              <button class="crud__add-btn">Add new Role</button>
           </form>
      </div>
      <div class="crud__index-bottom">
          <div class="province__btm-container">
              
                  <div class="data_content_container_crud">
                    @isset($data)
                        
                    
                    
                        
                                
                                <table class="crud_table">
                                    <thead class="crud-table-thead">
                                       
                                        <tr class="crud-table-row">
                                            <th class="crud-table-header">id</th>
                                            <th class="crud-table-header">name</th>
                                            <th class="crud-table-header">desc</th>
                                            
                                            <th class="crud-table-header">action</th>

                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            
                                        <tr class="crud-table-row">
                                            <td class="crud_table_cell">{{$item->id}} </td>
                                            <td class="crud_table_cell">{{$item->name}} </td>
                                            <td class="crud_table_cell">{{$item->desc}} </td>
                                           
                                            <td class="crud_table_cell">
                                                <div class='module-insert'>
                                                    <form action="" method="POST"  class="crud__add">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="crud__add-btn">delete</button>
                                                     </form>

                                                     <form action="" method="GET"  class="crud__add">
                                                        @csrf
                                                        <button class="crud__add-btn">update</button>
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