<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

<style>
.updated-priority {
    background-color: #ffff99; /* Light yellow background */
    transition: background-color 0.5s ease; /* Smooth transition effect */
}
</style>
</head>
<body>
    
<div class="container mt-5">
    <h1 class="text-center mb-4">Task Management</h1>
    {{-- <div class="row"> --}}
    @yield('content')
    {{-- </div> --}}
</div>


</body>
</html>