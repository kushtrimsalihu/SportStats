@extends('backend.layouts.app')

@section('title', __('Landing Page'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('View FAQ')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.auth.faq.index')" :text="__('Back')" />
        </x-slot>

        <x-slot name="body">
            <div class="table-responsive" >
                <div class="filterable">
                <table class="table table-striped table-bordered" id="table">
                    <tr>
                        <th>@lang('Question')</th>
                        <td>{{ $faq->questions }}</td>
                    </tr>
                    <tr>
                        <th>@lang('Answer')</th>
                        <td>{{ $faq->answers }}</td>
                    </tr>
                </table>
                </div>
            </div>
        </x-slot>
    </x-backend.card>
@endsection