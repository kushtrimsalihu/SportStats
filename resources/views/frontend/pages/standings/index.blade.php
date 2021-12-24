@extends('frontend.layouts.app')

@section('title', __('Standings'))
@section('content')
<div class="container-dash">
    <div class="row justify-content-center">
        <div>
            <h2>Standings</h2>
        </div>
    </div>
    <hr>
    <form action="{{ route('frontend.user.getstanding') }}" method="POST">
        @csrf
        <div class="row">
            <div class="form-group col justify-content-center">
                <select name="league" class="form-control" required x-on:change="league = $event.target.value">
                    @foreach($leagues as $league)
                        @if(isset($selectedleague) && $league->id == $selectedleague)
                        <option value="{{ $league->id }}" selected>{{ $league->name }}</option>
                        @else
                        <option value="{{ $league->id }}">{{ $league->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-5 col-xl-2 text-center">
                <button type="submit" class="btn btn-success">Get Standing</button>
            </div>
        </div>
    </form>
    <div class="rounded bg-white shadow">
        @if(isset($standing))
        <div class="mt-2 table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Pos</th>
                    <th scope="col">Team</th>
                    <th scope="col">P</th>
                    <th scope="col">W</th>
                    <th scope="col">D</th>
                    <th scope="col">L</th>
                    <th scope="col">F</th>
                    <th scope="col">A</th>
                    <th scope="col">+/-</th>
                    <th scope="col">PTS</th>
                    <th scope="col">Form</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($standing[0]['league']['standings'][0] as $stand)
                    <tr>
                        <th scope="row">{{ $stand['rank'] }}</th>
                        <td>{{ $stand['team']['name'] }}</td>
                        <td>{{ $stand['all']['played'] }}</td>
                        <td>{{ $stand['all']['win'] }}</td>
                        <td>{{ $stand['all']['draw'] }}</td>
                        <td>{{ $stand['all']['lose'] }}</td>
                        <td>{{ $stand['all']['goals']['for'] }}</td>
                        <td>{{ $stand['all']['goals']['against'] }}</td>
                        <td>{{ $stand['goalsDiff'] }}</td>
                        <td>{{ $stand['points'] }}</td>
                        <td>
                            @foreach(str_split($stand['form']) as $form)
                                @if($form == 'W')
                                    <span class="text-success">{{ $form }}</span>
                                @elseif($form == 'L')
                                    <span class="text-danger">{{ $form }}</span>
                                @else
                                    <span class="text-warning">{{ $form }}</span>
                                @endif
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>
@endsection