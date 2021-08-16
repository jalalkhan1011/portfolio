<div class="modal fade messagemodal{{ $contact->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form  action="{{ url('admin/contacts/replay-message') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Recipient:</label>
                        <input type="text" value="{{ $contact->email }}" name="email" class="form-control" id="" readonly required>
                        <input type="hidden" value="{{ $contact->id }}" name="contact_id">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">User Message:</label>
                        <textarea class="form-control form-control-sm" id="message-text" rows="10" readonly>{{ $contact->message }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Replay Message:</label>
                        <textarea class="form-control form-control-sm" name="replay" id="replay" rows="10" required></textarea>
                        <span><p id='result'></p></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary reloadmodal" data-dismiss="modal">Close</button>
                        <button type="submit" id="validate" class="btn btn-primary">Send message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>
        function validate() {
            var $result = $("#result");
            var title = $("#replay").val();
            $result.text("");

            if (title != 0) {
                return true;
            } else {
                $result.text(" This title field is required");
                $result.css("color", "red");
                return false;
            }

        }
        $("#validate").bind("click", validate);//use for validate when button click and prevent modal

        $('.reloadmodal').on('click',function (){
            location.reload()
        })
    </script>
@endpush
