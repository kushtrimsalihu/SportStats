@extends('backend.layouts.app')

@section('title', __('Create Post'))

@section('content')

<h1 class="text-center">Create Post</h1>
<x-forms.post :action="route('admin.auth.posts.store')" enctype="multipart/form-data">
    <x-backend.card>
        <x-slot name="header">
            @lang('Create Posts')
        </x-slot>
        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.auth.posts.index')" :text="__('Cancel')" />
        </x-slot>
        <x-slot name="body">
            <div class="col-md-10">
                <label for="image" class="form-label">Photo</label>
                <input type="file" name="image" class="form-control"  />

            <div class="form-group">
                <label for="name" class="form-label">Title</label>
                <input type="text"  name="title" class="form-control"  required />
            </div>
            <div class="form-group row">
                <label for="content" class="col-md-2 col-form-label">Content</label>
                <div class="col-md-10">
                    <textarea class="form-control" name="content" id='body'> </textarea>
                </div>
            </div><!--form-group-->

            <div class="form-group row">
                <label for="content" class="col-md-2 col-form-label">Tags</label>
                <div class="col-md-10">
                    <input type="text" name="tags" class="form-control" placeholder="liverpool,salah,mane">
                </div>
            </div><!--form-group-->
            <script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>
         <script>
             ClassicEditor
             .create( document.querySelector( '#body' ) )
             .catch( error => {
             console.error( 'CKEditor error: '+error );
             });

         </script>

        </x-slot>
        <x-slot name="footer">
            <button class="btn btn-sm btn-primary float-right" type="submit">Submit</button>
        </x-slot>
    </x-backend.card>
</x-forms.post>
@endsection

