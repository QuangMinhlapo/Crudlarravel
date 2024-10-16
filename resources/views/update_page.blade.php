<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Student</title>
</head>
<body>
    <h1>Update Page</h1>

    <form action="{{ url('update', $student->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">Student Name</label>
            <input type="text" name="name" value="{{ $student->name }}">
        </div>

        <div>
            <label for="email">Student Email</label>
            <input type="text" name="email" value="{{ $student->email }}">
        </div>

        <div>
            <label for="old_image">Old Image</label>
            <img height="120" width="120" src="/student/{{ $student->image }}" alt="Student Image">
        </div>

        <div>
            <label for="file">Change Image</label>
            <input type="file" name="file">
        </div>

        <div>
            <input type="submit" value="Update">
        </div>
    </form>
</body>
</html>
