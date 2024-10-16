<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <Style>
     body{
font-family:Arial, Helvetica, sans-serif;
background-color:#f4f4f4;
margin: 0;
padding: 0;
     }
.form-container{
width:50%;
margin:50px auto;
background-color:#fff;
padding:20px;
border-radius:8px;
box-shadow:0 0 10px rgba(0, 0, 0, 0.1);
}
.form-container h1 {
        text-align: center;
        color: #333;
    }

    </Style>
</head>
<body>
    <div class ="form-container" align="center">

        <form action="http://127.0.0.1:8000/api/upload" method="POST"  enctype="multipart/form-data">
        @csrf
            <div style="padding: 10px">
                <label>Name</label>
                <input type="text" name="name">
            </div>

            <div style="padding: 10px">
                <label>Email</label>
                <input type="email" name="email">
            </div>

            <div style="padding: 10px">
                <label>Image</label>
                <input type="file" name="files">
            </div>

            <div style="padding: 10px">
            <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
