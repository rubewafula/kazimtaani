   @extends('layouts.backend')

@section('content')
   <div class="card">
                    <div class="card-header">Activity Logs</div>
                    <div class="card-body">
              

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead style="background-color:#717384;">
                                    <tr style="color:#fff">
                                        <th>Activity</th><th>Actor</th><th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($activitylogs as $item)
                                    <tr>
                                        <td>{{ $item->description }}</td>
                                        <td>
                                            @if ($item->causer)
                                                <a href="{{ url('/admin/profile') }}">{{ $item->causer->name }}</a>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>{{ $item->created_at }}</td>
                                       
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                           
                        </div>

                    </div>
                </div>
                @endsection