<!DOCTYPE html>
<html>

<head>
    <title>Game Data</title>
</head>

<body>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Image</th>
        </thead>
        <tbody>
            @foreach ($game as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->description }}</td>
                <td>
                    <img src="{{ asset('uploads/game/'.$item->profile_image) }}" width="70px" height="70px" alt="Image">
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>