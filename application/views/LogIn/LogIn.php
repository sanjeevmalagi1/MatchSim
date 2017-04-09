<div class="container">
      <div class="row">
          <div class="col-md-4 col-md-offset-4">
              <div class="login-panel panel panel-default">
                  <div class="panel-heading">
                      <h3 class="panel-title">Please Log In</h3>
                  </div>
                  <div class="panel-body">
                      <form role="form" method="POST">
                          <fieldset>
                              <div class="form-group">
                                  <input class="form-control" placeholder="UserName" name="UserName" type="text" required="required" autofocus>
                              </div>
                              <div class="form-group">
                                  <input class="form-control" placeholder="Password" name="Password" type="password" required="required" value="">
                              </div>
                              
                              <!-- Change this to a button or input when using this as a form -->
                              <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                          </fieldset>
                      </form>
                      <div class="text-center">
                          Want to use the portal? <a href="<?php echo base_url(); ?>index.php/User/register" class="btn"> Register</a>
                      </div>
                      
                  </div>
              </div>
          </div>
      </div>
  </div>

    
