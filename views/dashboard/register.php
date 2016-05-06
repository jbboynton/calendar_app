<form class="form-horizontal reg-form" action="registerUser" method="post">

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
      <input type="password" class="form-control" name="password1" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <label for="user_password" class="col-sm-3 control-label">Confirm password</label>
    <div class="col-sm-9">
      <input type="password" class="form-control" name="password2" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <label for="user_fname" class="col-sm-3 control-label">First name</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="fname" placeholder="First name">
    </div>
  </div>
  <div class="form-group">
    <label for="user_lname" class="col-sm-3 control-label">Last name</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="lname" placeholder="Last name">
    </div>
  </div>
  <div class="form-group">
    <label for="user_org" class="col-sm-3 control-label">Organization</label>
    <div class="col-sm-9">
      <select class="form-control" name="organization">
        <option>CCRI</option>
        <option>RIEMA</option>
        <option>RISP</option>
        <option>RI Air Guard</option>
        <option>RI National Guard</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <button type="submit" class="btn btn-success">Submit</button>
    </div>
  </div>
</form>
