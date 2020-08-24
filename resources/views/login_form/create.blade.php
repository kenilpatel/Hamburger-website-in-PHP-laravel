<html>
  <head>
    <meta charset="utf-8">
    <title>Laravel 5 CRUD Tutorial With Example  </title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
  <body>
    <div class="container">
      <h2>Create A Form</h2><br  />
      <form method="post">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="CoinName">CoinName:</label>
            <input type="text" class="form-control" name="coinname">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="CoinPrice">CoinPrice:</label>
              <input type="text" class="form-control" name="coinprice">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4" style="margin-left:38px">
                 <label>Keep</label>
                   <input type="radio" name="radio" value="keep">
                 <label>Port</label>
                     <input type="radio" name="radio" value="port">
            </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4" style="margin-left:38px">
                <label>Level</label>
                <select name="dropdown">
                  <option value="beginner">Beginner</option>
                  <option value="intermediate">Intermediate</option>
                  <option value="advance">Advance</option>  
                </select>
            </div>
        </div>
         <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4" style="margin-left:38px">
               <div class="checkbox">
                  <label><input type="checkbox" value="coindesk" name="option[]">Coindesk</label>
               </div>
                <div class="checkbox">
                   <label><input type="checkbox" value="coinbase" name="option[]">CoinBase</label>
              </div>
               <div class="checkbox">
                  <label><input type="checkbox" value="zebpay" name="option[]">Zebpay</label>
               </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success" style="margin-left:38px">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
