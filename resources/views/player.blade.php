@extends('templates.base')

@section('content')
    <h1>{{ $player->name }}</h1>

    <div class="row">
        <div class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-heading panel-title">
                    Character
                </div>
                <table class="table table-condensed">
                    <tbody>
                        <tr><th>Realm</th><td>{{ $player->realm->name }}</td></tr>
                        <tr><th>Faction</th><td>{{ $player->faction->name }}</td></tr>
                        <tr><th>Race</th><td>{{ $player->race->name }}</td></tr>
                        <tr><th>Class</th><td>{{ $player->role->name }}</td></tr>
                        <tr><th>Spec</th><td>{{ $player->spec->name }}</td></tr>
                        <tr><th>Gender</th><td>{{ $player->gender->name }}</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
        @foreach ($player->stats as $stat)
            <div class="col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-heading panel-title">
                        {{ $stat->bracket->name }} Stats
                    </div>
                    <table class="table table-condensed">
                        <tbody>
                            <tr><th>Ranking</th><td>{{ $stat->ranking }}</td></tr>
                            <tr><th>Rating</th><td>{{ $stat->rating }}</td></tr>
                            <tr><th>W</th><td>{{ $stat->season_wins }}</td></tr>
                            <tr><th>L</th><td>{{ $stat->season_losses }}</td></tr>
                            <tr><th>Week W</th><td>{{ $stat->weekly_wins }}</td></tr>
                            <tr><th>Week L</th><td>{{ $stat->weekly_losses }}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </div>

    <div class="panel panel-default">
        <div class="panel-heading panel-title">
            Teams
        </div>
        <table class="table table-striped table-bordered table-condensed">
            <thead>
                <tr>
                    <th colspan="3">Players</th>
                    <th colspan="3">Comp</th>
                    <th>Rating</th>
                    <th>W</th>
                    <th>L</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($player->getTeams() as $team)
                    <?php
                    $perf = $team->getPerf();
                    ?>
                    <tr>
                        <td><a href="{{ route('player', $team->player_id1) }}">{{ $team->player1->name }}</a></td>
                        <td><a href="{{ route('player', $team->player_id2) }}">{{ $team->player2->name }}</a></td>
                        <td><a href="{{ route('player', $team->player_id3) }}">{{ $team->player3->name }}</a></td>
                        <td colspan="3">All</td>
                        <td>{{ $perf['avg_rating'] }}</td>
                        <td>{{ $perf['wins'] }}</td>
                        <td>{{ $perf['losses'] }}</td>
                    </tr>
                    @foreach ($perf['by_comp'] as $comp_id => $comp_perf)
                        <?php
                        $comp = App\Models\Comp::find($comp_id);
                        ?>
                        <tr>
                            <td colspan="3"></td>
                            <td>{{ $comp->spec1->name }} {{ $comp->spec1->role->name }}</td>
                            <td>{{ $comp->spec2->name }} {{ $comp->spec2->role->name }}</td>
                            <td>{{ $comp->spec3->name }} {{ $comp->spec3->role->name }}</td>
                            <td>{{ $comp_perf['avg_rating'] }}</td>
                            <td>{{ $comp_perf['wins'] }}</td>
                            <td>{{ $comp_perf['losses'] }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
@endsection