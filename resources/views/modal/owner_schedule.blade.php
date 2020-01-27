<div class="modal fade" id="scheduleModal" tabindex="-2" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalLabel"><span id="schedule_date"></span></h4>
            </div>
            <div class="modal-body">
                @include('form/status',['prefix' => 'schedule_'])
                <div class="form-group">
                    <div class="form-line">
                        <input id="schedule_comment" name="schedule_comment" type="text" class="form-control" maxlength="16" placeholder="16文字まで" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="preloader pl-size-xs" id="schedule_loader" style="display: none;">
                    <div class="spinner-layer pl-grey">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <input name="schedule_id" id="schedule_id" type="hidden">
                <button id="save_schedule" type="button" class="btn btn-link waves-effect">SAVE</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>
