<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Display data from database in Laravel</h1>

    <form action="{{url('search')}}" method="get" align = "center">
         <input type="search" name="search" placeholder="Search for something">
         <input type="submit" value="Search">
    </form>
    <br>
    <table border="1 px" align="center">
        <tr>
            <td>Student Name</td>
            <td>Email</td>
            <td>Image</td>
            <td>Delete</td>
            <td>Update</td>
        </tr>
        @foreach ($data as $student)
        <tr>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td><img src="student/{{ ($student->image) }}" alt="width="100" height="100"" ></td>
    <td><a href="{{url('delete', $student->id)}}">Delete</a> </td>
    <td><a href="{{url('update_view', $student->id)}}">Update</a> </td>

        </tr>
        @endforeach
    </table>
</body>
</html>
