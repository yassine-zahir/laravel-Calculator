<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <title>Calculator App</title>
</head>
<body style="padding: 10%; background-color:rgb(213, 209, 209)"> 

    
    <div class="container text-center">

        <form class="form-horizontal" method="POST" action="SubmitCalculator" >
            {{ csrf_field() }}
            <div class="row text-center">
            <div class="col-md-3">
                <select class="form-control" name="operator" id="operator" required>
                    <option value="" style="text-align: center" selected> --select operator-- </option>
                    <option value="plus"> + </option>
                    <option value="minus"> - </option>
                    <option value="multiple"> * </option>
                    <option value="division"> / </option>

                </select>
            </div>
            <div class="col-md-3">
                <input type="number" class="form-control" name="first_number" placeholder="Enter First Number" required>
            </div>
            <div class="col-md-3">
                <input type="number" class="form-control" name="second_number" placeholder="Enter second Number" required>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

    </div>

    <br><br><br>

    <div class="row text-center">

        <div class="col-md-2"></div>
        <div class="col-md-6">
            @if(Session::has('info'))
                <div class="alert alert-info"> {{ Session::get('info') }}</div>
            @endif
        </div>
        <div class="col-md-2"></div>

    </div>

</body>
</html>