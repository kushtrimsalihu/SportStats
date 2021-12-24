
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
@include('frontend.includes.nav-landing')

    {{-- @include('frontend.includes.nav') --}}
    @include('includes.partials.messages')
    <div class="container p-4">
        <div class="row justify-content-center">
            @if(isset($plans))
            @foreach($plans as $plan)
            <div class="col-4">
                <div class="card p-4 rounded shadow">
                    <div class="card-body">
                        <div class="text-center">
                            <h5 class="card-title"><b>{{ $plan->product->name }}</b></h5>
                            <hr>
                            <h1 class="mt-2">{{ $plan->amount/100 }} {{ $plan->currency }}<small style="font-size: 15px;">/{{ $plan->interval }}</small></h1>
                            <a href="{{ route('frontend.user.subscription.create', $plan->id) }}" class="btn btn-lg btn-outline-success mt-2">GET STARTED</a>
                        </div>
                        <div class="text-left mt-4">
                            <p><span class="text-success">&#10004;    </span><b>Lorem ipsum dolor, sit amet consectetur </b></p>
                            <p><span class="text-success">&#10004;    </span><b>Lorem ipsum dolor, sit amet consectetur </b></p>
                            <p><span class="text-success">&#10004;    </span><b>Lorem ipsum dolor, sit amet consectetur </b></p>
                            <p><span class="text-success">&#10004;    </span><b>Lorem ipsum dolor, sit amet consectetur </b></p>
                            <p><span class="text-success">&#10004;    </span><b>Lorem ipsum dolor, sit amet consectetur </b></p>
                            <p><span class="text-success">&#10004;    </span><b>Lorem ipsum dolor, sit amet consectetur </b></p>
                            <p><span class="text-success">&#10004;    </span><b>Lorem ipsum dolor, sit amet consectetur </b></p>
                            <p><span class="text-success">&#10004;    </span><b>Lorem ipsum dolor, sit amet consectetur </b></p>
                            <p><span class="text-success">&#10004;    </span><b>Lorem ipsum dolor, sit amet consectetur </b></p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</body>
</html>