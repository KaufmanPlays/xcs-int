@inject('baseXCS', 'App\Http\Controllers\BaseXCS')

@if(Auth::user()->level() >= $constants['access_level']['sit'])
<!-- Edit a Disciplinary Action - Modal -->
<!-- Open modal with button (ON SITE) id #ajax_edit_disciplinary_action-button -->

<div class="modal fade" id="ajax_edit_disciplinary_action-modal" tabindex="-1" role="dialog" aria-labelledby="ajax_edit_disciplinary_action-label" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" style="padding-left: 100px; padding-right: 100px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="ajax_edit_disciplinary_action-label">Disciplinary Action</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form id="ajax_edit_disciplinary_action">
          <div class="modal-body">

            <div class="row">
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h2 class="card-title" id="ajax_edit_disciplinary_action-display_name">ajax_change_me</h2>
                    <h5 class="card-title">Disciplinary Data</h5>

                    <div class="form-group">
                      <label>Issued By</label>
                      <select class="ajax_search_member-class" style="width:100%" id="ajax_edit_disciplinary_action-input_issued_by" required>
                          <option></option>
                        @foreach($baseXCS::getAllMembers() as $id => $user)
                          <option value="{{ $id }}">{{ $user }}</option>
                        @endforeach
                      </select>
                      <label id="ajax_edit_disciplinary_action-input_issued_by-error" class="error mt-2 text-danger" for="ajax_edit_disciplinary_action-input_issued_by" hidden></label>
                    </div>

                    <div class="form-group">
                      <label>Discipline Date</label>
                      <div id="ajax_edit_disciplinary_action-date" class="input-group date datepicker">
                        <input type="text" class="form-control" id="ajax_edit_disciplinary_action-input_date" required>
                        <span class="input-group-addoan input-group-append border-left">
                          <span class="mdi mdi-calendar input-group-text"></span>
                        </span>
                      </div>
                      <label id="ajax_edit_disciplinary_action-input_date-error" class="error mt-2 text-danger" for="ajax_edit_disciplinary_action-input_date" hidden></label>
                    </div>

                    <div class="form-group">
                      <label>Disciplinary Action</label>
                      <select class="antelope_global_select_single" style="width:100%" id="ajax_edit_disciplinary_action-input_type" required>
                        @foreach($constants['disciplinary_actions'] as $value => $key)
                          <option value="{{ $value }}">{{ $key }}</option>
                        @endforeach
                      </select>
                      <label id="ajax_edit_disciplinary_action-input_type-error" class="error mt-2 text-danger" for="ajax_edit_disciplinary_action-input_type" hidden></label>
                    </div>

                    <div class="form-group">
                      <label>Custom Expiry Date</label>
                      <div id="ajax_edit_disciplinary_action-custom_expiry" class="input-group date datepicker">
                        <input type="text" class="form-control" id="ajax_edit_disciplinary_action-input_custom_expiry">
                        <span class="input-group-addoan input-group-append border-left">
                          <span class="mdi mdi-calendar input-group-text"></span>
                        </span>
                      </div>
                      <label id="ajax_edit_disciplinary_action-input_custom_expiry-error" class="error mt-2 text-danger" for="ajax_edit_disciplinary_action-input_custom_expiry" hidden></label>
                    </div>
                    <br>
                    @if(Auth::user()->level() >= $constants['access_level']['admin'])
                    <h5 class="card-title">Dispute Data</h5>
                    <div class="form-group">
                      <div class="form-check form-check-info">
                        <label class="form-check-label"><input type="checkbox" id="ajax_edit_disciplinary_action-input_disputed"> Disputed <i class="input-helper"></i></label>
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Dispute Date</label>
                      <div id="ajax_edit_disciplinary_action-dispute_date" class="input-group date datepicker">
                        <input type="text" class="form-control" id="ajax_edit_disciplinary_action-input_dispute_date">
                        <span class="input-group-addoan input-group-append border-left">
                          <span class="mdi mdi-calendar input-group-text"></span>
                        </span>
                      </div>
                      <label id="ajax_edit_disciplinary_action-input_dispute_date-error" class="error mt-2 text-danger" for="ajax_edit_disciplinary_action-input_dispute_date" hidden></label>
                    </div>
                    @else
                    <h5 class="card-title">Dispute Data</h5>
                    <div class="form-group">
                      <div class="form-check form-check-info">
                        <label class="form-check-label"><input type="checkbox" class="profile-active-field" id="ajax_edit_disciplinary_action-input_disputed" disabled> Disputed <i class="input-helper"></i></label>
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Dispute Date</label>
                      <div id="ajax_edit_disciplinary_action-dispute_date" class="input-group date datepicker">
                        <input type="text" class="form-control" id="ajax_edit_disciplinary_action-input_dispute_date" disabled>
                        <span class="input-group-addoan input-group-append border-left">
                          <span class="mdi mdi-calendar input-group-text"></span>
                        </span>
                      </div>
                    </div>
                    @endif
                    <br>
                    @if(Auth::user()->level() >= $constants['access_level']['seniorstaff'])
                    <h5 class="card-title">Overturn Data</h5>
                    <div class="form-group">
                      <div class="form-check form-check-danger">
                        <label class="form-check-label"><input type="checkbox" id="ajax_edit_disciplinary_action-input_overturned"> Overturned <i class="input-helper"></i></label>
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Overturn Date</label>
                      <div id="ajax_edit_disciplinary_action-overturn_date" class="input-group date datepicker">
                        <input type="text" class="form-control" id="ajax_edit_disciplinary_action-input_overturn_date">
                        <span class="input-group-addoan input-group-append border-left">
                          <span class="mdi mdi-calendar input-group-text"></span>
                        </span>
                      </div>
                      <label id="ajax_edit_disciplinary_action-input_overturn_date-error" class="error mt-2 text-danger" for="ajax_edit_disciplinary_action-input_overturn_date" hidden></label>
                    </div>

                    <div class="form-group">
                      <label>Overturned By</label>
                      <select class="ajax_search_member-class" style="width:100%" id="ajax_edit_disciplinary_action-input_overturned_by">
                          <option></option>
                        @foreach($baseXCS::getAllMembers() as $id => $user)
                          <option value="{{ $id }}">{{ $user }}</option>
                        @endforeach
                      </select>
                      <label id="ajax_edit_disciplinary_action-input_overturned_by-error" class="error mt-2 text-danger" for="ajax_edit_disciplinary_action-input_overturned_by" hidden></label>
                    </div>
                    @else
                    <h5 class="card-title">Overturn Data</h5>
                    <div class="form-group">
                      <div class="form-check form-check-danger">
                        <label class="form-check-label"><input type="checkbox" id="ajax_edit_disciplinary_action-input_overturned" disabled> Overturned <i class="input-helper"></i></label>
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Overturn Date</label>
                      <div id="ajax_edit_disciplinary_action-overturn_date" class="input-group date datepicker">
                        <input type="text" class="form-control" id="ajax_edit_disciplinary_action-input_overturn_date" disabled>
                        <span class="input-group-addoan input-group-append border-left">
                          <span class="mdi mdi-calendar input-group-text"></span>
                        </span>
                      </div>
                      <label id="ajax_edit_disciplinary_action-input_overturn_date-error" class="error mt-2 text-danger" for="ajax_edit_disciplinary_action-input_overturn_date" hidden></label>
                    </div>

                    <div class="form-group">
                      <label>Overturned By</label>
                      <select class="ajax_search_member-class" style="width:100%" id="ajax_edit_disciplinary_action-input_overturned_by" disabled>
                          <option></option>
                        @foreach($baseXCS::getAllMembers() as $id => $user)
                          <option value="{{ $id }}">{{ $user }}</option>
                        @endforeach
                      </select>
                      <label id="ajax_edit_disciplinary_action-input_overturned_by-error" class="error mt-2 text-danger" for="ajax_edit_disciplinary_action-input_overturned_by" hidden></label>
                    </div>
                    @endif

                  </div>
                </div>
              </div>
              <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                      <h4 class="card-title mb-1">Disciplinary Synopsis</h4>
                      <p class="text-success mb-1">Discipline Status</p>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-12">
                        <div class="preview-list">
                           <textarea class="form-control" id="ajax_edit_disciplinary_action-details" rows="50" required></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success" id="ajax_edit_member_save" value="0">Save</button>
            <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
          </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  var elements = {
    '#ajax_edit_disciplinary_action-input_issued_by' : '#ajax_edit_disciplinary_action-input_issued_by-error',
    '#ajax_edit_disciplinary_action-input_date' : '#ajax_edit_disciplinary_action-input_date-error',
    '#ajax_edit_disciplinary_action-input_type' : '#ajax_edit_disciplinary_action-input_type-error',
    '#ajax_edit_disciplinary_action-custom_expiry' : '#ajax_edit_disciplinary_action-custom_expiry-error',
    '#ajax_edit_disciplinary_action-input_dispute_date' : '#ajax_edit_disciplinary_action-input_dispute_date-error',
    '#ajax_edit_disciplinary_action-input_overturn_date' : '#ajax_edit_disciplinary_action-input_overturn_date-error',
    '#ajax_edit_disciplinary_action-input_overturned_by' : '#ajax_edit_disciplinary_action-input_overturned_by-error',
  };

  if ($("#ajax_edit_disciplinary_action-date").length) {
    $('#ajax_edit_disciplinary_action-date').datepicker({
      enableOnReadonly: true,
      todayHighlight: true,
      autoclose: true
    });
  }

  if ($("#ajax_edit_disciplinary_action-custom_expiry").length) {
    $('#ajax_edit_disciplinary_action-custom_expiry').datepicker({
      enableOnReadonly: true,
      todayHighlight: true,
      autoclose: true
    });
  }

  if ($("#ajax_edit_disciplinary_action-dispute_date").length) {
    $('#ajax_edit_disciplinary_action-dispute_date').datepicker({
      enableOnReadonly: true,
      todayHighlight: true,
      autoclose: true
    });
  }

  if ($("#ajax_edit_disciplinary_action-overturn_date").length) {
    $('#ajax_edit_disciplinary_action-overturn_date').datepicker({
      enableOnReadonly: true,
      todayHighlight: true,
      autoclose: true
    });
  }

  $( "#ajax_edit_disciplinary_action-button" ).click(function() {
    for (var element in elements) {
      $(element).parent().removeClass('has-danger');
      $(element).removeClass('form-control-danger');
      $(elements[element]).prop('hidden', true);
      $(elements[element]).empty();
    }
    var id = $(this).val();
    $('#ajax_edit_disciplinary_action').val(id).change();

      $.ajax({
         type: "POST",
         url: '{{ url('discipline/get_data/') }}/'+id,
         success: function(data){
           console.log(data);
           if(data['issued_to_department_id'] == null) {
              var issued_to = data['issued_to_name'];
           } else var issued_to = data['issued_to_name']+' '+data['issued_to_department_id'];
           $("#ajax_edit_disciplinary_action-display_name").text(issued_to);
           $("#ajax_edit_disciplinary_action-input_issued_by").val(data['issued_by']).change();
           $("#ajax_edit_disciplinary_action-input_date").val(data['discipline_date']);
           $("#ajax_edit_disciplinary_action-input_custom_expiry").val(data['custom_expiry_date']);
           $("#ajax_edit_disciplinary_action-input_type").val(data['type']).change();
           $("#ajax_edit_disciplinary_action-details").val(data['details']);
           $("#ajax_edit_disciplinary_action-input_disputed").prop('checked', data['disputed']);
           $("#ajax_edit_disciplinary_action-input_dispute_date").val(data['disputed_date']);
           $("#ajax_edit_disciplinary_action-input_overturned").prop('checked', data['overturned']);
           $("#ajax_edit_disciplinary_action-input_overturn_date").val(data['overturned_date']);
           $("#ajax_edit_disciplinary_action-input_overturned_by").val(data['overturned_by']).change();
         }
      }).done(function(data) {
        $("#ajax_edit_disciplinary_action-modal").modal("toggle");
      });
  });
</script>
@endif