<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Meits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/7a93f8c7d6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <script type="text/javascript">
        function confirmDeleteModal(id) {
            $('#deleteModal').modal();
            $('#deleteButton').html('<a class="btn btn-danger" onclick="deleteData(' + id + ')">Delete</a>');
        }

        function deleteData(id) {
            // do your stuffs with id
            $("#successMessage").html("Record With id " + id + " Deleted successfully!");
            $('#deleteModal').modal('hide'); // now close modal
        }
    </script>
</head>

<body>
    
