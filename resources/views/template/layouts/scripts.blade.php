<script src="{{ asset('template/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('template/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('template/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('template/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('template/assets/js/app.js') }}"></script>

{{-- script para sweetalert --}}
<script src="{{ asset('template/assets/js/scrollspyNav.js') }}"></script>
<script src="{{ asset('template/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
<script src="{{ asset('template/plugins/sweetalerts/custom-sweetalert.js') }}"></script>


@livewireScripts


<script>
    $(document).ready(function() {
        App.init();
    });
</script>
<script src="{{ asset('template/assets/js/custom.js') }}"></script>
