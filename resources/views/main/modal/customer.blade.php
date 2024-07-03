<!-- Your modal content -->
<div class="modal fade" id="default-example-modal" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Customer Add</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form class="needs-validation" id="customerForm">
               @csrf
               <div class="form-row">
                  <div class="col-md-12 mb-3">
                     <label class="form-label" for="name">Name<span class="text-danger">*</span></label>
                     <input type="text" class="form-control" id="name" name="name" placeholder="Name" >
                     <div class="invalid-feedback">
                        Please provide a valid name.
                     </div>
                     @error('name')
                     <div class="text-danger">
                        Name already exists
                     </div>
                     @enderror
                  </div> 
                  <div class="col-md-12 mb-3">
                     <label class="form-label" for="phone">Phone <span class="text-danger">*</span></label>
                     <input type="number" class="form-control" id="phone" name="phone" placeholder="Phone" >
                     <div class="invalid-feedback">
                        Please provide a valid phone number.
                     </div>
                     @error('phone')
                     <div class="text-danger">
                        Phone already exists
                     </div>
                     @enderror
                  </div>
               </div>
               <div class="d-flex flex-row align-items-center justify-content-start">
                  <button class="btn btn-primary" type="button" id="submitForm">Submit</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

<!-- Scripts section -->
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
       // Function to handle form submission
       $('#submitForm').click(function() {
         
                var name = $('#name').val(); 
                var phone = $('#phone').val(); 
                $('.form-control').removeClass('is-invalid');
                $('.invalid-feedback').text('');


                $.ajax({
                    url: "{{ url('/customer/store') }}",
                    method: "POST",
                    data: {name:name,phone:phone},
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val() // Fetch the CSRF token from the form
                    },
                    success: function(response) {
                        // Handle success response
                        toastr.success('Customer added successfully.');

                          var customerId = response.id; 
                          var newOption = $('<option></option>')
                               .val(customerId)
                               .text(name + ' (' + phone + ')');
                           $('#single-default').append(newOption);

                        $('#name').val('');
                        $('#phone').val('');     
                        $('#default-example-modal').modal('hide');
                        // Reset the form
                    },
                    error: function(xhr) {
                        // Handle error response
                        var errors = xhr.responseJSON.errors;
                        if (errors) {
                            if (errors.name) {
                                $('#name').addClass('is-invalid');
                                $('#name').next('.invalid-feedback').text(errors.name[0]);
                            } 
                            if (errors.phone) {
                                $('#phone').addClass('is-invalid');
                                $('#phone').next('.invalid-feedback').text(errors.phone[0]);
                            }
                        }
                    }
                });
       });
   });
</script>
@endsection
 