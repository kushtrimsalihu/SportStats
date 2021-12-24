@extends('backend.layouts.app')

@section('title', __('Statistics Management'))
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
           Statistics Management
        </x-slot>
        @if ($logged_in_user->hasAllAccess())
            <x-slot name="headerActions">
                <x-utils.link
                    icon="c-icon cil-plus"
                    class="card-header-action"
                    :text="__('Create Statistics')"
                />
                <x-utils.link
                    icon="c-icon cil-chevron-circle-up-alt"
                    class="card-header-action"
                    :href="route('admin.auth.statistics.UpdateStatistics')"
                    :text="__('Update Statistics')"
                />
                <x-utils.link
                    icon="c-icon cil-reload"
                    class="card-header-action"
                    :href="route('admin.auth.statistics.RefreshStatistics')"
                    :text="__('Add Statistics')"
                />
            </x-slot>
        @endif
        <x-slot name="body">
          <input type="text" id="search" class="form-control" placeholder="Search ...">
          <div class="table-responsive" >
            <div class="filterable">
            <table class="table table-striped table-bordered" id="table">
              <tr class="filters">
                <th onclick="sortTable(0)" class="" style="cursor:pointer;">
                  <div class="d-flex align-items-center">
                    <span>Player</span>
                    <span class="relative d-flex align-items-center"><i class="fas fa-caret-down rotate"></i></span>
                  </div>
                </th>
                <th onclick="sortTable(0)" class="" style="cursor:pointer;">
                  <div class="d-flex align-items-center">
                    <span>League</span>
                    <span class="relative d-flex align-items-center"><i class="fas fa-caret-down rotate"></i></span>
                  </div>
                </th> 
                <th onclick="sortTable(0)" class="" style="cursor:pointer;">
                  <div class="d-flex align-items-center">
                    <span>Matches Played</span>
                    <span class="relative d-flex align-items-center"><i class="fas fa-caret-down rotate"></i></span>
                  </div>
                </th> 
                <th onclick="sortTable(0)" class="" style="cursor:pointer;">
                  <div class="d-flex align-items-center">
                    <span>Goals</span>
                    <span class="relative d-flex align-items-center"><i class="fas fa-caret-down rotate"></i></span>
                  </div>
                </th> 
                <th onclick="sortTable(0)" class="" style="cursor:pointer;">
                  <div class="d-flex align-items-center">
                    <span>Assists</span>
                    <span class="relative d-flex align-items-center"><i class="fas fa-caret-down rotate"></i></span>
                  </div>
                </th> 
                <th onclick="sortTable(0)" class="" style="cursor:pointer;">
                  <div class="d-flex align-items-center">
                    <span>Yellow Cards</span>
                    <span class="relative d-flex align-items-center"><i class="fas fa-caret-down rotate"></i></span>
                  </div>
                </th> 
                <th onclick="sortTable(0)" class="" style="cursor:pointer;">
                  <div class="d-flex align-items-center">
                    <span>Red Cards</span>
                    <span class="relative d-flex align-items-center"><i class="fas fa-caret-down rotate"></i></span>
                  </div>
                </th>       
                <th onclick="sortTable(0)" class="" style="cursor:pointer;">
                  <div class="d-flex align-items-center">
                    <span>Minute</span>
                    <span class="relative d-flex align-items-center"><i class="fas fa-caret-down rotate"></i></span>
                  </div>
                </th>    
                <th onclick="sortTable(0)" class="" style="cursor:pointer;">
                  <div class="d-flex align-items-center">
                    <span>Passes</span>
                    <span class="relative d-flex align-items-center"><i class="fas fa-caret-down rotate"></i></span>
                  </div>
                </th>      
                <th>View</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
              @if(count($statistics) > 0)
              @foreach($statistics as $statistic)
              <tr>
                <td>{{$statistic->players->firstname}}</td>
                <td>{{$statistic->league}}</td>
                @if(is_null($statistic->appearences))
                <td>undefined</td>
                @else
                <td>{{$statistic->appearences}}</td>
                @endif
                @if(is_null($statistic->total_goals))
                <td>undefined</td>
                @else
                <td>{{$statistic->total_goals}}</td>
                @endif
                @if(is_null($statistic->assists_goals))
                <td>undefined</td>
                @else
                <td>{{$statistic->assists_goals}}</td>
                @endif
                @if(is_null($statistic->yellow_cards))
                <td>undefined</td>
                @else
                <td>{{$statistic->yellow_cards}}</td>
                @endif
                @if(is_null($statistic->red_cards))
                <td>undefined</td>
                @else
                <td>{{$statistic->red_cards}}</td>
                @endif
                @if(is_null($statistic->minutes))
                <td>undefined</td>
                @else
                <td>{{$statistic->minutes}}</td>
                @endif
                @if(is_null($statistic->total_passes))
                <td>undefined</td>
                @else
                <td>{{$statistic->total_passes}}</td>
                @endif
                <td>
                  <x-utils.view-button
                    :href="route('admin.auth.statistics.show',['league' => $statistic->league,'player' => $statistic->players->player_id])"
                    :text="__('View')" />
                </td>
                <td>
                  <x-utils.edit-button
                    :text="('Edit')" />
                </td>
                <td>
                <x-utils.delete-button
                    :href="route('admin.auth.statistics.show',['league' => $statistic->league,'player' => $statistic->players->player_id])"
                    :text="__('Delete')" />
                </td>
              </tr>
              @endforeach
              @else 
              <p> No Statistics is found </p>
              @endif
            </table>
            <div class="d-flex justify-content-center">
              {{ $statistics->links() }}
            </div>
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
