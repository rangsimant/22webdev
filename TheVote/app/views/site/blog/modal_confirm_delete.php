<div class="modal alertDelete" id="alertDelete_{{ feed.id }}">
  <div class="modal-dialog">
    <div class="modal-confirm-delete-alert">
      <div class="modal-post-header-alert">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-question"></i> Comfirm delete ?</h4>
      </div>
      <div class="modal-post-body-alert">
        <p>You are want to delete this Post ?</p>
      </div>
      <div class="modal-post-footer-alert">
        <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary btn-xs" data-dismiss="modal" ng-click="delete(feed.id)">Confirm</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->