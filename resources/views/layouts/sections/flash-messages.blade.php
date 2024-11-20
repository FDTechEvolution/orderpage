<script>
    const Toast = Swal.mixin({
        toast: true,
        position: "top-center",
        showConfirmButton: false,
        timer: 3500,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
        });
</script>
@session('success')
<script>
    Toast.fire({
    icon: "success",
    title: "{{ $value }}"
    });
</script>
@endsession

@session('error')
<script>
    Toast.fire({
    icon: "error",
    title: "{{ $value }}"
    });
</script>
@endsession

@session('warning')
<script>
    Toast.fire({
    icon: "warning",
    title: "{{ $value }}"
    });
</script>
@endsession

@session('info')
<script>
    Toast.fire({
    icon: "info",
    title: "{{ $value }}"
    });
</script>
@endsession

@if ($errors->any())
<script>
    Toast.fire({
    icon: "warning",
    title: "{{ $value }}"
    });
</script>
@endif