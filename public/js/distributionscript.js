$(document).ready(function() {
    $(document).on('click', '.edit-modal', function() {
          $('#footer_action_button').text("Add to Request");
          $('#footer_action_button').addClass('glyphicon-check');
          $('#footer_action_button').removeClass('glyphicon-trash');
          $('.actionBtn').addClass('btn-success');
          $('.actionBtn').removeClass('btn-danger');
          $('.actionBtn').addClass('edit');
          $('.modal-title').text('Distribution');
          $('.deleteContent').hide();
          $('.generateContent').hide();
          $('.form-horizontal').show();
          $('#fid').val($(this).data('id'));
          $('#myModal').modal('show');
          //console.log($(this).data('name') + $(this).data('points'));
      });
      $(document).on('click', '.delete-modal', function() {
          $('#footer_action_button').text(" Delete");
          $('#footer_action_button').removeClass('glyphicon-check');
          $('#footer_action_button').addClass('glyphicon-trash');
          $('.actionBtn').removeClass('btn-success');
          $('.actionBtn').addClass('btn-danger');
          $('.actionBtn').addClass('delete');
          $('.modal-title').text('Delete');
          $('.did').text($(this).data('id'));
          $('.deleteContent').show();
          $('.generateContent').hide();
          $('.form-horizontal').hide();
          $('.dname').html($(this).data('name'));
          $('#myModal').modal('show');
      });
      $(document).on('click', '.generate-modal', function() {
        $('#footer_action_button').text("Generate");
        $('#footer_action_button').removeClass('glyphicon-check');
        $('#footer_action_button').addClass('glyphicon-trash');
        
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').addClass('generate');
        $('.modal-title').text('Generate Purchase Order');
        $('.distributionnumber').text($(this).data('distributionnumber'));
        $('.generateContent').show();
        $('.deleteContent').hide();
        $('.form-horizontal').hide();
        $('.dname').html($(this).data('name'));
        $('#myModal').modal('show');
    });
  
      $('.modal-footer').on('click', '.edit', function() {
  
          $.ajax({
              type: 'post',
              url: '/accounting/distribution/adddistributionrecord',
              data: {
                  //_token:$(this).data('token'),
                  '_token': $('input[name=_token]').val(),
                  'distributionnumber': $('#adddistributionnumber').val(),
                  'date': $('#adddistributionnumberdate').val(),
                  'branchid': $('#addbranchid').val(),
                  'quantity': $('#quantity').val(),
                  'prodquantityid': $('#fid').val()
              },
              success: function(data) {
                // $('.modal-title').text('Stock Updated');
                // $('#CartInfo').modal('show');
                location.reload();
                }
          });
      });
      $('.modal-footer').on('click', '.delete', function() {
          $.ajax({
              type: 'post',
              url: '/accounting/distribution/deletedistributionrecord',
              data: {
                  '_token': $('input[name=_token]').val(),
                  'id': $('.did').text()
              },
              success: function(data) {
                location.reload();
              }
          });
      });
      $('.modal-footer').on('click', '.generate', function() {
        $.ajax({
            type: 'post',
            url: '/accounting/distribution/generatedistribution',
            data: {
                '_token': $('input[name=_token]').val(),
                'distributionnumber': $('.distributionnumber').text()
            },
            success: function(data) {
                window.location.href = '/accounting/distribution/history/' + $('.distributionnumber').text(); 
            }
        });
    });
  });
  