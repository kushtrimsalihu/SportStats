        <x-forms.patch form:hidden :action="route('frontend.auth.password.change')">
            <div class="row py-2">
                <div class="col-md-6"> <label for="current_password"><b>@lang('Current Password')</b></label> <input type="password" name="current_password" class="bg-light form-control" placeholder="{{ __('Current Password') }}"  maxlength="100" required autofocus> </div>
                <div class="col-md-6 pt-md-0 pt-3"> <label for="password"><b>@lang('New Password')</b></label> <input type="password" name="password" class="bg-light form-control" placeholder="{{ __('New Password') }}" maxlength="100" required autocomplete="password"> </div>

            </div>
            <div class="row py-2">
            <div class="col-md-6"> <label for="password_confirmation"><b>@lang('Password Confirm')</b></label> <input type="password" name="password_confirmation"  class="bg-light form-control"  placeholder="{{ __('New Password Confirmation') }}" required autocomplete="new-password"> </div>
            <div class="col-sm-6 text-secondary">
                @lang('!! If you change your Informations you will be logged out until you confirm your new E-mail Address and Password !!')
            </div>
            </div>
            <div class="py-3 pb-4 "> <button class="btn btn-profile mr-3" type="submit">@lang('Update Password')</button> <button class="btn border button-profile" type="reset" :text="__('Cancel')">Cancel</button> </div>
            </div>
        </x-forms.patch>















