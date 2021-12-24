<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ appName() }}</title>

        <link href="{{ mix('css/frontend.css') }}" rel="stylesheet">
    </head>
    <body>
        @include('includes.partials.messages')
@include('frontend.includes.nav-landing')

        <div class="container p-4">
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="card shadow p-4">
                        <div>
                            <h2>Fill required information and confirm the payment</h2>
                            <hr>
                        </div>
                        <form method="POST" action="{{route('frontend.user.order-post')}}" accept-charset="UTF-8" data-parsley-validate="" id="payment-form">
                            @csrf
                            <!-- @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                    <strong>{{ $message }}</strong>
                            </div>
                            @endif -->
                            <div class="form-group d-none" id="product-group">
                                <input class="form-control" required="required" data-parsley-class-handler="#product-group" id="plane" name="plane" value="{{ $price_id }}">
                            </div>
                            <div class="row mt-2 mb-2">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div id="card-element" class="form-control"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button id="card-button" class="btn btn-lg btn-outline-success mt-2">Confirm & Pay Your Plane</button>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <span class="payment-errors" id="card-errors" style="color: red;margin-top:10px;"></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
        window.ParsleyConfig = {
            errorsWrapper: '<div></div>',
            errorTemplate: '<div class="alert alert-danger parsley" role="alert"></div>',
            errorClass: 'has-error',
            successClass: 'has-success'
        };
    </script>        
    <script src="http://parsleyjs.org/dist/parsley.js"></script>        
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        var style = {
            base: {
                lineHeight: '18px',
                fontSize: '16px',
            }
        };
        const stripe = Stripe('{{ env("STRIPE_KEY") }}', { locale: 'en' });
        const elements = stripe.elements();
        const card = elements.create('card', { style: style });
        card.mount('#card-element');
        card.on('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    stripeTokenHandler(result.token);
                }
            });
        });
        function stripeTokenHandler(token) {
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);
            form.submit();
        }
    </script>
</html>