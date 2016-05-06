<form class="form-horizontal reg-form" action="sign_in" method="post">

  <!-- TODO: CAPTCHA and/or bot trap -->

  <input type="hidden" name="submitted" value="true" />

  <div class="form-group">
    <label for="user_email" class="col-sm-3 control-label">Email address</label>
    <div class="col-sm-9">
      <input type="email" class="form-control" name="email" placeholder="Email address">
    </div>
  </div>

  <div class="form-group">
    <label for="user_password" class="col-sm-3 control-label">Password</label>
    <div class="col-sm-9">
      <input type="password" class="form-control" name="password" placeholder="Password">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <button type="submit" class="btn btn-success">Submit</button>
    </div>
  </div>
</form>
