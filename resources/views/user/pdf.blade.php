<!DOCTYPE html>
<html lang="en">
    {{$i=0;}}
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <title>Document</title>
     <h1>USUARIOS</h1>

</head>
<body>
    <table id="usuarios" class="table table-striped table-hover">
        <thead class="thead">
            <tr>
                <th>No</th>
                <th>Ci</th>
                <th>Name</th>
                <th>Telefono</th>
                <th>Email</th>
               {{--  <th>Fecha</th> --}}

                <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach ($users as $user )

                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $user->ci }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->telefono }}</td>
                    <td>{{ $user->email }}</td>
                  {{--   <td>{{ $user->created_at/* ->diffForHumans() */ }}</td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
                           
                       