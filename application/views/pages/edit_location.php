				<div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Edit</h3>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                    	<fieldset>
                        	<div class="alert alert-error error" id="Empty_error">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                Enter a Name and try submitting again.
                            </div>
                            <div class="alert alert-error error" id="Edit_timeout">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                               Connection Timed Out. Please wait and try submitting again.
                            </div>
                            <div class="alert alert-error error" id="Edit_state">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                               
                            </div>
                        	<div class="control-group">
								<label class="control-label" for="focusedInput">Name</label>
								<div class="controls">
                                	<input class="input-xlarge" id="input_type" type="hidden" value="<?php echo $type ;?>">
                                    <input class="input-xlarge" id="input_pk_id" type="hidden" value="<?php echo $edit_loc['pk_id'] ;?>">
								  <input class="input-xlarge" id="input_edit_name" type="text" value="<?php echo $edit_loc['s_name'] ;?>">
                                 
								</div>
							  </div>
                        	
                        </fieldset>
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn" data-dismiss="modal">Close</a>
                    <a href="#" class="btn btn-primary" id="btn_edit_loc">Save changes</a>
                </div>