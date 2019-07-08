@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Users</div>
              

                <div class="card-body">
                <button type="button" class="btn btn-primary test" id="test">Test</button>
                    <div class="table-responsive">

                    <table class="table table-striped table-bordered table-hover table-light">
                        <tr class="bg-primary">
                            <th scope="col" colspan="1"><strong>Name<strong></th>
                            <th scope="col" colspan="4"><strong>Roles<strong></th>
                        </tr>
                        <tr>
                            <th scope="col" colspan="1"></th>
                            <th scope="col" colspan="1"><strong>READ<strong></th>
                            <th scope="col" colspan="1"><strong>WRITE<strong></th>
                            <th scope="col" colspan="1"><strong>SEEN<strong></th>
                            <th scope="col" colspan="1"><strong>HEHE<strong></th>

                        </tr>
                    <tbody>
                         @foreach ($users as $user)
                        <tr>
                            <td colspan="1">{{$user->name}}</td>
                            <td colspan="2">  <input type="checkbox" checked data-toggle="toggle"></td>
                            <td colspan="2"> 
                                <input type="hidden" value="{{$user->id}}" class="user-id">
                                <input type="checkbox" checked data-toggle="toggle" data-onstyle="success" class="toggle-write"></td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
$(function () {
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
    
    $('.toggle-write').each(function(i, val){
        $(this).change(function() {
            console.log('wtf')
            console.log()

            let userId = $(this).parent().parent().children('.user-id').val()
            let permission = 'create-new'
            let valid = $(this).prop('checked') ? 1 : 0

            console.log(userId)
            console.log(permission)
            console.log(typeof(valid))

            $.ajax({
            url: "{{ url('/update-permissions') }}",
            method: 'post',
            data: {
                userId: userId,
                permission: permission,
                valid : valid
            },
            success: function (result) {
                console.log(result);
                alert(result);
            }
        });

        })
    })

    $('#test').click(function () {
        $.ajax({
            url: "{{ url('/test') }}",
            method: 'post',
            data: {
                name: 'xin chao '
                // type: jQuery('#type').val(),
                // price: jQuery('#price').val()
            },
            success: function (result) {
                console.log(result);
                alert(result);
            }
        });
    });

})





</script>
@endsection