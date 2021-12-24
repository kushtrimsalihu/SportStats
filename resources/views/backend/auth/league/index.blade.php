@extends('backend.layouts.app')

@section('title', __('League Management'))
<style>
    input#search{
     width: 20%;
    color: blue;
    margin-bottom: 20px !important;
   } 
    span.relative.fa-size.d-flex.align-items-center:hover{
        font-size: 20px;
    color: blue;
    transition: .4s ease-out;
      }
    
.rotate {
    -moz-transition: all .5s linear;
    -webkit-transition: all .5s linear;
    transition: all .5s linear;
    margin-left: 5px;
}
.rotate.down {
    -moz-transform:rotate(180deg);
    -webkit-transform:rotate(180deg);
    transform:rotate(180deg);
}
</style>
@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
           League Management
        </x-slot>

        @if ($logged_in_user->hasAllAccess())
            <x-slot name="headerActions">
                <!-- :href="route('admin.auth.league.create')" -->
                <x-utils.link
                    icon="c-icon cil-plus"
                    class="card-header-action"
                    :text="__('Create League')"
                />
                <x-utils.link
                    icon="c-icon cil-chevron-circle-up-alt"
                    class="card-header-action"
                    :href="route('admin.auth.league.UpdateLeagues')"
                    :text="__('Update league')"
                />
                <x-utils.link
                    icon="c-icon cil-reload"
                    class="card-header-action"
                    :href="route('admin.auth.league.RefreshLeagues')"
                    :text="__('Add leagues')"
                />
            </x-slot>
        @endif

        <x-slot name="body">
            
 <input type="text" id="search" class="form-control" placeholder="Search ...">
<div class="table-responsive" >
            <div class="filterable">
            <table class="table table-striped table-bordered" id="table">
                <tr class="filters">
                <th>Logo</th>


     <th onclick="sortTable(1)" class="" style="cursor:pointer;">
        <div class="d-flex align-items-center">
               <span>Country</span>
               <span class="relative d-flex align-items-center"><i class="fas fa-caret-down rotate"></i></span>
        </div>
     </th> 
        <th onclick="sortTable(2)" class="" style="cursor:pointer;">
        <div class="d-flex align-items-center">
            <span>League Name</span>
            <span class="relative d-flex align-items-center"><i class="fas fa-caret-down rotate"></i></span>
           </div>
      </th> 
        <th onclick="sortTable(1)" class="" style="cursor:pointer;">
        <div class="d-flex align-items-center">
            <span>Type</span>
            <span class="relative d-flex align-items-center"><i class="fas fa-caret-down rotate"></i></span>
           </div>
      </th> 
             
                <th>View</th>
                <th>Edit</th>
                <th>Delete</th>

                </tr>
                
                @if(count($leagues) > 0)
                @foreach($leagues as $league)
                <tr>
                    <td><img src="{{$league->logo}}" alt="" width="40px"></td>
                    <td>{{$league->country}}</td>
                    <td>{{$league->name}}</td>
                    <td>{{$league->type}}</td>
                    <td>
                      <x-utils.view-button
                        :href="route('admin.auth.league.show', $league->id)"
                        :text="__('View')" />
                    </td>
                    <td>
                      <x-utils.edit-button
                        :href="route('admin.auth.league.edit', $league->id)"
                        :text="__('Edit')" />
                    </td>
                    <td>
                      <x-utils.delete-button
                      :href="route('admin.auth.league.destroy', $league->id)"
                      :text="__('Delete')"/>
                  </td>
                    
                  </tr>
                  @endforeach
                  @else 
                  <p> No League found </p>
                  @endif
                  
                </table>
                <div class="">
                  {{ $leagues->links() }}
                </div>

        </x-slot>
    </x-backend.card> 
    
      <script>
                function sortTable(n) {
                  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
                  table = document.getElementById("table");
                  switching = true;
                  
                  dir = "asc";
                  
                  while (switching) {
                    
                    switching = false;
                    rows = table.rows;
                    
                    for (i = 1; i < (rows.length - 1); i++) {
                      
                      shouldSwitch = false;
                      x = rows[i].getElementsByTagName("TD")[n];
                      y = rows[i + 1].getElementsByTagName("TD")[n];
                      

                      if (dir == "asc") {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                          
                          shouldSwitch = true;
                          break;
                        }
                      } else if (dir == "desc") {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                          
                          shouldSwitch = true;
                          break;
                        }
                      }
                    }
                    if (shouldSwitch) {
                      
                      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                      switching = true;

                      switchcount ++;
                    } else {
                      if (switchcount == 0 && dir == "asc") {
                        dir = "desc";
                        switching = true;
                      }
                    }
                  }
                }
                </script>
@endsection
