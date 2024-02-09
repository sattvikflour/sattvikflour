<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Add Category</h2>
    
        <form method="post" action="{{ route('category.store') }}" enctype="multipart/form-data" >
            @csrf
    
            <div class="form-group">
                <label for="category_name">Category Name:</label>
                <input type="text" class="form-control" id="category_name" name="category_name" required>
            </div>
            <div class="form-group">
                <label for="category_url">Category URL:</label>
                <input type="text" class="form-control" id="category_url" name="category_url" required>
            </div>
            <div class="form-group">
                <label for="category_img">Category Image:</label>
                <input type="file" class="form-control" id="category_img" name="category_img" required>
            </div>
    
            <div class="form-group">
                <label for="avail_status">Availability Status:</label>
                <select class="form-control" id="avail_status" name="avail_status" required>
                    <option value="1">Available</option>
                    <option value="0">Unavailable</option>
                </select>
            </div>
    
            <!-- Add other fields if needed -->
    
            <button type="submit" class="btn btn-primary">Add Category</button>
        </form>
    </div>
</body>
</html>