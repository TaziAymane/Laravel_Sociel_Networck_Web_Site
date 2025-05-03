@props(['users'])


    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user['id'] }}</td>  
                    <td>{{ $user['nom'] }}</td>
                    <td>{{ $user['prenom'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
