<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Projet 2 - DB Client-side</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.6/css/dataTables.dataTables.css">
</head>
<body>
<table id="usersTable" class="display">
    <thead><tr><th>Nom</th><th>Email</th><th>Âge</th><th>Salaire</th></tr></thead>
</table>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script>
<script>
$(document).ready(function(){
    $('#usersTable').DataTable({
        ajax: 'data.php',
        columns: [{data:'name'}, {data:'email'}, {data:'age'}, {data:'salary', render: $.fn.dataTable.render.number(',', '.', 2, '€') }]
    });
});
</script>
</body>
</html>