@extends('backend.layouts.app')

@section('title', __('Daily Vote'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('View Daily Vote')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.auth.dailyvote.index')" :text="__('Back')" />
        </x-slot>

        <x-slot name="body">
            <div class="row flex-column p-4 mb-4">
                <div class="d-flex justify-content-center">
                    <h2 class="text-dark">Vote Below</h2>
                </div>
                <div class="d-flex justify-content-center">
                    <p class="tex-secondary">Vote to choose the team of the day</p>
                </div>
                <div class="row justify-content-center">
                    <a class="text-decoration-none daily-transition">
                        <div class="d-flex">
                            <div class="d-flex p-4">
                                <h5 class="align-self-center text-uppercase">Vote</h5>
                            </div>
                            <div class="d-inline-flex">
                                <img src="{{ $team1->logo }}" alt="">
                            </div>
                        </div>
                    </a>
                    <div class="d-inline-flex align-self-center m-4">
                        -
                    </div>
                    <a class="text-decoration-none daily-transition">
                        <div class="d-flex">
                            <div class="d-inline-flex">
                                <img src="{{ $team2->logo }}" alt="">
                            </div>
                            <div class="d-flex p-4">
                                <h5 class="align-self-center text-uppercase">Vote</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </x-slot>
    </x-backend.card>
@endsection