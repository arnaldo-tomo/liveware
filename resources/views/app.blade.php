    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/all.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    @livewireStyles
    <body>

        {{ $slot }}

        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        @livewireScripts

        @if (session('fechar'))
        <Script>  window.onload = function() { OpenBootstrapPopup(); };function OpenBootstrapPopup() {  $("#exampleModalToggleLabel").modal('hide'); } </script>
        @endif

        @section('script')
        <Script>  window.onload = function() { OpenBootstrapPopup(); };function OpenBootstrapPopup() {  $("#exampleModalToggleLabel").modal('hide'); } </script>
        @endsection

        @push('scripts')
        <script>
            window.addEventListener('close-modal', event =>{
                $('#addStudentModal').modal('hide');
                $('#editStudentModal').modal('hide');
                $('#deleteStudentModal').modal('hide');
            });

            window.addEventListener('show-edit-student-modal', event =>{
                $('#editStudentModal').modal('show');
            });

            window.addEventListener('show-delete-confirmation-modal', event =>{
                $('#deleteStudentModal').modal('show');
            });

            window.addEventListener('show-view-student-modal', event =>{
                $('#viewStudentModal').modal('show');
            });
        </script>
    @endpush
        </body>

    </html>

