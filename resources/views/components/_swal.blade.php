<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('success'))
<script>
  Swal.fire({
    icon: 'success',
    text: "{{ session('success') }}",
  })
</script>
@endif
@if (session('danger'))
<script>
  Swal.fire({
    icon: 'error',
    text: "{{ session('danger') }}",
  })
</script>
@endif
@if (session('info'))
<script>
  Swal.fire({
    icon: 'info',
    text: "{{ session('info') }}",
  })
</script>
@endif
@if (session('warning'))
<script>
  Swal.fire({
    icon: 'warning',
    text: "{{ session('warning') }}",
  })
</script>
@endif
