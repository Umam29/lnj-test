<div class="modal fade show" role="dialog" id="addData" aria-labelledby="modaladdDataLabel" aria-hidden="">
    <div class="modal-dialog" role="document">
        <form action="{{url()->current()}}/save" method="POST" id="formaddData">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modaladdDataLabel">Add Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="">
                    <div class="form-group">
                        <label>Created Date</label>
                        <input type="date" class="form-control" name="created_date" id="created_date" required>
                    </div>
                    <div class="form-group">
                        <label>Carp Code</label>
                        <input type="text" class="form-control" name="carp_code" id="carp_code" required>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <input type="text" class="form-control" name="category" id="category" required>
                    </div>
                    <div class="form-group">
                        <label>Initiator</label>
                        <input type="text" class="form-control" name="initiator" id="initiator" required>
                    </div>
                    <div class="form-group">
                        <label>Initiator Div</label>
                        <input type="text" class="form-control" name="initiator_div" id="initiator_div" required>
                    </div>
                    <div class="form-group">
                        <label>Inititator Branch</label>
                        <input type="text" class="form-control" name="initiator_branch" id="initiator_branch" required>
                    </div>
                    <div class="form-group">
                        <label>Recipient</label>
                        <input type="text" class="form-control" name="recipient" id="recipient" required>
                    </div>
                    <div class="form-group">
                        <label>Recipient Div</label>
                        <input type="text" class="form-control" name="recipient_div" id="recipient_div" required>
                    </div>
                    <div class="form-group">
                        <label>Recipient Branch</label>
                        <input type="text" class="form-control" name="recipient_branch" id="recipient_branch" required>
                    </div>
                    <div class="form-group">
                        <label>Verified By</label>
                        <input type="text" class="form-control" name="verified_by" id="verified_by">
                    </div>
                    <div class="form-group">
                        <label>Due Date</label>
                        <input type="date" class="form-control" name="due_date" id="due_date" required>
                    </div>
                    <div class="form-group">
                        <label>Effectiveness</label>
                        <select class="form-control" name="effectiveness" id="effectiveness">
                            <option value="">Choose One</option>
                            <option value="Effective">Effective</option>
                            <option value="Not Effective">Not Effective</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status Date</label>
                        <input type="date" class="form-control" name="status_date" id="status_date" required>
                    </div>
                    <div class="form-group">
                        <label>Stage</label>
                        <select class="form-control" name="stage" id="stage">
                            <option value="">Choose One</option>
                            <option value="Draft">Draft</option>
                            <option value="Open">Open</option>
                            <option value="Submitted">Submitted</option>
                            <option value="Verified">Verified</option>
                            <option value="Responded">Responded</option>
                            <option value="Voided">Voided</option>
                            <option value="Closed">Closed</option>
                            <option value="Re-Open">Re-Open</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="">Choose One</option>
                            <option value="Open">Open</option>
                            <option value="Closed">Closed</option>
                            <option value="Canceled">Canceled</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary btnSubmit" id="btnSubmit">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
