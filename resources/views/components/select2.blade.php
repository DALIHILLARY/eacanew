@push('third_party_stylesheets')
    <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush

@push('third_party_scripts')
    <script src="{{ asset('assets/adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
@endpush


@push('page_scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('select').select2({
                theme: 'bootstrap4',
                placeholder: @json($placeholder),
                allowClear: true,
                width: '100%'
            });
        });
    </script>
@endpush