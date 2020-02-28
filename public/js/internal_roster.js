$(function() {

  var columnsArray = [
    { data: 'name', name: 'name', width: "150px", className: 'text-wrap', render: function (data, type, row) {
      return '<input type="text" class="form-control internal_roster-input_name" value="'+data+'" required>';
    } },
    { data: 'department_id', name: 'department_id', width: "80px", className: 'text-wrap', render: function (data, type, row) {
      if (data == null) {
        data = '';
      };

      return '<input type="text" class="form-control internal_roster-input_callsign" value="'+data+'" required>';
    } },
    { data: 'website_id', name: 'website_id', width: "60px", className: 'text-wrap', render: function (data, type, row) {
      return '<input type="text" class="form-control internal_roster-input_websiteid" value="'+data+'" required>';
    } },
    { data: 'rank', name: 'rank', width: "190px", className: 'text-wrap', render: function (data, type, row) {
      return internal_roster_rankFieldInput(data);
    } },
    { data: 'status', name: 'status', width: "55px", className: 'text-wrap' },
    { data: 'monthly_hours', name: 'monthly_hours', width: "70px", className: 'text-wrap' },
    { data: 'monthly_logs', name: 'monthly_logs', width: "60px", className: 'text-wrap' },
    { data: 'advanced_training', name: 'advanced_training', width: "70px", className: 'text-wrap' },
    { data: 'requirements', name: 'requirements', width: "100px", className: 'text-wrap' },
   ];

  $('#internal_roster-admins').DataTable({
   "autoWidth": false,
   ordering: false,
   serverSide: true,
   searching: false,
   paging: false,
   order: [[ 0  , "desc" ]],
   ajax: $url_admins,
   columns: columnsArray,
   "createdRow": function( row, data, dataIndex ) {
     $(row).css('background-color', 'rgba(70, 1, 1, 1.0)');
     $(row).css('color', 'white');
   },
   "bInfo" : false,
  });

  $('#internal_roster-seniorstaff').DataTable({
   ordering: false,
   serverSide: true,
   searching: false,
   paging: false,
   order: [[ 0  , "desc" ]],
   ajax: $url_senior_staff,
   columns: columnsArray,
    "createdRow": function( row, data, dataIndex ) {
       $(row).css('background-color', 'rgba(70, 36, 1, 1.0)');
       $(row).css('color', 'white');
    },
    "bInfo" : false,
  });

  $('#internal_roster-staff').DataTable({
   ordering: false,
   serverSide: true,
   searching: false,
   paging: false,
   order: [[ 0  , "desc" ]],
   ajax: $url_staff,
   columns: columnsArray,
    "createdRow": function( row, data, dataIndex ) {
       $(row).css('background-color', 'rgba(70, 53, 1, 1.0)');
       $(row).css('color', 'white');
    },
    "bInfo" : false,
  });


  $('#internal_roster-staffintraining').DataTable({
   ordering: false,
   serverSide: true,
   searching: false,
   paging: false,
   order: [[ 0  , "desc" ]],
   ajax: $url_staff_in_training,
   columns: columnsArray,
    "createdRow": function( row, data, dataIndex ) {
       $(row).css('background-color', 'rgba(1, 70, 70, 1.0)');
       $(row).css('color', 'white');
    },
    "bInfo" : false,
  });

  $('#internal_roster-seniormembers').DataTable({
   ordering: false,
   serverSide: true,
   searching: false,
   paging: false,
   order: [[ 0  , "desc" ]],
   ajax: $url_senior_member,
   columns: columnsArray,
    "createdRow": function( row, data, dataIndex ) {
       $(row).css('background-color', 'rgba(1, 53, 70, 1.0)');
       $(row).css('color', 'white');
    },
    "bInfo" : false,
  });

  $('#internal_roster-members').DataTable({
   ordering: false,
   serverSide: true,
   searching: false,
   paging: false,
   order: [[ 0  , "desc" ]],
   ajax: $url_member,
   columns: columnsArray,
    "createdRow": function( row, data, dataIndex ) {
       $(row).css('background-color', 'rgba(1, 36, 70, 1.0)');
       $(row).css('color', 'white');
    },
    "bInfo" : false,
  });

  $('#internal_roster-probationarymembers').DataTable({
   ordering: false,
   serverSide: true,
   searching: false,
   paging: false,
   order: [[ 0  , "desc" ]],
   ajax: $url_probationary_member,
   columns: columnsArray,
    "createdRow": function( row, data, dataIndex ) {
       $(row).css('background-color', 'rgba(1, 70, 53, 1.0)');
       $(row).css('color', 'white');
    },
    "bInfo" : false,
  });

  $('#internal_roster-reserves').DataTable({
   ordering: false,
   serverSide: true,
   searching: false,
   paging: false,
   order: [[ 0  , "desc" ]],
   ajax: $url_reserve,
   columns: columnsArray,
    "createdRow": function( row, data, dataIndex ) {
       $(row).css('background-color', 'rgba(1, 36, 70, 1.0)');
       $(row).css('color', 'white');
    },
    "bInfo" : false,
  });

  $('#internal_roster-media').DataTable({
   ordering: false,
   serverSide: true,
   searching: false,
   paging: false,
   order: [[ 0  , "desc" ]],
   ajax: $url_media,
   columns: columnsArray,
    "createdRow": function( row, data, dataIndex ) {
       $(row).css('background-color', 'rgba(1, 36, 70, 1.0)');
       $(row).css('color', 'white');
    },
    "bInfo" : false,
  });
});