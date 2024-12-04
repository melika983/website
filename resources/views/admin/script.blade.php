@if (isset($errors) && $errors->has('pass'))
    <script>
        Swal.fire({
            title: "بروز خطا",
            text: "{{ $errors->first('pass') }}",
            icon: "error",
            confirmButtonText: "باشه"
        }).then(() => {
            $("#deleteUserModal").modal('hide');
            location.reload(); // Refresh page
        });
    </script>
@endif
@if (\Session::has('success'))
    <script>
        Swal.fire({
            title: "موفق",
            text: "{{ \Session::get('success') }}",
            icon: "success",
            confirmButtonText: "باشه"
        }).then(() => {
            $("#deleteUserModal").modal('hide');
            location.reload(); // Refresh page
        });
    </script>
@endif
