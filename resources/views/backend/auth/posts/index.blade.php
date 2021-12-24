@extends('backend.layouts.app')

@section('title', __('Posts Management'))
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
        Posts Management
    </x-slot>

    @if ($logged_in_user->hasAllAccess())
    <x-slot name="headerActions">
        <x-utils.link icon="c-icon cil-plus" class="card-header-action" :href="route('admin.auth.posts.create')"
            :text="__('Create Post')" />
    </x-slot>
    @endif

    <x-slot name="body">
 <input type="text" id="search" class="form-control" placeholder="Search ...">
<div class="table-responsive" >
            <div class="filterable">
            <table class="table table-striped table-bordered" id="table">
                <tr class="filters">

{{-- <th onclick="sortTable(0)" class="" style="cursor:pointer;">
        <div class="d-flex align-items-center">
            <span>ID</span>
            <span class="relative fa-size d-flex align-items-center"><i class="fas fa-caret-down rotate"></i></span>
           </div>
      </th> --}}
<th onclick="sortTable(0)" class="" style="cursor:pointer;">
        <div class="d-flex align-items-center">
            <span>Title</span>
            <span class="relative fa-size d-flex align-items-center"><i class="fas fa-caret-down rotate"></i></span>
           </div>
      </th>

<th onclick="sortTable(0)" class="" style="cursor:pointer;">
        <div class="d-flex align-items-center">
            <span>Content</span>
            <span class="relative fa-size d-flex align-items-center"><i class="fas fa-caret-down rotate"></i></span>
           </div>
      </th>

<th onclick="sortTable(0)" class="" style="cursor:pointer;">
        <div class="d-flex align-items-center">
            <span>Image</span>
            <span class="relative fa-size d-flex align-items-center"><i class="fas fa-caret-down rotate"></i></span>
           </div>
      </th>
               <th class="text-center">View</th>
               <th class="text-center">Edit</th>
                <th class="text-center">Delete</th>
            </tr>

            @if(count($posts) > 0)
            @foreach($posts as $post)
            <tr>
                {{-- <td>{{$post->id}}</td> --}}
                <td>{{$post->title}}</td>
                <td>{!! $post->content !!}</td>
                <td>
                    <img src="{{asset('/postuploads/PostsImages/'.$post->image)}}" width="90px" height="60px">
                </td>
                <td>
                  <x-utils.view-button
                    :href="route('admin.auth.posts.show', $post->id)"
                    :text="__('View')" />
                </td>
                <td>
                    <x-utils.edit-button :href="route('admin.auth.posts.edit', $post->id)"
                        :text="__('Edit')" />
                </td>
                <td>
                    <x-utils.delete-button :href="route('admin.auth.posts.destroy', $post->id)"
                        :text="__('Delete')" />
                </td>
                </td>
            </tr>
            @endforeach
            @else
            <p> No Posts found </p>
            @endif
        </table>
        <div class="">
            {{ $posts->links() }}
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

          shouldSwitch= true;
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




