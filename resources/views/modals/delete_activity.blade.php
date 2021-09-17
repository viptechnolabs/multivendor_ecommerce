<!-- delete activity delete -->
<div id="delete-modal" class="modal fade">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('activity_delete') }}"
                  class="form-horizontal form-label-left" id="delete_activity" name="delete_activity">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel2">
                        Patient List Download</h5>
                    <button type="button" class="close"
                            data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="option">
                        <div class="modal-body">
                            <div class="radio">
                                @foreach(collect(App\Models\Index::OPTION)->filter(function ($value, $key) {return $key !== "custom";}) as $key => $value )
                                    <label>
                                        <input type="radio" class="flat" value="{{ $key }}" id="option"
                                               name="option" {{$key === 'last_month' ? 'checked' : ''}}> {{ $value }} &nbsp;&nbsp;
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">Cancel
                        </button>

                        <button  type="submit" id="delete-btn" class="btn btn-danger">
                            Delete
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

