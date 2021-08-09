@extends('layouts.main')

@section('content')

    <div class="main-container min-width-600">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <h4 class="title">Employees' details</h4>

            <div class="employee-container">
                    @include('employees.list')
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            let allowAjax = true;
            let page = 1;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(window).scroll(function() {
                if(allowAjax){
                    if($(window).scrollTop() > $(document).height() - $(window).height() - 200) {
                        allowAjax = false;
                        $.ajax({
                        type: 'POST',
                        // contentType: "application/json",
                        // dataType: "json",
                        // data: {page: page, employees: @json($employees)},
                        data: {page: page},
                        url : "{{ url('e-list') }}",
                        success : function (emp_list) {
                            $( "#list-error" ).remove();

                            $( ".employee-list" ).append( emp_list );
                            //@$# +check if return result is empty
                            if ($('#list-error').length < 1) {
                                // console.log(page);
                                page++;
                            }
                            //@$# -
                            if (typeof emp_list['lastPagee'] === 'undefined') {
                                allowAjax = true;
                            }
                        },
                        error: function (request, status, error) {
                            allowAjax = true;
                        }
                    });
                    }
                }

            });
        });

    </script>

@endsection
