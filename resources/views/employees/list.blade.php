@if( $numEmployees > 0)
                        @for($i = 0; $i < $pageEmpNum; $i++)
                        <li>
                            <section class="position-relative">
                                <div class="employee-upper-bg"></div>
                                <div class="circular-landscape">

                                    <img src="{{ $employees[$i]['avatar'] }}" onerror="this.onerror=null;this.src='{{ url('img/logo.gif') }}';">
                                </div>
                                <div class="employee-info">
                                    <span class="employee-name">{{ $employees[$i]['name'] }}</span><br>
                                    <span class="employee-company">{{ $employees[$i]['company'] }}</span>
                                    <span class="employee-bio ">{{ $employees[$i]['bio'] }}</span>
                                </div>
                            </section>
                        </li>
                        @endfor
                    @else
                    <li id="list-error">something went wrong refresh page  or scroll </li>
                    @endif
