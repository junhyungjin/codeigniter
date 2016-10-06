<div class="modal show" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">로그인</h4>
      </div>
      <form class="form-horizontal" action="/index.php/auth/authentication">
        <div class="modal-body">
            <div class="form-group">
              <label for="id" class="col-sm-2 control-label">아이디</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="id" placeholder="id">
              </div>
            </div>
            <div class="form-group">
              <label for="password" class="col-sm-2 control-label">비밀번호</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="password" placeholder="Password">
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="로그인"/>
        </div>
      </div><!-- /.modal-content -->
    </form>
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
