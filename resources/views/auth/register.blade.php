<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $constants['global']['application_name'] }} :: Registration</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="/assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="/assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="/assets/css/xcs-int/custom.css">
    <link rel="stylesheet" href="/assets/css/modern-vertical/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="/assets/images/xcs-info/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg" style="background:url('{{$constants['backgrounds']['inactive']}}'); background-size: cover;">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">{{ $constants['global']['application_name'] }} First Login</h3>
                <form id="register">

                  <div class="form-group">
                    <label>Select your timezone</label>
                    <select class="antelope_global_select_single-noclear" style="width:100%" id="timezone">
                      @foreach (timezone_identifiers_list() as $timezone)
                      <option value="{{ $timezone }}"{{ $timezone == old('timezone', request()->user()->timezone) ? ' selected' : '' }}>{{ $timezone }}</option>
                      @endforeach
                    </select>
                    <label id="timezone-error" class="error mt-2 text-danger" for="timezone" hidden></label>
                  </div>

                  <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" class="form-control" id="new_password" placeholder="Password">
                    <label id="new_password-error" class="error mt-2 text-danger" for="new_password" hidden></label>
                  </div>

                  <div class="form-group">
                    <label for="confirm_new_password">Confirm New Password</label>
                    <input type="password" class="form-control" id="confirm_new_password" placeholder="Password">
                    <label id="confirm_new_password-error" class="error mt-2 text-danger" for="confirm_new_password" hidden></label>
                  </div>
                  <hr>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Continue</button>
                  </div>

                  <div class="d-flex">
                    <button class="btn btn-warning col mr-2">
                      <i class="mdi mdi-account-arrow-right-outline"></i> Exit Godmode </button>
                    <button class="btn btn-google col mr-2">
                      <i class="mdi mdi-logout"></i> Logout </button>
                  </div>

                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="/assets/vendors/select2/select2.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/js/app.js"></script>
    <script type="text/javascript">
    $('#register').on('submit', function(e) {
      e.preventDefault();
      var new_password = $('#new_password').val();
      var new_confirm_password = $('#confirm_new_password').val();
      var timezone = $('#timezone').val();
      var elements = {
        '#new_password' : '#new_password-error',
        '#confirm_new_password' : '#current_password-error',
        '#timezone' : '#timezone-error'
      };

      for (var element in elements) {
        $(element).parent().removeClass('has-danger');
        $(element).removeClass('form-control-danger');
        $(elements[element]).prop('hidden', true);
        $(element).val('');
        $(elements[element]).empty();
      }

      $.ajax({
        type: 'POST',
        url: '{{ url('register/submit') }}',
        data: {"_token": "{{ csrf_token() }}", new_password:new_password, new_confirm_password:new_confirm_password, timezone:timezone},
        success: function(data) {
          for (var element in elements) {
            $(element).parent().removeClass('has-danger');
            $(element).removeClass('form-control-danger');
            $(elements[element]).prop('hidden', true);
            $(element).val('');
            $(elements[element]).empty();
            window.location = data.redirect_to;
          }
        },
        error: function(data) {
          for (var element in elements) {
            $(element).parent().removeClass('has-danger');
            $(element).removeClass('form-control-danger');
            $(elements[element]).prop('hidden', true);
            $(element).val('');
            $(elements[element]).empty();
          }
          var errors = data['responseJSON'].errors;

          for (var key in errors) {
            switch (key) {
              case 'new_password':
                var element = '#new_password';
                var label = '#new_password-error';
                $(element).parent().addClass('has-danger');
                $(element).addClass('form-control-danger');
                $(label).append(errors[key]);
                $(label).prop('hidden', false);
              break;
              case 'confirm_new_password':
                var element = '#confirm_new_password';
                var label = '#confirm_new_password-error';
                $(element).parent().addClass('has-danger');
                $(element).addClass('form-control-danger');
                $(label).append(errors[key]);
                $(label).prop('hidden', false);
              break;
              case 'timezone':
                var element = '#timezone';
                var label = '#timezone-error';
                $(element).parent().addClass('has-danger');
                $(element).addClass('form-control-danger');
                $(label).append(errors[key]);
                $(label).prop('hidden', false);
              break;
            }
          }
        }
      });
    });
    </script>
    <!-- endinject -->
  </body>
</html>
