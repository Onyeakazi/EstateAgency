<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="keyword" content="">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>EstateAgency</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

<body class="payment">

  <div class="login-container">

    <form class="payment-form" action="#">
      <div class="row">
        <div class="col">
          <h3 class="title">Proceed To Own An Apartment</h3>

            <div class="input-box">
              <span>Full Name:</span>
              <input type="text" name="full_name" class="form-control" value="" placeholder="full name">
            </div>
            <div class="input-box">
              <span>Email:</span>
              <input type="email" name="email" class="form-control" value="" placeholder="example@mail.com">
            </div>
            <div class="input-box">
              <span>City:</span>
              <input type="text" name="city" class="form-control" value="" placeholder="City">
            </div>
            <div class="input-box">
              <span>State:</span>
              <input type="text" name="state" class="form-control" value="" placeholder="IMO STATE">
            </div>
        </div>

        <div class="col">
          <h3 class="title">Payment</h3>
            <div class="input-box">
              <span>Card Accepted:</span>
              <img class="img-responsive" src="./img/the_real_one.png" alt="">
            </div>
            <div class="input-box">
              <span>Name on Card:</span>
              <input type="text" name="full_name" class="form-control" value="" placeholder="Mr John">
            </div>
            <div class="input-box">
              <span>Credit Card Number:</span>
              <input type="text" name="card_number" class="form-control" value="" placeholder="2312-3212-1414-1243">
            </div>
            <div class="input-box">
              <span>Exp Month:</span>
              <input type="text" name="date" value="" class="form-control" placeholder="December">
            </div>

            <div class="flex">
              <div class="input-box">
                <span>Exp Year:</span>
                <input type="number" name="year" class="form-control" value="" placeholder="2023">
              </div>
              <div class="input-box">
                <span>CVV:</span>
                <input type="number" value="" class="form-control" placeholder="3242">
              </div>
              <div class="input-box">
                <span>Amount:</span>
                <input type="number" value="" class="form-control" placeholder="#150,000">
              </div>
            </div>
        </div>
        
      </div>

      <input type="submit" name="" value="Proceed to make payment" class="btn btn-success">
      
    </form>
    <div class="text-right">
      <div class="credits">
        </div>
    </div>
  </div>


</body>

</html>
