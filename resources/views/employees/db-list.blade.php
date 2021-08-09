@extends('layouts.main')

@section('content')

    <div class="main-container min-width-600">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <h4 class="title">Employees' details</h4>

            <div class="employee-container">
                <ul class="employee-list">
                    @if( $employees->total())
                        @foreach ($employees as $employee)
                        <li>
                            <section class="position-relative">
                                <div class="employee-upper-bg"></div>
                                <div class="circular-landscape">

                                    <img src="{{ $employee->avatar }}" onerror="this.onerror=null;this.src='{{ url('img/logo.gif') }}';">
                                </div>
                                <div class="employee-info">
                                    <span class="employee-name">{{ $employee->name }}</span><br>
                                    <span class="employee-company">{{ $employee->company}}</span>
                                    <span class="employee-bio ">{{ $employee->bio }}</span>
                                </div>
                            </section>
                        </li>
                        @endforeach
                    @else
                    <li id="list-error">something went wrong refresh page  or scroll </li>
                    @endif

                </ul>
                <div>
                    {{ $employees->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
