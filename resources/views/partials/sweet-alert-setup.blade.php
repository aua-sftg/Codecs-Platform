<script src="{{asset('js/sweetalert.min.js')}}"></script>
<script>
    @if(@session(\App\Logic\Toastr::MSG_KEY))
        swal("{{@session(\App\Logic\Toastr::MSG_KEY)}}",'', "{{@session(\App\Logic\Toastr::METHOD_KEY)}}");
    @endif


    window.addEventListener('toastr',({detail:{type,message}})=>{
        switch (type){
            case 'success':
                swal(message,'', 'success');
                break;
            case 'error':
                swal(message,'', 'error');
                break;
            default:
                swal(message)
                break;
        }
    })
</script>
