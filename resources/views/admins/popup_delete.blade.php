<div class="modal fade" id="confirm-delete-{{$id}}" tabindex="-1"
     role="dialog"
     aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">アドミン削除</h4>
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">&times;
                </button>
            </div>

            <div class="modal-body">
                <p>アドミンを削除してよろしいでしょうか？</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    キャンセル
                </button>
                <a href="{{$url}}"
                   class="btn btn-danger btn-ok">削除</a>
            </div>
        </div>
    </div>
</div>