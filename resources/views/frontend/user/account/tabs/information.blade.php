<x-forms.patch :action="route('frontend.user.profile.update')">
    <div class="py-2 border-top">
        <div class="row py-2"><div class="col-md-6"> <label for="name"><b>@lang('Name')</b></label> <input type="text" name="name" class="bg-light form-control" placeholder="{{ __('Name') }}" value="{{ old('name') ?? $logged_in_user->name }}" required autofocus autocomplete="name" > </div>
        @if ($logged_in_user->canChangeEmail())
        <div class="col-md-6 pt-md-0 pt-3"> <label for="email"><b>@lang('E-mail Address')</b></label> <input type="email" name="email" id="email" class="bg-light form-control" placeholder="{{ __('E-mail Address') }}" value="{{ old('email') ?? $logged_in_user->email }}" required autocomplete="email"> </div>
    </div>
        @endif
        <div class="py-3 pb-4 "> <button class="btn btn-profile mr-3" type="submit">@lang('Update')</button> <button class="btn border button-profile" type="reset" :text="__('Cancel')">Cancel</button> </div>

</x-forms.patch>
