@extends('templates.base')

@section('content')
    <h1>Stats</h1>

    <div class="row">
        <div class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-heading panel-title">
                    Classes
                </div>
                <table class="table table-striped table-bordered table-condensed">
                    <tbody>
                        @foreach ($role_data as $row)
                            <tr>
                                <td>{{ $row->ranking }}</td>
                                <td>{{ $row->role_name }}</td>
                                <td>{{ sprintf("%01.1f", $row->pct) }}%</td>
                                <td>({{ $row->num }})</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-heading panel-title">
                    Specs
                </div>
                <table class="table table-striped table-bordered table-condensed">
                    <tbody>
                        @foreach ($spec_data as $row)
                            <tr>
                                <td>{{ $row->ranking }}</td>
                                <td>{{ $row->role_name }}</td>
                                <td>{{ $row->spec_name }}</td>
                                <td>{{ sprintf("%01.1f", $row->pct) }}%</td>
                                <td>({{ $row->num }})</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-heading panel-title">
                    Races
                </div>
                <table class="table table-striped table-bordered table-condensed">
                    <tbody>
                        @foreach ($race_data as $row)
                            <tr>
                                <td>{{ $row->ranking }}</td>
                                <td>{{ $row->race_name }}</td>
                                <td>{{ sprintf("%01.1f", $row->pct) }}%</td>
                                <td>({{ $row->num }})</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection